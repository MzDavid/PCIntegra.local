<?php
namespace Modules\Dashboard\Controllers;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
use Modules\Models\CdImages;
use Modules\Models\CdPhotoNote;
use Modules\Models\Galleryphotonote;
use Modules\Models\ImagesHasPhotoNote;

class PhotoController extends ControllerBase{
    public function indexAction(){
        $auth = $this->auth();
        if($auth){
            $uid = $auth['uid'];
            $allPhotoNotes = new CdPhotoNote();
            if($auth['rol']=="ADMIN"){
                $this->view->setVar("allPhotoNotes",$allPhotoNotes->find("status='PUBLIC'"));
            }else{$this->view->setVar("allPhotoNotes",$allPhotoNotes->find("status='PUBLIC' and uid=$uid"));}
        }else{
            exit();
        }
    }
    public function draftAction(){
        $auth = $this->auth();
        if($auth){
            $uid = $auth['uid'];
            $allPhotoNotes = new CdPhotoNote();
            if($auth['rol']=="ADMIN"){
                $this->view->setVar("allPhotoNotes",$allPhotoNotes->find("status='ERASER'"));
            }else{$this->view->setVar("allPhotoNotes",$allPhotoNotes->find("status='ERASER' and uid=$uid"));}
        }else{
            exit();
        }
    }
    public function newAction(){
        $this->assets->collection('jsPhotoNotes')->addJs("dash/js/custom_photos.js");
    }
    public function editAction(){
        $request = $this->request;
        $auth = $this->auth();
        $pnid = $request->get("pnid");
        $cdPN = CdPhotoNote::findFirst($pnid);
        if($auth && $cdPN){
            $galleryPN = Galleryphotonote::find("pnid=$pnid");
            $this->assets->collection('jsPhotoNotes')->addJs("dash/js/custom_photos.js");
            $this->view->setVar("pn",$cdPN);
            $this->view->setVar("gpn",$galleryPN);
        }else{
            $this->response->redirect("dashboard/photo");
        }
    }
    public function saveAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $pnid = $request->getPost("pnid");
            $note = new CdPhotoNote();
            if($pnid){
                $find  = $note->findFirst($pnid);
                $find->setTitle(str_replace('\'', '"',$request->getPost("title")))
                    ->setImage($request->getPost("image"))
                    ->setPermalink($request->getPost("permalink"))
                    ->setContent($request->getPost("content"))
                    ->setStatus($request->getPost('status'))
                    ->setDateUpdate(date('Y-m-d H:i:s'))
                    ->setUid($auth['uid']);
                if($find->update()){
                    $this->response(array("message"=>"SUCCESS","code"=>200,"pnid"=>$find->getPnid(),"active"=>1),200);
                }else{
                    $this->response(array("message"=>"error try again","code"=>404),200);
                }
            }else{
                $note->setTitle(str_replace('\'', '"',$request->getPost("title")))
                    ->setImage($request->getPost("image"))
                    ->setPermalink($request->getPost("permalink"))
                    ->setContent($request->getPost("content"))
                    ->setStatus($request->getPost('status'))
                    ->setVisits(0)
                    ->setDateCreation(date('Y-m-d H:i:s'))
                    ->setDateUpdate(date('Y-m-d H:i:s'))
                    ->setUid($auth['uid']);
                if($note->save()){
                    $this->response(array("message"=>"SUCCESS","code"=>200,"pnid"=>$note->getPnid(),"active"=>2),200);
                }else{
                    $result = array();
                    foreach ($note->getMessages() as $key => $message) {
                        $result[$key]= $this->flash->error((string) $message);
                    }
                    $this->response(array("message"=>"$result","code"=>404),200);
                }
            }
        }else{
            $this->response(array("message"=>"SUCCESS","code"=>200),200);
        }
    }
    public function saveMultipleImagesAction()
    {
        $request = $this->request;
        $auth = $this->auth();
            if($request->isPost() && $request->isAjax() && $request->hasFiles() && $auth ){
            $photo = new CdImages();
            foreach($request->getUploadedFiles() as $file){
                $image_replace = str_replace(" ","_",$file->getName());
                $name_image = uniqid()."_".$image_replace;
                $pnid= $request->getPost("pnid");
                $original_name = $file->getName();

                //add values table ddt_image
                $photo->setOriginalName($original_name)
                    ->setName($name_image)
                    ->setSize($file->getSize())
                    ->setType($file->getRealType())
                    ->setDateCreation(date('Y-m-d H:i:s'))
                    ->setUid($auth['uid']);
                if($photo->save()){
                    $last_imgid = $photo->getImgid();
                    if($photo->setImagesNotes($last_imgid,$pnid)){
                        if($file->moveTo(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/images/photo_notes/".$name_image)){
                            $image_transform = \WideImage::load(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/images/photo_notes/".$name_image);
                            $newImageThumbnail = $image_transform->resize(800,null)->crop(0,0,800,600);
                            $newImageThumbnail->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/images/photo_notes/800x600/".$name_image);
                            $newImageThumbnail2 = $image_transform->resize(220,null)->crop(0,0,220,140);
                            $newImageThumbnail2->saveToFile(dirname(dirname(dirname(dirname(__DIR__))))."/public/front/images/photo_notes/220x140/".$name_image);
                            $this->response(array("original_name"=>$original_name,"name"=>$name_image,"message"=>"SUCCESS","code"=>"200","photo_id"=>$last_imgid),200);
                        }
                    }
                    else{
                        $this->response(array("name"=>$name_image,"message"=>"error try again","code"=>"404"),200);
                    }
                }
                else{
                    $this->response(array("name"=>$name_image,"message"=>"error try again","code"=>"404"),200);
                }
            }
        }
    }
    public function saveDescriptionAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $imgid = $request->getPost("id");
            $description   = $request->getPost("description");
            $photo = CdImages::findFirst($imgid);
            $photo->setDescription($description)->setDateUpdate(date('Y-m-d H:i:s'));
            if($photo->update()){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                $result = array();
                foreach ($photo->getMessages() as $key => $message) {
                    $result[$key]= $this->flash->error((string) $message);
                }
                $this->response(array("message"=>"$result","code"=>404),200);             }
        }else{
            $this->response(array("message"=>"error","code"=>404),404);
        }
    }
    public function orderImageAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $imgid = explode("|",$request->getPost("imgid"));
            $pnid = $request->getPost("pnid");
            $order = $request->getPost("order");
            $photo = new ImagesHasPhotoNote();
            if($photo->setOrderImages($imgid[1],$pnid,$order)){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                $result = array();
                foreach ($photo->getMessages() as $key => $message) {
                    $result[$key]= $this->flash->error((string) $message);
                }
                $this->response(array("message"=>"$result","code"=>404),200);             }
        }else{
            $this->response(array("message"=>"error","code"=>404),404);
        }
    }
    public function uploadImageAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $image_replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '',$file->getName());
                    $new_image = uniqid()."_".$image_replace;
                    if($file->moveTo($this->public."front/images/photo_notes/".$new_image)){
                        $image_transform = \WideImage::load($this->public."front/images/photo_notes/".$new_image);
                        $newImageThumbnail = $image_transform->resize(800,null)->crop(0,0,800,600);
                        $newImageThumbnail->saveToFile($this->public."front/images/photo_notes/800x600/".$new_image);
                        $newImageThumbnail2 = $image_transform->resize(220,null)->crop(0,0,220,140);
                        $newImageThumbnail2->saveToFile($this->public."front/images/photo_notes/220x140/".$new_image);
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
    public function validateUrlAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth ){
            $post = new CdPhotoNote();
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
            $this->response(array("message"=>"error"),404);
        }
    }
    public function deleteImageAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth ){
            $post_id = $request->getPost("pnid");
            $imgid = $request->getPost("imgid");
            $name_image = $request->getPost("name_image");
            $image_has_photo = ImagesHasPhotoNote::findFirst("imgid=$imgid");
            if($image_has_photo->delete()){
                $image = CdImages::findFirst("imgid=$imgid");
                if ($image->delete()){
                    unlink($this->public."front/images/photo_notes/".$name_image);
                    unlink($this->public."front/images/photo_notes/800x600/".$name_image);
                    unlink($this->public."front/images/photo_notes/220x140/".$name_image);
                    $this->response(array("id"=>$name_image."|".$imgid,"message"=>"SUCCESS","code"=>"200"),200);
                }else{
                    $this->response(array("message"=>"error try again cd_images"),200);
                }
            }else{
                $this->response(array("message"=>"error try again image_has_photo_note"),200);
            }
        }else{
            $this->response(array("message"=>"error"),404);
        }
    }
}