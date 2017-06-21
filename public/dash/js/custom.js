$(document).ready(function(){
/* Session */
    if($("#session").length>=1){
        $('#session').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Es necesaria la dirección de correo electrónico y esta no puede estar vacía'
                        },
                        emailAddress: {
                            message: 'Este campo no contiene una dirección de correo electrónico válida.'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'La contraseña es necesaria y no puede estar vacía.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            var $this  = $("#session");
            e.preventDefault();
            $("#session-loading").removeClass("hide").addClass("in");
            $("#btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#container-messages").removeClass("hide").addClass("in");
            $.ajax({
                type : "POST",
                url : "/dashboard/login/session",
                data : $(this).serialize(),
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        window.location = response.url;
                    }else if(response.code==300){
                        $("#password-incorrect").removeClass("hide").addClass("in");
                    }else if(response.code==400){
                        $("#email-incorrect").removeClass("hide").addClass("in");
                    }
                    else if(response.code==404){
                        $("#all-incorrect").removeClass("hide").addClass("in");
                    }
                    $("#session-loading").removeClass("in").addClass("hide");
                    $("#btn-submit").removeAttr("disabled","disabled").val("Iniciar");
                },
                error : function(){

                },
                complete : function(){
                    setTimeout(function(){
                        $("#password-incorrect").removeClass("in").addClass("hide");
                        $("#email-incorrect").removeClass("in").addClass("hide");
                        $("#all-incorrect").removeClass("in").addClass("hide");
                        $("#container-messages").removeClass("in").addClass("hide");
                    },3000);
                }
            });
        });
    }
/* Personal Information */
    if($("#newUser").length>=1){
        $('#newUser').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'El Nombre es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 4,
                            max: 45,
                            message: 'El nombre debe ser mayor de 4 y menor de 45 caracteres de longitud.'
                        }
                    }
                },
                last_name: {
                    validators: {
                        notEmpty: {
                            message: 'El Apellido Paterno es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 4,
                            max: 45,
                            message: 'El Apellido Paterno debe ser mayor de 4 y menor de 45 caracteres de longitud.'
                        }
                    }
                },
                sex: {
                    validators: {
                        notEmpty: {
                            message: 'El Sexo es un campo necesario y no puede estar vacío.'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Su numero de telefono es necesario y no puede estar vacío.'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Es necesaria la dirección de correo electrónico y esta no puede estar vacía'
                        },
                        emailAddress: {
                            message: 'Este campo no contiene una dirección de correo electrónico válida.'
                        },
                        remote: {
                            message: 'Esta cuenta de correo electrónico ya existe, pruebe con otra',
                            url: 'validateemail',
                            data: {
                                type: 'email'
                            },
                            type: 'POST'
                        }
                    }
                },
                username: {
                    message: 'El nombre de usuario no es válido.',
                    validators: {
                        notEmpty: {
                            message: 'Se requiere el nombre de usuario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'El nombre de usuario debe ser mayor de 6 y menos de 30 caracteres de longitud.'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'El nombre de usuario sólo puede consistir en alfabético, número, puntos o subrayados.'
                        },
                        remote: {
                            message: 'Estae nombre de usuario ya existe, pruebe con otro',
                            url: 'validateusername',
                            data: {
                                type: 'username'
                            },
                            type: 'POST'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'El campo de contraseña no puede estar vacio'
                        },
                        stringLength: {
                            min: 8,
                            max: 30,
                            message: 'La contraseña debe tener como mínimo 8 caracteres.'
                        }
                    }
                },
                confirmPassword: {
                    validators: {
                        identical: {
                            field: 'password',
                            message: 'Las contraseñas no coinciden'
                        }
                    }
                },
                cargo: {
                    validators: {
                        notEmpty: {
                            message: 'El campo de Cargo es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 4,
                            max: 45,
                            message: 'El campo de Cargo debe ser mayor de 4 y menor de 45 caracteres de longitud.'
                        }
                    }
                },
                rol: {
                    validators: {
                        notEmpty: {
                            message: 'El usuario necesita tener un rol.'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'El usuario necesita tener un status.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
                uid:$('#uid').attr('data-uid')
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/user/saveuser",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            window.location = "/dashboard/users";
                        },3000);
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                    }
                },
                error : function(){
                }
            });
        });
    }
