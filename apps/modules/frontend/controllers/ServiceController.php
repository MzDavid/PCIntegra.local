<?php
namespace Modules\Frontend\Controllers;
use Modules\Models\CdCareers;
use Phalcon\Http\Request;


class ServiceController extends ControllerBase
{
    public function indexAction()
    {
        $find = CdCareers::find("status='ACTIVO'");
        $this->view->setVar("oferta",$find);
        $title = $find->name;
        $url =$find->permalink;
        $image = "series.jpg";
        $description = $find->information;
        $this->metaHome($title,$url,$image,$description);

    }
}