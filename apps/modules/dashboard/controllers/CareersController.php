<?php
namespace Modules\Dashboard\Controllers;
use Modules\Models\CdCareers;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";

class CareersController extends ControllerBase
{
    public function indexAction(){
        $auth = $this->auth();
        if($auth){
            $allCarrers = CdCareers::find("status='ACTIVO'");
            if($auth['rol']=="ADMIN"){
                $this->view->setVar("allcarrers",$allCarrers);
            }else{$this->response(array("message"=>"error try again","code"=>"404"),200);}
        }else{
            exit();
        }
    }
    public function newAction(){
        $auth = $this->auth();
        if($auth){
            $this->scripts();
            $this->view->setVar("category",json_decode($this->getCategory(),true));
        }else{
            exit();
        }
    }
    public function editAction(){
        $auth = $this->auth();
        $crid = $this->request->get("crid");
        $career = new CdCareers();
        if($auth && $crid && $career->findFirst($crid)){
            $this->scripts();
            $find = $career->findFirst($crid);
            $this->view->setVar("note",$find);
        }else{
            return $this->response->redirect("dashboard/careers/index");
        }
    }
    public function saveAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $note = new CdCareers();
            $note->setName(str_replace('\'', '"',$request->getPost("title")))
                ->setPermalink($request->getPost("permalink"))
                ->setInformation($request->getPost("information"))
                ->setQuestion($request->getPost("question"))
                ->setVideo($request->getPost('video'))
                ->setUid($auth['uid'])
                ->setOrderCrid(0)
                ->setCategory("LICENCIATURA");
            if($note->save()){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                foreach ($note->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
                $this->response(array("message"=>"$message","code"=>404),200);
            }
        }else{
            exit();
        }
    }
    public function updateAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $note = new CdCareers();
            $find = $note->findFirst($request->getPost("crid"));
            $find->setInformation($request->getPost("information"))
                ->setQuestion($request->getPost("question"))
                ->setVideo($request->getPost('video'));
            if($find->update()){
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                foreach ($find->getMessages() as $message) {
                    $message = $this->flash->error((string) $message);
                }
                $this->response(array("message"=>"$message","code"=>404),200);
            }
        }else{
            exit();
        }
    }
    public function validateUrlAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth ){
            $post = new CdCareers();
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
    public function deleteAction(){
        $auth = $this->auth();
        $request = new Request();
        if(!($auth && $request->getPost() && $request->isAjax()))$this->response(array("code"=>404,"message"=>"You do not have permission"),404);

        $id = $request->getPost("id");
        $cd_post = CdCareers::findFirst($id);
        if(!$cd_post->delete())$this->response(array("code"=>300,"message"=>"No se ha podido eliminar esta fila"),200);
        try{
            rmdir($this->public."api/".$id);
        }catch (\Exception $e){

        }
        $this->response(array("code"=>200,"message"=>"Fila eliminada correctamente"),200);
    }

    /**
     *
     */
    public function uploadFileAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true){
                foreach($request->getUploadedFiles() as $file){
                    $values = $request->getPost();
                    $id = $values['crid'];
                    $new_image =$file->getName();
                    /*print_r($new_image);
                    exit();*/
                    if($file->moveTo($this->public.$this->direction."api/".$new_image)){
                        $cd_post = CdCareers::findFirst($id);
                        $cd_post->setPlan($new_image);
                        if(!$cd_post->save())$this->response(array("message"=>"El archivo no se ha guardado en la base de datos, intenta nuevamente","code"=>"300"),200);
                        $this->response(array("name"=>$new_image,"message"=>"El archivo se ha guardado correctamente","code"=>"200"),200);
                    }
                    else{
                        $this->response(array("name"=>$new_image,"message"=>"El archivo no se ha podido guardar, intente nuevamente","code"=>"404"),200);
                    }
                }
            }
        }else{
            $this->response(array("message"=>"Error 404, try again."),404);
        }
    }
    public function deletedFileAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            $name = $request->getPost("name");
            $id = $request->getPost("crid");
            try{
                @unlink($this->public.$this->direction."api/".$name);
                $cd_post = CdCareers::findFirst($id);
                $cd_post->setPlan("");
                if(!$cd_post->save())$this->response(array("message"=>"El archivo no se ha borrado en la base de datos, intenta nuevamente","code"=>"300"),200);
            }catch (\Exception $e){
                $this->response(array("message"=>"El archivo no se ha borrado correctamente","code"=>"300"),200);
            }
            $this->response(array("message"=>"El archivo se ha borrado correctamente","code"=>"200"),200);
        }else{
            $this->response(array("message"=>"Error 404, try again."),404);
        }
    }
    private function scripts(){
        $this->assets->collection('jsPlugins')
            ->setTargetPath("dash/js/general.careers.min.js")
            ->setTargetUri("dash/js/general.careers.min.js")
            ->addJs("dash/js/plugins/noty/jquery.noty.js")
            ->addJs("dash/js/plugins/noty/topRight.js")
            ->addJs("dash/js/plugins/noty/default.js")
            ->addJs("dash/js/careers/careers.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
}