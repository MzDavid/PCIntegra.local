<div id="pageHeader" class="encabezado pd--80-0">
    <div class="container">
        <div class="page-header--title pull-left">
            <h1 class="h1">Contacto</h1> </div>
        <div class="page-header--breadcrumb pull-right">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li class="active">Contacto</li>
            </ul>
        </div>
    </div>
</div>
<div id="contact">
    <div class="contact--info pd--100-0-40">
        <div class="container">
            <div class="row">
                <div class="contact--info-item col-md-3 col-xs-6">
                    <h2 class="h3">Dirección :</h2>

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Cd. Del Carmen, Campeche</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">Calle 48 num 6B entre 31A y 31B Col. Aviación.</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Cancún, Quintana Roo</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">Calle Atlixco #11 Fracc. Costa Azul II M-55 L3 C.P. 77539</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Playa del Carmen, Quintana Roo</a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">Av. Gorriones #83 Reg. 043 Smz 001 M-1 L-5 Fracc. Villas del Sol I C.P. 77724</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact--info-item col-md-3 col-xs-6">
                    <h2 class="h3">Teléfono :</h2>
                    <div class="panel-group" id="accordion2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse12">Cd. Del Carmen, Campeche</a>
                                </h4>
                            </div>
                            <div id="collapse12" class="panel-collapse collapse in">
                                <div class="panel-body">Tel. 938 38 14581<br> Cel. 938 133 6343</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse22">Cancún, Quintana Roo</a>
                                </h4>
                            </div>
                            <div id="collapse22" class="panel-collapse collapse">
                                <div class="panel-body">998-31396</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse32">Playa del Carmen, Quintana Roo</a>
                                </h4>
                            </div>
                            <div id="collapse32" class="panel-collapse collapse">
                                <div class="panel-body">Av. Gorriones #83 Reg. 043 Smz 001 M-1 L-5 Fracc. Villas del Sol I C.P. 77724</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact--info-item col-md-3 col-xs-6">
                    <h2 class="h3">E-mail :</h2>
                    <p>ventas@pcintegra.com.mx
                    </p>
                </div>
                <div class="contact--info-item col-md-3 col-xs-6">
                    <h2 class="h3">Horarios de Oficina:</h2>
                    <p>09:00 am to 05.30 pm</p>
                    <p><span>(Domingo Cerrado)</span></p>
                </div>
            </div>
        </div>
    </div>
    <div id="map_wrapper">
        <div id="map_canvas" class="mapping"></div>
    </div>
    <div class="contact--form">
        <div class="contact--form-wrapper">
            <div class="container">
                <form action="#" method="post" id="contactForm" name="contactForm">
                    <div class="section--title text-center">
                        <h2 class="h2">Contáctanos</h2> </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="contact--form-status"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contactName">Nombre *</label>
                                        <input type="text" name="contactName" id="contactName" class="form-control" required> </div>
                                    <div class="form-group">
                                        <label for="contactEmail">Email *</label>
                                        <input type="email" name="contactEmail" id="contactEmail" class="form-control" required> </div>
                                    <div class="form-group">
                                        <label for="contactSubject">Teléfono *</label>
                                        <input type="number" name="contactSubject" id="contactSubject" class="form-control" required> </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contactMessage">Mensaje *</label>
                                        <textarea name="contactMessage" id="contactMessage" class="form-control" required></textarea>
                                    </div>
                                    <div id="form-success" class="alert alert-success hidden" role="alert">El mensaje se ha enviado correctamente</div>
                                    <div id="form-warning" class="alert alert-warning hidden" role="alert">Ha ocurrido un error, intente nuevamente por favor</div>
                                    <button type="submit" class="btn btn-default" id="sendM" data-loading-text="Por favor espera...">Enviar Mensaje</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--div id="map" data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="16" data-map-marker="[[23.790546, 90.375583]]"></div-->

