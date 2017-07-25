<div id="banner">
    <?php foreach($sliders as $sli):?>
    <div class="banner--slider owl-carousel" data-owl-dots="true">
        <div class="banner--item" data-bg-img="/api/images/slider/<?=$sli->image;?>">
            <div class="container">
                <div class="row">
                    <div class="banner--img col-md-6">
                    </div>
                    <div class="banner--content col-md-6">
                        <h1 class="h2">
                            <?=$sli->title;?>
                        </h1>
                        <h2 class="h4">
                            <?=$sli->subtitle;?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<div id="servicesTab" class="pd--100-0">
    <div class="container">
        <div class="section--title text-center">
            <h2 class="h2">Nuestros servicios</h2>
        </div>
        <div class="row">
            <div class="service-tab--nav col-md-6">
                <ul class="bg--color-lightgray row">
                    <li class="col-md-6">
                        <div data-toggle="tab" data-target="#servicesTabItem01">
                            <div class="item"><i class="fa fa-server"></i>
                                <h3 class="h3">Integración de servidores y redes</h3>
                            </div>
                        </div>
                    </li>
                    <li class="col-md-6">
                        <div data-toggle="tab" data-target="#servicesTabItem02">
                            <div class="item"> <i class="fa fa-sitemap"></i>
                                <h3 class="h3">Cableado estructurado</h3>
                            </div>
                        </div>
                    </li>
                    <li class="col-md-6">
                        <div data-toggle="tab" data-target="#servicesTabItem03">
                            <div class="item"><i class="fa fa-phone"></i>
                                <h3 class="h3">Telefónia convecional voz IP</h3>
                            </div>
                        </div>
                    </li>
                    <li class="col-md-6 active">
                        <div data-toggle="tab" data-target="#servicesTabItem04">
                            <div class="item"><i class="fa fa-video-camera"></i>
                                <h3 class="h3"> Sistema de video vigilancia </h3>
                            </div>
                        </div>
                    </li>
                    <p class="text-center"><a href="service-single.html" class="btn-link">Ver más</a> </p>
                </ul>
            </div>
            <div class="service--tabs col-md-6">
                <div class="tab-content">
                    <div id="servicesTabItem01" class="tab-pane fade">
                        <h3 class="title h3">Integración de servidores y redes</h3>
                        <p>Instalamos servidores de dominio basados en:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><i class="fa fa-check-square-o"></i>Windows Server y Linux</li>
                                    <li><i class="fa fa-check-square-o"></i>Servidores de correo y web</li>
                                    <li><i class="fa fa-check-square-o"></i>Firewalls</li>
                                    <li><i class="fa fa-check-square-o"></i>Control de la salida del Internet de sus empleados</li>
                                    <li><i class="fa fa-check-square-o"></i>Instalamos sistema de monitoreo por usuario para
                                        supervisión de sus empleados</li>
                                </ul>
                            </div>
                            <div class="col-md-6"> <img src="/front/img/services-tab-img/graphic-design.jpg" alt=""> </div>
                        </div>
                        <a href="#" class="btn-link">Conocer más </a> </div>
                    <div id="servicesTabItem02" class="tab-pane fade">
                        <h3 class="title h3">Cableado estructurado y fibra óptica</h3>
                        <p>Ofrecemos servicios de:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><i class="fa fa-check-square-o"></i>Instalación de redes de datos</li>
                                    <p>Utilizano materiales de:</p>
                                    <li><i class="fa fa-check-square-o"></i>Marcas reconocidas en el mercado</li>
                                </ul>
                            </div>
                            <div class="col-md-6"> <img src="/front/img/services-tab-img/web-design.jpg" alt=""> </div>
                        </div>
                        <a href="#" class="btn-link">Conocer más</a>
                    </div>
                    <div id="servicesTabItem03" class="tab-pane fade">
                        <h3 class="title h3">Telefónia convecional y voz IP</h3>
                        <p>Contamos con servicios de:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><i class="fa fa-check-square-o"></i>Venta.</li>
                                    <li><i class="fa fa-check-square-o"></i>Mantenimiento.</li>
                                    <li><i class="fa fa-check-square-o"></i>Instalación de conmutadores.</li>
                                </ul>
                                <p>Sistemas de control de llamadas, basados en tarificadores en tiempo real para ver el reporte
                                    de llamadas de su personal todos los días.</p>
                            </div>
                            <div class="col-md-6"> <img src="/front/img/services-tab-img/web-development.jpg" alt=""> </div>
                        </div>
                        <a href="#" class="btn-link">Conocer más</a>
                    </div>
                    <div id="servicesTabItem04" class="tab-pane fade in active">
                        <h3 class="title h3">Soporte técnico y arrendamiento</h3>
                        <p>Prestamos servicios de:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><i class="fa fa-check-square-o"></i>Arrendamiento de equipo de cómputo INTEGRANDO servicios
                                        de soporte técnico.</li>
                                    <li><i class="fa fa-check-square-o"></i>Contamos con la infraestructura y personal calificado
                                        para la prestación de este servicio.</li>
                                </ul>
                            </div>
                            <div class="col-md-6"> <img src="/front/img/services-tab-img/seo.jpg" alt=""> </div>
                        </div>
                        <a href="#" class="btn-link">Conocer más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="nationaldiv" class="bg-national">
    <div class="container division">
        <div class="celdas row">
            <div class="bg--national col-md-6"></div>
            <div class="bg--national-cover col-md-6">
                <h2 class="h2dev">¿Porqué elegirnos?</h2>
                <div class="doblelista">
                    <ul>
                        <li><i class="fa fa-check-square-o"></i><span>Servidores 20 veces más rápidos</span></li>
                        <li><i class="fa fa-check-square-o"></i><span>Expertos en Soporte Técnico</span></li>
                        <li><i class="fa fa-check-square-o"></i><span>99.9% Garantía de disponibilidad</span></li>
                        <li><i class="fa fa-check-square-o"></i><span>24/7 Prioridad de soporte</span></li>
                    </ul>
                    <ul>
                        <li><i class="fa fa-check-square-o"></i><span>Confiabilidad</span></li>
                        <li><i class="fa fa-check-square-o"></i><span>Trayectoria y experiencia</span></li>
                        <li><i class="fa fa-check-square-o"></i><span>Honestidad e integridad</span></li>
                        <li><i class="fa fa-check-square-o"></i><span>Relación precio-calidad</span></li>
                    </ul>
                </div>
                <p class="enlace-cliente">Conocé lo que opinan nuestros clientes, <a href="#testimonial">leé sus testimonios.</a></p>
            </div>
        </div>
    </div>
