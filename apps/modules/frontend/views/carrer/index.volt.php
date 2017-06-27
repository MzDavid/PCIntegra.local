<div class="container main-text">
    <div class="col-md-12">
        <h3><?=$oferta[0]->getCategory()?></h3>
    </div>
</div>

</header>

<div class="courses-main">
    <div class="container">
        <div class="clearfix"></div>
        <div class="courses list-courses">
            <?php foreach($oferta as $value):?>
            <div class="col-md-6 cc-2">
                <div class="box">
                    <form class="form-inline">
                        <div class="form-group logo">
                            <a href="#"><img class="logoumaee" src="/front/images/logonew/unnamed%20(3).jpg" alt="" /></a>
                        </div>
                        <div class="form-group">
                            <div class="g-box">
                                <div class="info">
                                    <a href="/oferta-educativa/<?=$value->getPermalink()?>"><h3><?=$value->getName()?></h3></a>
                                </div>
                                <a href="/oferta-educativa/<?=$value->getPermalink()?>" class="m-btn">Learn More</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>