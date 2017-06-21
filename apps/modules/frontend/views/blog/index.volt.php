<!--div class="container searchbardiv" id="formsearch">
    <form role="search" method="get" id="searchform"  >
        <div class="input-group">
            <input type="text" id="searchbox" class="form-control" placeholder="Search Here..." name="s">
            <div class="input-group-btn">
                <button class="btn btn-default"  id="searchsubmit"  type="submit">
                    <strong>Search</strong>
                </button>
            </div>
        </div>
    </form>
</div>
<div class="container main-text">
    <div class="col-md-12">
        <h3>Noticias</h3>
    </div>
</div>
</header>
<div class="blog-1">
    <div class="container">
        <div class="col-md-12 welcome">
            <h2>LO ULTIMO DE NOTICIAS</h2>
            <p>Nuestras Noticias Más Populares</p>
            <img src="/front/images/pencil.png" class="blog-pencil" alt="" />
            <img src="/front/images/eraser.png" class="blog-eraser" alt="" />
        </div>
        <div class="blog blog-main">

            <?php foreach ($post as $sub) { ?>
            <div class="col-md-6 item">
                <img src="/dash/img/notes/<?= $sub->getImage() ?>" class="img-responsive" alt="" />
                <h2 class="blog"><a href="/noticias/<?= $sub->getPermalink() ?>"><?= $sub->getTitle() ?></a></h2>
            </div>
            <?php } ?>
        </div>
    </div>
</div-->







<!--div id="pageHeader" class="pd--80-0" data-bg-img="img/page-header-img/bg.jpg">
    <div class="container">
        <div class="page-header--title pull-left"><h1 class="h1">Blog</h1></div>
        <div class="page-header--breadcrumb pull-right">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li class="active">Blog</li>
            </ul>
        </div>
    </div>
</div-->
<div id="blog" class="pd--100-0-40">
    <div class="container">
        <div class="row">
            <div class="page--content col-md-12">
                <div class="post--items row">
                    <?php foreach ($post as $sub) { ?>
                    <div class="post--item col-md-6 col-xs-6 col-xxs-12">
                        <div class="post--header"><h2 class="post--title"><a href="/noticias/<?= $sub->getPermalink() ?>"><?= $sub->getTitle() ?></a></h2>

                            <div class="post--meta"><span>Posted By <a href="/noticias/<?= $sub->getPermalink() ?>">Admin</a></span> <span
                                    class="divider">|</span> <span><a href="/noticias/<?= $sub->getPermalink() ?>"><?= $sub->getDatePublic() ?></a></span>
                            </div>
                        </div>
                        <div class="post--img"><img src="/dash/img/notes/<?= $sub->getImage() ?>" alt="" data-rjs="2"></div>
                        <div class="post--summery">
                            <?= $sub->getSummary() ?>
                        </div>
                        <div class="post--action">
                            <a href="/noticias/<?= $sub->getPermalink() ?>" class="btn btn-default">
                                Continuar leyendo<i class="fa flm fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>