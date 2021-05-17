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
                        <b>ประเภท :</b>
                    </div>
                    <div class="col-lg-8">
                        <select name="position" id="position" class="form-control">
                            <?php foreach ($banner_position as $ftKey => $ftVal): ?>
                                <option value="<?php echo $ftVal['id'] ?>" <?php echo IsSelect($set_data['position'], $ftVal['id']) ?>><?php echo $ftVal['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>คำอธิบาย (alt) :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="alt" id="alt" class="form-control"
                               value="<?php echo IsVal($set_data['alt']) ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>link</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="link_to" id="link_to" class="form-control"
                               value="<?php echo IsVal($set_data['link_to']) ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>ลำดับการแสดง</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="listno" id="listno" class="form-control"
                               value="<?php echo IsVal($set_data['listno']) ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-2" style="white-space: nowrap;">
                        <b>jpeg,jpg,gif,png,bmp,pdf :</b>
                    </div>
                    <div class="col-lg-9">
                        <?php for ($i = 0; $i < 1; $i++): ?>
                            <div class="row">
                                <div class="col-lg-1 text-lg-right pr-0 pt-2">
                                    ไฟล์ <?php echo $i + 1 ?>
                                </div>
                                <div class="col-lg-6">
                                    <div data-num="1" data-watermark="" data-size="640"
                                         class="div-input-file"></div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="status"
                                   name="status" value="1" <?php echo IsCheck($set_data['status']) ?>>
                            <label class="form-check-label" for="status">Active</label>
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
<?php if (count($files) > 0): ?>
    <div class="card card-shadow mb-3">
        <div class="card-body text-center">
            <div class="row card-img-show">
                <?php foreach ($files AS $fKey => $fVal):
                    $filename = $fVal['filename'];
                    $exten = explode('.', $filename)[1];
                    if ($exten == 'pdf'): ?>
                        <div class="col-lg-3 mt-2">
                            <a href="<?php get_ul($filename, $folder_name) ?>" target="_blank">
                                <img src="<?php get_img('pdf.png', '') ?>" width="100%">
                            </a>
                            <p><?php echo $filename; ?></p>
                            <p><a href="<?php echo $site_remove . $filename; ?>" class="btn btn-danger btn-sm">ลบ</a>
                            </p>
                        </div>
                    <?php else: ?>
                        <div class="col-lg-3 mt-2">
                            <a class="a-img-show">
                                <img src="<?php get_ul($filename, $folder_name) ?>"
                                     width="100%">
                            </a>
                            <p><?php echo $filename; ?></p>
                            <p><a href="<?php echo $site_remove . $filename; ?>" class="btn btn-danger btn-sm">ลบ</a>
                            </p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>