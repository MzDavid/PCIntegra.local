<?php
namespace Modules\Frontend\Controllers;
use Modules\Models\CdCareers;
use Modules\Models\CdCarrer;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->assets->collection('IndexJs')
            ->setTargetPath("front/js/general.min.js")
            ->setTargetUri("front/js/general.min.js")
            ->addJs("front/js/jquery-3.1.0.min.js")
            ->addJs("front/js/bootstrap.min.js")
            ->addJs("front/js/fakeLoader.min.js")
            ->addJs("front/js/isotope.min.js")
            ->addJs("front/js/owl.carousel.min.js")
            ->addJs("front/js/jquery.magnific-popup.min.js")
            ->addJs("front/js/jquery.sticky.js")
            ->addJs("front/js/jquery.validate.min.js")
            ->addJs("front/js/jquery.waypoints.min.js")
            ->addJs("front/js/jquery.counterup.min.js")
            ->addJs("front/js/retina.min.js")
            ->addJs("front/js/main.js")
            ->addJs("front/js/pcintegra.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());

        $this->assets->collection('IndexCss')
            ->setTargetPath("front/css/general.min.css")
            ->setTargetUri("front/css/general.min.css")
            ->addCss("front/css/font-awesome.min.css")
            ->addCss("front/css/bootstrap.min.css")
            ->addCss("front/css/fakeLoader.min.css")
            ->addCss("front/css/owl.carousel.min.css")
            ->addCss("front/css/magnific-popup.css")
            ->addCss("front/css/images-grid.css")
            ->addCss("front/css/style.css")
            ->addCss("front/css/responsive-style.css")
            ->addCss("front/css/colors/theme-color-1.css")
            ->addCss("front/css/custom.css")
            ->addCss("front/css/pcintegra.css")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());

        $this->view->setVar("carrer2",CdCareers::find("status='ACTIVO' and category='LICENCIATURA'"));

    }
    public function response($dataArray,$status)
    {
        $this->view->disable();
        if($status==200){
            $this->response->setStatusCode($status, "OK");
        }else{
            $this->response->setStatusCode($status, "ERROR");
        }
        $this->response->setJsonContent($dataArray);
        $this->response->send();
        exit();
    }
    public function metaHome($action,$canonical,$image,$description,$class){
        $this->session->set("meta",
            array(
                "title"=>"$action",
                "url"=>$this->url->getBaseUri()."$canonical",
                "image"=>$this->url->getBaseUri()."dash/img/notes/800x600/$image",
                "description"=>"$description",
                "class"=>"$class"
            )
        );
        /*{{ router.getRewriteUri() }}*/
    }
    public function header($action){
        $ct = array("futbol"=>"F","basquetbol"=>"B","beisbol"=>"BE","box"=>"BX","mas-deportes"=>"M","lucha-libre"=>"L","contactanos"=>"C","index"=>"I","acerca"=>"AC");
        $this->session->set("header",
            array(
                "$ct[$action]"=>"current-menu-ancestor",
            )
        );
    }
    public function cleaCategory($string){
        return  mb_strtolower(str_replace(' ', '-',str_replace('-','',$string)), 'UTF-8');
    }
    public function dateSpanish(){
        return array(
            "01"=>"Enero",
            "02"=>"Febrero",
            "03"=>"Marzo",
            "04"=>"Abril",
            "05"=>"Mayo",
            "06"=>"Junio",
            "07"=>"Julio",
            "08"=>"Agosto",
            "09"=>"Septiembre",
            "10"=>"Octubre",
            "11"=>"Noviembre",
            "12"=>"Diciembre"
        );
    }
}
