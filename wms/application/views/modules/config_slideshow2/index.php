<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/5/2561
 * Time: 9:37
 */
?>
<div class="card card-shadow mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <h4><?php echo $head; ?></h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo $site ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-2 text-lg-right pr-lg-1 mt-2">
                    ไฟล์ขนาดไม่เกิน 20 Mb :
                </div>
                <div class="col-lg-8 pl-lg-1">
                    <div data-num="1" data-watermark=""
                         data-size="640" class="div-input-file"></div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-8 offset-lg-2 pl-lg-1">
                    <button type="submit" class="btn btn-success btn-block">บันทึก</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card card-shadow mb-3">
    <div class="card-body text-center">
        <div class="row card-img-show">
            <?php foreach ($files AS $fKey => $fVal):
                $filename = $fVal['filename'];
                $exten = pathinfo($filename, PATHINFO_EXTENSION);
                if ($exten == 'pdf'): ?>
                    <div class="col-lg-3 mt-2">
                        <a href="<?php get_ul($filename, $folder_name) ?>" target="_blank">
                            <img src="<?php get_img('pdf.png', '') ?>" width="100%">
                        </a>
                        <p><?php echo $filename; ?></p>
                        <p><a href="<?php echo $site_remove . $filename; ?>" class="btn btn-danger btn-sm">ลบ</a></p>
                    </div>
                <?php else: ?>
                    <div class="col-lg-3 mt-2">
                        <a class="a-img-show">
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
<script>
    $('.card-img-show').viewer({
        'title': false,
        'fullscreen': false,
        'toolbar': false,
        viewed: function () {
            var $class = $('.a-img-show').find('img').attr('class');
            $('.viewer-canvas').find('img').addClass($class);
        },
    });
</script>
