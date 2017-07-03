$("#owl-demo").owlCarousel({
    pagination : false,
});

var form = $("#contactForm");
if(form.length>=1){
    form.formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        locale: 'es_ES',
        excluded: ':disabled',
        fields: {
            contactName: {
                validators: {
                    notEmpty: {
                        message: 'Es necesario un nombre y este no puede estar vacío'
                    }
                }
            },
            contactEmail: {
                validators: {
                    notEmpty: {
                        message: 'Es necesaria la dirección de correo electrónico y esta no puede estar vacía'
                    },
                    emailAddress: {
                        message: 'Este campo no contiene una dirección de correo electrónico válida.'
                    }
                }
            },
            contactSubject: {
                validators: {
                    notEmpty: {
                        message: 'El asunto es necesario y no puede estar vacío.'
                    }
                }
            },
            contactMessage: {
                validators: {
                    notEmpty: {
                        message: 'El mensaje es necesario y no puede estar vacío.'
                    }
                }
            }
        }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        var send = $("#sendM");
        var message = send.attr("data-loading-text");
        send.text(message).attr("disabled",true);
        $.ajax({
            type : "POST",
            url : "/index/sendmessagecontact",
            data : $(this).serialize(),
            dataType : "json",
            success : function(response){
                if(response.code==200){
                    send.text("Enviar mensaje").attr("disabled",false);
                    resetForm(form);
                    form.formValidation('resetForm', true);
                    $("#form-success").removeClass("hidden");
                }else{
                    $("#form-warning").removeClass("hidden");
                    send.text("Intentar nuevamente").attr("disabled",false);
                }
            },
            error : function(){

            },complete:function(){
                setTimeout(function(){
                    $("#form-success").addClass("hidden");
                    $("#form-warning").addClass("hidden");
                },2000);
            }
        });
    });
}