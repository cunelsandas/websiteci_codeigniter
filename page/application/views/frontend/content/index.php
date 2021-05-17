<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17/3/2561
 * Time: 12:03
 */
?>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-shadow">
                <div class="card-header">
                    <h2><?php echo $head; ?></h2>
                </div>
                <div class="card-body">
                    <?php echo $detail; ?>
                    <div class="row mt-2">
                        <div class="col-lg-12 text-center">
                            <a href="#" onclick="window.history.back()" class="btn btn-outline-secondary">ย้อนกลับ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
