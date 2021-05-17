<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/4/2561
 * Time: 10:00
 */
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

//var_dump($data);
?>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover table-striped table-sm">
            <thead>
            <tr>
                <th>รายการ</th>
                <th width="50px">สถานะ</th>
                <th width="100px" class="text-center">ปรับปรุง</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $key => $val):$status = Status($val['active']); ?>
                <tr>
                    <td><?php echo $val['name'] ?></td>
                    <td class="text-center">
                        <a data-href="<?php echo $site_change . $val['id']; ?>"
                           class="btn <?php echo $status['btn']; ?> btn-sm text-white btn-change">
                            <?php echo $status['like']; ?>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="<?php echo $site_view . $val['id'] ?>"
                           class="btn btn-warning btn-sm text-white">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a data-href="<?php echo $site_remove . $val['id']; ?>"
                           class="btn btn-danger btn-sm text-white btn-remove">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('component/pagination'); ?>
