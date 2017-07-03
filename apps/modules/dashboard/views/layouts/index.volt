<!DOCTYPE html>
<html lang="es-MX">
<head>
    <?php $auth = $this->session->get("auth");?>
    <title>CMS UMAEE | Dashboard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Administrador Deportes" />
    <meta name="keywords" content="Deportes" />
    <meta name="robots" content="nofollow">
    <meta name="googlebot" content="nofollow">
    <meta name="google" content="notranslate" />
    <meta name="author" content="Chontal Developers" />
    <meta name="copyright" content="2014 c-develpers.com Todos los derechos reservados." />
    <meta name="application-name" content="CMS Retos" />
    <link rel="author" href="https://plus.google.com/u/0/101316577346995540804/posts"/>
    <link rel="canonical" href="http://www.retos.co/dashboard" />
    <meta property="og:title" content="Retos | Dashboard"/>
    <meta property="og:type" content="web"/>
    <meta property="og:url" content="http://www.retos.co"/>
    <meta property="og:image" content="{{url('front/img/images/logoNew-floated.png')}}">
    <meta property="og:site_name" content="http://c-developers.com/"/>
    <meta property="og:description" content="C-Developers crea Paginas web en Villahermosa Tabasco, desarrollo web en el Sureste de México y toda la republica mexicana ademas Marketing y SEO"/>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="C-Developers | Dashboard "/>
    <meta name="twitter:description" content="C-Developers crea Paginas web en Villahermosa Tabasco, desarrollo web en el Sureste de México y toda la republica mexicana ademas Marketing y SEO" />
    <meta name="twitter:image" content="{{url('front/img/images/logoNew-floated.png')}}" />
    {% block head %}
        {{ assets.outputCss('CssIndex') }}
    {% endblock %}
    <link rel="stylesheet" href="{{url('dash/css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" id="theme" href="/dash/css/theme-default.css"/>
    <link rel="stylesheet" type="text/css" id="theme" href="/dash/css/fontawesome/font-awesome.min.css"/>
</head>
<body>
<script>
    (function(w,d,s,g,js,fs){
        g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
        js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
        js.src='https://apis.google.com/js/platform.js';
        fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
    }(window,document,'script'));
</script>
<div class="page-loading-frame">
    <div class="page-loading-loader">
        <img src="{{url('dash/img/loaders/page-loader.gif')}}"/>
    </div>
