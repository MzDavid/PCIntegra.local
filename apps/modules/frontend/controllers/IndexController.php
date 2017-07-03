<?php
namespace Modules\Frontend\Controllers;

require dirname(dirname(dirname(__DIR__)))."/library/PHPMailer/PHPMailerAutoload.php";
use Modules\Models\CdCareers;
use Modules\Models\CdOpinion;
use Modules\Models\CdPost;
use Modules\Models\CdSlider;
use Modules\Models\CdUser;
use Modules\Models\CdVideo;
use Phalcon\Http\Request;


class IndexController extends ControllerBase
{

    public function indexAction()
    {   $this->header("index");
        $title = "UMAEE | Universidad en villahermosa";
        $url = "";
        $image = "series.jpg";
        $description = "Inscripciones en linea de universidades en villahermosa tabasco, licenciatura en publicidad, licenciatura en mercadotecnia y negocios digitales.";
        $class = "header-1";
        $this->metaHome($title,$url,$image,$description,$class);
        $category = CdCareers::find("status='ACTIVO' and category='LICENCIATURA'");
        $slider = CdSlider::find("status='ACTIVO' order by order_slider asc");
        $teacher = CdUser::find("rol='ADMIN' and status='ACTIVE'");
        $opinion = CdOpinion::find([
            "order" => "rand()",
            "limit" => 2,
            "status" => "ACTIVE",
        ]);
        $videos = CdVideo::find("status = 'ACTIVE'");

        $newLast = CdPost::find(
            [
                "order" => "date_public DESC",
                "limit" => 4,
            ]);
        $this->view->setVar("videos",$videos);
        $this->view->setVar("sliders",$slider);
        $this->view->setVar("carrer",$category);
        $this->view->setVar("opinion",$opinion);
        $this->view->setVar("news",$newLast);
        $this->view->setVar("teacher",$teacher);

    }
    public function attributesPost($header,$description_twitter,$url){
        $this->header("$header");
        $canonical = $this->url->getBaseUri();
        $this->view->setVar("twitter", $description_twitter);
        $this->view->setVar("canonical","$canonical$url");
    }
    public function cedrosAction(){
        $this->header("cedros");
        $title = "Contactanos | UMAEE";
        $url ="/cotactanos";
        $image = "series.jpg";
        $description = "Contacta a la Universidad en villahermosa UMAEE.";
        $class = "header-4 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
    }
    public function mendezAction(){
        $this->header("mendez");
        $title = "Contactanos | UMAEE";
        $url ="/cotactanos";
        $image = "series.jpg";
        $description = "Contacta a la Universidad en villahermosa UMAEE.";
        $class = "header-4 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
    }
    public function sendMessageContactAction()
    {
        $request = $this->request;
        if($request->isAjax() && $request->isPost()){
            $email = $request->getPost('contactEmail');
            $name  = $request->getPost('contactName');
            $phone = $request->getPost('contactSubject');
            $msg = $request->getPost('contactMessage');
            if($this->SendEmail($email)&& $this->SendEmailAccount($email,$name,$msg,$phone)){
                $this->response(array("code"=>200,"message"=>"data-saved"),200);
            }else{
                $this->response(array("code"=>404,"message"=>"No se ha podido enviar"),200);
            }
        }else{
            $this->response(array("code"=>404,"message"=>"data-error"),200);
        }
    }
    public function SendEmail($account){
        $email = new \PHPMailer();
        $email->isSMTP();
        $email->CharSet = 'UTF-8';
//        $email->Timeout       =   120;
        //$email->SMTPDebug = 2;
        //$email->Debugoutput = 'html';

        $email->Host = "smtp.gmail.com";
        $email->Port=587;
        $email->SMTPSecure="tls";
        $email->SMTPAuth =true;
        $email->Username = "chontaldevelopers@gmail.com";
        $email->Password = "gustavo290387";

        $email->setFrom("gustavo.alberto@c-developers.com","PCIntegra");
        $email->addReplyTo("gustavo.alberto@c-developers.com","PCIntegra");
        $email->addAddress("$account");
        $email->isHTML(true);

        $email->Subject = "PCIntegra";
        $file = dirname(__DIR__)."/views/email/index.html";
        $email->msgHTML(file_get_contents($file));
        $email->AltBody = "Gracias por contactarnos en breve nos comunicaremos con usted. Les agradece PCIntegra.";
        if(!$email->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $email->ErrorInfo;
        } else {
            return true;
        }
    }
    public function SendEmailAccount($account,$name,$message,$phone){
        $email = new \PHPMailer();
        $email->isSMTP();
        $email->CharSet = 'UTF-8';
        //$email->SMTPDebug = 2;
        //$email->Debugoutput = 'html';

        $email->Host = "smtp.gmail.com";
        $email->Port=587;
        $email->SMTPSecure="tls";
        $email->SMTPAuth =true;
        $email->Username = "chontaldevelopers@gmail.com";
        $email->Password = "gustavo290387";

        $email->setFrom("$account","PCIntegra");
        $email->addReplyTo("gustavo.alberto@c-developers.com","PCIntegra");
        $email->addAddress("gustavo.alberto@c-developers.com");

        $email->WordWrap =100;
        $email->isHTML(true);

        $email->Subject = "Contacto pagina web de PCIntegra";
        $html = "<!DOCTYPE html><html><head><meta charset='utf-8'><title>PCIntegra</title></head><body><style type='text/css'>p,strong {font-family: sans-serif;font-size: 14px;}</style><p><strong>Nombre : </strong> $name</p><p><strong>Email : </strong> $account</p><p><strong>Teléfono : </strong> $phone</p><p><strong>Mensaje : </strong> $message</p></body></html>";
        
        $email->msgHTML($html);
        $email->AltBody = "Mensaje de Formulario";

        if(!$email->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $email->ErrorInfo;
        } else {
            return true;
        }
    }
    public function postAction()
    {
        
    }
    public function contactAction()
    {
        $this->header("contactanos");
        $title = "Contactanos | UMAEE";
        $url ="/cotactanos";
        $image = "series.jpg";
        $description = "Contacta a la Universidad en villahermosa UMAEE.";
        $class = "header-4 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
    }
    public function aboutAction()
    {
        $this->header("acerca");
        $title = "Acerca de Nosotros | UMAEE";
        $url ="/mision-y-vision";
        $image = "series.jpg";
        $description = "Acerca de la Universidad en villahermosa UMAEE.";
        $class = "header-4 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
        $teacher = CdUser::find("rol='ADMIN' and status='ACTIVE'");
        $this->view->setVar("teacher",$teacher);

    }
    public function historyAction()
    {
        $this->header("acerca");
        $title = "Acerca de Nosotros | UMAEE";
        $url ="/historia";
        $image = "series.jpg";
        $description = "Acerca de la Universidad en villahermosa UMAEE.";
        $class = "header-4 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
    }
    public function privacidadAction()
    {
        $this->header("Aviso de Privacidad");
        $title = "Acerca de Nosotros | UMAEE";
        $url ="/aviso-de-privacidad";
        $image = "series.jpg";
        $description = "Acerca de la Universidad en villahermosa UMAEE.";
        $class = "header-4 header-2";
        $this->metaHome($title,$url,$image,$description,$class);
    }
    private function video(){
        $json = dirname(dirname(dirname(dirname(__DIR__))))."/public/json/videos.json";
        $get_file = file_get_contents($json);
        if(!file_exists($json) || empty($get_file)){
            $file = fopen($json,"wb");
            $content[] = "https://www.youtube.com/watch?v=zpOULjyy-n8";
            $content[] = "https://www.youtube.com/watch?v=zpOULjyy-n8";
            $advertising_json = json_encode($content);
            fwrite($file,$advertising_json);
            fclose($file);
            return $advertising_json;
        }else{
            return $get_file;
        }
    }
    private function scripts(){
        $this->assets->collection('jsPlugins')
            ->setTargetPath("dash/js/general.index.min.js")
            ->setTargetUri("dash/js/general.index.min.js")
            ->addJs("https://maps.googleapis.com/maps/api/js?key=AIzaSyB_Ao6COQS-_kTIWwk6zNwPgtDcPp29yPk")
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
}