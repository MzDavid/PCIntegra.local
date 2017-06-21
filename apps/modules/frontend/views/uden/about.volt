<div class="container main-text">
    <div class="col-md-12">
        <h3>Misión y Visión</h3>
    </div>
</div>

</header>

<div class="about">
    <div class="container">
        <div class="col-md-6 ab-main">
            <div class="txt-1">Bienvenido a</div>
            <div class="txt-2">UDEN</div>
            <br/>
            <h3>GENERAL</h3>
            <p>Servicio de profesionalización y desarrollo de excelencia en las áreas administrativas, comercial, desarrollo humano y legal de compañías e instituciones.</p>
            <p>Nuestra asistencia está orientada a empresas tanto del sector público como privado que necesitan un valor agregado al principal capital con el que cuentan: el humano.
                Hoy no basta capacitar, hoy es necesario PROFESIONALIZAR, al personal.</p>
            <h3>¿Quienes Somos?</h3>
            <p>La Unidad de Desarrollo de Negocios (UDEN) es el departamento de la Universidad Más Educación y Enseñanza (UMAEE), encargado de vincular el sector gubernamental y empresarial de Tabasco con el ámbito académico profesional.</p>
            <p>Su objetivo es impulsar la profesionalización de los sectores que influyen en el desarrollo económico y social a través de talleres, diplomados, seminarios, conferencias y cursos de especialización que generen estrategias participativas y promuevan la calidad del servicio, el trabajo en equipo y el fortalecimiento institucional ­empresarial.</p>
            <p>La UDEN actúa como un centro de contacto entre las iniciativas empresariales y gubernamentales con el sector universitario, incentivando la intervención y el emprendimiento para el diseño y ejecución de estrategas innovadoras que se verán proyectadas en el quehacer cotidiano de los diversos actores involucrados en los procesos de profesionalización.</p>
        </div>
        <div class="col-md-6 right">
            <img src="/front/images/UDEN-1-slide-interior.jpg" class=" s-pic" alt="" />
        </div>
    </div>
</div>

<div class="numbers-1">
    <div class="container">
        <div class="col-md-4">
            <img src="/front/images/icons/9.png" alt="" />
            <div class="number">100 <b>Cursos</b></div>
            <img src="/front/images/chain.png" class="chain" alt="" />
        </div>

        <div class="col-md-4">
            <img src="/front/images/icons/10.png" alt="" />
            <div class="number">600 <b>Cursos Impartidos</b></div>
            <img src="/front/images/chain.png" class="chain" alt="" />
        </div>

        <div class="col-md-4">
            <img src="/front/images/icons/11.png" alt="" />
            <div class="number">15 <b>Maestros</b></div>
            <img src="/front/images/chain.png" class="chain" alt="" />
        </div>
    </div>
</div>

<div class="why">
    <div class="container">
        <div class="col-md-12">
            <h2>Ideario Institucional</h2>
            <div class="txt-1">La Misión y Visión de la Universidad Más Educación y Enseñanza(UMAEE) propone, en base a principios filosóficos, epistemológicos y pedagógicos:</div>
        </div>
        <div class="col-md-4">
            <h2>Misión</h2>
            <p>Profesionalizar el capital humano de las empresas e instituciones por medio de talleres, diplomados, seminarios, conferencias y cursos especializados que permitan desarrollar competencias laborales y profesionales, siendo la innovación, liderazgo y emprendiendo los ejes rectores de la UDEN.</p>
        </div>

        <div class="col-md-4">
            <h2>Visión</h2>
            <p>Ser el centro de profesionalización más importante de la región como resultado de la calidad de nuestros servicios, así como el principal impulsor de la competitividad de proyectos, empresas, e instituciones a través de una participación activa en el ramo empresarial.</p>
        </div>
        <div class="col-md-4">
            <h2>Objetivo</h2>
            <ul style="list-style: circle !important;">
                <li>Proporcionar herramientas para el desarrollo de competencias profesionales.</li>
                <li>Impulsar la innovación y la competitividad de la empresa o institución.</li>
                <li>Fomentar el desarrollo económico y bienestar social mediante la capacitación continua de los equipos de trabajo.</li>
                <li>Profesionalizar la organización promoviendo la cultura de la productividad.</li>
                <li>Resolver cualquier situacion de la empresa a traves de la profesionalización de su personal.</li>
            </ul>
        </div>
    </div>
</div>

<div class="video">
    <div class="container">
        <div class="col-md-7">
            <h2>En <b>UDEN</b> tenemos bien definidos nuestros valores.</h2>
            <p>En UMAEE sabemos que es esecial tener buenos valores para poder enseñar a los profesionistas</p>
        </div>

        <div class="col-md-5 v-right">
            <a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><img src="/front/images/v-play.png" class="v-play" alt="" /></a>
        </div>
    </div>
</div>


<div class="teachers-1">
    <div class="container">
        <div class="col-md-12 welcome">
            <h2>NUESTROS MAESTROS</h2>
            <p>Nuestros maestros estan capacitados con alta experiencia</p>
        </div>
        <div class="col-md-12 courses">
            <div id="owl-1" class="owl-carousel">
                <?php foreach ($teacher as $v):?>
                    <div class="col-md-3 mem">
                        <img clas="teacher" src="/dash/assets/images/users/thumbnail/<?=$v->getPhoto()?>" alt="" />
                        <div class="overlay">
                            <ul class="socials">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <a href="#"><h3><?=$v->getName()?></h3></a>
                        <!--p>Lorem ipsum dolor sit amet, coectetur adipiscg elit, sed do eiusmod tmpor incidit ut labore et dolore mna.</p-->
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>