</div>
<div id="galeria" class="galeria pd--100-0-40">
    <div class="section--title text-center">
        <h2 class="h2">Certificados</h2>
    </div>
    <div class="container">
        <div id="gallery">
        </div>
    </div>
</div>
<div id="counter" class="pd--100-0-40 contador">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <div class="counter--item">
                    <p data-counter-up="numbers">1095</p>
                    <h2 class="h3">Dominios registrados</h2> <i class="fa fa-globe"></i> </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="counter--item">
                    <p data-counter-up="numbers">1275</p>
                    <h2 class="h3">Clientes felices</h2> <i class="fa fa-handshake-o"></i> </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="counter--item">
                    <p data-counter-up="numbers">168</p>
                    <h2 class="h3">Proyectos en proceso</h2> <i class="fa fa-file"></i> </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="counter--item">
                    <p data-counter-up="numbers">299</p>
                    <h2 class="h3">Reconocimientos</h2> <i class="fa fa-trophy"></i> </div>
            </div>
        </div>
    </div>
</div>
<div id="brands" class="pd--100-0-70">
    <div class="container">
        <div class="section--title text-center">
            <h2 class="h2">Marcas que trabajamos</h2>
        </div>
        <div class="owl-one owl-carousel">
            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-01.png" alt=""> </div>
            </div>
            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-02.png" alt="" class="center-block" data-rjs="2"> </div>
            </div>

            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-03.png" alt="" class="center-block" data-rjs="2"> </div>
            </div>

            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-04.png" alt="" class="center-block" data-rjs="2"> </div>
            </div>

            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-05.png" alt="" class="center-block" data-rjs="2"> </div>
            </div>

            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-06.png" alt="" class="center-block" data-rjs="2"> </div>
            </div>

            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-07.png" alt="" class="center-block" data-rjs="2"> </div>
            </div>
            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-08.png" alt="" class="center-block" data-rjs="2"> </div>
            </div>

            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-10.png" alt="" class="center-block" data-rjs="2"></div>
            </div>

            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-11.png" alt="" class="center-block" data-rjs="2"> </div>
            </div>

            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-13.png" alt="" class="center-block" data-rjs="2"> </div>
            </div>

            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-14.png" alt="" class="center-block" data-rjs="2"> </div>
            </div>

            <div class="items">
                <div class="brand--img"> <img src="/front/img/brands-img/brand-15.jpg" alt="" class="center-block" data-rjs="2"> </div>
            </div>

        </div>
    </div>
</div>
</div>