/* Personal Information */
    if($("#updateProfile").length>=1){
        $('#updateProfile').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'El Nombre es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 4,
                            max: 45,
                            message: 'El nombre debe ser mayor de 4 y menor de 45 caracteres de longitud.'
                        }
                    }
                },
                last_name: {
                    validators: {
                        notEmpty: {
                            message: 'El Apellido Paterno es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 4,
                            max: 45,
                            message: 'El Apellido Paterno debe ser mayor de 4 y menor de 45 caracteres de longitud.'
                        }
                    }
                },
                sex: {
                    validators: {
                        notEmpty: {
                            message: 'El Sexo es un campo necesario y no puede estar vacío.'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Su numero de telefono es necesario y no puede estar vacío.'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Es necesaria la dirección de correo electrónico y esta no puede estar vacía'
                        },
                        emailAddress: {
                            message: 'Este campo no contiene una dirección de correo electrónico válida.'
                        }
                    }
                },
                username: {
                    message: 'El nombre de usuario no es válido.',
                    validators: {
                        notEmpty: {
                            message: 'Se requiere el nombre de usuario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'El nombre de usuario debe ser mayor de 6 y menos de 30 caracteres de longitud.'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'El nombre de usuario sólo puede consistir en alfabético, número, puntos o subrayados.'
                        }
                    }
                },
                cargo: {
                    validators: {
                        notEmpty: {
                            message: 'El campo de Cargo es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 4,
                            max: 45,
                            message: 'El campo de Cargo debe ser mayor de 4 y menor de 45 caracteres de longitud.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
                uid:$('#uid').attr('data-uid')
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/user/updateuser",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            window.location = "profile";
                        },3000);
                    }else if(response.code==404){
                        $("#message-box-warning").toggleClass("open");
                    }
                },
                error : function(){
                }
            });
        });
    }
/* Change Password */
    if($("#updatePassword").length>=1){
        $('#updatePassword').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                confirmPassword: {
                    validators: {
                        identical: {
                            field: 'password',
                            message: 'Las contraseñas no coinciden'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
                uid:$('#uid').attr('data-uid')
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/user/updatepassword",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        setTimeout(function(){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-success").toggleClass("open");
                        },1500);
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                            $("#modal_basic").modal('hide');
                        },4000);
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                    }
                },
                error : function(){
                }
            });
        });
    }
/* Change User Upload Image*/
    if($("#dropzone-user-edit").length>=1){
        $("#save-image").click(function(e){
            $("#btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
                uid:$('#uid').attr('data-uid')
            };
            var data = $("form[name=dropzone-user-edit]").serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/user/updateuserimage",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        setTimeout(function(){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-success").toggleClass("open");
                        },1500);
                        setTimeout(function(){
                            window.location = "profile";
                        },4000);
                    }else if(response.message=="warning" && response.code==303){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-danger").toggleClass("open");
                    }else if(response.code==404){
                        $("#message-box-warning").toggleClass("open");
                    }
                },
                error : function(){
                }
            });
        })
    }
/* Change updateSocialMedia */
    if($("#updateSocialMedia").length>=1){
        $('#updateSocialMedia').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                facebook: {
                    validators: {
                        notEmpty: {
                            message: 'Su nombre de usuario en facebook es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 3,
                            max: 100,
                            message: 'Su nombre de usuario en facebook debe ser mayor de 3 caracteres de longitud.'
                        }
                    }
                },
                twitter: {
                    validators: {
                        notEmpty: {
                            message: 'Su nombre de usuario en facebook es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 3,
                            max: 45,
                            message: 'Su nombre de usuario en facebook debe ser mayor de 3 caracteres de longitud.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
                uid:$('#uid').attr('data-uid')
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/user/socialmedia",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        setTimeout(function(){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-success").toggleClass("open");
                        },1500);
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },4000);
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                    }
                },
                error : function(){
                }
            });
        });
    }
