<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 text-lg-right">
                            รายละเอียด :
                        </div>
                        <div class="col-lg-10">
                            <?php echo $detail; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right">
                            ภาพ/ไฟล์เอกสาร :
                        </div>
                        <div class="col-lg-10">
                            <div class="row card-img-show">
                                <?php foreach ($files AS $fKey => $fVal):
                                    $filename = $fVal['filename'];
                                    $exten = explode('.', $filename)[1];
                                    if ($exten == 'pdf'): ?>
                                        <a href="<?php get_pdf($filename, $folder_name) ?>" target="_blank">
                                            <img src="<?php get_img('pdf.png', '') ?>" width="35%" >
                                        </a>
                                    <?php else: ?>
                                        <div class="col-lg-3 mt-2">
                                            <a class="a-img-show">
                                                <img class="<?php echo $filter ?>"
                                                     src="<?php get_ul($filename, $folder_name) ?>"
                                                     width="100%">
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
