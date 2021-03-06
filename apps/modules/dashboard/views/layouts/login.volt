<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>Retos | Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--Meta Google-->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="follow, index">
    <meta name="googlebot" content="follow, index">
    <meta name="google" content="notranslate" />
    <meta name="author" content="Chontal Developers" />
    <meta name="copyright" content="2014 c-develpers.com Todos los derechos reservados." />
    <meta name="application-name" content="C-Developers" />
    <link rel="author" href="https://plus.google.com/u/0/101316577346995540804/posts"/>
    <link rel="canonical" href="http://www.c-developers.com/" />
    <!--Meta Facebook -->
    <meta property="og:title" content="Chontal Developers | Login"/>
    <meta property="og:type" content="web"/>
    <meta property="og:url" content="http://www.c-developers.com/"/>
    <meta property="og:image" content="{{url('front/img/images/logoNew-floated.png')}}">
    <meta property="og:site_name" content="http://c-developers.com/"/>
    <meta property="og:description" content="C-Developers crea Paginas web en Villahermosa Tabasco, desarrollo web en el Sureste de México y toda la republica mexicana ademas Marketing y SEO"/>
    <!--Twitter-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="C-Developers | Login /">
    <meta name="twitter:description" content="Chontal Developers crea Paginas web en Villahermosa Tabasco, desarrollo web en el Sureste de México y toda la republica mexicana ademas Marketing y SEO" />
    <meta name="twitter:image" content="{{url('front/img/images/logoNew-floated.png')}}" />

    <!-- CSS INCLUDE -->
    {% block head %}
        {{ assets.outputCss('functions') }}
    {% endblock %}
    <link rel="stylesheet" type="text/css" id="theme" href="{{url('dash/css/theme-default.css')}}"/>
    <link rel="stylesheet" href="{{url('front/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" id="theme" href="{{url('dash/css/fontawesome/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{url('front/assets/css/formValidation.min.css')}}" media="screen">
    <!-- EOF CSS INCLUDE -->
</head>
<body>
{{ content() }}
    <script src="{{url('dash/js/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('front/assets/js/formValidation.min.js')}}"></script>
    <script type="text/javascript" src="{{url('front/assets/js/bootstrapV.min.js')}}"></script>
    <script src="{{url('dash/js/custom.js')}}"></script>
</body>
</html>