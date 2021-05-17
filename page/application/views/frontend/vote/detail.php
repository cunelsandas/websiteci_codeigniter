<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/5/2561
 * Time: 14:08
 */
//var_dump($data);
?>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                <tr>
                    <th class="text-center">หัวข้อ</th>
                    <th width="120px">วันที่</th>
                    <th width="50px">#</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($data) > 0): ?>
                    <?php foreach ($data as $key => $val): ?>
                        <tr>
                            <td><?php echo $val['name'] ?></td>
                            <td><?php echo DateThaiNa($val['date']); ?></td>
                            <td>
                                <a data-href="<?php echo $site_view . $val['id']; ?>"
                                   class="btn btn-primary btn-sm btn-vote text-white">Vote</a>
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
<?php $this->load->view('component/pagination'); ?>