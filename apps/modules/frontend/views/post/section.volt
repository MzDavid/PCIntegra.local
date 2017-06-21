<!-- top Slider -->
<div class="topSlider">
    <div class="container">
        <ul id="topcarousel" class="ts_container">
            <?php $count=1; foreach($slider as $key => $value):?>
                <?php $pid[$key] = $value->getPid();?>
                <?php $category = mb_strtolower(str_replace(' ', '-',str_replace('-','',$value->getNameCategory())), 'UTF-8');?>
                <li class="slide_1_4">
                    <a href="{{url(category|lower~'/'~value.getSubcategoryname()|lower~'/'~value.getPermalink())}}">
                        <img src="{{url('dash/img/notes/233x300/'~value.getImage())}}" width="233" height="300" alt="">
                    </a>
                    <div class="score_box">9 <span>Buena</span></div>
                    <div class="slide_caption">
                        <div class="slide_tag">{{category}}</div>
                         <a href="{{url(category|lower~'/'~value.getSubcategoryname()|lower~'/'~value.getPermalink())}}">{{value.getTitle()}}</a>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>
        <div class="clear"></div>
        <div class="ts_pagination" id="topcarousel_pag"></div>
    </div>
</div>
<script>
	jQuery(document).ready(function($) {
		$('#topcarousel').carouFredSel({
			pagination : "#topcarousel_pag",
			auto: {
				pauseDuration: 7000,
				pauseOnHover: true
			},
			scroll: {
				wipe: true
			}
		});
	});
</script>
<!--/ top Slider -->

<div class="container">
<!-- middle -->
<div id="middle" class="cols2">

    <div class="content" role="main">
        <div class="breadcrumbs">
            <a href="{{url()}}" hidefocus="true" style="outline: none;">Inicio</a>
            <span class="separator">&nbsp;</span> <?php echo ucfirst($permalink_category);?></div>
        <div id="content" class="posts_layout list_layout image_small">
            <?php foreach($findNews as $key => $value):?>
                <?php $category = mb_strtolower(str_replace(' ', '-',str_replace('-','',$value->getNameCategory())), 'UTF-8');?>
                {% set canonical = url(category|lower~'/'~value.getSubcategoryname()|lower~'/'~value.getPermalink()) %}
                <?php $newDate = explode("-",date("d-m-Y", strtotime($value->getDatePublic())));?>
                <div class="post-item image_left">
                    <div class="post-image">
                        <a href="{{canonical}}"><img src="{{url('dash/img/notes/265x160/'~value.getImage())}}" width="219" height="140" alt=""></a>
                        <div class="post-cat"><span>{{value.getNameCategory()}}</span></div>
                    </div>
                    <div class="post-title">
                        <h2><a href="{{canonical}}">{{value.getTitle()}}</a></h2>
                    </div>
                    <div class="post-meta" style="margin: 3px 0 3px 0;">
                        <a href="/<?php echo lcfirst($category);?>" hidefocus="true" style="outline: none;">{{value.getNameCategory()}}                    </a>
                        <span class="separator">|</span>Publicado: {{newDate[0]~" de "~" "~date[newDate[1]]~" del "~newDate[2]}}
                    </div>
                    <div class="post-descr">
                        <p>{{value.getSummary()}}</p>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php endforeach?>
        </div>
        <span id="cat" data-category="{{category}}" class="hide"></span>
        <div id="load"></div>
        <a id="next" href="{{url('post/infinity')}}"></a>
	</div>
    <!--/ content -->

    <!-- sidebar -->
    <div class="sidebar">

        <div class="adv_300">
            <a href="{{advertising[4]['url']}}">
                <img src="{{url('front/images/slider/'~advertising[4]['image'])}}" width="300" height="250" alt="">
            </a>
        </div>

        <div class="adv_300">
            <a href="{{advertising[5]['url']}}">
                <img src="{{url('front/images/slider/'~advertising[5]['image'])}}" width="300" height="250" alt="">
            </a>
        </div>
        <div class="adv_300">
            <a href="{{advertising[6]['url']}}">
                <img src="{{url('front/images/slider/'~advertising[6]['image'])}}"  width="300" height="600" alt="">
            </a>
        </div>
        <div class="adv_300">
            <a href="{{advertising[9]['url']}}">
                <img src="{{url('front/images/slider/'~advertising[9]['image'])}}" width="300" height="250" alt="">
            </a>
        </div>
        <div class="adv_300">
            <a href="{{advertising[10]['url']}}">
                <img src="{{url('front/images/slider/'~advertising[10]['image'])}}" width="300" height="250" alt="">
            </a>
        </div>
        <div class="adv_300">
            <a href="{{advertising[8]['url']}}">
                <img src="{{url('front/images/slider/'~advertising[8]['image'])}}"  width="300" height="600" alt="">
            </a>
        </div>

    </div>
    <!--/ sidebar -->

    <div class="divider"></div>
    <div class="read-more-big"><a href="#">Mostrar mas</a></div>

</div>
<!--/ middle -->
</div>
<!--/ container -->
