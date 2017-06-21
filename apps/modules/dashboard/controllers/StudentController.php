<?php
namespace Modules\Dashboard\Controllers;
use Modules\Models\CdStudent;

include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
require dirname(dirname(dirname(dirname(__FILE__))))."/library/PHPMailer/PHPMailerAutoload.php";
class StudentController extends ControllerBase{
    public function indexAction(){
        $auth = $this->auth();
        if($auth){
            $allNotes = CdStudent::find();
            $this->view->setVar("allnotes",$allNotes);
        }else{
            exit();
        }
    }
    public function newNoteAction(){
        $auth = $this->auth();
        if($auth){
            $this->view->setVar("category",json_decode($this->getCategory(),true));
        }else{
            return $this->response->redirect("dashboard");
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
}