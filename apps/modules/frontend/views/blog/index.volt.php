<div id="blog" class="pd--100-0-40">
    <div class="container">
        <div class="row">
            <div class="page--content col-md-12">
                <div class="post--items row">
                    <?php foreach ($post as $sub) { ?>
                    <div class="post--item col-md-6 col-xs-6 col-xxs-12">
                        <div class="post--header"><h2 class="post--title"><a href="/noticias/<?= $sub->getPermalink() ?>"><?= $sub->getTitle() ?></a></h2>

                            <div class="post--meta"><span>Posted By <a href="/noticias/<?= $sub->getPermalink() ?>">Admin</a></span> <span
                                    class="divider">|</span> <span><a href="/noticias/<?= $sub->getPermalink() ?>"><?= $sub->getDatePublic() ?>ffff33</a></span>
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