/* Personal Information */
    if($("#newNote").length>=1){
        function validateEditor() {
            // Revalidate the content when its value is changed by Summernote
            $('#summernoteForm').formValidation('revalidateField', 'content');
        }
        $('#newNote').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            message: 'El Titulo es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 10,
                            max: 100,
                            message: 'El titulo debe ser mayor de 10 y menor de 100 caracteres de longitud.'
                        }
                    }
                },
                permalink: {
                    validators: {
                        notEmpty: {
                            message: 'El Permalink o Url es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 10,
                            max: 100,
                            message: 'El Permalink o Url  debe ser mayor de 10 y menor de 100 caracteres de longitud.'
                        }
                    }
                },
                image_principal: {
                    validators: {
                        notEmpty: {
                            message: 'La imagen principal es campo necesario y no puede estar vacío.'
                        }
                    }
                },
                summary: {
                    validators: {
                        notEmpty: {
                            message: 'El sumario es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 10,
                            max: 100,
                            message: 'El sumario debe ser mayor de 10 y menor de 100 caracteres de longitud.'
                        }
                    }
                },
                descriptionI: {
                    validators: {
                        notEmpty: {
                            message: 'La descripción de la imagen es necesaria y no puede estar vacía.'
                        },
                        stringLength: {
                            min: 10,
                            max: 100,
                            message: 'La descripción debe ser mayor de 10 y menor de 100 caracteres de longitud.'
                        }
                    }
                },
                content: {
                    validators: {
                        callback: {
                            message: 'The content is required and cannot be empty',
                            callback: function(value, validator, $field) {
                                var code = $('[name="content"]').code();
                                // <p><br></p> is code generated by Summernote for empty content
                                return (code !== '' && code !== '<p><br></p>');
                            }
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'El status no puede estar vacio.'
                        }
                    }
                },
                category: {
                    validators: {
                        notEmpty: {
                            message: 'La categoria no puede estar vacio.'
                        }
                    }
                },
                subcategory: {
                    validators: {
                        notEmpty: {
                            message: 'La subcategory no puede estar vacio.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
                e.preventDefault();
                $("#btn-submit").attr("disabled","disabled").val("Iniciando");
                $("#message-box-info").toggleClass("open");
                var values = {
                    key: $('#key-security').attr('data-key'),
                    value: $('#value-security').attr('data-value'),
                    content:$('.summernote').code()
                };
                var data = $(this).serialize()+"&"+jQuery.param(values);
                $.ajax({
                    type : "POST",
                    url : "/dashboard/notes/savenote",
                    data : data,
                    dataType : "json",
                    success : function(response){
                        if(response.message=="SUCCESS" && response.code==200){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-success").toggleClass("open");
                            setTimeout(function(){
                                window.location = "/dashboard/notes";
                            },3000);
                        }else if(response.code==404){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-warning").toggleClass("open");
                        }
                    },
                    error : function(){
                        $("#message-box-info").removeClass("open");
                    }
                });
            });
        $("#cid").select2({
            maximumSelectionLength:1,
            placeholder: "Categoría"
        });
        $('#cid').on("select2:select", function(response) {
            var category = response.target.value;
            console.log(category);
            $.ajax({
                data : {category:category},
                url : "/dashboard/notes/category",
                type : "POST",
                dataType : "json",
                success:function(response){
                    if(response.code==200){
                        $("#select-scid").parent().removeClass("hide");
                        var sel = $("select[name='subcategory']");
                        for (value in response.result){
                            sel.append($("<option class='options'>").attr('value',value).text(response.result[value]));
                        }
                        $("#scid").select2({
                            maximumSelectionLength:1,
                            placeholder: "Selecciona la subcategoría"
                        }).focus();
                    }
                }
            });
        });
        $('#cid').on("select2:unselect",function(){
            $("#scid").select2('val',"");
            $('form[name="newNote"]').formValidation('revalidateField','subcategory');
            $("#select-scid #scid").find(".options").remove();
        });
    }
