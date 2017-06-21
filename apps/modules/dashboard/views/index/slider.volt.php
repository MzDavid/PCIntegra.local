<ul class="breadcrumb">
    <li><a href="<?= $this->url->get('dashboard') ?>">Inicio</a></li>
    <li class="active">Slider</li>
</ul>
<div class="page-title">
    <div class="col-sm-12 text-right">
        <a href="#" id="add" class="btn btn-success btn-lg">Nuevo Slider</a>
    </div>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de sliders</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="allomentTable" class="table table-hover table-actions table-bordered generalDTE" data-order="0" data-filter="desc">
                            <thead>
                            <tr>
                                <th>Posición</th>
                                <th>Imagen</th>
                                <th>Estatus</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($sliders as $v):?>
                                <tr class="<?=$v->getSlid()?>">
                                    <td><?=$v->getOrderSlider()?></td>
                                    <td><img src="<?=$this->url->get('api/images/slider/thumbnail/'.$v->getImage())?>" class="img-responsive" alt=""></td>
                                    <td>
                                        <button class="btn btn-<?=$v->getStatus()=='ACTIVO'?'info':'danger'?>"><?=$v->getStatus()?></button>
                                    </td>
                                    <td>
                                        <a data-id="<?=$v->getSlid()?>" data-status="<?=$v->getStatus()?>" data-order="<?=$v->getOrderSlider()?>" data-title="<?=$v->getTitle()?>" data-subtitle="<?=$v->getSubtitle()?>" title="Editar slider" href="#" class="editRow btn btn-success btn-rounded btn-sm btn-edit"><span class="fa fa-edit btn-options"></span></a>
                                        <a data-id="<?=$v->getSlid()?>" title="Remover slider" href="#" class="deleteRow btn btn-warning btn-rounded btn-sm"><span class="fa fa-remove btn-options"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Eliminar <strong>Datos</strong> ?</div>
            <div class="mb-content">
                <p>¿Estas seguro de eliminar esta fila?</p>
                <p>Presione "Si" si esta seguro.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <button class="btn btn-success btn-lg mb-control-yes">Si</button>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modalSt">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" class="form-horizontal" id="formSave">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar nuevo slider</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="type" value="1">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="number" min="1" max="10" maxlength="10" class="form-control" name="order_slider" id="order_slider" placeholder="Posición del slider" required>
                        </div>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control" data-placeholder="Estatus del slider" required>
                                <option value="ACTIVO" selected>ACTIVO</option>
                                <option value="INACTIVO">INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group pointer">
                        <div class="col-sm-12 pointer">
                            <div class="dropzone_file dz-default dz-message slider" style="border: 1px solid;padding: 10px;">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 70px;display: block;"></i>
                                        Arrastra la imagen<br><i style="font-size: 11px;">o haz click para seleccionar manualmente</i>
                                        <input type="hidden" value="" name="image" id="image"  required>
                                    </h2>
                                </div>
                            </div>
                            <p><i>Las dimensiones de la imagen son (1662x1090)px</i></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" maxlength="12" class="form-control" name="title" id="title" placeholder="Titulo">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" maxlength="80" class="form-control" name="subtitle" id="subtitle" placeholder="Subtitulo">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modalE">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" class="form-horizontal" id="formEdit">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Registro</h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="hidden" name="type" value="2">
                            <input type="hidden" name="slid" id="slid" value="">
                            <input type="number" min="1" max="10" maxlength="10" class="form-control" name="order_slider" id="order_slider_edit" placeholder="Posición del slider" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" style="margin-bottom: 15px;">
                            <select name="status" id="status_edit" class="form-control" data-placeholder="Estatus del slider" required>
                                <option value="ACTIVO" selected>ACTIVO</option>
                                <option value="INACTIVO">INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" maxlength="12" class="form-control" name="title" id="title-edit" placeholder="Titulo" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" maxlength="80" class="form-control" name="subtitle" id="subtitle-edit" placeholder="Subtitle" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>