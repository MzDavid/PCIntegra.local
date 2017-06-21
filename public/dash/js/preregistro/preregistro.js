/* Personal Information */
if($("#preinscripcion").length>=1){
    function validateEditor() {
        // Revalidate the content when its value is changed by Summernote
        $('#summernoteForm').formValidation('revalidateField', 'content');
    }
    $('#preinscripcion').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: ':disabled',
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'El Nombre es necesario y no puede estar vacío.'
                    },
                    stringLength: {
                        min: 3,
                        max: 50,
                        message: 'El Nombre debe ser mayor de 3 y menor de 50 caracteres de longitud.'
                    }
                }
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: 'Los Apellidos son necesarios y no puede estar vacío.'
                    },
                    stringLength: {
                        min: 3,
                        max: 50,
                        message: 'Los Apellidos debe ser mayor de 3 y menor de 50 caracteres de longitud.'
                    }
                }
            },
            age: {
                validators: {
                    notEmpty: {
                        message: 'La edad es campo necesario y no puede estar vacío.'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'La Fecha de Nacimiento no puede estar vacio.'
                    }
                }
            },
            street: {
                validators: {
                    notEmpty: {
                        message: 'La Calle es necesario y no puede estar vacio.'
                    }
                }
            },
            colony: {
                validators: {
                    notEmpty: {
                        message: 'La Colonia es necesario y no puede estar vacío.'
                    }
                }
            },
            municipality: {
                validators: {
                    notEmpty: {
                        message: 'El municipio no puede estar vacio.'
                    }
                }
            },
            cp: {
                validators: {
                    notEmpty: {
                        message: 'El Codigo Postal no puede estar vacio.'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'El Correo no puede estar vacio.'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'El Teléfono no puede estar vacio.'
                    }
                }
            }
        }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        $("#btn-submit").attr("disabled","disabled").val("Registrando");
        $("#message-box-info").toggleClass("open");
        $.ajax({
            type : "POST",
            url : "save",
            data : $(this).serialize(),
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
/* Personal Information */