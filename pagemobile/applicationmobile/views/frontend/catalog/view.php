<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 14:39
 */
//var_dump($data);
$files = search_img($table_name, $set['no']);
$filter = $set['img_filter'];
$detail = $set['detail1'];
$subject = $set['subject'];
$datepost = $set['datepost'];
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="min-height: 300px">
                <div class="card-header">
                    <div class="fb-share-button float-right" data-layout="button_count" data-mobile-iframe="true"></div>
                    <b class="float-right">[<?php echo DateThaiNa($datepost) ?>]</b>
                    <h4 id="title"><?php echo $subject; ?></h4>
                </div>
                <div class="card-body" style="font-size: 1.5rem">
                    <div class="row">
                        <div class="col-lg-2 text-lg-right">
                            รายละเอียด :
                        </div>
                        <div class="col-lg-10">
                            <?php echo $detail; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row"  id="gallery1">
                        <div class="col-lg-2 text-lg-right">
                            รูปภาพ :
                        </div>
                        <div class="col-lg-10" >
                            <div class="row card-img-show">
                                <?php foreach ($files AS $fKey => $fVal):
                                    $filename = $fVal['filename'];
                                    $exten = explode('.', $filename)[1];
                                    if ($exten == 'jpg' || $exten == 'png' || $exten == 'jpeg' || $exten == 'gif' || $exten == 'bmp' || $exten == 'JPG' || $exten == 'PNG' || $exten == 'JPEG' || $exten == 'GIF' || $exten == 'BMP'): ?>
                                        <div class="col-lg-4 mt-2">
                                            <a>
                                                <img src="<?php get_ul($fVal['filename'], $folder_name) ?>" width="100%">
                                            </a>
                                        </div>
                                        <br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right">
                            ไฟล์เอกสาร :
                        </div>
                        <div class="col-lg-10">
                            <div class="row card-img-show">
                                <?php foreach ($files AS $fKey => $fVal):
                                    $filename = $fVal['filename'];
                                    $exten = explode('.', $filename)[1];
                                    if ($exten == 'pdf' || $exten == 'PDF'): ?>
                                        <div class="col-lg-4 mt-2">
                                            <a href="<?php get_pdf($fVal['filename'], $folder_name) ?>" target="_blank">
                                                <img src="<?php get_img('pdf.png', '') ?>" width="50%">
                                            </a>
                                        </div>
                                    <?php elseif ($exten == 'doc' || $exten == 'docx'): ?>
                                        <div class="col-lg-4 mt-2">
                                            <a href="<?php get_pdf($fVal['filename'], $folder_name) ?>" target="_blank">
                                                <img src="<?php get_img('doc.png', '') ?>" width="50%">
                                            </a>
                                        </div>
                                    <?php elseif ($exten == 'xls' || $exten == 'xlsx'): ?>
                                        <div class="col-lg-4 mt-2">
                                            <a href="<?php get_pdf($fVal['filename'], $folder_name) ?>" target="_blank">
                                                <img src="<?php get_img('xls.png', '') ?>" width="50%">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-lg-12 text-center">
                            <a href="#" onclick="window.history.back()" class="btn btn-outline-secondary">ย้อนกลับ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script !src="">
    $('.card-img-show .a-img-show').viewer({
        'title': false,
        'fullscreen': false,
        'toolbar': false,
        // 'movable': false,
        viewed: function () {
            var $class = $('.a-img-show').find('img').attr('class');
            $('.viewer-canvas').find('img').addClass($class);
        },
    });
    // $("meta[property='og:url']").attr('content', window.location.href);
    // $("meta[property='og:title']").attr('content', $('#title').text());
    // $("meta[property='og:description']").attr('content', $('#title').text());
    // $("meta[property='og:image']").attr('content', $('.a-img-show').find('img:first').attr('src'));
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
