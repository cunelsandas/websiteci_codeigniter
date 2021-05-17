<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 20/2/2561
 * Time: 13:12
 */
//var_dump($data);
?>
<div class="card card-shadow mb-3">
    <div class="card-header">
        <h2><?php echo $head; ?></h2>
    </div>
    <form action="<?php echo $site; ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ชื่อ-นามสกุล :</b>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="name" id="name"
                           value="<?php echo IsVal($set_data['name']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ตำแหน่ง :</b>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="position" id="position"
                           value="<?php echo IsVal($set_data['position']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>เบอร์โทรศัพท์ :</b>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="telephone" id="telephone"
                           value="<?php echo IsVal($set_data['telephone']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>บล๊อกการแสดง :</b>
                </div>
                <div class="col-lg-3">
                    <select name="sid" id="sid" class="form-control">
                        <option value="" selected disabled>กรุณาเลือกบล็อกการแสดง</option>
                        <?php foreach ($officer_show as $ftKey => $ftVal): ?>
                            <option value="<?php echo $ftVal['showid'] ?>" <?php echo IsSelect($set_data['sid'], $ftVal['showid']) ?>><?php echo $ftVal['shownumber'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ลำดับการแสดง :</b>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control" name="nolist" id="nolist"
                           value="<?php echo IsVal($set_data['nolist']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ประวัติการทำงาน :</b>
                </div>
                <div class="col-lg-8">
                    <textarea name="detail" id="detail"
                              class="edit-text"><?php echo IsVal($set_data['history']) ?></textarea>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2" style="white-space: nowrap;">
                    <b>jpeg,jpg,gif,png,bmp :</b>
                </div>
                <div class="col-lg-9">
                    <?php for ($i = 0; $i < 1; $i++): ?>
                        <div class="row">
                            <div class="col-lg-1 text-lg-right pr-0 pt-2">
                                ไฟล์ <?php echo $i + 1 ?>
                            </div>
                            <div class="col-lg-6">
                                <div data-num="1" data-watermark="" data-size="640"
                                     class="div-input-file"></div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
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
<?php if (count($files) > 0): ?>
    <div class="card card-shadow mb-3">
        <div class="card-body text-center">
            <div class="row card-img-show">
                <?php foreach ($files AS $fKey => $fVal):
                    $filename = $fVal['filename'];
                    $exten = explode('.', $filename)[1];
                    if ($exten == 'pdf'): ?>
                        <div class="col-lg-3 mt-2">
                            <a href="<?php get_ul($filename, $folder_name) ?>" target="_blank">
                                <img src="<?php get_img('pdf.png', '') ?>" width="100%">
                            </a>
                            <p><?php echo $filename; ?></p>
                            <p><a href="<?php echo $site_remove . $filename; ?>" class="btn btn-danger btn-sm">ลบ</a>
                            </p>
                        </div>
                    <?php else: ?>
                        <div class="col-lg-3 mt-2">
                            <a class="a-img-show">
                                <img src="<?php get_ul($filename, $folder_name) ?>"
                                     width="100%">
                            </a>
                            <p><?php echo $filename; ?></p>
                            <p><a href="<?php echo $site_remove . $filename; ?>" class="btn btn-danger btn-sm">ลบ</a>
                            </p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
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
</script>