/* Update Note */
    if($("#updateNote").length>=1){
        function validateEditor() {
            // Revalidate the content when its value is changed by Summernote
            $('#summernoteForm').formValidation('revalidateField', 'content');
        }
        (function($){
            $.fn.datepicker.dates['es'] = {
                days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
                daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                today: "Hoy",
                clear: "Borrar",
                weekStart: 1,
                format: "dd/mm/yyyy"
            };
        }(jQuery));
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language : "es",
            autoclose:true
        })
        .on('changeDate', function(e) {
                // Revalidate the date field
                $('#newNote').formValidation('revalidateField', 'dateP');
            });
        $('#updateNote').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            message: 'El Titulo es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 10,
                            max: 100,
                            message: 'El titulo debe ser mayor de 10 y menor de 100 caracteres de longitud.'
                        }
                    }
                },
                permalink: {
                    validators: {
                        notEmpty: {
                            message: 'El Permalink o Url es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 10,
                            max: 100,
                            message: 'El Permalink o Url  debe ser mayor de 10 y menor de 100 caracteres de longitud.'
                        }
                    }
                },
                dateP: {
                    validators: {
                        notEmpty: {
                            message: 'La fecha es necesaría'
                        },
                        date: {
                            format: 'DD/MM/YYYY',
                            message: 'El formato de fecha introducido no es valido'
                        }
                    }
                },
                image_principal: {
                    validators: {
                        notEmpty: {
                            message: 'La imagen principal es campo necesario y no puede estar vacío.'
                        }
                    }
                },
                summary: {
                    validators: {
                        notEmpty: {
                            message: 'El sumario es necesario y no puede estar vacío.'
                        },
                        stringLength: {
                            min: 10,
                            max: 100,
                            message: 'El sumario debe ser mayor de 10 y menor de 100 caracteres de longitud.'
                        }
                    }
                },
                descriptionI: {
                    validators: {
                        notEmpty: {
                            message: 'La descripción de la imagen es necesaria y no puede estar vacía.'
                        },
                        stringLength: {
                            min: 10,
                            max: 100,
                            message: 'La descripción debe ser mayor de 10 y menor de 100 caracteres de longitud.'
                        }
                    }
                },
                content: {
                    validators: {
                        callback: {
                            message: 'The content is required and cannot be empty',
                            callback: function(value, validator, $field) {
                                var code = $('[name="content"]').code();
                                // <p><br></p> is code generated by Summernote for empty content
                                return (code !== '' && code !== '<p><br></p>');
                            }
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'El status no puede estar vacio.'
                        }
                    }
                },
                category: {
                    validators: {
                        notEmpty: {
                            message: 'La categoria no puede estar vacio.'
                        }
                    }
                },
                subcategory: {
                    validators: {
                        notEmpty: {
                            message: 'La subcategory no puede estar vacio.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
                e.preventDefault();
                $("#btn-submit").attr("disabled","disabled").val("Iniciando");
                $("#message-box-info").toggleClass("open");
                var values = {
                    key: $('#key-security').attr('data-key'),
                    value: $('#value-security').attr('data-value'),
                    content:$('.summernote').code()
                };
                var data = $(this).serialize()+"&"+jQuery.param(values);
                $.ajax({
                    type : "POST",
                    url : "updatenote",
                    data : data,
                    dataType : "json",
                    success : function(response){
                        if(response.message=="SUCCESS" && response.code==200){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-success").toggleClass("open");
                            setTimeout(function(){
                                $("#message-box-success").removeClass("open");
                            },3000);
                        }else if(response.code==404){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-warning").toggleClass("open");
                        }
                    },
                    error : function(){
                        $("#message-box-info").removeClass("open");
                    }
                });
            });
        $("#cid").select2({
            maximumSelectionLength:1,
            placeholder: "Categoría"
        });
        $("#scid").select2({
            maximumSelectionLength:1,
            placeholder: "Selecciona la subcategoría"
        }).focus();
        $('#cid').on("select2:select", function(response) {
            var category = response.target.value;
            $.ajax({
                data : {category:category},
                url : "/dashboard/notes/category",
                type : "POST",
                dataType : "json",
                success:function(response){
                    if(response.code==200){
                        $("#select-scid").parent().removeClass("hide");
                        var sel = $("select[name='subcategory']");
                        for (value in response.result){
                            sel.append($("<option class='options'>").attr('value',value).text(response.result[value]));
                        }
                        $("#scid").select2({
                            maximumSelectionLength:1,
                            placeholder: "Selecciona la subcategoría"
                        }).focus();
                    }
                }
            });
        });
        $('#cid').on("select2:unselect",function(){
            $("#scid").select2('val',"");
            $('form[name="updateNote"]').formValidation('revalidateField','subcategory');
            $("#select-scid #scid").find(".options").remove();
        });
    }
/* Validate title */
    if($("#note-title").length>=1){
        $("#note-title").change(function(){
            var $input_loader = $("#input-loader");
            $input_loader.removeClass("fade");
            var title_note = $(this).val();
            $.ajax({
                url : "/dashboard/notes/validateurl",
                type : "POST",
                data : {title:title_note,key: $('#key-security').attr('data-key'),value: $('#value-security').attr('data-value')},
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#note-permalink").val(response.new_url);
                        $('#newNote').formValidation('revalidateField', 'permalink');
                    }else{
                        $input_loader.addClass("hide");
                        alert("Ha ocurrido un error intente nuevamente.");
                    }
                },
                complete: function(){
                    $input_loader.addClass("hide");
                }
            });
        });
    }
/* Sections */
    if($("#principalNewForm").length>=1){
        getSection($("#ajax-post"),"Noticia importante",$("#category").data("value"),"principal","");
        $('form[name=principalNewForm]').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                principalNew: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
                type : "principal",
                pidLast : $("#pidLast").val(),
                cgid : $("#cgid").val()
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/sections/updatesection",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#pidLast").val(response.pid);
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },3000);
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }
                },
                error : function(){
                    $("#message-box-info").removeClass("open");
                }
            });
        });
    }
    if($(".SliderNewForm").length>=1){
        var category = $("#category").data("value");
        var pid = $("#ajax-post").val();
        getSection($("#ajax-post-slider-1"),"Nota principal Slider",category,"slider",pid);
        getSection($("#ajax-post-slider-2"),"Segunada nota Slider",category,"slider",pid);
        getSection($("#ajax-post-slider-3"),"Tercera nota Slider",category,"slider",pid);
        getSection($("#ajax-post-slider-4"),"Cuarta nota Slider",category,"slider",pid);
       /* $('form[name="SliderNewForm"]').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                "SliderNew[]": {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        },
                        different: {
                            field: 'SliderNew',
                            message: 'Este campo debe ser único, y se repite en otro campo'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
                type : "slider"
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "sections/updatesection",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $.each(response.pid,function($i,$value){
                            $("#pdi"+$i+"").val($value);
                        });
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },3000);
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }
                },
                error : function(){
                    $("#message-box-info").removeClass("open");
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                }
            });
        });*/
        $("#section-positions").tableDnD({
            onDragClass: "drag-drop",
            onDragStart: function(table, row) {
                start = row.id.split("/");
            },
            onDrop: function(table, row) {
                var idTr = row.id;
                orders = $.tableDnD.serialize();
                var rows = table.tBodies[0].rows;
                for (var i=0; i<rows.length; i++) {
                    result = i+1;
                    split = rows[i].id.split("/");
                    if(split[0]==start[0]){
                        SetOrderSections($("#"+idTr+"").data("post"),result,$("#cgid").val());
                        //SetOrder(split[0],$("#pnid").val(),result)
                    }
                }

            }
        });
    }
    if($("#homeNewForm").length>=1){
        getSection($("#ajax-post"),"Nota importante inicio","home","home","");
        $('form[name=principalNewForm]').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                principalNew: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
                type : "home",
                pidLast : $("#pidLast").val(),
                cgid : $("#cgid").val()
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "updatesection",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#pidLast").val(response.pid);
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },3000);
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }
                },
                error : function(){
                    $("#message-box-info").removeClass("open");
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                }
            });
        });
    }
