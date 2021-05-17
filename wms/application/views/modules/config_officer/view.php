<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 20/2/2561
 * Time: 13:12
 */
//var_dump($data);
?>
<div class="card card-shadow mb-3">
    <div class="card-header">
        <h2><?php echo $head; ?></h2>
    </div>
    <form action="<?php echo $site; ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ชื่อ-นามสกุล :</b>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="name" id="name"
                           value="<?php echo IsVal($set_data['name']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ตำแหน่ง :</b>
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="position" id="position"
                           value="<?php echo IsVal($set_data['position']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>หน่วยงาน :</b>
                </div>
                <div class="col-lg-4" id="site" data-site="<?php echo site_url('officer/search_group') ?>">
                    <select name="office_type" id="sid" class="form-control" required>
                        <option value="" selected disabled>หน่วยงาน</option>
                        <?php foreach ($officer_type as $ftKey => $ftVal): ?>
                            <option value="<?php echo $ftVal['office_type_id'] ?>" <?php echo IsSelect($set_data['offid'], $ftVal['office_type_id']) ?>><?php echo $ftVal['office_type_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>สายงานหลัก :</b>
                </div>
                <div class="col-lg-4">
                    <select name="work_group" id="work_group" class="form-control">
                        <option value="0" selected disabled>หัวหน้าส่วน/รอง</option>
                        <?php foreach ($officer_group as $ftKey => $ftVal): ?>
                            <option value="<?php echo $ftVal['id'] ?>" <?php echo IsSelect($set_data['workgroupid'], $ftVal['id']) ?>><?php echo $ftVal['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>สายงานย่อย :</b>
                </div>
                <div class="col-lg-4">
                    <select name="sub_group" id="sub_group" class="form-control">
                        <option value="0" selected disabled>หัวหน้าฝ่าย/เจ้าหน้าที่</option>
                        <?php foreach ($officer_subworkgroup as $ftKey => $ftVal): ?>
                            <option value="<?php echo $ftVal['id'] ?>" <?php echo IsSelect($set_data['subworkgroupid'], $ftVal['id']) ?>><?php echo $ftVal['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ชื่องาน :</b>
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="workgroup" id="workgroup"
                           value="<?php echo IsVal($set_data['workgroup']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>บล๊อกการแสดง หัวหน้ากอง/ส่วน(1) :</b>
                </div>
                <div class="col-lg-4">
                    <select name="sid" id="" class="form-control">
                        <option value="0" selected disabled>- - - - กรุณาเลือกบล็อกการแสดง - - - -</option>
                        <?php foreach ($officer_show as $ftKey => $ftVal): ?>
                            <option value="<?php echo $ftVal['showid'] ?>" <?php echo IsSelect($set_data['sid'], $ftVal['showid']) ?>><?php echo $ftVal['shownumber'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ลำดับการแสดง :</b>
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="nolist" id="nolist"
                           value="<?php echo IsVal($set_data['nolist']) ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ประวัติการทำงาน :</b>
                </div>
                <div class="col-lg-8">
                    <textarea name="detail" id="detail"
                              class="edit-text"><?php echo IsVal($set_data['history']) ?></textarea>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2" style="white-space: nowrap;">
                    <b>jpeg,jpg,gif,png,bmp :</b>
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
                        <input type="checkbox" class="form-check-input" id="active"
                               name="active" value="1" <?php echo IsCheck($set_data['status']) ?>>
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
<script>
    $('.card-img-show .a-img-show').viewer({
        'title': false,
        'fullscreen': false,
        'toolbar': false,
        viewed: function () {
            var $class = $('.a-img-show').find('img').attr('class');
            $('.viewer-canvas').find('img').addClass($class);
        },
    });
    $('#sid').change(function () {
        ajax2data({select: $(this).val(), type: ''}, $('#site').attr('data-site'), function (d) {
            add_select('#work_group', d, 'หัวหน้าส่วน/รอง');
        });
    });
    $('#work_group').change(function () {
        ajax2data({select: $(this).val(), type: 'no'}, $('#site').attr('data-site'), function (d) {
            add_select('#sub_group', d, 'หัวหน้าฝ่าย/เจ้าหน้าที่');
        });
    });

    function add_select(id, data, name) {
        $(id).empty();
        $(id).append($('<option>', {
            value: 0,
            text: name
        }));
        $.each(data, function (i, item) {
            $(id).append($('<option>', {
                value: item.id,
                text: item.name
            }));
        });
    }
</script>