</div>
    <div class="page-container">
        <div class="page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide page-sidebar-fixed scroll">
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="{{url('dashboard')}}">La Red</a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="{{url('dashboard/user/profile')}}" class="profile-mini">
                        <img src="/dash/assets/images/users/thumbnail/{{auth['photo']}}" alt="Alexander"/>
                    </a>
                    <div class="profile">
                        <div class="profile-image">
                            <img src="/dash/assets/images/users/thumbnail/{{auth['photo']}}" alt="Alexander"/>
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name">{{auth['username']}}</div>
                            <div class="profile-data-title">{{auth['cargo']}}</div>
                        </div>
                        <div class="profile-controls">
                            <a href="{{url('dashboard/user/profile')}}" class="profile-control-left" title="Editar perfil"><span class="fa fa-info"></span></a>
                            <a href="{{url('dashboard')}}" class="profile-control-right" title="Mensajes de post"><span class="fa fa-envelope"></span></a>
                        </div>
                    </div>
                </li>
                <li class="xn-title">Navegación</li>
                <li class="<?php echo $this->router->getControllerName()=='index'?"active":""?>">
                    <a href="{{url('dashboard')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Menú principal</span></a>
                </li>
                <li class="xn-openable <?php echo $this->router->getControllerName()=='notes'?"active":""?>">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Casos de Éxito</span></a>
                    <ul>
                        <li class="<?php echo $this->router->getActionName()=='newnote'?"active":""?>"><a href="{{url('dashboard/notes/new-note')}}"><span class="fa fa-pencil"></span> Nuevo caso de éxito</a></li>
                        <li class="<?php echo $this->router->getActionName()=='index'?"active":""?>"><a href="{{url('dashboard/notes')}}"><span class="fa fa-file"></span> Todas los casos de éxito</a></li>
                        <li class="<?php echo $this->router->getActionName()=='draft'?"active":""?>"><a href="{{url('dashboard/notes/draft')}}"><span class="fa fa-file-text-o"></span> Borradores</a></li>
                    </ul>
                </li>

                <li class="xn-openable <?php echo $this->router->getControllerName()=='careers'?"active":""?>">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Servicios</span></a>
                    <ul>
                        <li class="<?php echo $this->router->getActionName()=='new'?"active":""?>"><a href="{{url('dashboard/careers/new')}}"><span class="fa fa-file"></span> Nuevo servicio</a></li>
                        <li class="<?php echo $this->router->getActionName()=='index'?"active":""?>"><a href="{{url('dashboard/careers/index')}}"><span class="fa fa-file"></span> Todos los servicios</a></li>
                    </ul>
                </li>
                <li class="xn-openable <?php echo $this->router->getControllerName()=='category' || $this->router->getControllerName()=='advertising'?"active":""?>">
                    <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Otras Secciones</span></a>
                    <ul>
                        <!--li class="<?php echo $this->router->getActionName()=='index' && $this->router->getControllerName()=='category'?"active":""?>"><a href="{{url('dashboard/category')}}"><span class="fa fa-list-ul"></span>Categorías</a></li-->
                        <li class="<?php echo $this->router->getActionName()=='index' && $this->router->getControllerName()=='slider'?"active":""?>"><a href="{{url('dashboard/slider')}}"><span class="fa fa-tags"></span> Slider</a></li>
                        <!--li class="<?php echo $this->router->getActionName()=='index' && $this->router->getControllerName()=='opinion'?"active":""?>"><a href="{{url('dashboard/opinion')}}"><span class="fa fa-list-ul"></span>Testimoniales</a></li>
                        <li class="<?php echo $this->router->getActionName()=='index' && $this->router->getControllerName()=='opinion'?"active":""?>"><a href="{{url('dashboard/video/index')}}"><span class="fa fa-list-ul"></span>Videos</a></li-->
                    </ul>
                </li>
                <li class="xn-openable <?php echo $this->router->getControllerName()=='user'?"active":""?>">
                    <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Usuarios</span></a>
                    <ul>
                        <li class="<?php echo $this->router->getActionName()=='newuser'?"active":""?>">
                            <a href="{{url('dashboard/user/new-user')}}"><span class="fa fa-user-plus"></span> Nuevo usuario</a>
                        </li>
                        <li class="<?php echo $this->router->getActionName()=='index' && $this->router->getControllerName()=='user'?"active":""?>">
                            <a href="{{url('dashboard/users')}}"><span class="fa fa-user"></span> Todos los usuarios</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="page-content">
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <li class="xn-search">
                    <form role="form">
                        <input type="text" name="search" placeholder="Buscar"/>
                    </form>
                </li>
                <li class="xn-icon-button pull-right last">
                    <a href="#"><span class="fa fa-power-off"></span></a>
                    <ul class="xn-drop-left animated zoomIn">
                        <li><a href="{{url('')}}"><span class="fa fa-lock"></span>Bloquear</a></li>
                        <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span>Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
            {{ content() }}
        </div>
    </div>
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Cerrar <strong>Sesión</strong> ?</div>
                <div class="mb-content">
                    <p>¿Estas seguro de cerrar esta sesión?</p>
                    <p>Pulse No si desea continuar con el trabajo. Pulse Sí para cerrar la sesión del usuario actual.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="{{url('logout')}}" class="btn btn-success btn-lg">Yes</a>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {% block head %}
        {{ assets.outputJs('JsIndex') }}
    {% endblock %}
    <?php $jsPhotoNotes = $this->assets->collection('jsPhotoNotes'); ?>
    <?php if (!empty($jsPhotoNotes)) { ?>
        <?php echo $this->assets->outputJs('jsPhotoNotes'); ?>
    <?php } ?>
    <?php $plugins = $this->assets->collection('jsPlugins');
        if (!empty($plugins)) {echo $this->assets->outputJs('jsPlugins');}
    ?>
    <script type="text/javascript" src="/dash/js/plugins.js"></script>
    <script type="text/javascript" src="/dash/js/actions.js"></script>
    <script type="text/javascript">
        $(function(){
            setTimeout(function(){
                pageLoadingFrame();
            },2000);
        });
        function delete_row(row){

            var box = $("#mb-remove-row");
            box.addClass("open");

            box.find(".mb-control-yes").on("click",function(){
                box.removeClass("open");
                $("#"+row).hide("slow",function(){
                    $(this).remove();
                });
            });
        }
    </script>
</body
</html>