/* Sections */






    /*  New Video */

    if($("#newVideo").length>=1){
        $('#newVideo').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name_category: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        }
                    }
                },
                genero: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $(".btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').data('key'),
                value: $('#value-security').data('value')
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/video/new",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#pidLast").val(response.pid);
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },3000);
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }
                },
                error : function(){
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                }
            });
        });
        $('#newvideo').on('shown.bs.modal', function() {
            $('#newVideo').formValidation('resetForm', true);
        });
    }

    /*  End New Video */


    /* Edit Video */
    if($("#edit_video").length>=1){
        var $this = null;
        $("table#tableOpinion tbody").on("click","tr td a.btn-edit",function(){
            $this = $(this);
            $('#edit_video').modal();
            $("#edit_video #nameCtg").val($this.attr("data-namec"));
            $("#edit_video #genero").val($this.attr("data-titlec"));
        });
        $('#editVideo').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name_category: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        }
                    }
                },
                genero: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $(".btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').data('key'),
                value: $('#value-security').data('value'),
                id :$this.data("opid")
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/video/edit",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#edit_video").modal("hide");
                        setTimeout(function(){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-success").toggleClass("open");
                        },1500);
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },4000);
                        $("#tableOpinion tbody tr#"+$this.data("cgid")+" .nameCategory").text(response.result.name);
                        $("#tableOpinion tbody tr#"+$this.data("cgid")+" .optionsCtg a").data('namec',response.result.name);
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                        resetForm($("#editVideo"));
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }
                },
                error : function(){
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                }
            });
        });
        $('#edit_video').on('shown.bs.modal', function() {
            $('#editVideo').formValidation('resetForm', true);
        });
    }
/* End Edit Video */




/*  New Opinion */

    if($("#newOpinion").length>=1){
        $('#newOpinion').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name_category: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        }
                    }
                },
                titleCat: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        }
                    }
                },
                opinionCat: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $(".btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').data('key'),
                value: $('#value-security').data('value')
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/opinion/new",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#pidLast").val(response.pid);
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },3000);
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }
                },
                error : function(){
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                }
            });
        });
        $('#newopinion').on('shown.bs.modal', function() {
            $('#newOpinion').formValidation('resetForm', true);
        });
    }

/*  End New Opinion */


/* Edit Opinion */
if($("#edit_opinion").length>=1){
    var $this = null;
    $("table#tableOpinion tbody").on("click","tr td a.btn-edit",function(){
        $this = $(this);
        $('#edit_opinion').modal();
        $("#edit_opinion #nameCtg").val($this.attr("data-namec"));
        $("#edit_opinion #titleOpi").val($this.attr("data-titlec"));
        $("#edit_opinion #opinionOpi").val($this.attr("data-opinionc"));
    });
    $('#editOpinion').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name_category: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es necesario y no puede estar vacío.'
                    }
                }
            },
            titleCat: {
                validators: {
                    notEmpty: {
                        message: 'La categoría no coincide.'
                    }
                }
            },
            opinionOpi: {
                validators: {
                    notEmpty: {
                        message: 'La categoría no coincide.'
                    }
                }
            }
        }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        $(".btn-submit").attr("disabled","disabled").val("Iniciando");
        $("#message-box-info").toggleClass("open");
        var values = {
            key: $('#key-security').data('key'),
            value: $('#value-security').data('value'),
            id :$this.data("opid")
        };
        var data = $(this).serialize()+"&"+jQuery.param(values);
        $.ajax({
            type : "POST",
            url : "/dashboard/opinion/edit",
            data : data,
            dataType : "json",
            success : function(response){
                if(response.message=="SUCCESS" && response.code==200){
                    $("#edit_category").modal("hide");
                    setTimeout(function(){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                    },1500);
                    setTimeout(function(){
                        $("#message-box-success").removeClass("open");
                    },4000);
                    $("#tableOpinion tbody tr#"+$this.data("cgid")+" .nameCategory").text(response.result.name);
                    $("#tableOpinion tbody tr#"+$this.data("cgid")+" .optionsCtg a").data('namec',response.result.name);
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    resetForm($("#editOpinion"));
                }else if(response.code==404){
                    $("#message-box-info").removeClass("open");
                    $("#message-box-warning").toggleClass("open");
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                }
            },
            error : function(){
                $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
            }
        });
    });
    $('#edit_opinion').on('shown.bs.modal', function() {
        $('#editOpinion').formValidation('resetForm', true);
    });
}





