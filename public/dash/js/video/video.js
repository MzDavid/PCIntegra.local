if($(".generalDTE").length>=1){
    var t = getDataTable();
}
$(document).ready(function () {
    var formSave = $("#formSave");
    if(formSave.length>=1){
        $(".selectU").select2({
            maximumSelectionLength:1
        });
        $("#add").click(function(e){
            e.preventDefault();
            $("#modalSt").modal();
            uploadFile('.slider',"slider","image",$("#formSave"));
        });
        formSave.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            locale: 'es_ES',
            excluded: ':disabled',
            fields: {}
        }).on('success.form.fv', function(e,data) {
            e.preventDefault();
            $("#message-box-info").toggleClass("open");
            var class_tr = "";
            $.ajax({
                type : "POST",
                url : "/dashboard/index/saveslider",
                data :$(this).serialize(),
                dataType : "json",
                success : function(response){
                    if(response.code==200){
                        val = response['result'];
                        status = val.status=='ACTIVO'?"info":"danger";
                        class_tr  = t.row.add( [
                            val.order_slider,
                            "<img class='img-responsive' src='/api/images/slider/thumbnail/"+val.image+"'>",
                            '<button class="saleLot btn btn-'+status+'">'+val.status+'</button>',
                            '<a  data-id="'+val.slid+'" data-status="'+val.status+'" data-order="'+val.order_slider+'" data-title="'+val.title+'" data-subtitle="'+val.subtitle+'" title="Editar slider" href="#" class="editRow btn btn-success btn-rounded btn-sm"><span class="fa fa-edit btn-options"></span></a>' +
                            '<a  data-id="'+val.slid+'" title="Remover slider" href="#" class="deleteRow btn btn-warning btn-rounded btn-sm"><span class="fa fa-remove btn-options"></span></a>'
                        ] ).draw( false).node();
                        $(class_tr).attr("class",val.slid);
                        setTimeout(function(){
                            messages(1);
                            t.columns.adjust().draw();
                        },500);
                        resetForm(formSave);
                        formSave.formValidation('resetForm', true);
                        $("#modalSt").modal("hide");
                    }else{
                        messages(2);
                    }
                },
                error : function(){
                    messages(3);
                }
            });
        });
        $(document.body).on("click","table tbody tr td a.editRow",function(e){
            e.preventDefault();
            $("#order_slider_edit").val($(this).attr("data-order"));
            $("#status_edit").val($(this).attr("data-status"));
            $("#title-edit").val($(this).attr("data-title"));
            $("#subtitle-edit").val($(this).attr("data-subtitle"));
            $("#slid").val($(this).attr("data-id"));
            $("#defModalHead").text("Editar Fila");
            $(".btn-submit-services").val("Actualizar");
            $("#modalE").modal();
        });
        var formEdit = $("#formEdit");
        formEdit.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            locale: 'es_ES',
            excluded: ':disabled',
            fields: {}
        }).on('success.form.fv', function(e,data) {
            e.preventDefault();
            $("#message-box-info").toggleClass("open");
            $.ajax({
                type : "POST",
                url : "/dashboard/index/saveslider",
                data :$(this).serialize(),
                dataType : "json",
                success : function(response){
                    if(response.code==200){
                        window.location.href="";
                    }else{
                        messages(2,response.message);
                    }
                },
                error : function(){
                    messages(3);
                }
            });
        });
        deleteRow("deleteRow","/dashboard/index/deleteslider");
    }
});
function getDataTable(){
    t = $(".generalDTE").DataTable({"language": {
        "paginate": {"first":"Primero","last":"Ultimo","next":"Siguiente","previous":"Anterior"},
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada por el momento -Lo lamento",
        "info": "Mostrando del _START_ al _END_ de _TOTAL_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(Filtrado de _MAX_ registros en total)"
    },
        fnPreDrawCallback: function(oSettings, json) {
            $('.dataTables_filter input').attr('placeholder', 'Buscar.');
        }
    });
    return t;
}
function deleteRow(selector,url){
    var box = $("#mb-remove-row");
    var id = "0";
    $(document.body).on("click","table tbody tr td a."+selector,function(e){
        e.preventDefault();
        id = $(this).attr("data-id");
        box.addClass("open");
    });
    box.find(".mb-control-yes").on("click",function(){
        $.ajax({
            url : url,
            type : "POST",
            data : {id:id},
            dataType : "json",
            success : function(response){
                box.removeClass("open");
                if(response.code==200){
                    $("."+id).hide("slow",function(){
                        $(this).remove();
                    });
                }else if(response.code==404){
                    messages(2,response.message);
                }else{
                    $("#message-box-danger-deleted").toggleClass("open");
                    setTimeout(function(){
                        $("#message-box-danger-deleted").removeClass("open");
                    },2000);
                }
            },error : function(){
                alert("Ha ocurrido un error intente nuevamente.");
            }
        });
    });
}
function uploadFile(selector,type,sid,form){
    var minImageWidth = 1662, minImageHeight = 1090;
    Dropzone.autoDiscover = false;
    var myDropzone;
    myDropzone = new Dropzone(selector, {
        url: "/dashboard/index/uploadfile",
        uploadMultiple : false,
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 5, // MB
        maxFiles: 1 ,
        parallelUploads : 1,
        addRemoveLinks : true,
        dictResponseError: "No se puede subir este archivo!",
        autoProcessQueue: true,
        thumbnailWidth: 138,
        thumbnailHeight: 120,
        acceptedFiles:"image/*",
        previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
        init: function() {
            this.on("success", function(file, responseText) {

            });
            this.on("thumbnail", function(file) {
                if (file.width < minImageWidth || file.height < minImageHeight && file.width > minImageWidth || file.height > minImageHeight) {
                    file.rejectDimensions()
                }
                else {
                    if(typeof file !== 'undefined' && file.acceptDimensions===undefined){
                    }else{
                        file.acceptDimensions();
                    }
                }
            });
        },
        accept: function(file, done) {
            file.acceptDimensions = done;
            file.rejectDimensions = function() { done("La imagen no coincide con las dimenciones"); };
        },
        resize: function(file) {
            var info = { srcX: 0, srcY: 0, srcWidth: file.width, srcHeight: file.height },
                srcRatio = file.width / file.height;
            if (file.height > this.options.thumbnailHeight || file.width > this.options.thumbnailWidth) {
                info.trgHeight = this.options.thumbnailHeight;
                info.trgWidth = info.trgHeight * srcRatio;
                if (info.trgWidth > this.options.thumbnailWidth) {
                    info.trgWidth = this.options.thumbnailWidth;
                    info.trgHeight = info.trgWidth / srcRatio;
                }
            } else {
                info.trgHeight = file.height;
                info.trgWidth = file.width;
            }
            return info;
        },
        sending : function(file, xhr, formData){
            formData.append("type",type);
        },
        success: function(file, response){
            var result = response;
            $(".dz-preview").addClass("dz-success");
            $("div.progress").remove();
            $("#"+sid).val(result.name);
            form.formValidation('revalidateField', sid);

        },
        removedfile: function(file) {
            $(file.previewElement).remove();
        }
    });
    $("#modalSt").on("hidden.bs.modal",function(){
        myDropzone.destroy();
        $("#"+sid).val('');
    });
}
function messages($type,$text){
    if($type==1){
        setTimeout(function(){
            $("#message-box-info").removeClass("open");
            $("#message-box-success").toggleClass("open");
        },500);
        setTimeout(function(){
            $("#message-box-success").removeClass("open");
        },3000);
    }
    else if($type==2){
        if($text!=null){
            $("#text-box-warning").text($text);
        }
        setTimeout(function(){
            $("#message-box-info").removeClass("open");
            $("#message-box-warning").toggleClass("open");
        },500);
        setTimeout(function(){
            $("#message-box-warning").removeClass("open");
        },3000);
    }else if($type==3){
        setTimeout(function(){
            $("#message-box-info").removeClass("open");
            $("#message-box-warning").toggleClass("open");
        },500);
        setTimeout(function(){
            $("#message-box-warning").removeClass("open");
        },3000);
    }
}
function resetForm($form) {
    $form.find('input:text, input:password, input:file, input[type=email], select, textarea').val('');
    $form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
}