<?php
namespace Modules\Frontend\Controllers;

use Modules\Models\CdPhotoNote;
use Modules\Models\CdPost;
use Modules\Models\Galleryphotonote;
use Modules\Models\Vnote;
use Modules\Models\Vsectionnotes;
use Phalcon\Http\Request;

class PostController extends ControllerBase
{
    public function notesAction(){
        $permalink = $this->dispatcher->getParam("permalink");
        $category =  $this->dispatcher->getParam("category");
        $scategory = $this->dispatcher->getParam("subcategory");
        $note = new Vnote();
        $find = $note->findFirst("permalink='$permalink' and status='PUBLIC'");
        if($find){
            @$post = new CdPost();
            @$visits = $post->findFirst($find->getPid());
            @$countVisits = $visits->getVisits();
            @$visits->setVisits($countVisits+1)->update();

            $title = $find->getTitle();
            $url = "$category"."/$scategory"."/$permalink";
            $image = "".$find->getImage()."";
            $description = "".$find->getSummary()."";
            $this->attributesPost("$category","$description","$url");
            $this->view->setVar("note",$find);
            $this->view->setVar("category",$this->category($category));
            $this->view->setVar("permalink_category",$category);
            $this->view->setVar("date",$this->dateSpanish());
            $this->view->setVar("categoryUrl",$this->dateSpanish());
            $this->view->setVar("advertising",json_decode($this->advertisingJson,true));
        }else{

        }
    }
    public function sectionAction(){
        $this->assets();
        $category = $this->category($this->dispatcher->getParam("category"));
        $categoryUrl = mb_strtolower(str_replace(' ', '-',str_replace('-','',$this->dispatcher->getParam("category"))), 'UTF-8');
        $title = ucfirst($category)." | LA RED";
        $url = ''.$this->dispatcher->getParam("category").'';
        $image = "";
        $description = ucfirst($category)." de LA RED";
        $this->attributesPost(''.$this->dispatcher->getParam("category").'',"LA RED información de deportes.","$url");
        $slider = new Vsectionnotes();
        $findSlider = $slider->find("name_category='$category' and gallery=1 order by order_slider asc, gallery desc");
        $findNews = $slider->find("name_category='$category' and (gallery!=1 or gallery is null) order by date_public desc,important desc limit 8");
        if(count($findNews)>=1){
            $this->view->setVar("slider",$findSlider);
            $this->view->setVar("findNews",$findNews);
            $this->view->setVar("category",ucfirst($this->dispatcher->getParam("category")));
            $this->view->setVar("permalink_category",$category);
            $this->view->setVar("date",$this->dateSpanish());
            $this->view->setVar("categoryUrl",$categoryUrl);
            $this->view->setVar("advertising",json_decode($this->advertisingJson,true));
        }
        else{
            return $this->response->redirect("");
        }
    }
    public function buscarAction(){
        $request = new Request();
        $val = $request->get("palabra");
        $title = ucfirst($val)." | LA RED";
        $url = 'palabra='.$val.'';
        $image = "";
        $description = ucfirst($val)." de LA RED";
        $this->attributesPost('index',"LA RED información de deportes.","$url");
        $notes = new Vsectionnotes();
        $Allnotes = $notes->find("status='PUBLIC' and (title like '%$val%' or summary like '%$val%') order by date_public desc limit 8");
        if(count($Allnotes)>=1){
            $this->assets();
            $this->view->setVar("notes",$Allnotes);
            $this->view->setVar("date",$this->dateSpanish());
            $this->view->setVar("advertising",json_decode($this->advertisingJson,true));
            $this->view->setVar("status",1);
            $this->view->setVar("word",$val);
        }
        else{
            $this->view->setVar("status",2);
            $this->view->setVar("advertising",json_decode($this->advertisingJson,true));
            $this->view->setVar("word",$val);
        }
    }
    public function infinityAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        $page = $this->request->get("page");
        $category = $this->request->get("category");
        $categoryUrl = mb_strtolower(str_replace(' ', '-',str_replace('-','',$this->dispatcher->getParam("category"))), 'UTF-8');
        $limit = 8;
        $limite1 = ($page-1)*$limit;
        $limite2=$limit;
        $slider = new Vsectionnotes();
        $find = $this->category($category);
        $findNews = $slider->find("name_category='$find' and (gallery!=1 or gallery is null) order by date_public desc,important desc limit $limite1,$limite2");
        $this->view->setVar("findNews",$findNews);
        $this->view->setVar("category",ucfirst($category));
        $this->view->setVar("date",$this->dateSpanish());
        $this->view->setVar("categoryUrl",$categoryUrl);
    }
    public function infinitySearchAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        $page = $this->request->get("page");
        $category = $this->request->get("category");
        $limit = 8;
        $limite1 = ($page-1)*$limit;
        $limite2=$limit;
        $slider = new Vsectionnotes();
        $findNews = $slider->find("status='PUBLIC' and (title like '%$category%' or summary like '%$category%') order by date_public desc limit $limite1,$limite2");
        $this->view->setVar("findNews",$findNews);
        $this->view->setVar("date",$this->dateSpanish());
    }
    public function allNotesAction(){
        $title = "Deportes al rojo vivo | LA RED";
        $url = 'todas-las-notas';
        $image = "";
        $description = "Entérate de todo lo acontecido en el mundo deportivo LA RED ";

        $this->attributesPost('I'.'Mundo deportivo',"LA RED información de deportes.","$url");
        $notes = new Vsectionnotes();
        $Allnotes = $notes->find("status='PUBLIC' order by date_public desc limit 11");
        if(count($Allnotes)>=1){
            $this->view->setVar("notes",$Allnotes);
            $this->view->setVar("date",$this->dateSpanish());
            $this->view->setVar("advertising",json_decode($this->advertisingJson,true));
        }
        else{
            return $this->response->redirect("");
        }
    }
    public function galleryAction(){
        $permalink = $this->dispatcher->getParam("permalink");
        $find = CdPhotoNote::findFirst("permalink='$permalink'");
        $pnid = $find->getPnid();
        $gallery = Galleryphotonote::find("pnid=$pnid");
        $this->assets->collection('cssGallery')->addCss("front/css/prettyPhoto.css");
        $this->assets->collection('jsGallery')->addJs("front/js/jquery.prettyPhoto.js")->addJs("front/js/jquery.imagesloaded.min.js");
        $this->view->setVar("photonote",$find);
        $this->view->setVar("gallery",$gallery);
    }
    public function subSectionAction(){
        $category = $this->dispatcher->getParam("category");
        return $this->response->redirect("$category");
    }
    public function attributesPost($header,$description_twitter,$url){
        $this->header("$header");
        $canonical = $this->url->getBaseUri();
        $this->view->setVar("twitter", $description_twitter);
        $this->view->setVar("canonical","$canonical$url");
    }
    private function category($val){
        $sub = explode("-",$val);
        if(count($sub) >= 2){
            $result = "";
            for($i = 0;$i<count($sub);$i++){
                if($i==0){
                    $result = $sub[$i];
                }else{
                    $result = $result." ".$sub[$i];
                }
            }
            return ucfirst($result);
        }
        return $val;
    }
    private function assets(){
        $this->assets->collection('scroll')
            ->setTargetPath("front/js/scroll.min.js")
            ->setTargetUri("front/js/scroll.min.js")
            ->addJs("front/js/jquery.infinitescroll.min.js")
            ->addJs("front/js/jquery.imagesloaded.min.js")
            ->addJs("front/js/customScroll.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
}