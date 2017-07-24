<div id="blog" class="pd--100-0-40">
    <div class="container">
        <div class="row">
            <div class="page--content col-md-12">
                <div class="post--items row">
                    {% for sub in post %}
                    <div class="post--item col-md-6 col-xs-6 col-xxs-12">
                        <div class="post--header"><h2 class="post--title"><a href="/casos-de-exito/{{sub.getPermalink()}}">{{sub.getTitle()}}</a></h2>

                            <div class="post--meta"><!--span>Posted By <a href="/casos-de-exito/{{sub.getPermalink()}}">Admin</a></span> <span
                                    class="divider">|</span--> <span><a href="/casos-de-exito/{{sub.getPermalink()}}">{{sub.getDatePublic()}}</a></span>
                            </div>
                        </div>
                        <div class="post--img"><img src="/dash/img/notes/{{sub.getImage()}}" alt="" data-rjs="2"></div>
                        <div class="post--summery">
                            {{sub.getSummary()}}
                        </div>
                        <div class="post--action">
                            <a href="/casos-de-exito/{{sub.getPermalink()}}" class="btn btn-default">
                                Continuar leyendo<i class="fa flm fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                    {% endfor %}
                </div>
            </div>
        </div>
    </div>
</div>