<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/2/2561
 * Time: 15:50
 */
$title = $this->db->select('web_title')->from('tb_profile')->get()->row('web_title');
?>
<div style="width: 100%;" class="pc-view">
    <div class="card">
        <div class="card-header" style="height: 100px;background-color: #ffa7b3;">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="text-light">
                        ระบบจัดการเว็บไซต์ Website Management System [WMSi]
                    </h3>
                    <h6 class="text-light">
                        <?php echo WEBNAME; ?>
                    </h6>
                </div>
                <div class="col-lg-2 text-lg-right">
                    <h3 class="text-light">ยินดีต้อนรับ
                        <a href="<?php echo site_url('') ?>" class="btn btn-danger" data-toggle="tooltip"
                           data-placement="bottom" title="ออกจากระบบ">
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

