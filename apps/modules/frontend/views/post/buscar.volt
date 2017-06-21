<div class="container">
    <!-- middle -->
    <div id="middle" class="cols2">

        <div class="content" role="main" id="contentSearch">
            <div class="breadcrumbs">
                <a href="{{url()}}" hidefocus="true" style="outline: none;">Inicio</a>
                <span class="separator">&nbsp;</span> Busqueda
                <span class="separator">&nbsp;</span> <?= $word;?>
            </div>
            <?php if($status===1):?>
            <div class="posts_layout list_layout image_small">

                    <?php foreach($notes as $key => $value):?>
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
                                <div class="post-meta" style="margin: 3px 0 3px 0;">
                                    <?php
                                    $category ="";
                                    $sub = explode(" ",$value->getNameCategory());
                                    if(count($sub) >= 2){
                                        $result = "";
                                        for($i = 0;$i<count($sub);$i++){
                                            if($i==0){
                                                $result = $sub[$i];
                                            }else{
                                                $result = $result."-".$sub[$i];
                                            }
                                        }
                                        $category = $result;
                                    }else{
                                        $category = $value->getNameCategory();
                                    }
                                    ?>
                                    <a href="/<?php echo strtolower($category)?>" hidefocus="true" style="outline: none;">{{value.getNameCategory()}}                    </a>
                                    <span class="separator">|</span>Publicado: {{newDate[0]~" de "~" "~date[newDate[1]]~" del "~newDate[2]}}
                                </div>
                                <div class="post-descr">
                                    <p>{{value.getSummary()}}</p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="post-descr">
                                <p>{{value.getSummary()}}</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clearfix"></div>
                    <?php endforeach?>
            </div>
                <span id="cat" data-category="{{word}}" class="hide"></span>
                <div id="load"></div>
                <a id="next" href="{{url('post/infinity-search')}}"></a>
            <?php else:?>
                <h2>No se han encontrado resultados</h2>
                <div class="search_form">
                    <form action="/buscar" method="GET">
                        <input type="text" placeholder="Buscar" class="form-control" required="" name="palabra" value="<?=$word?>">
                        <input type="submit" value="Buscar" class="btn_orange btn-lared">
                    </form>
                </div>
            <?php endif;?>
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
                    <img src="{{url('front/images/slider/'~advertising[6]['image'])}}"  height="600" alt="">
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
                    <img  src="{{url('front/images/slider/'~advertising[8]['image'])}}"  height="600" alt="">
                </a>
            </div>
        </div>
        <!--/ sidebar -->
    </div>
    <!--/ middle -->
</div>
<!--/ container -->