/*$(window).on('load', function () {
    var Input = $('.div-input-file');
    /!*Input.append(modal);*!/
    var Input_Num = Input.attr('data-num');
    var i = 0;
    var img_input = '<div class="form_file"> <input type="file" class="File form-control"/> </div>';
    var img_url = ' <input type="text" class="img_url" hidden/> ';
    var watarmark = Input.attr('data-watermark');
    var size = Input.attr('data-size');
    var preview = $('#resultImage');

    for (i; i < Input_Num; i++) {
        Input.append(img_input);
    }
    $(function () {
        var fileInput = $('.File');
        fileInput.on('change', function (event) {
            // checkFile(event.target.files);
            var $it = $(this);
            if ($it.val() != '') {
                handleDrop(event.target.files, $it);
                $it.css('border-color', '');
            } else {
                $it.css('border-color', 'red');
            }
        });
        checkFile = function (files) {
            var file = files[0];
            if (!file.type.match('pdf.*')) {
                //$('#preview').modal({backdrop: 'static', keyboard: false});
                //preview.attr({src: loder, width: '200px', height: '200px'});
            }
        };
        handleDrop = function (files, $it) {
            var file = files[0];
            if (file.type.match('image.jpeg') || file.type.match('image.jpg') || file.type.match('image.png')) {
                resizeImage(file, size, function (result) {
                    // setTimeout(function () {
                    //     preview.attr({src: result, width: '100%', height: ''});
                    // }, 2000);
                    if ($it.closest('.form_file').find('.img_url').length == 0) {
                        $it.closest('.form_file').append(img_url);
                    }
                    $it.closest('.form_file').find('.img_url').attr('name', 'img[]').val(result + ',' + file.name);
                });
            } else if (file.type.match('image.gif')) {
                resizeImageGif(file, size, function (result) {
                    // setTimeout(function () {
                    //     preview.attr({src: result, width: '100%', height: ''});
                    // }, 2000);
                    if ($it.closest('.form_file').find('.img_url').length == 0) {
                        $it.closest('.form_file').append(img_url);
                    }
                    $it.closest('.form_file').find('.img_url').attr('name', 'img[]').val(result + ',' + file.name);
                });
            } else if (file.type.match('pdf.*')) {
                $it.closest('.form_file').find('.img_url').val('');
                $it.closest('.form_file').find('.File').attr('name', file.size + file.name);
            } else {
                $it.closest('.form_file').append(img_url).find('.File').val('');
                alert('รูปแบบไฟล์ไม่ถูกต้อง');
            }
        };
        resizeImage = function (file, size, callback) {
            var fileTracker = new FileReader;
            fileTracker.onload = function () {
                var image = new Image();
                image.onload = function () {
                    var canvas = document.createElement('canvas');
                    if (image.height > size) {
                        image.width *= size / image.height;
                        image.height = size;
                    }
                    if (image.width > size) {
                        image.height *= size / image.width;
                        image.width = size;
                    }
                    var ctx = canvas.getContext('2d');
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    canvas.width = image.width;
                    canvas.height = image.height;
                    ctx.drawImage(image, 0, 0, image.width, image.height);
                    var Canvas = watermarkedDataURL(canvas, watarmark, image.width);
                    callback(Canvas);
                };
                return image.src = this.result;
            };
            if (file) {
                fileTracker.readAsDataURL(file);
            }
        };
        resizeImageGif = function (file, size, callback) {
            var reader = new FileReader();
            reader.addEventListener("load", function () {
                preview.src = reader.result;
                callback(preview.src);
            });
            if (file) {
                reader.readAsDataURL(file);
            }
        };

        function watermarkedDataURL(canvas, text, size) {
            var tempCanvas = document.createElement('canvas');
            var tempCtx = tempCanvas.getContext('2d');
            var cw, ch;
            var fontSize;
            cw = tempCanvas.width = canvas.width;
            ch = tempCanvas.height = canvas.height;
            fontSize = 15 * (cw / size);
            tempCtx.drawImage(canvas, 0, 0);
            tempCtx.font = fontSize + 'px Monospace';
            var textWidth = tempCtx.measureText(text).width;
            tempCtx.globalAlpha = 0.4;
            tempCtx.fillStyle = 'white';
            tempCtx.fillText(text, cw - textWidth - 20, ch - 20);
            return tempCanvas.toDataURL('image/jpeg', 0.5);
        }
    });
});*/
$(window).on('load', function () {
    var Input = $('.div-input-file');
    var Input_Num = Input.attr('data-num');
    var quality = !Input.attr('data-quality') ? 1 : parseFloat(Input.attr('data-quality'));
    var i = 0;
    var img_input = '<div class="form_file"> <input type="file" class="file-resize form-control"/> </div>';
    var img_url = ' <input type="text" class="img_url"  hidden/> ';
    var watarmark = Input.attr('data-watermark');
    var size = Input.attr('data-size');
    var preview = $('#resultImage');
    for (i; i < Input_Num; i++) {
        Input.append(img_input)
    }
    console.log(quality);
    $(function () {
        var fileInput = $('.file-resize');

        fileInput.on('change', function (event) {
            if ($(this).val() !== '') {
                handleDrop(event.target.files, $(this));
            } else {
                $(this).closest('.form_file').find('.img_url').attr('name', 'img[]').val('');
                $(this).closest('.form_file').find('.file-resize').attr('name', '');
            }
        });
        handleDrop = function (files, $this) {
            var file = files[0];
            var FileName = file.name, FileType = FileName.split('.').pop().toLowerCase(),
                FormFile = $this.closest('.form_file'), ImgUrlLength = FormFile.find('.img_url').length;
            if (FileType === 'jpeg' || FileType === 'jpg') {
                resizeImage(file, size, function (result) {
                    if (ImgUrlLength === 0) {
                        FormFile.append(img_url);
                    }
                    FormFile.find('.img_url').attr('name', 'img[]').val(result + ',' + file.name);
                });
            } else if (FileType === 'gif' || FileType === 'png') {
                resizeImageGif(file, size, function (result) {
                    if (ImgUrlLength === 0) {
                        FormFile.append(img_url);
                    }
                    FormFile.find('.img_url').attr('name', 'img[]').val(result + ',' + file.name);
                });
            } else if (FileType === 'pdf' || FileType === 'docx' || FileType === 'doc' || FileType === 'xls' || FileType === 'xlsx' || FileType === 'zip' || FileType === 'rar' ) {
                FormFile.find('.file-resize').attr('name', file.size + file.name);
                FormFile.find('.img_url').remove();
            } else {
                FormFile.find('.file-resize').val('');
                FormFile.find('.file-resize').attr('name', '');
                FormFile.find('.img_url').remove();
                alert('');
            }
        };
        resizeImage = function (file, size, callback) {
            var fileTracker = new FileReader;
            fileTracker.onload = function () {
                var image = new Image();
                image.onload = function () {
                    var canvas = document.createElement('canvas');
                    if (image.height > size) {
                        image.width *= size / image.height;
                        image.height = size
                    }
                    if (image.width > size) {
                        image.height *= size / image.width;
                        image.width = size
                    }
                    var ctx = canvas.getContext('2d');
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    canvas.width = image.width;
                    canvas.height = image.height;
                    ctx.drawImage(image, 0, 0, image.width, image.height);
                    var Canvas = watermarkedDataURL(canvas, watarmark, image.width);
                    callback(Canvas)
                };
                return image.src = this.result
            };
            if (file) {
                fileTracker.readAsDataURL(file)
            }
        };
        resizeImageGif = function (file, size, callback) {
            var reader = new FileReader();
            reader.addEventListener("load", function () {
                preview.src = reader.result;
                callback(preview.src)
            });
            if (file) {
                reader.readAsDataURL(file);
            }
        };

        function watermarkedDataURL(canvas, text, size) {
            var tempCanvas = document.createElement('canvas');
            var tempCtx = tempCanvas.getContext('2d');
            var cw, ch;
            var fontSize;
            cw = tempCanvas.width = canvas.width;
            ch = tempCanvas.height = canvas.height;
            fontSize = 30 * (cw / size);
            tempCtx.drawImage(canvas, 0, 0);
            tempCtx.font = fontSize + 'px Monospace';
            var textWidth = tempCtx.measureText(text).width;
            tempCtx.globalAlpha = 0.5;
            tempCtx.fillStyle = 'white';
            tempCtx.fillText(text, cw - textWidth - 20, ch - 20);
            return tempCanvas.toDataURL('image/jpeg', quality);
        }
    });
});




