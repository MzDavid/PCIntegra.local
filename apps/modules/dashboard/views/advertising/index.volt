<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Inicio</a></li>
    <li class="active"><a href="#">Publicidad</a></li>
</ul>
<!-- PAGE TITLE -->
<div class="page-title">
    <h2><a href="{{url('dashboard')}}"><span class="fa fa-arrow-circle-o-left"></span></a> Salir</h2>
</div>
<?php
    $url = array();
    if($status==1){
        foreach($find as $key=>$values){
            $url[$values->getOrderAdv()] =$values->getUrl();
        }
    }
?>
<!-- END BREADCRUMB -->
<div class="page-content-wrap" id="advertising">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-title">Publicidad</h4>
            <div class="col-md-12 col-xs-12 panel-body form-group-separated">
                <form action="#" method="post" id="headerForm" name="header" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Header</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="header" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 108px;"></i>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="image-header.png" name="image-1" id="image-1" >
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <input type="text" name="url" value="<?= !empty($url[1])?$url[1]:"";?>" class="form-control" placeholder="url sitio web ejemplo : http://deportesenred.com.mx">
                            <br>
                            <span><strong>Tamaño de imagen "960x128"px</strong></span>
                            <br>
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                            <input type="hidden" name="order" id="order" value="1">
                            <input type="hidden" name="ubication" id="ubication" value="ALL">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
                <form action="#" method="post" id="form2" name="form2" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Publicidad 2 Inicio</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="advertising2" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 108px;"></i>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="image-2.png" name="image-1" id="image-2" >
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <input type="text" name="url" value="<?= !empty($url[2])?$url[2]:"";?>" class="form-control" placeholder="url sitio web ejemplo : http://deportesenred.com.mx">
                            <br>
                            <span><strong>Tamaño de imagen "450x350"px</strong></span>
                            <br>
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                            <input type="hidden" name="order" id="order2" value="2">
                            <input type="hidden" name="ubication" id="ubication2" value="HOME">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
                <form action="#" method="post" id="form3" name="form3" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Publicidad 3 Inicio</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="advertising3" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 108px;"></i>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="image-3.png" name="image-1" id="image-3" >
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <input type="text" name="url" value="<?= !empty($url[3])?$url[3]:"";?>" class="form-control" placeholder="url sitio web ejemplo : http://deportesenred.com.mx">
                            <br>
                            <span><strong>Tamaño de imagen "300x350"px</strong></span>
                            <br>
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                            <input type="hidden" name="order" id="order3" value="3">
                            <input type="hidden" name="ubication" id="ubication3" value="HOME">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
                <form action="#" method="post" id="form4" name="form4" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Publicidad 4 <br>Todas las páginas</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="advertising4" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 108px;"></i>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="image-4.png" name="image-1" id="image-4" >
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <input type="text" name="url" value="<?= !empty($url[4])?$url[4]:"";?>" class="form-control" placeholder="url sitio web ejemplo : http://deportesenred.com.mx">
                            <br>
                            <span><strong>Tamaño de imagen "300x350"px</strong></span>
                            <br>
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                            <input type="hidden" name="order" id="order4" value="4">
                            <input type="hidden" name="ubication" id="ubication4" value="ALL">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
                <form action="#" method="post" id="form5" name="form5" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Publicidad 5 <br>En todas las páginas</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="advertising5" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 108px;"></i>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="image-5.png" name="image-1" id="image-5" >
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <input type="text" name="url" value="<?= !empty($url[5])?$url[5]:"";?>" class="form-control" placeholder="url sitio web ejemplo : http://deportesenred.com.mx">
                            <br>
                            <span><strong>Tamaño de imagen "300x350"px</strong></span>
                            <br>
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                            <input type="hidden" name="order" id="order5" value="5">
                            <input type="hidden" name="ubication" id="ubication5" value="ALL">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
                <form action="#" method="post" id="form6" name="form6" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Publicidad 6 <br>En todas las paginas</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="advertising6" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 108px;"></i>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="image-6.png" name="image-1" id="image-6" >
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <input type="text" name="url" value="<?= !empty($url[6])?$url[6]:"";?>" class="form-control" placeholder="url sitio web ejemplo : http://deportesenred.com.mx">
                            <br>
                            <span><strong>Tamaño de imagen "300x600"px</strong></span>
                            <br>
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                            <input type="hidden" name="order" id="order6" value="6">
                            <input type="hidden" name="ubication" id="ubication6" value="ALL">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
                <form action="#" method="post" id="form7" name="form7" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Publicidad 7 <br> En todas las páginas</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="advertising7" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 108px;"></i>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="image-7.png" name="image-1" id="image-7" >
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <input type="text" name="url" value="<?= !empty($url[7])?$url[7]:"";?>" class="form-control" placeholder="url sitio web ejemplo : http://deportesenred.com.mx">
                            <br>
                            <span><strong>Tamaño de imagen "960x150"px</strong></span>
                            <br>
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                            <input type="hidden" name="order" id="order7" value="7">
                            <input type="hidden" name="ubication" id="ubication7" value="ALL">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
                <form action="#" method="post" id="form8" name="form8" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Publicidad 8 <br>Solo en secciones</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="advertising8" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 108px;"></i>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="image-8.png" name="image-1" id="image-8" >
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <input type="text" name="url" value="<?= !empty($url[8])?$url[8]:"";?>" class="form-control" placeholder="url sitio web ejemplo : http://deportesenred.com.mx">
                            <br>
                            <span><strong>Tamaño de imagen "300x600"px</strong></span>
                            <br>
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                            <input type="hidden" name="order" id="order8" value="8">
                            <input type="hidden" name="ubication" id="ubication8" value="SECTIONS">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
                <form action="#" method="post" id="form9" name="form9" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Publicidad 9 <br>Solo en secciones</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="advertising9" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 108px;"></i>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="image-9.png" name="image-1" id="image-9" >
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <input type="text" name="url" value="<?= !empty($url[9])?$url[9]:"";?>" class="form-control" placeholder="url sitio web ejemplo : http://deportesenred.com.mx">
                            <br>
                            <span><strong>Tamaño de imagen "300x350"px</strong></span>
                            <br>
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                            <input type="hidden" name="order" id="order9" value="9">
                            <input type="hidden" name="ubication" id="ubication9" value="SECTIONS">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
                <form action="#" method="post" id="form10" name="form10" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Publicidad 10 <br>Solo en secciones</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="advertising10" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 108px;"></i>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="image-10.png" name="image-1" id="image-10" >
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <input type="text" name="url" value="<?= !empty($url[10])?$url[10]:"";?>" class="form-control" placeholder="url sitio web ejemplo : http://deportesenred.com.mx">
                            <br>
                            <span><strong>Tamaño de imagen "300x350"px</strong></span>
                            <br>
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                            <input type="hidden" name="order" id="order10" value="10">
                            <input type="hidden" name="ubication" id="ubication10" value="SECTIONS">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
                <form action="#" method="post" id="video" name="video" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Vídeos 1 y 2</label>
                        <div class="col-md-7 col-xs-12">
                        <?php $count=1; foreach($video as $key =>$values):?>
                                <div class="col-sm-12">
                                    <input type="text" name="video<?=$count;?>" id="video<?=$count;?>" class="form-control" placeholder="Añade la Url del vídeo" value="<?=$values?>">
                                </div>
                        <?php $count++; endforeach;?>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <input type="submit" class="btn btn-success" value="Guardar" />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- info -->
