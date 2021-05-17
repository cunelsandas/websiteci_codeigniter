<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 31/3/2561
 * Time: 10:07
 */
//var_dump($data);
function Status($status)
{
    $btn = 'btn-primary';
    $like = '<i class="fa fa-thumbs-o-up"></i>';
    if ($status == 0) {
        $btn = 'btn-danger';
        $like = '<i class="fa fa-thumbs-o-down"></i>';
    }
    $data = ['btn' => $btn, 'like' => $like];
    return $data;
}

?>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover table-striped table-sm">
                <thead>
                <tr>
                    <th width="50px">ลำดับ</th>
                    <th>รายการ</th>
                    <th width="100px">วันที่เขียน</th>
                    <th width="50px">สถานะ</th>
                    <th width="90px" class="text-center">ปรับปรุง</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($data) > 0): ?>
                    <?php foreach ($data as $dKey => $dVal):$status = Status($dVal['status']); ?>
                        <tr>
                            <td class="text-center"><?php echo $offset + $dKey + 1 ?></td>
                            <td><?php echo $dVal['subject'] ?></td>
                            <td><?php echo DateThaiNa($dVal['datepost']); ?></td>
                            <td class="text-center">
                                <a data-href="<?php echo $site_change . $dVal['no']; ?>"
                                   class="btn <?php echo $status['btn']; ?> btn-sm text-white btn-change">
                                    <?php echo $status['like']; ?>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo $site_view . $dVal['no'] ?>"
                                   class="btn btn-warning btn-sm text-white">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a data-href="<?php echo $site_remove . $dVal['no']; ?>"
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