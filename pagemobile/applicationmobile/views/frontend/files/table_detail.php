<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 10:11
 */
?>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover table-striped table-sm">
            <thead>
            <tr>
                <th width="50px" class="text-center">ลำดับ</th>
                <th>รายการ</th>
                <th width="100px">วันที่</th>
                <th width="50px" class="text-center">#</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($data) > 0): ?>
                <?php foreach ($data AS $dKey => $dVal): ?>
                    <tr>
                        <td class="text-center"><?php echo $offset + $dKey + 1 ?></td>
                        <td><?php echo $dVal['subject'] ?></td>
                        <td><?php echo DateThaiNa($dVal['datepost']) ?></td>
                        <td>
                            <a href="<?php echo $site_view . $dVal['no'] ?>"
                               class="btn btn-primary btn-sm">รายละเอียด</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">ไม่พบข้อมูล</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('component/pagination'); ?>
