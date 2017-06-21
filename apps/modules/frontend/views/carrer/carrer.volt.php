    <div class="container main-text">
        <div class="col-md-12">
            <h3><?= $carrer->getName() ?></h3>
        </div>
    </div>
</header>
<div class="course-single course-content">
    <div class="container">
        <div class="col-md-12">
            <h1><?= $carrer->getName() ?></h1>
        </div>
        <div class="about-course">
            <div class="col-md-4 left">
                <p class="text-justify resaltar">La UMAEE tomando en cuenta la correlación entre la misión y la visión institucional, impulsará lo siguiente en el proceso de formación de los estudiantes de la <?= $carrer->getName() ?>:</p>
                <div class="lessons">
                    <ul class="lessons-1 nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#t1" aria-controls="t1" role="tab" data-toggle="tab">
                                <span class="middle">Información </span>
                            </a></li>
                        <li role="presentation"><a href="#t2" aria-controls="t2" role="tab" data-toggle="tab">
                                <span class="middle">Preguntas frecuentes </span>
                            </a></li>
                        <li role="presentation"><a href="#t3" aria-controls="t3" role="tab" data-toggle="tab">
                                <span class="middle">Google For Education </span>
                            </a></li>
                        <li role="presentation"><a href="#t4" aria-controls="t4" role="tab" data-toggle="tab">
                                <span class="middle">Plan de Estudio </span>
                            </a></li>
                        <!--li role="presentation"><a href="#t4" aria-controls="t4" role="tab" data-toggle="tab">
                                <span class="left"><i class="fa  fa-file-text-o"></i> Lecture 1.4</span>
                                <span class="middle">Role of JAVA in android ? </span>
                                <span class="right">35m</span>
                            </a></li-->
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="t1">
                        <?= $carrer->getInformation() ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="t2">
                        <?= $carrer->getQuestion() ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="t3">
                        <div class="top-h"><i class="fa  fa-file-text-o"></i> Google for Education </div>
                        <img src="/front/images/v-11.jpg" alt="" />
                    </div>
                    <div role="tabpanel" class="tab-pane" id="t4">
                        <p class="titulos">PLAN DE ESTUDIO DE <?= $carrer->getName() ?> (pdf)</p>
                        <p class="text-justify">Ser el Primero tiene sus beneficios.</p>
                        <embed width="100%" height="500px" name="plugin" id="plugin" src="/api/<?= $carrer->getPlan() ?>" type="application/pdf" internalinstanceid="12" title="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-1">
    <div class="container">
        <div class="col-md-12 welcome">
            <h2>Video</h2>
            <p>Algunos proyectos de la Licenciatura</p>
            <img src="/front/images/pencil.png" class="blog-pencil" alt="" />
            <img src="/front/images/eraser.png" class="blog-eraser" alt="" />
        </div>
        <div class="col-md-12 blog">
            <iframe  width="100%" height="500"  src="http://www.youtube.com/embed/<?= $carrer->getVideo() ?>?origin=http://example.com" frameborder="0" >
            </iframe>
        </div>
    </div>
</div>