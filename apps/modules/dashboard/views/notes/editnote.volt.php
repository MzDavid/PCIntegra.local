<ul class="breadcrumb">
    <li><a href="<?= $this->url->get('dashboard') ?>">Inicio</a></li>
    <li><a href="<?= $this->url->get('dashboard/notes') ?>">Notas</a></li>
    <li class="active"><a href="#">Editar nota</a></li>
</ul>
<div class="page-title">
    <h2><a href="<?= $this->url->get('dashboard/notes') ?>"><span class="fa fa-arrow-circle-o-left"></span></a>  Salir</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-title">Editando nota</h4>
            <div class="col-md-12 col-xs-12 panel-body form-group-separated">
                <form action="#" method="post" id="updateNote" name="updateNote" role="form" class="form-horizontal">
                    <span class="hide" id="key-security" data-key="<?php echo $this->security->getToken(); ?>"></span>
                    <span class="hide" id="value-security" data-value="<?php echo $this->security->getTokenKey(); ?>"></span>
                    <input type="hidden" value="<?= $note->getPid() ?>" name="pid"/>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Titulo</label>
                        <div class="col-md-8 col-xs-12">
                            <?php $new_title = str_replace('\'', '"', $note->getTitle());?>
                            <input id="note-title" type="text" class="form-control" placeholder="Titulo" name="title" value='<?= $new_title ?>' required/>
                            <i id="input-loader" class="fa fa-spinner fa-spin fade in hide"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Enlace o Permalink</label>
                        <div class="col-md-8 col-xs-12">
                            <input id="note-permalink" type="text" class="form-control" placeholder="Enlace o Permalink" name="permalink" value="<?= $note->getPermalink() ?>" required readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Imagen</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="dropzone-note-edit" class="dropzone dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <h2>
                                        <i class="fa fa-cloud-upload" style="font-size: 62px;"></i><br/>
                                        Arrastra una imagen <br><i style="font-size: 14px;">o haz clic para seleccionar manualmente</i>
                                        <input type="hidden" value="<?= $note->getImage() ?>" name="image" id="input-image-principal" >
                                    </h2>
                                </div>
                            </div>
                            <br/>
                            <input type="text" class="form-control" value="<?= $note->getDescriptionImage() ?>" id="descriptionI" name="descriptionI" placeholder="Descripción de la imagen"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Sumario</label>
                        <div class="col-md-8 col-xs-12">
                            <textarea class="form-control" name="summary" id="" cols="10" rows="5"><?= $note->getSummary() ?></textarea>
                            <p>Introduzca un texto de introducción para la nota.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Contenido</label>
                        <div class="col-md-8 col-xs-12">
                            <div class="block">
                                <textarea class="summernote" name="summernote" cols="30" rows="10"><?= $note->getContent() ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="clearfix"></div>
                        <label class="col-md-2 col-xs-12 control-label">Fecha de publicación</label>
                        <div class="col-md-4 col-sm-6 col-xs-12 date" id="dateTop">
                            <?php
                                $dateC= $note->getDatePublic();
                                $newDate = date("d/m/Y", strtotime($dateC));
                            ?>
                            <input type="text" class="form-control" id="datepicker" name="dateP" value="<?= $newDate ?>">
                            <div id="element"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Estatus</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select id="status" name="status" class="form-control" required>
                                <option <?php echo $note->getStatus()=="ERASER"?"selected":""; ?> value="ERASER">Borrador</option>
                                <option <?php echo $note->getStatus()=="PUBLIC"?"selected":""; ?> value="PUBLIC">Publico</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Tipo de Nota</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select id="typeNote" name="type" class="form-control" required>
                                <option <?php echo $note->getType()=="OWN"?"selected":""; ?> value="OWN">Propia</option>
                                <option <?php echo $note->getType()=="DRAFTING"?"selected":""; ?> value="DRAFTING">Redacción</option>
                                <option <?php echo $note->getType()=="AGENCY"?"selected":""; ?> value="AGENCY">Agencia</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Categoría</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select id="cid" name="category" class="form-control" required multiple>
                                <?php foreach ($category as $key => $sub):?>
                                    <?php if($key!=5):?>
                                        <option <?php echo $categoryVal==$key?"selected":""?> value="<?php echo $key?>"><?= $sub ?></option>
                                    <?php endif ?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Subcategoria</label>
                        <div class="col-md-4 col-sm-6 col-xs-12" id="select-scid">
                            <select id="scid" name="subcategory" class="form-control" required multiple>
                                <?php foreach ($subcategory as $key => $sub):?>
                                        <?php foreach($subcategory[$key] as $k => $newValue): ?>
                                            <?php if($k==$categoryVal):?>
                                                <option class='options' value="<?php echo $key ?>" <?php echo $note->getScid()==$key?"selected":""?>><?php echo $newValue;?></option>
                                            <?php endif?>
                                        <?php endforeach;?>
                                <?php endforeach;?>
                            </select>
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