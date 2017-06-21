<?php
namespace Modules\Dashboard\Controllers;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
require dirname(dirname(dirname(dirname(__FILE__))))."/library/PHPMailer/PHPMailerAutoload.php";
use Modules\Models\Allnotes;
use Modules\Models\CdPost;
class NotesController extends ControllerBase{
    public function indexAction(){
        $auth = $this->auth();
        if($auth){
            $uid = $auth['uid'];
            $allNotes = new Allnotes();
            if($auth['rol']=="ADMIN"){
                $this->view->setVar("allnotes",$allNotes->find("status='PUBLIC'"));
            }else{$this->view->setVar("allnotes",$allNotes->find("status='PUBLIC' and uid=$uid"));}
        }else{
            exit();
        }
    }
    public function draftAction(){
        $auth = $this->auth();
        if($auth){
            $uid = $auth['uid'];
            $allNotes = new Allnotes();
            if($auth['rol']=="ADMIN"){
                $this->view->setVar("allnotes",$allNotes->find("status='ERASER'"));
            }else{$this->view->setVar("allnotes",$allNotes->find("status='ERASER' and uid=$uid"));}
        }else{
            exit();
        }
    }
    public function newNoteAction(){
        $auth = $this->auth();
        if($auth){
            $this->view->setVar("category",json_decode($this->getCategory(),true));
        }else{
            exit();
        }
    }
    public function editNoteAction(){
        $auth = $this->auth();
        $pid = $this->request->get("pid");
        $notes = new CdPost();
        if($auth && $pid && $notes->findFirst($pid)){
            $find = $notes->findFirst($pid);
            $subCategory = json_decode($this->getSubCategory(),true);
            foreach($subCategory as $key => $val){
                if($key==$find->getScid()){
                    $cat = $subCategory[$key];
                }
            }
            $this->view->setVar("categoryVal",key($cat));
            $this->view->setVar("category",json_decode($this->getCategory(),true));
            $this->view->setVar("subcategory",$subCategory);
            $this->view->setVar("note",$find);
        }else{
            return $this->response->redirect("dashboard/notes");
        }
    }
    public function saveNoteAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
             $note = new CdPost();
             $note->setTitle(str_replace('\'', '"',$request->getPost("title")))
                 ->setImage($request->getPost("image"))
                 ->setPermalink($request->getPost("permalink"))
                 ->setSummary($request->getPost("summary"))
                 ->setContent($request->getPost("content"))
                 ->setStatus($request->getPost('status'))
                 ->setVisits(0)
                 ->setDateCreation(date('Y-m-d H:i:s'))
                 ->setDatePublic(date('Y-m-d H:i:s'))
                 ->setDescriptionImage($request->getPost('descriptionI'))
                 ->setIsGallery(0)
                 ->setUid($auth['uid'])
                 ->setScid($request->getPost("subcategory"))
                 ->setType($request->getPost("type"));
             if($note->save()){
                 $this->response(array("message"=>"SUCCESS","code"=>200),200);
             }else{
                 foreach ($note->getMessages() as $message) {
                     $this->flash->error((string) $message);
                 }
                 $this->response(array("message"=>"$message","code"=>404),200);             }
        }else{
            exit();
        }
    }
    public function visitsAction(){
      $auth = $this->auth();
      if ($auth){
          $notes  = Allnotes::find("status='PUBLIC' order by visits desc");
          $this->view->setVar("notes",$notes);
      }else{
        exit();
      }
    }
    public function updateNoteAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
             $dateP = $request->getPost("dateP");
             $newDate = explode("/",$dateP);
             $newDate = $newDate["2"]."-".$newDate["1"]."-".$newDate["0"];
             $note = new CdPost();
             $find = $note->findFirst($request->getPost("pid"));
             $find->setTitle(str_replace('\'', '"',$request->getPost("title")))
                 ->setImage($request->getPost("image"))
                 ->setPermalink($request->getPost("permalink"))
                 ->setSummary($request->getPost("summary"))
                 ->setContent($request->getPost("content"))
                 ->setStatus($request->getPost('status'))
                 ->setDescriptionImage($request->getPost('descriptionI'))
                 ->setDatePublic($newDate)
                 ->setIsGallery(0)
                 ->setUid($auth['uid'])
                 ->setScid($request->getPost("subcategory"))
                 ->setType($request->getPost("type"));
             if($find->update()){
                 $this->response(array("message"=>"SUCCESS","code"=>200),200);
             }else{
                 foreach ($find->getMessages() as $message) {
                     $message = $this->flash->error((string) $message);
                 }
                 $this->response(array("message"=>"$message","code"=>404),200);             }
        }else{
            exit();
        }
    }
    public function uploadImageNoteAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '',$file->getName());
                    $new_image = uniqid()."_".$image_replace;
                    if($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/".$new_image)){
                        $image_transform = \WideImage::load(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/".$new_image);
                        $newImageFace = $image_transform->resize(800,null)->crop(0,0,800,600);
                        $newImageFace->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/800x600/".$new_image);
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
    public function uploadMultipleImagesAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '',$file->getName());
                    $new_image = uniqid()."_".$image_replace;
                    if($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/".$new_image)){
                        $image_transform = \WideImage::load(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/".$new_image);
                        $newImageThumbnail = $image_transform->resize(1024,null);
                        $newImageThumbnail->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/dash/img/notes/1024/".$new_image);
                        echo $this->url->getBaseUri()."dash/img/notes/1024/"."$new_image";
                        exit();
                        //$this->response(array("name"=>$new_image,"message"=>"SUCCESS","code"=>"200"),200);
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
    public function categoryAction(){
        $request = $this->request;
        if($this->auth() && $request->isPost() && $request->isAjax()){
            $category_id = $request->getPost("category");
            $subCategory = json_decode($this->getSubCategory(),true);
            $scid = array();
            foreach($subCategory as $key => $value){
                foreach($subCategory[$key] as $k => $newValue){
                    if($k==$category_id){
                        $scid[$key] = $newValue;
                    }
                }
            }
            $this->response(array("message"=>"Success","code"=>"200","result"=>$scid),200);
        }else
        {$this->response(array("message"=>"error","code"=>"200"),200);}
    }
    public function validateUrlAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth ){
            $post = new CdPost();
            $name_post = $request->getPost("title");
            $new_url = $this->url_clean($name_post);
            $check_url = $post->find("permalink = '$new_url'");
            $count = 1;
            while(count($check_url)){
                $generate_url = $new_url."-".$count;
                $check_url = $post->find("permalink = '$generate_url'");
                if(count($check_url)==0){
                    $new_url = $generate_url;
                }
                $count++;
            }
            $this->response(array("message"=>"SUCCESS","new_url"=>$new_url,"code"=>"200","data"=>"url generated"),200);
        }else{
            $this->response(array("message"=>"error"),200);
        }
    }
}
