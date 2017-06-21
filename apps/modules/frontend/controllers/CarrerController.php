<?php
namespace Modules\Frontend\Controllers;
use Modules\Models\CdCareers;
use Modules\Models\CdCarrer;
use Phalcon\Http\Request;


class CarrerController extends ControllerBase
{
    public function indexAction()
    {
        $title = "Carreras de UMAEE | Tu mejor Opción";
        $url ="/oferta-educativa";
        $image = "series.jpg";
        $description = "Información completa de todo tipo de deportes incluyendo Fútbol Mexicano, Fútbol Argentino, Fútbol Italiano, Fútbol de España, Fútbol de MLS, Fútbol de Estados Unidos, Fútbol Inglaterra, Fútbol de Alemania, Fútbol de Francia, Baloncesto Profesional, NBA, Básquetbol, Béisbol, Pelota, Fútbol Americano, NFL, Rugby, Tenis, Boxeo, Golf y Juegos de Fantasía.";
        $class = "header-4 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
        $category = $this->dispatcher->getParam("category");
        $cate = strtoupper($category);
        $find = CdCareers::find("category='$cate'");
        $this->view->setVar("oferta",$find);
    }
    public function carrerAction()
    {
        $title = "Carreras de UMAEE | Tu mejor Opción";
        $url ="/oferta-educativa";
        $image = "series.jpg";
        $description = "Información completa de todo tipo de deportes incluyendo Fútbol Mexicano, Fútbol Argentino, Fútbol Italiano, Fútbol de España, Fútbol de MLS, Fútbol de Estados Unidos, Fútbol Inglaterra, Fútbol de Alemania, Fútbol de Francia, Baloncesto Profesional, NBA, Básquetbol, Béisbol, Pelota, Fútbol Americano, NFL, Rugby, Tenis, Boxeo, Golf y Juegos de Fantasía.";
        $class = "header-4 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
        $permalink = $this->dispatcher->getParam("permalink");
        $find = new CdCareers();
        $this->view->setVar("carrer",$find->findFirst("permalink='$permalink'"));
    }
}