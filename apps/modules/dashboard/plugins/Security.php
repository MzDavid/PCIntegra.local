<?php
namespace Modules\Dashboard\Plugins;
use \Phalcon\Events\Event,
    \Phalcon\Mvc\User\Plugin,
    \Phalcon\Mvc\Dispatcher,
    \Phalcon\Acl;

/**
 * Security
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */

class Security extends Plugin {
    public function __construct($dependencyInjector){
        $this->_dependencyInjector = $dependencyInjector;
    }
    public function getAcl(){

        if(!isset($this->persistent->acl)){
            $acl = new \Phalcon\Acl\Adapter\Memory();
            $acl->setDefaultAction(Acl::DENY);

            $roles = array(
                "GUEST" => new Acl\Role("GUEST"),
                "USER" => new Acl\Role("USER"),
                "EDITOR"=> new Acl\Role("EDITOR"),
                "ADMIN" => new Acl\Role("ADMIN")
            );
            foreach($roles as $key => $role){
                switch($key){
                    case "GUEST" : $acl->addRole($role);
                        break;
                    case "USER" : $acl->addRole($role,$roles['GUEST']);
                        break;
                    case "EDITOR" : $acl->addRole($role,$roles['USER']);
                        break;
                    case "ADMIN" : $acl->addRole($role,$roles['EDITOR']);
                        break;
                }
            }
            //Resources of admin (cms)
            $adminResources = array(
                "config"=>array('index',"saveorder"),
                "careers"=>array('index',"save","edit","update","new","validateurl","deletedfile","uploadfile"),
                "video"=>array('index',"edit","new"),
                "advertising"=>array("index","uploadfile","save","video"),
                "user"=>array("deleteuser","newuser","index","saveuser","edit"),
                "student"=>array("new","index","save","edit"),
                "category"=>array("index","new","edit","delete","validatecategory","subcategory","validatesubcategory","newsubcategory","editsubcategory","deletesubcategory"),
                "opinion"=>array("index","new","edit","validatecategory","uploadimageopinion"),
            );
            foreach($adminResources as $resource => $actions){
                $acl->addResource(new \Phalcon\Acl\Resource($resource),$actions);
            };
            $editorResources = array(
                "index"=>array("index","slider","uploadfile","deleteslider","saveslider"),
                "notes"=>array("index","newnote","deletenote","savenote","editnote","validateurl","uploadimagenote","uploadmultipleimages","savenote","updatenote","category","draft","visits"),
                "photo"=>array("index","new","edit","delete","save","validateurl","uploadimage","savemultipleimages","savedescription","orderimage","deleteimage","draft"),
                "sections"=>array("index","home","feedpost","updatesection","orderpostsections"),
            );
            foreach($editorResources as $resource => $actions){
                $acl->addResource(new \Phalcon\Acl\Resource($resource),$actions);
            };
            $userResources = array(
                "index"=>array("index"),
                "user"=>array('index',"profile","updateuser","updatepassword","updateuserimage","uploadimage","socialmedia","validateemail","validateusername","editnote"),
            );
            foreach($userResources as $resource => $actions){
                $acl->addResource(new \Phalcon\Acl\Resource($resource),$actions);
            };
            $publicResources = array(
                "login"=>array('index',"logout","session"),
            );
            foreach($publicResources as $resource => $actions){
                $acl->addResource(new \Phalcon\Acl\Resource($resource),$actions);
            }
            foreach($publicResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow("GUEST",$resource,$action);
                }
            };
            foreach($userResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow("USER",$resource,$action);
                    $acl->allow("EDITOR",$resource,$action);
                    $acl->allow("ADMIN",$resource,$action);
                    $acl->deny("USER","login","index");
                }
            };
            foreach($editorResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow("EDITOR",$resource,$action);
                    $acl->allow("ADMIN",$resource,$action);
                    $acl->deny("EDITOR","login","index");
                }
            };
            //Grant acess to adminResources area to role ADMIN
            foreach($adminResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow("ADMIN",$resource,$action);
                }
            };
            //The acl is stored in session, APC would be useful here too
            $this->persistent->acl = $acl;
        }
        return $this->persistent->acl;
    }

    /**
     * This action is executed before execute any action in the application
     */
    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        $auth = $this->session->get('auth');
        switch($auth["rol"]){
            case "ADMIN" : $role = 'ADMIN';
                break;
            case "USER" : $role = 'USER';
                break;
            case "EDITOR" : $role = 'EDITOR';
                break;
            default : $role = 'GUEST';
            break;
        }
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();
        $acl = $this->getAcl();
        $allowed = $acl->isAllowed($role, $controller, $action);
        if ($allowed != Acl::ALLOW) {
            $this->flash->error("You don't have access to this module");
            if($role==="GUEST"){
                $this->response->redirect("login");
            }
            else{
                $this->response->redirect("dashboard");
            }
            return false;
        }

    }
}