// $(function () {              NEW multiple upload 3/16/2020
//
//
//     $("#upload").on("click",function(e){
//         var objFile= $("<input>",{
//             "class":"file_upload",
//             "type":"file",
//             "multiple":"true",
//             "name":"file_upload[]",
//             "style":"display:none",
//             change: function(e){
//                 var files = this.files
//                 showThumbnail(files)
//             }
//         });
//         $(this).before(objFile);
//         $(".file_upload:last").show().click().hide();
//         e.preventDefault();
//     });
//
//     function showThumbnail(files){
//
//         //    $("#thumbnail").html("");
//         for(var i=0;i<files.length;i++){
//             var file = files[i]
//             var imageType = /image.*/
//             if(!file.type.match(imageType)){
//                 //     console.log("Not an Image");
//                 continue;
//             }
//
//             var image = document.createElement("img");
//             var thumbnail = document.getElementById("thumbnail");
//             image.file = file;
//             thumbnail.appendChild(image)
//
//             var reader = new FileReader()
//             reader.onload = (function(aImg){
//                 return function(e){
//                     aImg.src = e.target.result;
//                 };
//             }(image))
//
//             var ret = reader.readAsDataURL(file);
//             var canvas = document.createElement("canvas");
//             ctx = canvas.getContext("2d");
//             image.onload= function(){
//                 ctx.drawImage(image,100,100)
//             }
//         } // end for loop
//
//     } // end showThumbnail
//
//
//
//
// });