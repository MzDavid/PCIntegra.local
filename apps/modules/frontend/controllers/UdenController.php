<?php
namespace Modules\Frontend\Controllers;
use Modules\Models\CdCareers;
use Modules\Models\CdPost;
use Modules\Models\CdSlider;
use Modules\Models\CdUser;
use Phalcon\Http\Request;


class UdenController extends ControllerBase
{
    public function indexAction()
    {   $this->header("index");
        $title = "UMAEE | Universidad en villahermosa";
        $url ="";
        $image = "series.jpg";
        $description = "Inscripciones en linea de universidades en villahermosa tabasco, licenciatura en publicidad, licenciatura en mercadotecnia y negocios digitales.";
        $class = "header-1";
        $this->metaHome($title,$url,$image,$description,$class);
        $category = CdCareers::find("status='ACTIVO' and type='UMAEE'");
        $slider = CdSlider::find("status='ACTIVO' order by order_slider asc");
        $teacher = CdUser::find("rol='ADMIN' and status='ACTIVE'");
        $newLast = CdPost::find(
            [
                "order" => "date_public DESC",
                "limit" => 4,
            ]);
        /* $newLast = CdPost::find("scid=31 order by date_public asc limit 4");*/
        $this->view->setVar("sliders",$slider);
        $this->view->setVar("carrer",$category);
        $this->view->setVar("news",$newLast);
        $this->view->setVar("teacher",$teacher);
    }
    public function aboutAction()
    {
        $this->header("acerca");
        $title = "Acerca de Nosotros | UDEN";
        $url ="/acerca-de-uden";
        $image = "series.jpg";
        $description = "Acerca de la Universidad en villahermosa UMAEE.";
        $class = "header-4 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
        $teacher = CdUser::find("rol='ADMIN' and status='ACTIVE'");
        $this->view->setVar("teacher",$teacher);
    }
}