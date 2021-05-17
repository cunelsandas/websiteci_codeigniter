<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 28/3/2561
 * Time: 10:09
 */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-shadow">
                <div class="card-header">
                    <h2><?php echo $head; ?></h2>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $detail; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('component/map'); ?>
                <div class="row mt-2 mb-2">
                    <div class="col-lg-12 text-center">
                        <a href="#" onclick="window.history.back()" class="btn btn-outline-secondary">ย้อนกลับ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

