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
                        <b>ชื่อเมนู :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="file_type_name" id="file_type_name"
                               value="<?php echo IsVal($set_data['file_type_name']) ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>กลุ่มเมนู :</b>
                    </div>
                    <div class="col-lg-8">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">เลือก</option>
                            <?php foreach ($group_menus as $gKey => $gVal): ?>
                                <option value="<?php echo $gVal['menu_id'] ?>" <?php echo IsSelect($set_data['menu_id'], $gVal['menu_id']) ?>><?php echo $gVal['menu_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>ลำดับการแสดงผล :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="list_no" id="list_no"
                               value="<?php echo IsVal($set_data['list_no']) ?>">
                    </div>
                </div>
                <!--<div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>รูปเมนู :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="file" name="menufile" id="menufile" class="form-control">
                    </div>
                </div>-->
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