<div id="pageHeader" class="encabezado pd--80-0">
    <div class="container">
        <div class="page-header--title pull-left">
            <h1 class="h1">Servicios</h1> </div>
        <div class="page-header--breadcrumb pull-right">
            <ul class="breadcrumb">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li class="active">Servicios</li>
            </ul>
        </div>
    </div>
</div>
<div id="pageWrapper" class="pd--100-0-40">
    <div class="container">
        <div class="row">
            <div class="page--sidebar col-md-3">
                <div class="widget">
                    <div class="nav--widget">
                        <ul>
                            <?php $count = 1; foreach($oferta as $key => $servicios):?>
                            <li class="<?=$count==1?"active":"";?>"><a href="#serviceDetailsTab<?=$key;?>" data-toggle="tab"><?=$servicios->name; ?></a></li>
                            <?php $count++;  endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page--content clearfix col-md-9">
                <div class="tab-content">
                    <?php $count = 1; foreach($oferta as $key => $servicios):?>
                    <div class="tab-pane fade in <?=$count==1?"active":"";?>" id="serviceDetailsTab<?=$key;?>">
                        <?=$servicios->question; ?>
                        <br>
                        <?php if ($servicios->video):?>
                        <iframe  width="100%" height="500"  src="http://www.youtube.com/embed/<?=$servicios->video;?>" frameborder="0" >
                        </iframe>
                        <?php endif;?>
                    </div>
                    <?php $count++;  endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>