<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR);
ini_set('display_errors',true);
//error_reporting(0);
error_reporting(E_ALL);

$di = new \Phalcon\DI\FactoryDefault();

$di->set('url', function(){
    $url = new \Phalcon\Mvc\Url();
    $url->setBaseUri("http://".$_SERVER["SERVER_NAME"]."/");
    /*$url->setBaseUri("http://www.deportesenred.com.mx/");*/
    return $url;
});

$di->set('router', function(){

    $router = new \Phalcon\Mvc\Router();

    $router->setDefaultModule("frontend");

    $router->add("/", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'index',
    ));
    $router->notFound(array(
        'module' => 'frontend',
        'controller' => 'index',
        'action' => 'show404'
    ));
    $router->add("/notas", array(
        'controller' => 'post',
        'action' => 'notes'
    ));
    /*$router->add('/([a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'category' => 1,
        'controller'=>'post',
        'action'=>'section'
    ))->setName("controllers")->convert('action', function($action) {
            return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });
    $router->add('/([a-zA-Z\-]+)/([a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'category' => 1,
        'type' => 2,
        'controller'=>'post',
        'action'=>'gallery'
    ))->setName("controllers")->convert('action', function($action) {
            return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });*/
    /*$router->add('/([a-zA-Z\-]+)/([a-zA-Z\-]+)/([0-9-a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'category' => 1,
        'subcategory' => 2,
        'permalink'=>3,
        'controller'=>'post',
        'action'=>'notes'
    ))->setName("controllers")->convert('action', function($action) {
        return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });
    $router->add('/([a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'category' => 1,
        'controller'=>'post',
        'action'=>'section'
    ))->setName("controllers")->convert('action', function($action) {
        return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });
    $router->add('/([a-zA-Z\-]+)/([a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'category' => 1,
        'scategory' => 2,
        'controller'=>'post',
        'action'=>'subsection'
    ))->setName("controllers")->convert('action', function($action) {
        return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });*/



    $router->add("/contactanos", array(
        'controller' => 'index',
        'action' => 'contact',
    ));
    $router->add("/buscar", array(
        'controller' => 'post',
        'action' => 'buscar',
    ))->setName("controllers")->convert('action', function($action) {
        return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });;
    $router->add("/post/infinity", array(
        'module'=>'frontend',
        'controller' => 'post',
        'action' => 'infinity',
    ));
    $router->add("/post/infinity-search", array(
        'module'=>'frontend',
        'controller' => 'post',
        'action' => 'infinitysearch',
    ))->setName("controllers")->convert('action', function($action) {
        return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });
    $router->add('/foto-nota/([a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'permalink' => 1,
        'controller'=>'post',
        'action'=>'gallery'
    ))->setName("controllers")->convert('action', function($action) {
        return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });
    $router->add("/acerca-de-pc-integra", array(
        'controller' => 'index',
        'action' => 'about',
    ));
    $router->add("/acerca-de-uden", array(
        'controller' => 'uden',
        'action' => 'about',
    ));
    $router->add('/registro/([0-9-a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'carrer' => 1,
        'controller' => 'registro',
        'action' => 'index',
    ));
    $router->add('/registro/savestudent', array(
        'module'=>'frontend',
        'controller' => 'registro',
        'action' => 'savestudent',
    ));
    $router->add("/contactanos", array(
        'controller' => 'index',
        'action' => 'contact',
    ));
    $router->add('/oferta-educativa/([0-9-a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'permalink' => 1,
        'controller' => 'carrer',
        'action' => 'carrer',
    ));
    $router->add("/oferta-educativa", array(
        'controller' => 'carrer',
        'action' => 'index',
    ));
    $router->add("/casos-de-exito", array(
        'controller' => 'blog',
        'action' => 'index',
    ));
    $router->add('/casos-de-exito/([0-9-a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'permalink' => 1,
        'controller' => 'blog',
        'action' => 'blog',
    ));
    $router->add('/mendez', array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'mendez',
    ));
    $router->add('/cedros', array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'cedros',
    ));
    $router->add('/oferta-educativa/umaee/([0-9-a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'category' => 1,
        'controller'=>'carrer',
        'action'=>'index',
    ));
    $router->add('/aviso-de-privacidad', array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'privacidad',
    ));


    /* Dashboard */
    $router->add("/dashboard", array(
        'module'=>'dashboard',
        'controller' => 'index',
        'action' => 'index',
    ));
    $router->add("/login", array(
        'module'=>'dashboard',
        'controller' => 'login',
        'action' => 'index',
    ));
    $router->add("/logout",array(
        'module'=>'dashboard',
        'controller' => 'login',
        'action' => 'logout',
    ));
    $router->add('/dashboard/([a-zA-Z\-]+)/([a-zA-Z\-]+)', array(
        'module'=>'dashboard',
        'controller' => 1,
        'action' => 2,
    ))->setName("controllers")->convert('action', function($action) {
            return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
        });
    $router->add('/dashboard/([a-zA-Z\-]+)/([a-zA-Z\-]+)/?([0-9a-zA-ZñÑ\-]*)?', array(
        'module'=>'dashboard',
        'controller' => 1,
        'action' => 2,
        'uid' => 3,
    ))->setName("controllers")->convert('action', function($action) {
            return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
        });
    $router->add("/dashboard/notes",array(
        'module'=>'dashboard',
        'controller' => 'notes',
        'action' => 'index',
    ));
    $router->add("/dashboard/users",array(
        'module'=>'dashboard',
        'controller' => 'user',
        'action' => 'index',
    ));
    $router->add("/dashboard/user/edit/profile",array(
        'module'=>'dashboard',
        'controller' => 'user',
        'action' => 'profile',
    ));
    $router->add("/dashboard/sections",array(
        'module'=>'dashboard',
        'controller' => 'sections',
        'action' => 'index',
    ));
    $router->add("/dashboard/category",array(
        'module'=>'dashboard',
        'controller' => 'category',
        'action' => 'index',
    ));
    $router->add("/dashboard/opinion",array(
        'module'=>'dashboard',
        'controller' => 'opinion',
        'action' => 'index',
    ));
    $router->add("/dashboard/users",array(
        'module'=>'dashboard',
        'controller' => 'user',
        'action' => 'index',
    ));
    $router->add("/dashboard/photo",array(
        'module'=>'dashboard',
        'controller' => 'photo',
        'action' => 'index',
    ));
    $router->add("/dashboard/advertising",array(
        'module'=>'dashboard',
        'controller' => 'advertising',
        'action' => 'index',
    ));
    $router->add("/dashboard/slider",array(
        'module'=>'dashboard',
        'controller' => 'index',
        'action' => 'slider',
    ));
    $router->removeExtraSlashes(true);
    return $router;
});

$di->set('dispatcher', function() use ($di){
    $dispatcher = new \Phalcon\Mvc\Dispatcher();
    $eventsManager = $di->getShared('eventsManager');
    $security = new Security($di);

    $eventsManager->attach('dispatch', $security);
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});

$di->set('session', function () {
    $session = new Phalcon\Session\Adapter\Files();
    $session->start();

    return $session;
});
$application = new \Phalcon\Mvc\Application();

$application->setDI($di);

$application->registerModules(array(
            'frontend' => array(
                'className' => 'Modules\Frontend\Module',
                'path' =>'../apps/modules/frontend/Module.php'
            ),
            'dashboard' => array(
                'className' => 'Modules\Dashboard\Module',
                'path' =>'../apps/modules/dashboard/Module.php'
            )
        ));
echo $application->handle()->getContent();