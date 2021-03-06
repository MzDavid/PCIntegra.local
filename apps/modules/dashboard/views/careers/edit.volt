<ul class="breadcrumb">
    <li><a href="{{url('dashboard')}}">Inicio</a></li>
    <li><a href="{{url('dashboard/careers/index')}}">Careras</a></li>
    <li class="active"><a href="#">Editar carrera</a></li>
</ul>
<div class="page-title">
    <h2><a href="{{url('dashboard/careers')}}"><span class="fa fa-arrow-circle-o-left"></span></a>  Salir</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-title">Editando carrera</h4>
            <div class="col-md-12 col-xs-12 panel-body form-group-separated">
                <form action="#" method="post" id="updateCareer" name="updateCareer" role="form" class="form-horizontal">
                    <input type="hidden" value="{{note.getCrid()}}" id="crid" name="crid"/>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Titulo</label>
                        <div class="col-md-8 col-xs-12">
                            <?php $new_title = str_replace('\'', '"', $note->getName());?>
                            <input id="note-title" type="text" class="form-control" placeholder="Titulo" name="title" value='{{new_title}}' readonly/>
                            <i id="input-loader" class="fa fa-spinner fa-spin fade in hide"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Enlace o Permalink</label>
                        <div class="col-md-8 col-xs-12">
                            <input id="note-permalink" type="text" class="form-control" placeholder="Enlace o Permalink" name="permalink" value="{{note.getPermalink()}}" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Información</label>
                        <div class="col-md-8 col-xs-12">
                            <div class="block">
                                <textarea class="summercareers" name="information" cols="30" rows="10">{{note.getInformation()}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Preguntas Frecuentes</label>
                        <div class="col-md-8 col-xs-12">
                            <div class="block">
                                <textarea class="summercareers2" name="question" cols="30" rows="10">{{note.getQuestion()}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Plan de Estudio (PDF)</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="sendMailPersonal" class="dropzone-personalized dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <div class="alert alert-info" style="cursor: pointer;width: 50%;float: left;">
                                        <i class="fa fa-files-o" style=""></i>&nbsp;Clic para subir archivo
                                        <input type="hidden" value="<?=$note->getPlan()?$note->getPlan():'icon.png'?>" id="files" name="files">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <span>Máximo 1 archivo y no mayor a 15 MB</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Video</label>
                        <div class="col-md-8 col-xs-12">
                            <input id="video" type="text" class="form-control" placeholder="URL de Video" name="video" value="{{note.getVideo()}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                        </div>
                    </div>
                </form>
            </div>
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
                <p>Sus cambios han sido guardados correctamente</p>
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