/* New Category */
    if($("#newCategory").length>=1){
        $('#newCategory').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name_category: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        },
                        remote: {
                            message: 'Esta categoría ya existe, pruebe con otra',
                            url: '/dashboard/category/validatecategory',
                            type: 'POST'
                        }
                    }
                },
                confirmCategory: {
                    validators: {
                        identical: {
                            field: 'name_category',
                            message: 'La categoría no coincide.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $(".btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').data('key'),
                value: $('#value-security').data('value')
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/category/new",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        setTimeout(function(){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-success").toggleClass("open");
                        },1500);
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                            $("#modal_basic").modal('hide');
                        },4000);
                        $("#tableCategory tbody").append("<tr id='"+response.result.id+"'><td>"+response.result.name+"</td><td><a href='#' data-namec='"+response.result.name+"' data-cgid='"+response.result.id+"' class='btn btn-default btn-rounded btn-sm btn-edit'><span class='fa fa-pencil'></span></a><button class='btn btn-danger btn-rounded btn-sm' onclick='delete_category("+response.result.id+")'><span class='fa fa-times'></span></button></td>" +
                            "<td><a href='/dashboard/category/subcategory?id="+response.result.id+"&ctg="+response.result.name+"' class='btn btn-default btn-rounded btn-sm'>&nbsp;<span class='fa fa-eye' style='font-size: 16px;color: #000;'></a></td></tr>").fadeIn(1000);;
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                        resetForm($("#newCategory"));
                     }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }
                },
                error : function(){
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                }
            });
        });
        $('#modal_basic').on('shown.bs.modal', function() {
            $('#newCategory').formValidation('resetForm', true);
        });
    }
/* Edit Category */
    if($("#edit_category").length>=1){
        var $this = null;
        $("table#tableCategory tbody").on("click","tr td a.btn-edit",function(){
            $this = $(this);
            $('#edit_category').modal();
            $("#edit_category #nameCtg").val($this.data("namec"));
        });
        $('#editCategory').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name_category: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        },
                        remote: {
                            message: 'Esta categoría ya existe, pruebe con otra',
                            url: '/dashboard/category/validatecategory',
                            type: 'POST'
                        }
                    }
                },
                confirmCategory: {
                    validators: {
                        identical: {
                            field: 'name_category',
                            message: 'La categoría no coincide.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $(".btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').data('key'),
                value: $('#value-security').data('value'),
                id :$this.data("cgid")
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/category/edit",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#edit_category").modal("hide");
                        setTimeout(function(){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-success").toggleClass("open");
                        },1500);
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },4000);
                        $("#tableCategory tbody tr#"+$this.data("cgid")+" .nameCategory").text(response.result.name);
                        $("#tableCategory tbody tr#"+$this.data("cgid")+" .optionsCtg a").data('namec',response.result.name);
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                        resetForm($("#editCategory"));
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }
                },
                error : function(){
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                }
            });
        });
        $('#edit_category').on('shown.bs.modal', function() {
            $('#editCategory').formValidation('resetForm', true);
        });
    }
