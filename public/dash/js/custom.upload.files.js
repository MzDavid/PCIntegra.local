$(document).ready(function(){
    if($("#dropzone-user-edit").length>=1){
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#dropzone-user-edit', {
            url: "/dashboard/user/uploadimage",
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            maxFiles: 2,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',

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
            success: function(file, response){
                var name_image = jQuery.parseJSON(response);
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#user-image").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
        var mockFile = { name: "Click en remove file", size: 12345};
        myDropzone.emit("addedfile", mockFile);
        $(".progress.progress-striped.active").addClass("hide");
        if($("#user-image").val()==""){
            image_load = "/dash/assets/images/users/thumbnail/no-image.jpg";
        }else{
            image_load = "/dash/assets/images/users/thumbnail/"+$("#user-image").val();
        }
        myDropzone.emit("thumbnail", mockFile,image_load);
        var existingFileCount = 1; // The number of files already uploaded
        myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
    }
    if($("#image-principal-dz").length>=1){
        Dropzone.autoDiscover = false;
        var minImageWidth = 800, minImageHeight = 600;
        var myDropzone = new Dropzone('#image-principal-dz', {
            url: "uploadimagenote",
            uploadMultiple : false,
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            maxFiles: 1 ,
            parallelUploads : 1,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
            init: function() {
                this.on("success", function(file, responseText) {
                    file.previewTemplate.setAttribute('id',responseText[0].id);
                });
                this.on("thumbnail", function(file) {
                    if (file.width < minImageWidth || file.height < minImageHeight) {
                        file.rejectDimensions()
                    }
                    else {
                        file.acceptDimensions();
                    }
                });
            },
            accept: function(file, done) {
                file.acceptDimensions = done;
                file.rejectDimensions = function() { done("Imagen muy pequeña."); };
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
                formData.append("position_image",2);
                formData.append("image_post",1);
                formData.append("post_id",$("#post_id").val());
                formData.append("uniqid-id-image",$("#uniqid-id-image").val());
            },
            success: function(file, response){
                var name_image = response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#input-image-principal").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
    }




    if($("#dropzone-opinion-edit").length>=1){
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#dropzone-opinion-edit', {
            url: "opinion/uploadimageopinion",
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            maxFiles: 2,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',

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
            success: function(file, response){
                var name_image = response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#input-image-principal").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
        var mockFile = { name: "Click en remove file", size: 12345};
        myDropzone.emit("addedfile", mockFile);
        $(".progress.progress-striped.active").addClass("hide");
        if($("#input-image-principal").val()==""){
            image_load = "/dash/assets/images/users/thumbnail/no-image.jpg";
        }else{
            image_load = "/public/dash/img/notes/"+$("#input-image-principal").val();
        }
        myDropzone.emit("thumbnail", mockFile,image_load);
        var existingFileCount = 1; // The number of files already uploaded
        myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
    }




    if($("#dropzone-note-edit").length>=1){
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#dropzone-note-edit', {
            url: "uploadimagenote",
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            maxFiles: 2,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',

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
            success: function(file, response){
                var name_image = response;
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#input-image-principal").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
        var mockFile = { name: "Click en remove file", size: 12345};
        myDropzone.emit("addedfile", mockFile);
        $(".progress.progress-striped.active").addClass("hide");
        if($("#input-image-principal").val()==""){
            image_load = "/dash/assets/images/users/thumbnail/no-image.jpg";
        }else{
            image_load = "/dash/img/notes/100x80/"+$("#input-image-principal").val();
        }
        myDropzone.emit("thumbnail", mockFile,image_load);
        var existingFileCount = 1; // The number of files already uploaded
        myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
    }
    if($("#image-photo-principal-dz").length>=1){
        Dropzone.autoDiscover = false;
        var minImageWidth = 800, minImageHeight = 600;
        var myDropzone = new Dropzone('#image-photo-principal-dz', {
            url: "/dashboard/photo/uploadimage",
            acceptedFiles: ".jpg, .jpeg, .gif, .png, .JPG, .JPEG",
            uploadMultiple : false,
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            maxFiles: 1 ,
            parallelUploads : 1,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
            init: function() {
                this.on("success", function(file, responseText) {
                    file.previewTemplate.setAttribute('id',responseText[0].id);
                });
                this.on("thumbnail", function(file) {
                    if (file.width < minImageWidth || file.height < minImageHeight) {
                        file.rejectDimensions()
                    }
                    else {
                        file.acceptDimensions();
                    }
                });
            },
            accept: function(file, done) {
                file.acceptDimensions = done;
                file.rejectDimensions = function() { done("Imagen muy pequeña."); };
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
                formData.append("position_image",2);
                formData.append("image_post",1);
                formData.append("post_id",$("#post_id").val());
                formData.append("uniqid-id-image",$("#uniqid-id-image").val());
            },
            success: function(file, response){
                var name_image = jQuery.parseJSON(response);
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#img-photo-principal-dz").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
    }
    if($("#ip-edit-principal-dz").length>=1){
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#ip-edit-principal-dz', {
            url: "/dashboard/photo/uploadimage",
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 6, // MB
            maxFiles: 2,
            addRemoveLinks : true,
            dictResponseError: "No se puede subir esta imagen!",
            autoProcessQueue: true,
            thumbnailWidth: 138,
            thumbnailHeight: 120,
            previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',

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
            success: function(file, response){
                var name_image = jQuery.parseJSON(response);
                $(".dz-preview").addClass("dz-success");
                $("div.progress").remove();
                $("#img-photo-principal-dz").val(name_image.name);
            },
            removedfile: function(file) {
                $(file.previewElement).remove();
            }
        });
        var mockFile = { name: "Clic en remove file", size: 12345};
        myDropzone.emit("addedfile", mockFile);
        $(".progress.progress-striped.active").addClass("hide");
        if($("#img-photo-principal-dz").val()==""){
            image_load = "/dash/assets/images/users/thumbnail/no-image.jpg";
        }else{
            image_load = "/front/images/photo_notes/220x140/"+$("#img-photo-principal-dz").val();
        }
        myDropzone.emit("thumbnail", mockFile,image_load);
        var existingFileCount = 1; // The number of files already uploaded
        myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
    }

    if($("#advertising").length>=1){
        getImagesAdvertising("#header",$("#image-1").val(),$("#order").val(),$("#ubication").val(),960,128);
        getImagesAdvertising("#advertising2",$("#image-2").val(),$("#order2").val(),$("#ubication2").val(),450,350);
        getImagesAdvertising("#advertising3",$("#image-3").val(),$("#order3").val(),$("#ubication3").val(),300,350);
        getImagesAdvertising("#advertising4",$("#image-4").val(),$("#order4").val(),$("#ubication4").val(),300,350);
        getImagesAdvertising("#advertising5",$("#image-5").val(),$("#order5").val(),$("#ubication5").val(),300,350);
        getImagesAdvertising("#advertising6",$("#image-6").val(),$("#order6").val(),$("#ubication6").val(),300,600);
        getImagesAdvertising("#advertising7",$("#image-7").val(),$("#order7").val(),$("#ubication7").val(),960,150);
        getImagesAdvertising("#advertising8",$("#image-8").val(),$("#order8").val(),$("#ubication8").val(),300,600);
        getImagesAdvertising("#advertising9",$("#image-9").val(),$("#order9").val(),$("#ubication9").val(),300,350);
        getImagesAdvertising("#advertising10",$("#image-10").val(),$("#order10").val(),$("#ubication10").val(),300,350);
    }
});
function getImagesAdvertising(selector,nameImage,order,ubication,minImageWidth,minImageHeight){
    Dropzone.autoDiscover = false;
    var images = $(selector).val();
    var myDropzone2 = new Dropzone(selector, {
        url: "/dashboard/advertising/uploadfile",
        uploadMultiple : false,
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 5, // MB
        maxFiles: 2 ,
        parallelUploads : 1,
        addRemoveLinks : true,
        dictResponseError: "No se puede subir esta imagen!",
        autoProcessQueue: true,
        thumbnailWidth: 138,
        thumbnailHeight: 120,
        acceptedFiles:"image/*",
        previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-details"><div class="dz-filename"><span data-dz-name style:"font-weight: bold;"></span></div><div class="dz-size">File size: <span data-dz-size></span></div><div class="dz-thumbnail-wrapper"><div class="dz-thumbnail"><img data-dz-thumbnail><span class="dz-nopreview">No preview</span><div class="dz-success-mark"><i class="fa fa-check-circle-o"></i></div><div class="dz-error-mark"><i class="fa fa-times-circle-o"></i></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div><div class="progress progress-striped active"><div class="progress-bar progress-bar-success" data-dz-uploadprogress></div></div></div>',
        init: function() {
            this.on("success", function(file, responseText) {
                file.previewTemplate.setAttribute('id',responseText[0].id);
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
            formData.append("image-1",nameImage);
        },
        success: function(file, response){
            $(".dz-preview").addClass("dz-success");
            $("div.progress").remove();
        },
        removedfile: function(file) {
            $(file.previewElement).remove();
        }
    });
    if(nameImage){
        var mockFile = { name: "Click para remover la imagen", size: 12345};
        myDropzone2.emit("addedfile",mockFile);
        if(nameImage==""){
            image_load = "/front/images/noimage.png";
        }else{
            image_load = "/front/images/slider/"+nameImage;
        }
        myDropzone2.emit("thumbnail", mockFile,image_load);
        var existingFileCount = 1; // The number of files already uploaded
        myDropzone2.options.maxFiles = myDropzone2.options.maxFiles - existingFileCount;
    }
}