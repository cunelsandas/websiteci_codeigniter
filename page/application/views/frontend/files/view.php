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
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="min-height: 300px">
                <div class="card-header">
                    <b class="float-right">[<?php echo DateThaiNa($set['datepost']) ?>]</b>
                    <h4><?php echo $set['subject'] ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 text-lg-right">
                            ประเภท :
                        </div>
                        <div class="col-lg-10" style="font-size: 1.1rem">
                            <?php echo $file_type; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right" style="font-size: 1.1rem">
                            รายละเอียด :
                        </div>
                        <div class="col-lg-10" style="font-size: 1.1rem">
                            <?php echo $set['detail']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right">
                            ไฟล์เอกสาร :
                        </div>
                        <div class="col-lg-10">
                            <?php foreach ($files AS $fKey => $fVal): $exten = explode('.', $fVal['filename'])[1];
                                if ($exten == 'pdf' || $exten == 'PDF'): ?>
                                    <a href="<?php get_pdf($fVal['filename'], $folder_name) ?>" target="_blank">
                                        <img src="<?php get_img('pdf.png', '') ?>" width="15%">
                                    </a>
                                <?php elseif ($exten == 'doc' || $exten == 'docx'): ?>
                                    <a href="<?php get_pdf($fVal['filename'], $folder_name) ?>" target="_blank">
                                        <img src="<?php get_img('doc.png', '') ?>" width="15%">
                                    </a>
                                <?php elseif ($exten == 'xls' || $exten == 'xlsx'): ?>
                                    <a href="<?php get_pdf($fVal['filename'], $folder_name) ?>" target="_blank">
                                        <img src="<?php get_img('xls.png', '') ?>" width="15%">
                                    </a>
                                <?php else: ?>
                            <div class="row card-img-show">
                                    <a class="a-img-show href="<?php get_ul($fVal['filename'], $folder_name) ?>">
                                        <img src="<?php get_ul($fVal['filename'], $folder_name) ?>" width="100%">
                                    </a>
                            </div>
                                <br>
                                <?php endif; ?>
                            <?php endforeach; ?>
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