/* New Subcategory */
    if($("#newSubCategory").length>=1){
        $('#newSubCategory').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                subcategoryname: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        },
                        remote: {
                            message: 'Esta categoría ya existe, pruebe con otra',
                            url: '/dashboard/category/validatesubcategory',
                            data : {
                                id:$("#cgid").val()
                            },
                            type: 'POST'
                        }
                    }
                },
                confirmCategory: {
                    validators: {
                        identical: {
                            field: 'subcategoryname',
                            message: 'La categoría no coincide.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $(".btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').data('key'),
                value: $('#value-security').data('value')
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/category/newsubcategory",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        setTimeout(function(){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-success").toggleClass("open");
                        },1500);
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                            $("#modal_basic").modal('hide');
                        },4000);
                        $("#tableSubCategory tbody").append("<tr id='"+response.result.id+"'><td>"+response.result.name+"</td><td><a href='#' data-namec='"+response.result.name+"' data-cgid='"+response.result.id+"' class='btn btn-default btn-rounded btn-sm btn-edit'><span class='fa fa-pencil'></span></a><button class='btn btn-danger btn-rounded btn-sm' onclick='delete_subcategory("+response.result.id+")'><span class='fa fa-times'></span></button></td></tr>").fadeIn(1000);;
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                        resetForm($("#newSubCategory"));
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }
                },
                error : function(){
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                }
            });
        });
        $('#modal_basic').on('shown.bs.modal', function() {
            $('#newSubCategory').formValidation('resetForm', true);
        });
    }
