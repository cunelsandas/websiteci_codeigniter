<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 10:11
 */
?>
<?php if (count($data) > 0): ?>
    <?php foreach ($data AS $dKey => $dVal): $file = search_img_one($table_name, $dVal['no']); ?>
        <div class="row mb-3">
            <div class="col-lg-2"></div>
            <div class="col-lg-3">
                <div class="card text-center">
                    <img class="card-img" style="display: block;width: 100%"
                         src="<?php get_ul($file, $folder_name) ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="<?php echo $site_view . $dVal['no']; ?>"><?php echo $dVal['subject'] ?></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $dVal['detail1'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <b><?php echo DateThaiNa($dVal['datepost']); ?></b>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-lg-12 text-center">
        <h4>ไม่พบข้อมูล</h4>
    </div>
<?php endif; ?>
<?php $this->load->view('component/pagination'); ?>
