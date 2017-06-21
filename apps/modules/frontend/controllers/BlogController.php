<?php
namespace Modules\Frontend\Controllers;
use Modules\Models\CdCareers;
use Modules\Models\CdCarrer;
use Modules\Models\CdPost;
use Modules\Models\CdSubcategory;
use Modules\Models\CdUser;
use Phalcon\Http\Request;


class BlogController extends ControllerBase
{
    public function indexAction()
    {
        $title = "La Red |  Mundo deportivo";
        $url ="";
        $image = "series.jpg";
        $description = "Información completa de todo tipo de deportes incluyendo Fútbol Mexicano, Fútbol Argentino, Fútbol Italiano, Fútbol de España, Fútbol de MLS, Fútbol de Estados Unidos, Fútbol Inglaterra, Fútbol de Alemania, Fútbol de Francia, Baloncesto Profesional, NBA, Básquetbol, Béisbol, Pelota, Fútbol Americano, NFL, Rugby, Tenis, Boxeo, Golf y Juegos de Fantasía.";
        $class = "header-14 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
        $news = new CdPost();
        $this->view->setVar("post",$news->find("status='PUBLIC'"));
    }
    public function blogAction()
    {

        $permalink =$this->dispatcher->getParam("permalink");
        $carrer = CdCareers::find("type='UMAEE'");
        $new2 = CdPost::findFirst("permalink='$permalink' and status='PUBLIC'");
        $newLast = CdPost::find(
            [
                "order" => "date_public DESC",
                "limit" => 4,
            ]);
        $category = CdSubcategory::findFirst("scid='"+$new2->getScid()+"'");
        $title = $new2->getTitle();
        $url =$new2->getPermalink();
        $image = $new2->getImage();
        $description =   $new2->getSummary();
        $class = "header-14 header-2";
        $this->metaHome($title,$url,$image,$description,$class);


        $user = CdUser::findFirst("uid="+$new2->getUid());
        $this->view->setVar("postall",$newLast);
        $this->view->setVar("carrer",$carrer);
        $this->view->setVar("date",$this->dateSpanish());
        $this->view->setVar("post",$new2);
        $this->view->setVar("category",$category);
        $this->view->setVar("user",$user);
    }
}