/* Edit Subcategory*/
    if($("#edit_subcategory").length>=1){
        $("table#tableSubCategory tbody").on("click","tr td a.btn-edit",function(){
            $this = $(this);
            $('#edit_subcategory').modal();
            $("#edit_subcategory #nameCtg").val($this.data("namec"));
        });
        var $this = null;
        $('#editSubCategory').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                subcategoryname: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo es necesario y no puede estar vacío.'
                        },
                        remote: {
                            message: 'Esta categoría ya existe, pruebe con otra',
                            url: '/dashboard/category/validatesubcategory',
                            data : {
                                id:$("#cgid").val()
                            },
                            type: 'POST'
                        }
                    }
                },
                confirmCategory: {
                    validators: {
                        identical: {
                            field: 'subcategoryname',
                            message: 'La categoría no coincide.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $(".btn-submit").attr("disabled","disabled").val("Iniciando");
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').data('key'),
                value: $('#value-security').data('value'),
                id :$this.data("cgid")
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/category/editsubcategory",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#edit_subcategory").modal("hide");
                        setTimeout(function(){
                            $("#message-box-info").removeClass("open");
                            $("#message-box-success").toggleClass("open");
                        },1500);
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },4000);
                        $("#tableSubCategory tbody tr#"+$this.data("cgid")+" .nameCategory").text(response.result.name);
                        $("#tableSubCategory tbody tr#"+$this.data("cgid")+" td a.btn-edit").data("namec",response.result.name);
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                        resetForm($("#editSubCategory"));
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                        $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                    }
                },
                error : function(){
                    $(".btn-submit").removeAttr("disabled").removeClass("disabled").val("Guardar");
                }
            });
        });
        $('#edit_subcategory').on('shown.bs.modal', function() {
            $('#editSubCategory').formValidation('resetForm', true);
        });
    }

    function getSection($selector,$placeholder,$category,$type,$pid){
        var result ;
        $selector.select2({
            ajax: {
                url: "/dashboard/sections/feedPost",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q:params.term,
                        category:$category,
                        type : $type,
                        pid : $pid
                    };
                },
                processResults: function (data, page) {
                    return {
                        results: $.map(data, function (item,key) {
                            result = {"value":item,"pid":key}
                            return {
                                text: item,
                                id: key
                            }

                        })
                    };
                }
            },
            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
            minimumInputLength: 1,
            placeholder: $placeholder
        });
        $selector.on("change",function(e){
            var theID = $selector.val();
            save_sections(theID,$selector.data("order"),$selector.data("last"),$selector.data("cgid"));
        });
    }

 /*Slider*/
    setSliderValues($("#headerForm"));
    setSliderValues($("#form2"));
    setSliderValues($("#form3"));
    setSliderValues($("#form4"));
    setSliderValues($("#form5"));
    setSliderValues($("#form6"));
    setSliderValues($("#form7"));
    setSliderValues($("#form8"));
    setSliderValues($("#form9"));
    setSliderValues($("#form10"));
    video = $("#video");
    if(video.length>=1){
        video.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                "video1": {
                    validators: {
                        notEmpty: {
                            message: 'La url del vídeo es necesario y no puede estar vacío.'
                        }
                    }
                },"video1": {
                    validators: {
                        notEmpty: {
                            message: 'La url del vídeo es necesario y no puede estar vacío.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#message-box-info").toggleClass("open");
            $.ajax({
                type : "POST",
                url : "/dashboard/advertising/video",
                data : $(this).serialize(),
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },1500);
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                    }
                },
                error : function(){
                    $("#message-box-info").removeClass("open");
                }
            });
        });
    }
});
function setSliderValues(selector){
    if(selector.length>=1){
        selector.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                "image-1": {
                    validators: {
                        notEmpty: {
                            message: 'La imagen es necesaria y no puede estar vacía.'
                        }
                    }
                },
                order: {
                    validators: {
                        notEmpty: {
                            message: 'El orden es necesario y no puede estar vacío.'
                        }
                    }
                },
                ubication: {
                    validators: {
                        notEmpty: {
                            message: 'La ubicación es necesaria y no puede estar vacía.'
                        }
                    }
                },
                url: {
                    validators: {
                        stringLength: {
                            min: 10,
                            max: 150,
                            message: 'La Descripción debe ser mayor de 10 y menor de 150 caracteres de longitud.'
                        },
                        uri: {
                            message: 'La url no es valida'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            $("#message-box-info").toggleClass("open");
            var values = {
                key: $('#key-security').attr('data-key'),
                value: $('#value-security').attr('data-value'),
            };
            var data = $(this).serialize()+"&"+jQuery.param(values);
            $.ajax({
                type : "POST",
                url : "/dashboard/advertising/save",
                data : data,
                dataType : "json",
                success : function(response){
                    if(response.message=="SUCCESS" && response.code==200){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-success").toggleClass("open");
                        setTimeout(function(){
                            $("#message-box-success").removeClass("open");
                        },1500);
                    }else if(response.code==404){
                        $("#message-box-info").removeClass("open");
                        $("#message-box-warning").toggleClass("open");
                    }
                },
                error : function(){
                    $("#message-box-info").removeClass("open");
                }
            });
        });
    }
}
function save_sections(pid,order,last,cgid){
    var values = {
        key: $('#key-security').attr('data-key'),
        value: $('#value-security').attr('data-value'),
        type : "slider",
        pid : parseInt(pid),
        order : order,
        last : last,
        cgi :cgid
    };
    $.ajax({
        type : "POST",
        url : "/dashboard/sections/updatesection",
        data : values,
        dataType : "json",
        success : function(response){
            if(response.message=="SUCCESS" && response.code==200){
                $("#"+response.order+"").attr("data-post",response.pid);
                $("#message-box-success").toggleClass("open");
                setTimeout(function(){
                    $("#message-box-success").removeClass("open");
                },500);
            }else if(response.code==404){
                $("#message-box-info").removeClass("open");
                $("#message-box-warning").toggleClass("open");
            }
        },
        error : function(){
            $("#message-box-info").removeClass("open");
        }
    });
}
function delete_category(row){
    var box = $("#mb-remove-row");
    box.addClass("open");
    box.find(".mb-control-yes").on("click",function(){
        $.ajax({
            type : "POST",
            url : "/dashboard/category/delete",
            data : {id:row},
            dataType : "json",
            success : function(response){
                if(response.message=="SUCCESS" && response.code==200){
                    box.removeClass("open");
                    $("#"+row).hide("slow",function(){
                        $(this).remove();
                    });
                }else if(response.code==404){
                    alert("no se ha podido borrar");
                }
            },
            error : function(){
                alert("no se ha podido borrar");
            }
        });
    });
}
function delete_subcategory(row){
    var box = $("#mb-remove-row");
    box.addClass("open");
    box.find(".mb-control-yes").on("click",function(){
        $.ajax({
            type : "POST",
            url : "/dashboard/category/deletesubcategory",
            data : {id:row},
            dataType : "json",
            success : function(response){
                if(response.message=="SUCCESS" && response.code==200){
                    box.removeClass("open");
                    $("#"+row).hide("slow",function(){
                        $(this).remove();
                    });
                }else if(response.code==404){
                    alert("no se ha podido borrar");
                }
            },
            error : function(){
                alert("no se ha podido borrar");
            }
        });
    });
}
function resetForm($form) {
    $form.find('input:text, input:password, input:file, input[type=email], select, textarea').val('');
    $form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
}
function SetOrderSections(pid,order,cgid){
    $.ajax({
        url : "/dashboard/sections/orderpostsections",
        data : {"pid":pid,"cgid":cgid,"order":order, key: $('#key-security').attr('data-key'),value: $('#value-security').attr('data-value')},
        type : "POST",
        dataType : "json",
        success :  function(response){
            if(response.message=="SUCCESS" && response.code==200){
                $("#success-pn").removeClass("hide").addClass("in");
                setTimeout(function(){
                    $("#success-pn").removeClass("in").addClass("hide");
                },1500);
            }else if(response.message=="SUCCESS" && response.code==300){
                $("#danger-pn").removeClass("hide").addClass("in");
                setTimeout(function(){
                    $("#danger-pn").removeClass("in").addClass("hide");
                },1500);
            }
            else{
                $("#warning-pn").removeClass("hide").addClass("in");
                setTimeout(function(){
                    $("#warning-pn").removeClass("in").addClass("hide");
                },1500);
            }
        },
        error :function(){
            $("#warning-pn").removeClass("hide").addClass("in");
            setTimeout(function(){
                $("#warning-pn").removeClass("in").addClass("hide");
            },1500);
        }
    });
}