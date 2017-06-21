<!--div class="container main-text">
    <div class="col-md-12">
        <h3><?= $post->getTitle() ?></h3>
    </div>
</div>
</header>
<div class="blog-1 blog-single">
    <div class="container">
        <div class="blog blog-main">
            <div class="col-md-9">
                <div class="item">
                    <img src="/dash/img/notes/<?= $post->getImage() ?>" class="img-responsive" alt="" />
                    <h2><?= $post->getTitle() ?></h2>
                    <div class="post-info">
                        <span class="by">Por: <?= $user->getName() ?></span>
                        <span class="category">Categoria: <?= $category->getSubcategoryname() ?></span>
                        <?php $newDate = explode("-",date("d-m-Y", strtotime($post->getDatePublic())));?>
                        <span class="date">Fecha: <?= $newDate[0] . ' de ' . ' ' . $date[$newDate[1]] . ' del ' . $newDate[2] ?></span>
                    </div>
                    <?= $post->getContent() ?>
                    <div class="comments">
                        <div class="heading"><i class="fa fa-comments-o"></i> Comentarios</div>


                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                            /*
                             var disqus_config = function () {
                             this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                             this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                             };
                             */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://http-umaee-edu-mx-1.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-lg"></div>
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="s-heading">Carreras</div>
                    <div class="s-box">
                        <ul class="c-list style">
                            <?php foreach ($carrer as $carrer):?>
                            <li><a href="/oferta-educativa/<?= $carrer->getPermalink() ?>"><?= $carrer->getName() ?></a></li>
                            <?php endforeach?>
                        </ul>
                    </div>

                    <div class="s-heading">Ultimas Noticias</div>
                    <div class="s-box">
                        <ul class="c-list">
                            <?php foreach ($postall as $postall):?>
                            <li><a href="/noticias/<?= $postall->getPermalink() ?>">- <?= $postall->getTitle() ?></a></li>
                            <?php endforeach?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div-->







<div id="blog" class="pd--100-0-40">
    <div class="container">
        <div class="row">
            <div class="page--content col-md-9">
                <div class="post--item">
                    <div class="post--header"><h2 class="post--title"><?= $post->getTitle() ?></h2>

                        <div class="post--meta">
                            <span><a href="#"><?= $post->getDatePublic() ?></a></span>
                        </div>
                    </div>
                    <div class="post--img"><img src="/dash/img/notes/<?= $post->getImage() ?>" alt="" data-rjs="2"></div>
                    <div class="post--content">
                        <blockquote>
                            <p><?= $post->getSummary() ?></p>
                        </blockquote>
                        <p><?= $post->getContent() ?></p>
                    </div>
                </div>
            </div>
            <div class="page--sidebar col-md-3">
                <div class="widget"><h2 class="widget--title h5">Ultimos Blog</h2>
                    <div class="recent-posts--widget">
                        <ul>
                            <?php foreach($postall as $postall):?>
                            <li><a href="/noticias/<?= $postall->getPermalink() ?>">
                                    <div class="img"><img src="/dash/img/notes/<?= $post->getImage() ?>" alt="" data-rjs="2">
                                        <div class="figcaption"><i class="fa fa-link"></i></div>
                                    </div>
                                    <div class="info">
                                        <h3 class="h5"><?= $postall->getTitle() ?></h3>
                                        <p><?= $postall->getDatePublic() ?></p>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>