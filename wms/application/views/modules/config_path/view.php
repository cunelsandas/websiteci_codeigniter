<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 20/2/2561
 * Time: 13:12
 */
?>
    <div class="card card-shadow mb-3">
        <div class="card-header">
            <h2><?php echo $head; ?></h2>
        </div>
        <form action="<?php echo $site; ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>name :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="view_name" id="view_name"
                               value="<?php echo IsVal($set_data['view_name']) ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>web_path :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="view_path" id="view_path"
                               value="<?php echo IsVal($set_data['view_path']) ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>wms_path :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="wms_path" id="wms_path"
                               value="<?php echo IsVal($set_data['wms_path']) ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>script create table :</b>
                    </div>
                    <div class="col-lg-8">
                        <textarea name="create_table" id="create_table" cols="30" class="form-control"
                                  rows="10"><?php echo IsVal($set_data['create_table']) ?></textarea>
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
<?php
/*$filename = $set_data['image'];
if ($filename != ''):
    */ ?><!--
    <div class="card card-shadow mb-3">
        <div class="card-body text-center">
            <div class="row card-img-show">
                <div class="col-lg-3 mt-2">
                    <a class="a-img-show">
                        <img src="<?php /*get_img($filename, $folder_name) */ ?>">
                    </a>
                    <p><?php /*echo $filename; */ ?></p>
                    <p>
                        <a href="<?php /*echo $site_remove . $filename; */ ?>" class="btn btn-danger btn-sm">ลบ</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
--><?php /*endif; */ ?>