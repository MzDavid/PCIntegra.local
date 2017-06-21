<!-- top Slider -->
<div class="topSlider">
    <div class="container">
        <ul id="topcarousel" class="ts_container">
            <?php $count=1; foreach($slider as $key => $value):?>
                <?php $pid[$key] = $value->getPid();?>
                <?php $category = mb_strtolower(str_replace(' ', '-',str_replace('-','',$value->getNameCategory())), 'UTF-8');?>
                <li class="slide_1_4">
                    <a href="<?php echo $this->url->get(Phalcon\Text::lower($category) . '/' . Phalcon\Text::lower($value->getSubcategoryname()) . '/' . $value->getPermalink()); ?>">
                        <img src="<?php echo $this->url->get('dash/img/notes/233x300/' . $value->getImage()); ?>" width="233" height="300" alt="">
                    </a>
                    <div class="score_box">9 <span>Buena</span></div>
                    <div class="slide_caption">
                        <div class="slide_tag"><?php echo $category; ?></div>
                         <a href="<?php echo $this->url->get(Phalcon\Text::lower($category) . '/' . Phalcon\Text::lower($value->getSubcategoryname()) . '/' . $value->getPermalink()); ?>"><?php echo $value->getTitle(); ?></a>
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
            <a href="<?php echo $this->url->get(); ?>" hidefocus="true" style="outline: none;">Inicio</a>
            <span class="separator">&nbsp;</span> <?php echo ucfirst($permalink_category);?></div>
        <div id="content" class="posts_layout list_layout image_small">
            <?php foreach($findNews as $key => $value):?>
                <?php $category = mb_strtolower(str_replace(' ', '-',str_replace('-','',$value->getNameCategory())), 'UTF-8');?>
                <?php $canonical = $this->url->get(Phalcon\Text::lower($category) . '/' . Phalcon\Text::lower($value->getSubcategoryname()) . '/' . $value->getPermalink()); ?>
                <?php $newDate = explode("-",date("d-m-Y", strtotime($value->getDatePublic())));?>
                <div class="post-item image_left">
                    <div class="post-image">
                        <a href="<?php echo $canonical; ?>"><img src="<?php echo $this->url->get('dash/img/notes/265x160/' . $value->getImage()); ?>" width="219" height="140" alt=""></a>
                        <div class="post-cat"><span><?php echo $value->getNameCategory(); ?></span></div>
                    </div>
                    <div class="post-title">
                        <h2><a href="<?php echo $canonical; ?>"><?php echo $value->getTitle(); ?></a></h2>
                    </div>
                    <div class="post-meta" style="margin: 3px 0 3px 0;">
                        <a href="/<?php echo lcfirst($category);?>" hidefocus="true" style="outline: none;"><?php echo $value->getNameCategory(); ?>                    </a>
                        <span class="separator">|</span>Publicado: <?php echo $newDate[0] . ' de ' . ' ' . $date[$newDate[1]] . ' del ' . $newDate[2]; ?>
                    </div>
                    <div class="post-descr">
                        <p><?php echo $value->getSummary(); ?></p>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php endforeach?>
        </div>
        <span id="cat" data-category="<?php echo $category; ?>" class="hide"></span>
        <div id="load"></div>
        <a id="next" href="<?php echo $this->url->get('post/infinity'); ?>"></a>
	</div>
    <!--/ content -->

    <!-- sidebar -->
    <div class="sidebar">

        <div class="adv_300">
            <a href="<?php echo $advertising[4]['url']; ?>">
                <img src="<?php echo $this->url->get('front/images/slider/' . $advertising[4]['image']); ?>" width="300" height="250" alt="">
            </a>
        </div>

        <div class="adv_300">
            <a href="<?php echo $advertising[5]['url']; ?>">
                <img src="<?php echo $this->url->get('front/images/slider/' . $advertising[5]['image']); ?>" width="300" height="250" alt="">
            </a>
        </div>
        <div class="adv_300">
            <a href="<?php echo $advertising[6]['url']; ?>">
                <img src="<?php echo $this->url->get('front/images/slider/' . $advertising[6]['image']); ?>"  width="300" height="600" alt="">
            </a>
        </div>
        <div class="adv_300">
            <a href="<?php echo $advertising[9]['url']; ?>">
                <img src="<?php echo $this->url->get('front/images/slider/' . $advertising[9]['image']); ?>" width="300" height="250" alt="">
            </a>
        </div>
        <div class="adv_300">
            <a href="<?php echo $advertising[10]['url']; ?>">
                <img src="<?php echo $this->url->get('front/images/slider/' . $advertising[10]['image']); ?>" width="300" height="250" alt="">
            </a>
        </div>
        <div class="adv_300">
            <a href="<?php echo $advertising[8]['url']; ?>">
                <img src="<?php echo $this->url->get('front/images/slider/' . $advertising[8]['image']); ?>"  width="300" height="600" alt="">
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
