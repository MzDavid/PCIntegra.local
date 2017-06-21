<div class="container">
    <!-- middle -->
    <div id="middle" class="cols2">

        <div class="title">
            <h1><span>Galería:</span> {{ photonote.getTitle()}}</h1>
        </div>

        <div class="content" role="main">
            <article class="post-detail">
                <div class="entry">
                    <div class="inner">
                        <div id="dev7-caroufredsel-wrapper-24" class="dev7-caroufredsel-wrapper">
                            <div id="caroufredsel-24" class="dev7-caroufredsel-carousel">
                                <?php foreach($gallery as $values):?>
                                <div class="dev7-caroufredsel-image">
                                    <a  title="This is the description" href="{{url('front/images/photo_notes/'~values.getName())}}" data-rel="prettyPhoto[mg_1]">
                                        <img src="{{url('front/images/photo_notes/'~values.getName())}}" />
                                    </a>
                                </div>
                                <?php endforeach?>
                            </div>
                            <div class="dev7-clearfix"></div>
                            <div class="dev7-caroufredsel-pag">
                                <?php foreach($gallery as $values):?>
                                    <a class="dev7-caroufredsel-thumb" href="#">
                                        <img src="{{url('front/images/photo_notes/220x140/'~values.getName())}}" />
                                    </a>
                                <?php endforeach?>
                            </div>
                        </div>
                        <script>
                            jQuery(document).ready(function($) {
                                function runCarousel() {
                                    $('a[data-rel]').each(function() {
                                        $(this).attr('rel', $(this).data('rel'));
                                    });
                                    $("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});
                                    $('#caroufredsel-24').carouFredSel({
                                        responsive	: true,
                                        items		: 1,
                                        scroll		: {
                                            fx			: "crossfade"
                                        },
                                        pagination	: {
                                            container		: ".dev7-caroufredsel-pag",
                                            anchorBuilder   : false
                                        }
                                    });
                                }
                                $("#caroufredsel-24").imagesLoaded(runCarousel);
                            });
                        </script>
                        <style type="text/css" media="screen">
                            .dev7-caroufredsel-pag img {
                                height: 70px;
                                padding: 5px;
                                border: 1px solid #bbb;
                                margin-right: 10px;
                            }

                            .dev7-caroufredsel-pag {
                                margin-top: 20px;

                            }

                        </style>

                        <!--/ post with slider -->
                        <p>
                            {{ photonote.getContent() }}
                        </p>
                    </div>
                </div>

            </article>

            <!-- post comments -->
            <div class="comment-list" id="comments">

                <h2>120 Comentarios</h2>

                <a href="#addcomments" class="link-add-comment anchor">Únete a la discusión</a>
            </div>
            <!--/ post comments -->
        </div>
        <!--/ content -->

        <!-- sidebar -->
        <div class="sidebar">

            <div class="adv_300">
                <img src="{{url('front/images/slider/image-4.png')}}" width="300" height="250" alt="">
            </div>

            <div class="adv_300">
                <img src="{{url('front/images/slider/image-5.png')}}" width="300" height="250" alt="">
            </div>
            <div class="adv_300">
                <img src="{{url('front/images/slider/image-6.png')}}" height="600" alt="">
            </div>
            <div class="adv_300">
                <img src="{{url('front/images/slider/image-9.png')}}" width="300" height="250" alt="">
            </div>
            <div class="adv_300">
                <img src="{{url('front/images/slider/image-10.png')}}" width="300" height="250" alt="">
            </div>
            <div class="adv_300">
                <img src="{{url('front/images/slider/image-8.png')}}" height="600" alt="">
            </div>

        </div>
        <!--/ sidebar -->

        <div class="divider"></div>

        <!-- grid layout, 3 cols -->
        <div class="posts_layout grid_layout">

            <!-- post with slider -->
            <div class="post-item postThumbs postSliderThumbs">
                <div class="postSlider_pag" id="postSlider2_pag"></div>
            </div>
            <script>
                jQuery(document).ready(function($) {
                    $('#postSlider2').carouFredSel({
                        pagination : "#postSlider2_pag",
                        auto: false,
                        scroll: {
                            fx: "fade",
                            duration: 200
                        }
                    });
                });
            </script>
            <!--/ post with slider -->

            <div class="clear"></div>
        </div>
        <!-- grid layout, 3 cols -->

    </div>
    <!--/ middle -->
</div>
<!--/ container -->