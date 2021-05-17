<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 20/2/2561
 * Time: 13:12
 */
?>
<div class="card card-shadow mb-3">
    <div class="card-header">
        <h2><?php echo $head; ?></h2>
    </div>
    <form action="<?php echo $site; ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <?php if ($set_data['id'] != ''): ?>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>รูป Slide Show :</b>
                    </div>
                    <div class="col-lg-8">
                        <img src="<?php get_ul($set_data['filename'], $folder_name); ?>" width="100%">
                    </div>
                </div>
            <?php endif; ?>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>link</b>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="link" id="link" class="form-control"
                           value="<?php echo IsVal($set_data['link']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2" style="white-space: nowrap;">
                    <b>jpeg,jpg,gif,png,bmp,pdf :</b>
                </div>
                <div class="col-lg-9">
                    <?php for ($i = 0; $i < 1; $i++): ?>
                        <div class="row">
                            <div class="col-lg-1 text-lg-right pr-0 pt-2">
                                ไฟล์ <?php echo $i + 1 ?>
                            </div>
                            <div class="col-lg-9">
                                <div data-num="1" data-watermark=""
                                     class="div-input-file"></div>
                            </div>
                        </div>
                    <?php endfor; ?>
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