<?php
namespace Modules\Dashboard\Controllers;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
use Modules\Models\CdAdvertising;

class  AdvertisingController extends ControllerBase{
    public function indexAction(){
        $auth = $this->auth();
        if($auth) {
            $find = CdAdvertising::find("order_adv > 0 order by order_adv asc");
            if($find){
                $this->view->setVar("find",$find);
                $this->view->setVar("status",1);
                $this->view->setVar("video",json_decode($this->getVideos(null,2),true));
            }else{
                $this->view->setVar("status",2);
            }
        }else{
            $this->response(array("message"=>"error","code"=>404),402);
        }
    }
    public function saveAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $order = $request->getPost("order");
            $ubication  = $request->getPost("ubication");
            $url = $request->getPost("url");
            $image = $request->getPost("image-1");
            $advertising = CdAdvertising::findFirst("name_image='$image' and ubication='$ubication'");
            if($advertising){
                $advertising->setNameImage($image)
                    ->setOrderAdv($order)
                    ->setUbication($ubication)
                    ->setUrl($url);
                $save = $advertising->update();
            }else{
                $advertising = new CdAdvertising();
                $advertising->setNameImage($image)
                    ->setOrderAdv($order)
                    ->setUbication($ubication)
                    ->setUrl($url);
                $save = $advertising->save();
            }
            if($save){
                $this->getAdvertising();
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                foreach ($advertising->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
                $this->response(array("message"=>"$message","code"=>404),200);             }

        }else{
            $this->response(array("message"=>"error","code"=>404),402);
        }
    }
    public function  videoAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            if($this->getVideos($request->getPost(),1)){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }$this->response(array("message"=>"error","code"=>404),402);
        }else{
            $this->response(array("message"=>"error","code"=>404),402);
        }
    }
    public function uploadFileAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $new_image = $request->getPost("image-1");
                    if($file->moveTo($this->public."front/images/slider/".$new_image)){
                        $this->response(array("name"=>$new_image,"message"=>"SUCCESS","code"=>"200"),200);
                    }
                    else{
                        $this->response(array("name"=>$new_image,"message"=>"error try again","code"=>"404"),200);
                    }
                }
            }
        }else{
            $this->response(array("message"=>"error","code"=>404),402);
        }
    }
    public function getAdvertising(){
        $json = dirname(dirname(dirname(dirname(__DIR__))))."/public/json/advertising.json";
        $file = fopen($json,"wb");
        $advertising = CdAdvertising::find();
        $content = array();
        foreach($advertising as $values){
            $content[$values->getOrderAdv()]=array(
                "image"=>$values->getNameImage(),
                "url"=>$values->getUrl()
            );
        }
        $advertising_json = json_encode($content);
        fwrite($file,$advertising_json);
        fclose($file);
        return $advertising_json;
    }
    public function getVideos($values,$type){
        $json = dirname(dirname(dirname(dirname(__DIR__))))."/public/json/videos.json";
        if($type==1){
            $file = fopen($json,"wb");
            $content[] = $values["video1"];
            $content[] = $values["video2"];
            $advertising_json = json_encode($content);
            fwrite($file,$advertising_json);
            fclose($file);
            return $advertising_json;
        }else if($type==2){
            $get_file = file_get_contents($json);
            if(!file_exists($json) || empty($get_file)){
                $file = fopen($json,"wb");
                $content[] = "https://www.youtube.com/watch?v=zpOULjyy-n8";
                $content[] = "https://www.youtube.com/watch?v=zpOULjyy-n8";
                $advertising_json = json_encode($content);
                fwrite($file,$advertising_json);
                fclose($file);
                return $advertising_json;
            }else{
                return $get_file;
            }
        }
    }

}