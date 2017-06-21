<ul class="breadcrumb">
    <li><a href="{{url('')}}">Inicio</a></li>
    <li class="active">Opinión</li>
</ul>
<span class="hide" id="key-security" data-key="<?php echo $this->security->getToken(); ?>"></span>
<span class="hide" id="value-security" data-value="<?php echo $this->security->getTokenKey(); ?>"></span>
<div class="page-title">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <h2><a href="{{url('dashboard')}}"><span class="fa fa-arrow-circle-o-left"></span></a> Menú principal</h2>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <h2 style="float: none" class="text-right"><a data-toggle="modal" data-target="#newopinion" href="#"><span class="fa fa-plus"></span> Nueva opinión</a></h2>
    </div>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Opinión</h3>
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
                                <th>Nombre</th>
                                <th>Titulo</th>
                                <th>Opinion</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            {% for values in categories %}
                            <tr id="{{values.getOpid()}}">
                                <td class="nameCategory">{{values.getName()}}</td>
                                <td class="nameTitle">{{values.getTitle()}}</td>
                                <td class="nameOpinion">{{values.getOpinion()}}</td>
                                <td class="optionsCtg">
                                    <a href="#" data-opid="{{values.getOpid()}}" data-namec="{{values.getName()}}" data-titlec="{{values.getTitle()}}" data-opinionc="{{values.getOpinion()}}" data-imagec="{{values.getImage()}}" class="btn btn-default btn-rounded btn-sm btn-edit"><span class="fa fa-pencil"></span></a>
                                </td>
                            </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--MODALS-->
<div class="modal" id="newopinion" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="defModalHead">Nueva Opinión</h4>
            </div>
            <form id="newOpinion" action="#" method="post" rol="form" class="form-horizontal">
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
                                <input id="titleOpi" type="text" class="form-control cPL" placeholder="Titulo" name="titleCat" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-play-circle"></span></span>
                                <input id="opinionOpi" type="text" class="form-control cPL" placeholder="Opinion" name="opinionCat" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-play-circle"></span></span>
                                <select id="genero" name="genero" class="form-control cPL" placeholder="Genero"  required>
                                    <option value="hombre">Hombre</option>
                                    <option  value="mujer">Mujer</option>
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
<div class="modal" id="edit_opinion" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="defModalHead">Editar Opinión</h4>
            </div>
            <form id="editOpinion" action="#" method="post" rol="form" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-play-circle"></span></span>
                                <input id="nameCtg" type="text" class="form-control cPL" placeholder="Nombre categoría" name="name_category" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-play-circle"></span></span>
                                <input id="titleOpi" type="text" class="form-control cPL" placeholder="Titulo" name="titleCat" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-play-circle"></span></span>
                                <input id="opinionOpi" type="text" class="form-control cPL" placeholder="Opinion" name="opinionCat" required/>
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