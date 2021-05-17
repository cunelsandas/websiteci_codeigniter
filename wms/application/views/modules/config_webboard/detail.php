<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 31/3/2561
 * Time: 10:07
 */
?>
<style>
    .tr-link:hover {
        cursor: pointer;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover table-sm">
            <thead>
            <tr>
                <th>หัวข้อ</th>
                <th class="text-center" width="50px">ตอบ</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($data) > 0): ?>
                <?php foreach ($data AS $dKey => $dVal): ?>
                    <tr class="tr-link" data-site="<?php echo $site_view . $dVal['wid']; ?>">
                        <td style="padding-left: 20px;">
                            <b><?php echo $dVal['subject']; ?></b>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;โดย
                                : <?php echo $dVal['postby'] . ' เวลา ' . DateTimeThai($dVal['createdate']) ?></p>
                        </td>
                        <td class="text-center">
                            <?php
                            echo $this->db->where('wid', $dVal['wid'])->get('tb_wb_sub')->num_rows();
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" class="text-center">
                        <b>ไม่พบข้อมูล</b>
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$this->load->view('component/pagination');
?>
<script>
    var $Tr_Link = $('.tr-link');
    var $Site = '';
    $Tr_Link.click(function () {
        $Site = $(this).attr('data-site');
        window.location.href = $Site;
    });
</script>