<div class="message-box message-box-info animated fadeIn" id="message-box-info">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"> Actualizando &nbsp; <i class="fa fa-circle-o-notch fa-spin style-fa"></i></div>
            <div class="mb-content">
                <p>Guardando y Actualizando su información, espere un momento por favor.</p>
            </div>
        </div>
    </div>
</div>
<!-- end info -->
<!-- success -->
<div class="message-box message-box-success animated fadeIn" id="message-box-success">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-check"></span> Información actualizada</div>
            <div class="mb-content">
                <p>Sus cambios han sido guardados correctamente, actualizaremos el sitio para reflejar los cambios.</p>
            </div>
        </div>
    </div>
</div>
<!-- end success -->
<!-- warning -->
<div class="message-box message-box-warning animated fadeIn" id="message-box-warning">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-warning"></span> Error</div>
            <div class="mb-content">
                <p>Ha ocurrido un error al guardar su información, inténtelo nuevamente o regrese mas tarde.</p>
            </div>
            <div class="mb-footer">
                <button class="btn btn-default btn-lg pull-right mb-control-close">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- end danger -->
<div class="message-box message-box-danger animated fadeIn" id="message-box-danger">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Cuidado</div>
            <div class="mb-content">
                <p>Usted no puede actualizar su imagen.</p>
            </div>
            <div class="mb-footer">
                <button class="btn btn-default btn-lg pull-right mb-control-close">Cerrar</button>
            </div>
        </div>
    </div>
</div>