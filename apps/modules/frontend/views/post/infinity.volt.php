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
                    <a href="/<?php echo strtolower($category)?>" hidefocus="true" style="outline: none;"><?php echo $value->getNameCategory(); ?>                    </a>
                    <span class="separator">|</span>Publicado: <?php echo $newDate[0] . ' de ' . ' ' . $date[$newDate[1]] . ' del ' . $newDate[2]; ?>
                </div>
                <div class="post-descr">
                    <p><?php echo $value->getSummary(); ?></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    <?php endforeach?>
</div>