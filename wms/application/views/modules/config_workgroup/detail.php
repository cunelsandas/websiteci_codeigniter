<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/4/2561
 * Time: 15:08
 */
?>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-striped table-sm">
            <thead>
            <tr>
                <th>รายการ</th>
                <th width="50px" class="text-center">ลำดับ</th>
                <th width="100px" class="text-center">ปรับปรุง</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($data)): ?>
                <?php foreach ($data as $dKey => $dVal): ?>
                    <tr>
                        <td><?php echo $dVal['name'] ?></td>
                        <td class="text-center"><?php echo $dVal['listno']; ?></td>
                        <td>
                            <a href="<?php echo $site_view . $dVal['id'] ?>" class="btn btn-warning btn-sm text-white">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a data-href="<?php echo $site_remove . $dVal['id'] ?>"
                               class="btn btn-danger btn-remove btn-sm text-white">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center"><b>ไม่พบข้อมูล</b></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('component/pagination') ?>
