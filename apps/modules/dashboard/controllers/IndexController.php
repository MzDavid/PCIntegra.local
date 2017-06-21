<?php
namespace Modules\Dashboard\Controllers;
include dirname(dirname(dirname(dirname(__FILE__))))."/library/wideimage/WideImage.php";
use Modules\Models\CdSlider;
use Modules\Models\Vsectionnotes;
use Phalcon\Http\Request;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $auth = $this->auth();
        if($auth){
            $sum = Vsectionnotes::sum(array("column"=>"visits"));
            $this->view->setVar("sum",$sum);
        }else{
            $this->response->redirect("/logout");
        }
    }
    public function sliderAction(){
        $this->validationJs();
        $this->dataTable();
        $this->scripts("slider");
        $this->view->setVar("sliders",CdSlider::find());
    }
    public function saveSliderAction(){
        $auth = $this->auth();
        $request = new Request();
        if(!($auth && $request->getPost() && $request->isAjax()))$this->response(array("code"=>404,"message"=>"You do not have permission"),404);

        $values = $request->getPost();
        if($values['type']=="1"){
            $cd_slider = new CdSlider();
            $cd_slider->setImage($values['image'])
                ->setOrderSlider($values['order_slider'])
                ->setStatus($values['status'])
                ->setDateCreation(date("Y-m-d H:i:s"))
                ->setUid($auth['uid'])
                ->setTitle($values['title'])
                ->setSubtitle($values['subtitle']);

            if(!$cd_slider->save())$this->response(array("code"=>300,"message"=>"No se ha podido guardar este slider"),200);
        }else{
            $cd_slider = CdSlider::findFirst($values['slid']);
            $cd_slider->setOrderSlider($values['order_slider'])
                ->setStatus($values['status'])
                ->setTitle($values['title'])
                ->setSubtitle($values['subtitle']);
            if(!$cd_slider->update())$this->response(array("code"=>300,"message"=>"No se ha podido guardar este slider"),200);
        }
        $this->response(array("code"=>200,"message"=>"Slider guardado correctamente","result"=>$cd_slider->toArray()),200);
    }
    public function deleteSliderAction(){
        $auth = $this->auth();
        $request = new Request();
        if(!($auth && $request->getPost() && $request->isAjax()))$this->response(array("code"=>404,"message"=>"You do not have permission"),404);

        $id = $request->getPost("id");
        $cd_slider = CdSlider::findFirst($id);
        if(!$cd_slider->delete())$this->response(array("code"=>300,"message"=>"No se ha podido eliminar esta fila"),200);
        $image = $cd_slider->getImage();
        try{
            unlink($this->public.$this->direction."api/images/slider/".$image);
            unlink($this->public.$this->direction."api/images/slider/thumbnail/".$image);
        }catch (\Exception $e){

        }
        $this->response(array("code"=>200,"message"=>"Fila eliminada correctamente"),200);
    }
    public function uploadFileAction(){
        $request = $this->request;
        $auth = $this->auth();
        if($request->isPost() && $request->isAjax() && $auth){
            if($request->hasFiles()==true) {
                $values = $request->getPost();
                $type = $values["type"];
                foreach ($request->getUploadedFiles() as $file) {
                    $replace = preg_replace('/[^A-Za-z0-9áéíóúÁÉÍÓÚñÑ\_\.!¡¿?]/', '', $file->getName());
                    $new_file = uniqid() . "_" . $replace;
                    $this->createFolder($type);
                    try {
                        $file->moveTo($this->public . "api/images/$type/" . $new_file);
                        $image_transform = \WideImage::load($this->public."api/images/$type/".$new_file);

                        if($type=="slider")$thumbnail = $image_transform->resize(320,176)->crop(0, 0, 320, 176);
                        else $thumbnail = $image_transform->resize(135,80)->crop(0, 0, 135, 80);

                        $thumbnail->saveToFile($this->public."api/images/$type/thumbnail/".$new_file);

                        $status = 200;
                    } catch (\Exception $e) {$status = 300;}
                    $this->response(array("status"=>$status,"message"=>"success","name"=>$new_file),200);
                }
            }
        }else{
            $this->response(array("message"=>"Error 404, try again."),404);
        }
    }
    private function createFolder($type){
        if(!file_exists($this->public."api/images/$type")){
            mkdir($this->public."api/images/$type", 0777, true);
            mkdir($this->public."api/images/$type/thumbnail", 0777, true);
        }
    }
    private function scripts($name){
        $this->assets->collection('jsPlugins')
            ->setTargetPath("dash/js/general.$name.min.js")
            ->setTargetUri("dash/js/general.$name.min.js")
            ->addJs("dash/js/plugins/dropzone/dropzone.min.js")
            ->addJs("dash/js/ckeditor.js")
            ->addJs("dash/ckeditor/adapters/jquery.js")
            ->addJs("dash/js/plugins/tableDnD/jquery.tablednd.js")
            ->addJs("dash/js/plugins/select/select2.min.js")
            ->addJs("dash/js/plugins/select/es.js")
            ->addJs("dash/js/custom.upload.files.js")
            ->addJs("dash/js/plugins/noty/jquery.noty.js")
            ->addJs("dash/js/plugins/noty/topRight.js")
            ->addJs("dash/js/plugins/noty/default.js")
            ->addJs("dash/js/index/$name.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
}

