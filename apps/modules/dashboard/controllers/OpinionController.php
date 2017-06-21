<?php
namespace Modules\Dashboard\Controllers;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
use Modules\Models\CdOpinion;

class OpinionController extends ControllerBase{
    public function indexAction(){
        $category = CdOpinion::find();
        $this->view->setVar("categories",$category);
    }
    public function newAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $name_category = $request->getPost("name_category");
            if($request->getPost("genero")=="hombre") $genero="/front/images/testimonials/boy2.png";
            else $genero="/front/images/testimonials/chica2.png";

            $category = new CdOpinion();
            $category->setName(ucfirst($name_category))
                ->setTitle($request->getPost("titleCat"))
                ->setOpinion($request->getPost("opinionCat"))
                ->setImage($genero)
                ->setStatus("ACTIVE")
                ->setDateCreation(date('Y-m-d H:i:s'));
            if($category->save()){
                $result = array("id"=>$category->getOpid(),"name"=>$category->getName(),"title"=>$category->getTitle(),"opinion"=>$category->getOpinion());
                $this->response(array("message"=>"SUCCESS","code"=>200,"result"=>$result),200);
            }else{
                $this->response(array("message"=>"error try again","code"=>"404"),200);
            }
        }else{exit();}
    }
    public function uploadImageOpinionAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '',$file->getName());
                    $new_image = uniqid()."_".$image_replace;
                    if($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/".$new_image)){
                        $image_transform = \WideImage::load(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/images/testimonials/".$new_image);
                        $newImageThumbnail = $image_transform->resize(100,null)->crop(0,0,80,80);
                        $newImageThumbnail->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/images/testimonials/".$new_image);
                        $this->response(array("name"=>$new_image,"message"=>"SUCCESS","code"=>"200"),200);
                    }
                    else{
                        $this->response(array("name"=>$new_image,"message"=>"error try again","code"=>"404"),200);
                    }
                }
            }
        }else{
            exit();
        }
    }
    public function editAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $name_category = $request->getPost("name_category");
            $id = $request->getPost("id");
            $category = CdOpinion::findFirst($id);
            /*print_r($category);
            exit();*/
            $category->setName(ucfirst($name_category))
                ->setTitle($request->getPost("titleCat"))
                ->setOpinion($request->getPost("opinionCat"))
                ->setStatus("ACTIVE");
            if($category->update()){
                /*$this->categoryJson();*/
                $result = array("id"=>$category->getOpid(),"name"=>$category->getName(),"title"=>$category->getTitle(),"opinion"=>$category->getOpinion());
                $this->response(array("message"=>"SUCCESS","code"=>200,"result"=>$result),200);
            }else{
                $this->response(array("message"=>"error try again","code"=>"404"),200);
            }
        }else{exit();}
    }
    public function validateCategoryAction(){
        $request = $this->request;
        if($request->isPost() && $request->isAjax()){
            $name_category = $this->request->getPost("name_category");
            $category = CdOpinion::findFirst("name='$name_category'");
            if($category==null){
                $this->response(array('valid' => true),200);
            }
            elseif($category!=null){
                $this->response(array('valid' => false),200);
            }
            else{
                $this->response(array("message"=>"error try again","code"=>"404"),404);
            }
        }
    }
}