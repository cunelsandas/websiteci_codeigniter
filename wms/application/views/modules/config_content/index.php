<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 20/2/2561
 * Time: 13:11
 */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-shadow">
                <div class="card-header">
                    <h1><?php echo $head; ?></h1>
                </div>
                <div class="card-body">
                    <form action="<?php echo $site; ?>" method="post">
                        <div class="row mb-2">
                            <div class="col-lg-2">
                                <b>รายละเอียด :</b>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="detail" id="detail" class="edit-text">
                                    <?php if (isset($detail)) {
                                        echo $detail;
                                    } ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success btn-block">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

