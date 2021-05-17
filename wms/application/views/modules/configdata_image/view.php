<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 20/2/2561
 * Time: 13:12
 */
//var_dump($files);

?>
<div class="card card-shadow mb-3">
    <div class="card-header">
        <h2><?php echo $head; ?></h2>
    </div>
    <form action="<?php echo $site; ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ชื่อเรื่อง :</b>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="subject" id="subject"
                           value="<?php echo IsVal($set_data['subject']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>วันที่ :</b>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control datepick" name="datepost" id="datepost"
                           value="<?php echo DateB(IsVal($set_data['datepost'])) ?>" autocomplete="off" required>
                </div>
            </div>
            <!--<div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ส่วน/ฝ่าย :</b>
                </div>
                <div class="col-lg-3">
                    <select name="department" id="department" class="form-control">
                        <option value="0" selected disabled>เลือกส่วน/ฝ่าย</option>
                        <?php /*foreach ($officer_type as $offKey => $offVal): */ ?>
                            <option value="<?php /*echo $offVal['id'] */ ?>" <?php /*echo IsSelect($set_data['department'], $offVal['id']) */ ?>><?php /*echo $offVal['name'] */ ?></option>
                        <?php /*endforeach; */ ?>
                    </select>
                </div>
            </div>-->
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>รายละเอียด :</b>
                </div>
                <div class="col-lg-8">
                    <textarea name="detail" id="detail"
                              class="edit-text"><?php echo IsVal($set_data['detail1']) ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2 text-lg-right">
                    <b>image filter :</b>
                </div>
                <div class="col-lg-3">
                    <select name="filter" id="filter" class="form-control">
                        <?php foreach ($filter as $fKey => $fVal): ?>
                            <option value="<?php echo $fVal['name'] ?>" <?php echo IsSelect($set_data['img_filter'], $fVal['name']) ?>><?php echo $fVal['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2" style="white-space: nowrap;">
                    <b>อัพโหลดไฟล์เอกสาร (PDF) :</b>
                </div>
                <div class="col-lg-9">
                    <?php for ($i = 0; $i < FILEUPLOADNO; $i++): ?>
                        <div class="row">
                            <div class="col-lg-1 text-lg-right pr-0 pt-2">
                                ไฟล์ <?php echo $i + 1 ?>
                            </div>
                            <div class="col-lg-6">
                                <div data-num="1" data-watermark="<?php echo USEDOMAIN ?>" data-size="640"
                                     class="div-input-file"></div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2" style="white-space: nowrap;">
                    <div class="form-group">
                        <lable class="control-label"><b>Multiple-Upload (jpeg,jpg,gif,png,bmp) : </b>
                        </lable>
                        <div id="upload" class="btn btn-info" data-num="1" data-watermark="<?php echo USEDOMAIN ?>" data-size="640">
                            Upload File
                        </div><br>
                        กดปุ่ม ctrl+A เลือกทั้งหมด <br>
                        กดปุ่ม ctrl เลือกรูปภาพทีละรูป
                        <!--                                <input type="file" name="files" id="files" multiple/>-->
                    </div>
                </div>
            </div>
            <div id="thumbnail"></div>
            <div class="row mb-2">
                <div class="col-lg-8 offset-lg-2">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="active"
                               name="active" value="1" <?php echo IsCheck($set_data['status']) ?>>
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-8 offset-lg-2">
                    <button type="submit" class="btn btn-success btn-block">บันทึก</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="card card-shadow mb-3">
    <div class="card-header">
        <h2>รูปภาพ</h2>
    </div>
    <div class="card-body text-center">
        <div class="row card-img-show" id="gallery1">
            <?php $filter = $set_data['img_filter']; ?>
            <?php foreach ($files AS $fKey => $fVal):
                $filename = $fVal['filename'];
                $exten = explode('.', $filename)[1];
                if ($exten == 'jpg' || $exten == 'png' || $exten == 'jpeg' || $exten == 'gif' || $exten == 'bmp' || $exten == 'JPG' || $exten == 'PNG' || $exten == 'JPEG' || $exten == 'GIF' || $exten == 'BMP'): ?>
                    <div class="col-lg-3 mt-2">
                        <a>
                            <img src="<?php get_ul($filename, $folder_name) ?>"
                                 width="100%">
                        </a>
                        <p><?php echo $filename; ?></p>
                        <p><a href="<?php echo $site_remove . $filename; ?>" class="btn btn-danger btn-sm">ลบ</a></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="card card-shadow mb-3">
    <div class="card-header">
        <h2>ไฟล์เอกสาร</h2>
    </div>
    <div class="card-body text-center">
        <div class="row card-img-show">
            <?php $filter = $set_data['img_filter']; ?>
            <?php foreach ($files AS $fKey => $fVal):
                $filename = $fVal['filename'];
                $exten = explode('.', $filename)[1];
                if ($exten == 'pdf'|| $exten == 'PDF'): ?>
                    <div class="col-lg-3 mt-2">
                        <a href="<?php get_ul($filename, $folder_name) ?>" target="_blank">
                            <img src="<?php get_img('pdf.png', '') ?>" width="40%">
                        </a>
                        <p><?php echo $filename; ?></p>
                        <p><a href="<?php echo $site_remove . $filename; ?>" class="btn btn-danger btn-sm">ลบ</a></p>
                    </div>
                <?php elseif($exten == 'docx' || $exten == 'DOCX' || $exten == 'doc' || $exten == 'DOC'): ?>
                    <div class="col-lg-3 mt-2">
                        <a href="<?php get_ul($filename, $folder_name) ?>" target="_blank">
                            <img src="<?php get_img('doc.png', '') ?>" width="40%">
                        </a>
                        <p><?php echo $filename; ?></p>
                        <p><a href="<?php echo $site_remove . $filename; ?>" class="btn btn-danger btn-sm">ลบ</a></p>
                    </div>
                <?php elseif($exten == 'xls' || $exten == 'XLS' || $exten == 'xlsx' || $exten == 'XLSX'): ?>
                    <div class="col-lg-3 mt-2">
                        <a href="<?php get_ul($filename, $folder_name) ?>" target="_blank">
                            <img src="<?php get_img('xls.png', '') ?>" width="40%">
                        </a>
                        <p><?php echo $filename; ?></p>
                        <p><a href="<?php echo $site_remove . $filename; ?>" class="btn btn-danger btn-sm">ลบ</a></p>
                    </div>
                <?php elseif($exten == 'zip' || $exten == 'ZIP' || $exten == 'rar' || $exten == 'RAR'): ?>
                    <div class="col-lg-3 mt-2">
                        <a href="<?php get_ul($filename, $folder_name) ?>" target="_blank">
                            <img src="<?php get_img('zip.png', '') ?>" width="40%">
                        </a>
                        <p><?php echo $filename; ?></p>
                        <p><a href="<?php echo $site_remove . $filename; ?>" class="btn btn-danger btn-sm">ลบ</a></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    $('.card-img-show .a-img-show').viewer({
        'title': false,
        'fullscreen': false,
        'toolbar': false,
        viewed: function () {
            var $class = $('.a-img-show').find('img').attr('class');
            $('.viewer-canvas').find('img').addClass($class);
        },
    });
    $('.btn-del').click(function () {
        return confirm('จะลบสิ่งนี้ใช่ไหม ?');
    });
</script>
<link rel="stylesheet" href="https://fengyuanchen.github.io/viewerjs/css/viewer.css" />
<script src="https://fengyuanchen.github.io/viewerjs/js/viewer.js"></script>
<script>
    new Viewer(document.getElementById('gallery1'),{
        'title': false,
        'fullscreen': false,
        'toolbar': false
    });
</script>


<script type="text/javascript" >
    $(function () {


        $("#upload").on("click",function(e){
            var objFile= $("<input>",{
                "class":"file_upload",
                "type":"file",
                "multiple":"true",
                "name":"file_upload[]",
                "style":"display:none",
                change: function(e){
                    var files = this.files
                    var image = this.files
                    showThumbnail(files)

                }
            });
            $(this).before(objFile);
            $(".file_upload:last").show().click().hide();

            e.preventDefault();
        });



        function showThumbnail(files){

            //    $("#thumbnail").html("");
            for(var i=0;i<files.length;i++){
                var file = files[i]
                var imageType = /image.*/
                if(!file.type.match(imageType)){
                    //     console.log("Not an Image");
                    continue;
                }
                var image = document.createElement("img");
                var thumbnail = document.getElementById("thumbnail");
                image.file = file;
                thumbnail.appendChild(image)
                image.width=200;

                var reader = new FileReader()
                reader.onload = (function(aImg){
                    return function(e){
                        aImg.src = e.target.result;
                    };
                }(image))

                var ret = reader.readAsDataURL(file);
                var canvas = document.createElement("canvas");
                ctx = canvas.getContext("2d");
                image.onload= function(){
                    ctx.drawImage(image,10,10)
                }

            } // end for loop

        } // end showThumbnail

    });

</script>
</body>
</html>