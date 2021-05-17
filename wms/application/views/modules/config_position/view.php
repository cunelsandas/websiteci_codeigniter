<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 20/2/2561
 * Time: 13:12
 */
//var_dump($files);
?>
<div class="card card-shadow mb-3">
    <div class="card-header">
        <h2><?php echo $head; ?></h2>
    </div>
    <form action="<?php echo $site; ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ชื่อ Banner :</b>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="name" id="name"
                           value="<?php echo IsVal($set_data['name']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>รายละเอียด :</b>
                </div>
                <div class="col-lg-8">
                    <textarea name="detail" id="detail"
                              class="edit-text"><?php echo IsVal($set_data['detail']) ?></textarea>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ความกว้าง / Width (pixel) :</b>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="banner_width" id="banner_width" class="form-control"
                           value="<?php echo IsVal($set_data['banner_width']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ความสูง / Height (pixel) :</b>
                </div>
                <div class="col-lg-8">
                    <input type="text" name="banner_height" id="banner_height" class="form-control"
                           value="<?php echo IsVal($set_data['banner_height']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-8 offset-lg-2">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="status"
                               name="status" value="1" <?php echo IsCheck($set_data['status']) ?>>
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-8 offset-lg-2">
                    <button type="submit" class="btn btn-success btn-block">บันทึก</button>
                </div>
            </div>
        </div>
    </form>
</div>