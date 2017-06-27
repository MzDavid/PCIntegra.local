<?php
namespace Modules\Dashboard\Controllers;

use Modules\Models\CdVideo;

class VideoController extends ControllerBase
{
    public function indexAction(){
        $videos = CdVideo::find();
        $this->view->setVar("videos",$videos);
    }
    public function newAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $category = new CdVideo();
            $category->setUrl($request->getPost("name_category"))
                ->setStatus($request->getPost("genero"))
                ->setDateCreation(date('Y-m-d H:i:s'));
            if($category->save()){
                $result = array("id"=>$category->getVdid(),"url"=>$category->getUrl(),"status"=>$category->getStatus(),"fecha"=>$category->getDateCreation());
                $this->response(array("message"=>"SUCCESS","code"=>200,"result"=>$result),200);
            }else{
                $this->response(array("message"=>"error try again","code"=>"404"),200);
            }
        }else{exit();}
    }
    public function editAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $id = $request->getPost("id");
            $category = CdVideo::findFirst($id);
            $category->setUrl($request->getPost("name_category"))
                ->setStatus($request->getPost("genero"));
            if($category->update()){
                $result = array("id"=>$category->getVdid(),"url"=>$category->getUrl(),"status"=>$category->getStatus(),"fecha"=>$category->getDateCreation());
                $this->response(array("message"=>"SUCCESS","code"=>200,"result"=>$result),200);
            }else{
                $this->response(array("message"=>"error try again","code"=>"404"),200);
            }
        }else{exit();}
    }
}