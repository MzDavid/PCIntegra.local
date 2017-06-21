<style>.datepicker.dropdown-menu{
        opacity: 1!important;
    }</style>
<div class="container main-text">
        <div class="col-md-12">
            <h3>Registro</h3>
        </div>
    </div>
</header>
<div class="blog-1">
    <div class="container">
        <div class="col-md-12 welcome">
            <h2>Video</h2>
            <p>Algunos proyectos de la Licenciatura</p>
            <img src="/front/images/pencil.png" class="blog-pencil" alt="" />
            <img src="/front/images/eraser.png" class="blog-eraser" alt="" />
        </div>

        <div class="col-md-12 blog">
            <iframe  width="100%" height="500"  src="http://www.youtube.com/embed/bZExAz9LAOc?origin=http://example.com" frameborder="0" >
            </iframe>
        </div>

    </div>
</div>

<div class="checkout">
    <div class="container">
        <div class="col-md-12">
            <div class="heading-pricing">
                <h1>Registro en Linea</h1>
            </div>
        </div>

        <div class="col-md-12 bil-details">
            <form id="preinscripcion" action="" method="post" name="preinscripcion" rol="form" class="preinscripcion">
                <div class="col-md-6 bil-details">
                    <label>Carrera</label>
                    <select class="form-control" id="crid" name="crid" type="text">
                        <option value="0">- Por favor selecciona una carrera -</option>
                        <?php foreach ($carrer as $sub):?>
                            <option <?php echo $carrerselect==$sub->getCrid()?"selected":""?> value="<?php echo $sub->getCrid();?>"><?php echo $sub->getName();?></option>
                        <?php endforeach;?>
                    </select>
                    <label>Nombre(s)</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Ingresa tu Nombre">
                    <label>Apellidos</label>
                    <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Ingresa tu Apellido">
                    <label>Edad</label>
                    <input id="age" name="age" type="text" class="form-control" placeholder="Ingresa tu Edad">
                    <label>Sexo</label>
                    <br>
                    <label id="sex" class="radio-inline"><input type="radio" value="M" name="sex">Masculino</label>
                    <label class="radio-inline"><input type="radio" value="F" name="sex">Femenino</label>
                    <br>
                    <br>
                    <label>Fecha Nacimiento</label>
                    <!--input type='text' name="date" id="inputDate" class="form-control datepicker" required /-->

                    <input type="text" name="start_date" value="<?=date('d/m/Y')?>" id="start_date" class="form-control getDatepicker" placeholder="D/M/A">

                    <label>Calle y Número</label>
                    <input id="street" name="street" type="text" class="bottom-gap form-control" placeholder="Ingresa tu Calle y Número">

                </div>
                <div class="col-md-6 bil-details l-styles">
                    <label>Colonia</label>
                    <input id="colony" name="colony" type="text" class="form-control " placeholder="Ingresa tu Colonia">
                    <label>Ciudad</label>
                    <input id="city" name="city" type="text" class="form-control" placeholder="Ingreaa tu Ciudad">
                    <label>Municipio</label>
                    <input id="municipality" name="municipality" type="text" class="form-control" placeholder="Ingresa tu Municipio">
                    <label>Codigo Postal</label>
                    <input id="cp" name="cp" type="text" class="form-control" placeholder="Ingresa tu Codigo Postal">
                    <label>Correo Electronico</label>
                    <input id="email" name="email" type="text" class="form-control" placeholder="Ingresa tu Correo Electronico">
                    <label>Teléfono Móvil</label>
                    <input id="phone" name="phone" type="text" class="form-control" placeholder="Ingrese su Teléfono Móvil">
                </div>

                <div class="col-md-12 payment">
                    <div class="heading">Metodo de Pago</div>
                    <div class="form-group">
                        <div class="radio-block">
                            <label class="radio-inline">
                                <input type="radio" class="send-now" value="send-now" checked> <strong>TRANSFERENCIA BANCARIA DIRECTA</strong>
                            </label>
                            <div class="collapse send-now">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet convallis metus. Aenean rhoncus a nulla in venenatis. Sed eget ipsum nulla. Ut id turpis at ipsum sollicitudin consequat.</p>
                            </div>
                        </div>
                        <div class="radio-block">
                            <label class="radio-inline">
                                <input type="radio" class="fax" value="fax"> <strong>PAYPAL</strong><img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppppcmcvdam.png" alt="Pay with PayPal, PayPal Credit or any major credit card" />
                            </label>
                            <div class="collapse fax">
                                <p>Donec nisi nulla, commodo ut dictum sit amet, dictum tempus lacus. Pellentesque nec odio nisl. Donec tristique ipsum vel ante varius, ac gravida felis aliquam. Maecenas id sem eget ligula luctus sodales non quis diam.</p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="p-btn">Inscribirse</button>
                </div>
            </form>
        </div>
        <div class="modal fade in" id="background-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="content-fa">
                    <h3 class="message-background" id="wm">Preinscribiendo, espere un momento por favor.....</h3>
                    <h3 class="message-background hide" id="sc">Te esperamos en UMAEE para finalizar tu inscripción, ¡Gracias por su Preinscrición!</h3>
                    <h3 class="message-background hide" id="error-contact">Lo sentimos, ha ocurrido un error intente mas tarde.</h3>
                    <h1><i class="fa fa-circle-o-notch fa-spin style-fa"></i></h1>
                </div>
            </div>
        </div>
    </div>
</div>