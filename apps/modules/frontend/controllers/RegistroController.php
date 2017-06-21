<?php
namespace Modules\Frontend\Controllers;
use Modules\Models\CdCareers;
use Modules\Models\CdDirectionStudent;
use Modules\Models\CdStudent;
use Phalcon\Http\Request;

class RegistroController extends ControllerBase
{
    public function indexAction()
    {
        $title = "La Red |  Mundo deportivo";
        $url ="";
        $image = "series.jpg";
        $description = "Información completa de todo tipo de deportes incluyendo Fútbol Mexicano, Fútbol Argentino, Fútbol Italiano, Fútbol de España, Fútbol de MLS, Fútbol de Estados Unidos, Fútbol Inglaterra, Fútbol de Alemania, Fútbol de Francia, Baloncesto Profesional, NBA, Básquetbol, Béisbol, Pelota, Fútbol Americano, NFL, Rugby, Tenis, Boxeo, Golf y Juegos de Fantasía.";
        $class = "header-4 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
        $carrerselect =$this->dispatcher->getParam("carrer");
        $carrer = new CdCareers();
        $this->scripts();
        $allCarrer = $carrer->find("status='ACTIVO' and type='UMAEE'");
        if($allCarrer){
            $this->view->setVar("carrer",$allCarrer);
            $this->view->setVar("carrerselect",$carrerselect);
        }
    }
    public function saveStudentAction(){
        $request = new Request();
        if($request->isPost() && $request->isAjax()){
            $client = new CdStudent();
            $direction = new CdDirectionStudent();
            $values = $request->getPost();
            $dateP = $request->getPost("date");
            $newDate = explode("/",$dateP);
            $newDate = $newDate["2"]."-".$newDate["1"]."-".$newDate["0"];
            $client->setName($values["name"])
                ->setLastname($values["lastname"])
                ->setAge($values["age"])
                ->setSex($values["sex"])
                ->setDatebirth($newDate)
                /*->setStreet($values["street"])
                ->setColony($values["colony"])
                ->setCity($values["city"])
                ->setMunicipality($values["municipality"])
                ->setCp($values["cp"])*/
                ->setEmail($values["email"])
                ->setPhone($values["phone"])
                ->setStatus("PREINSCRIPCION")
                ->setCrid($values["crid"])
                ->setDatePre(date('Y-m-d H:i:s'));
            $direction->setStreet($values["street"])
                ->setColony($values["colony"])
                ->setCity($values["city"])
                ->setMunicipality($values["municipality"])
                ->setCp($values["cp"]);
            if($client->save()){
                $this->response(array("code"=>200,"message"=>"data-saved"),200);
            }else{
                foreach ($client->getMessages() as $message) {
                    $this->flash->error((string) $message);}
                $this->response(array("message"=>"Error, try again","code"=>"404"),200);
            }
        }else{
            $this->response(array("message"=>"error"),404);
        }
    }
    private function scripts(){
        $this->assets->collection('jsPlugins')
            ->setTargetPath("dash/js/general.pre.min.js")
            ->setTargetUri("dash/js/general.pre.min.js")
            ->addJs("dash/js/preregistro/preregistro.js")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
}