<ul class="breadcrumb">
    <li><a href="<?= $this->url->get('') ?>">Inicio</a></li>
    <li class="active">Video</li>
</ul>
<span class="hide" id="key-security" data-key="<?php echo $this->security->getToken(); ?>"></span>
<span class="hide" id="value-security" data-value="<?php echo $this->security->getTokenKey(); ?>"></span>
<div class="page-title">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <h2><a href="<?= $this->url->get('dashboard') ?>"><span class="fa fa-arrow-circle-o-left"></span></a> Menú principal</h2>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <h2 style="float: none" class="text-right"><a data-toggle="modal" data-target="#newvideo" href="#"><span class="fa fa-plus"></span> Nueva Video</a></h2>
    </div>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Videos</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="tableOpinion" class="table table-bordered table-striped table-actions">
                            <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Estatus</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($videos as $values) { ?>
                            <tr id="<?= $values->getVdid() ?>">
                                <td class="nameCategory"><img src="<?=$this->url->get('http://img.youtube.com/vi/'.$values->getUrl().'/0.jpg')?>" class="img-responsive" alt=""></td>
                                <td class="nameTitle"><?= $values->getStatus() ?></td>
                                <td class="optionsCtg">
                                    <a href="#" data-opid="<?= $values->getVdid() ?>" data-namec="<?= $values->getUrl() ?>" data-titlec="<?= $values->getStatus() ?>" class="btn btn-default btn-rounded btn-sm btn-edit"><span class="fa fa-pencil"></span></a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--MODALS-->
<div class="modal" id="newvideo" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="defModalHead">Nuevo Video</h4>
            </div>
            <form id="newVideo" action="#" method="post" rol="form" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-play-circle"></span></span>
                                <input id="nameCtg" type="text" class="form-control cPL" placeholder="Nombre" name="name_category" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-play-circle"></span></span>
                                <select id="genero" name="genero" class="form-control cPL" placeholder="Estado"  required>
                                    <option value="ACTIVE">Activo</option>
                                    <option  value="INACTIVE">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group fade hide" id="container-messages">
                        <div class="alert alert-warning fade hide" role="alert" id="email-incorrect">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
                            <strong>Email incorrecto.</strong>
                        </div>
                        <div class="alert alert-warning fade hide" role="alert" id="password-incorrect">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <strong>Contraseña incorrecta.</strong>
                        </div>
                        <div class="alert alert-warning fade hide" role="alert" id="all-incorrect">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <strong>Email o contraseña incorrecto</strong>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-submit" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-info btn-submit" value="Guardar">
                    <!--Messages-->
                    <i id="session-loading" class="fa fa-spinner fa-spin fade hide" style="font-size: 22px;"></i>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODALS-->
<div class="modal" id="edit_video" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="defModalHead">Editar Video</h4>
            </div>
            <form id="editVideo" action="#" method="post" rol="form" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-play-circle"></span></span>
                                <input id="nameCtg" type="text" class="form-control cPL" placeholder="Url Video" name="name_category" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-play-circle"></span></span>
                                <select id="genero" name="genero" class="form-control cPL" placeholder="Estado"  required>
                                    <option value="ACTIVE">Activo</option>
                                    <option  value="INACTIVE">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group fade hide" id="container-messages">
                        <div class="alert alert-warning fade hide" role="alert" id="email-incorrect">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
                            <strong>Email incorrecto.</strong>
                        </div>
                        <div class="alert alert-warning fade hide" role="alert" id="password-incorrect">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <strong>Contraseña incorrecta.</strong>
                        </div>
                        <div class="alert alert-warning fade hide" role="alert" id="all-incorrect">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <strong>Email o contraseña incorrecto</strong>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-submit" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-info btn-submit" value="Guardar">
                    <!--Messages-->
                    <i id="session-loading" class="fa fa-spinner fa-spin fade hide" style="font-size: 22px;"></i>
                </div>
            </form>
        </div>
    </div>
</div>
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