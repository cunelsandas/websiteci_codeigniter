<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 31/3/2561
 * Time: 10:07
 */
?>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover table-striped table-sm">
                <thead>
                <tr>
                    <th width="50px">ลำดับ</th>
                    <th>ชื่อ</th>
                    <th width="90px" class="text-center">ปรับปรุง</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($data) > 0): ?>
                    <?php foreach ($data as $dKey => $dVal): ?>
                        <tr>
                            <td class="text-center"><?php echo($offset + $dKey + 1); ?></td>
                            <td><?php echo $dVal['view_name']; ?></td>
                            <td class="text-center">
                                <a href="<?php echo $site_view . $dVal['view_id'] ?>"
                                   class="btn btn-warning btn-sm text-white">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a data-href="<?php echo $site_remove . $dVal['view_id']; ?>"
                                   class="btn btn-danger btn-sm text-white btn-remove">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center"><b>ไม่พบข้อมูล</b></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
$this->load->view('component/pagination');
?>