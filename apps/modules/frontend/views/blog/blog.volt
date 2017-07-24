<div id="blog" class="pd--100-0-40">
    <div class="container">
        <div class="row">
            <div class="page--content col-md-9">
                <div class="post--item">
                    <div class="post--header"><h2 class="post--title">{{post.getTitle()}}</h2>

                        <div class="post--meta">
                            <span><a href="#">{{post.getDatePublic()}}</a></span>
                        </div>
                    </div>
                    <div class="post--img"><img src="/dash/img/notes/{{post.getImage()}}" alt="" data-rjs="2"></div>
                    <div class="post--content">
                        <blockquote>
                            <p>{{post.getSummary()}}</p>
                        </blockquote>
                        <p>{{post.getContent()}}</p>
                    </div>
                </div>
            </div>
            <div class="page--sidebar col-md-3">
                <div class="widget"><h2 class="widget--title h5">Ultimos Blog</h2>
                    <div class="recent-posts--widget">
                        <ul>
                            <?php foreach($postall as $postall):?>
                            <li><a href="/noticias/{{postall.getPermalink()}}">
                                    <div class="img"><img src="/dash/img/notes/{{postall.getImage()}}" alt="" data-rjs="2">
                                        <div class="figcaption"><i class="fa fa-link"></i></div>
                                    </div>
                                    <div class="info">
                                        <h3 class="h5">{{postall.getTitle()}}</h3>
                                        <p>{{postall.getDatePublic()}}</p>
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