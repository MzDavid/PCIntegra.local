<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo $this->url->get(''); ?>">Inicio</a></li>
    <li class="active">Notas mas visitadas</li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE TITLE -->
<div class="page-title">
    <h2><a href="<?php echo $this->url->get('dashboard'); ?>"><span class="fa fa-arrow-circle-o-left"></span></a> Menú principal</h2>
</div>
<!-- END PAGE TITLE -->
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
         <!-- START DEFAULT DATATABLE -->
             <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Notas</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-actions datatable">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Categoría</th>
                                    <th>Subcategoria</th>
                                    <th>Fecha creación</th>
                                    <th>Visitas</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($notes as $values) { ?>
                                <?php
                                    $dateC= $values->getDateCreation();
                                    $newDate = date("d-m-Y H:i:s", strtotime($dateC));
                                ?>
                                <tr id="<?php echo $values->getPid(); ?>">
                                    <td><?php echo $values->getTitle(); ?></td>
                                    <td><?php echo $values->getUsername(); ?></td>
                                    <td><?php echo $values->getNameCategory(); ?></td>
                                    <td><?php echo $values->getSubcategoryname(); ?></td>
                                    <td><?php echo $newDate; ?></td>
                                    <td>
                                      <?php echo $values->getVisits(); ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
         <!-- END DEFAULT DATATABLE -->
        </div>
    </div>
</div>
<!-- PAGE CONTENT WRAPPER -->
