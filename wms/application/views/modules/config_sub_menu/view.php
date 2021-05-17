<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 20/2/2561
 * Time: 13:12
 */
//var_dump($folders);
//var_dump($table_type);
?>
<div class="card card-shadow mb-3">
    <div class="card-header">
        <h2><?php echo $head; ?></h2>
    </div>
    <form action="<?php echo $site; ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ชื่อแสดงในเว็บ :</b>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="sub_name" id="sub_name"
                           value="<?php echo IsVal($set_data['sub_name']) ?>" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>Controller :</b>
                </div>
                <div class="col-lg-6 pr-lg-1">
                    <input type="text" class="form-control" name="controller" id="controller"
                           value="<?php echo IsVal($set_data['controller']) ?>" required>
                    <input type="text" id="default_controller"
                           value="<?php echo IsVal($set_data['controller']) ?>" hidden>
                </div>
                <div class="col-lg-2 pl-lg-1">
                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal"
                       data-target=".bd-example-modal-lg">เลือก Controllers</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 text-lg-right">
                    <b>Name Type :</b>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_type" id="name_type"
                               value="<?php echo IsVal($set_data['name_type']) ?>" required>
                        <small id="sub_nameHelp" class="form-text text-muted">
                            ชื่อประเภทโมดูล
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 text-lg-right">
                    <b>View Path :</b>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <select name="view_id" id="view_id" class="form-control" required>
                            <option value="">ไม่กำหนด</option>
                            <?php foreach ($view_path as $vKey => $vVal): ?>
                                <option value="<?php echo $vVal['view_id'] ?>" <?php echo IsSelect($set_data['view_id'], $vVal['view_id']) ?>>
                                    <?php echo $vVal['view_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small id="sub_nameHelp" class="form-text text-muted">
                            ชื่อ Path
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 text-lg-right">
                    <b>Table Name :</b>
                </div>
                <div class="col-lg-6 pr-lg-1">
                    <div class="form-group">
                        <select name="table_name" id="table_name" class="form-control" required>
                            <option value="">ไม่กำหนด</option>
                            <?php if ($set_data['table_name'] != '' && !in_array($set_data['table_name'], $tables)): ?>
                                <option value="<?php echo $set_data['table_name']; ?>"
                                        selected><?php echo $set_data['table_name']; ?></option>
                            <?php endif; ?>
                            <?php foreach ($tables as $tKey => $tVal): ?>
                                <option value="<?php echo $tVal ?>" <?php echo IsSelect($set_data['table_name'], $tVal) ?>><?php echo $tVal; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small id="sub_nameHelp" class="form-text text-muted">
                            * ถ้าไม่พบตารางที่ต้องการให้ไปสร้างตารางใหม่ก่อน
                        </small>
                    </div>
                </div>
                <div class="col-lg-2 pl-lg-1">
                    <a data-href="<?php echo site_url('utility/create_table'); ?>" data-title="table_name"
                       class="btn btn-primary btn-block text-white" id="add-table">เพิ่มตารางใหม่</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 text-lg-right">
                    <b>Folder Name :</b>
                </div>
                <div class="col-lg-6 pr-lg-1">
                    <div class="form-group">
                        <select name="folder_name" id="folder_name" class="form-control">
                            <option value="">ไม่กำหนด</option>
                            <?php if ($set_data['folder_name'] != ''): ?>
                                <option value="<?php echo $set_data['folder_name']; ?>"
                                        selected><?php echo $set_data['folder_name']; ?></option>
                            <?php endif; ?>
                            <?php foreach ($folders as $fKey => $fVal): ?>
                                <option value="<?php echo $fVal ?>"><?php echo $fVal; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small id="sub_nameHelp" class="form-text text-muted">
                            * ถ้าไม่พบโฟลเดอร์ที่ต้องการให้ไปสร้างโฟลเดอร์ใหม่ก่อน
                        </small>
                    </div>
                </div>
                <div class="col-lg-2 pl-lg-1">
                    <a data-href="<?php echo site_url('utility/create_folder'); ?>" data-title="folder_name"
                       class="btn btn-primary btn-block text-white" id="add-folder">เพิ่มโฟลเดอร์ใหม่</a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>เมนูระบบจัดการ :</b>
                </div>
                <div class="col-lg-8">
                    <select name="type_id" id="type_id" class="form-control">
                        <option value="0">ไม่กำหนด</option>
                        <?php foreach ($back_menus as $bKey => $bVal): ?>
                            <option value="<?php echo $bVal['id'] ?>" <?php echo IsSelect($set_data['type_id'], $bVal['id']) ?>><?php echo $bVal['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>เมนูหน้าเว็บ :</b>
                </div>
                <div class="col-lg-8">
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="0">ไม่กำหนด</option>
                        <?php foreach ($front_menus as $fnKey => $fnVal): ?>
                            <option value="<?php echo $fnVal['menu_id'] ?>" <?php echo IsSelect($set_data['menu_id'], $fnVal['menu_id']) ?>><?php echo $fnVal['menu_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ลำดับการแสดงเมนูในเว็บ:</b>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="list_no" id="list_no"
                           value="<?php $issets = IsVal($set_data['list_no']);
                           echo $issets == '' ? 0 : $issets; ?>">
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
if ($filename != ''): */?><!--
    <div class="card card-shadow mb-3">
        <div class="card-body text-center">
            <div class="row card-img-show">
                <div class="col-lg-3 mt-2">
                    <a class="a-img-show">
                        <?php /*$folder_name = 'service'; */?>
                        <img src="<?php /*get_img($filename, $folder_name); */?>">
                    </a>
                    <p><?php /*echo $filename; */?></p>
                </div>
            </div>
        </div>
    </div>
--><?php /*endif; */?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6" style="height: 400px;overflow-x: auto;">
                        <h2>Controller Frontend</h2>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>ชื่อ Controller</th>
                                <th class="text-lg-right">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($controllers['controller_front'] as $fcKey => $fcVal): ?>
                                <tr>
                                    <td>
                                        <?php echo $fcVal; ?>
                                    </td>
                                    <td class="text-lg-right">
                                        <a class="btn btn-primary btn-sm btn-chose text-white"
                                           data-set="<?php echo $fcVal; ?>">เลือก</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6" style="height: 400px;overflow-x: auto;">
                        <h2>Controller Backend</h2>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>ชื่อ Controller</th>
                                <th class="text-lg-right">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($controllers['controller_back'] as $fcKey => $fcVal): ?>
                                <tr>
                                    <td><?php echo $fcVal; ?></td>
                                    <td class="text-lg-right">
                                        <a class="btn btn-primary btn-sm btn-chose text-white"
                                           data-set="<?php echo $fcVal; ?>">เลือก</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add-data-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DataModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-2 text-lg-right">
                        <b>ชื่อ</b>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control"
                                   data-site="<?php echo site_url('utility/getname'); ?>">
                            <small id="table_help" class="form-text text-muted">
                                ชื่อตารางเก็บข้อมูลใหม่ (Table name) ต้องขึ้นต้นด้วย tb_
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row" id="table_row">
                    <div class="col-lg-2 text-lg-right">
                        <b>ประเภทตาราง</b>
                    </div>
                    <div class="col-lg-8">
                        <select name="type_table" id="type_table" class="form-control">
                            <?php foreach ($table_type as $ttKey => $ttVal): ?>
                                <option value="<?php echo $ttVal['view_id'] ?>"><?php echo $ttVal['view_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-add-data" disabled>บันทึก</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<script !src="">
    var $controller = $('#controller'), $default_cl = $('#default_controller'), $chose = $('.btn-chose'),
        $modal = $('.bd-example-modal-lg'), $AddTable = $('#add-table'), $AddFolder = $('#add-folder'),
        $ModalAddData = $('#add-data-modal'), $Title = $('#DataModalLabel'), $TitleName = '', $append = '',
        $TypeAdd = 1, $BtnAddData = $('#btn-add-data'), $InputName = $('#name'), $DataSend = [],
        $TypeTable = $('#type_table'), $TableHelp = $('#table_help'),
        $TableRow = $('#table_row'), $Url = '', $TargetSelect = '';
    $controller.keyup(function () {
        alert('อาจเกิดข้อผิดพลาดได้ถ้าคุณกรอกข้อมูลเอง');
        var $val = $default_cl.val();
        $(this).val($val);
    });
    $chose.click(function () {
        var $val = $(this).attr('data-set');
        $modal.modal('hide');
        $controller.val($val);
        $default_cl.val($val);
    });

    $AddTable.click(function () {
        $Url = $(this).attr('data-href');
        $TitleName = $(this).text();
        $ModalAddData.modal('show');
        $TypeAdd = 1;
        $TargetSelect = $(this).attr('data-title');
        AddText($TypeAdd)
    });
    $AddFolder.click(function () {
        $Url = $(this).attr('data-href');
        $TitleName = $(this).text();
        $ModalAddData.modal('show');
        $TypeAdd = 0;
        $TargetSelect = $(this).attr('data-title');
        AddText($TypeAdd)
    });
    $ModalAddData.on('show.bs.modal', function () {
        $Title.text($TitleName);
        $InputName.val('');
        $InputName.css({'border-color': '#ced4da'});
    });
    $BtnAddData.click(function () {
        AddData($TypeAdd);
        a2data($DataSend, $Url, function (response) {
            if (response) {
                addselect($TargetSelect, $InputName.val());
            } else {
                alert('พบข้อผิดพลาด');
            }
            $ModalAddData.modal('hide');
        });

    });
    $InputName.keyup(function () {
        AddData($TypeAdd);
        var url = $InputName.attr('data-site');
        var $tb = $(this).val();
        $tb = $tb.split('_')[1];
        if ($(this).val() != '') {
            if ($TypeAdd == 1 && $tb == undefined || $TypeAdd == 1 && $tb == '') {
                $InputName.css({'border-color': 'red'});
                $BtnAddData.attr('disabled', true);
            } else {
                a2data($DataSend, url, function (response) {
                    IssetInput(response);
                });
            }
        } else {
            $InputName.css({'border-color': '#ced4da'});
            $BtnAddData.attr('disabled', true);
        }
    });

    function AddText($TypeAdd) {
        if ($TypeAdd == 1) {
            $TableHelp.attr('hidden', false);
            $TableRow.attr('hidden', false);
        } else {
            $TableHelp.attr('hidden', true);
            $TableRow.attr('hidden', true);
        }
    }

    function AddData($TypeAdd) {
        $DataSend = [];
        $DataSend = $TypeAdd == 1 ? {name: $InputName.val(), type: $TypeTable.val()} : {name: $InputName.val()};
    }

    function IssetInput(chk) {
        if (!chk) {
            $InputName.css({'border-color': 'red'});
            $BtnAddData.attr('disabled', true);
        } else {
            $InputName.css({'border-color': 'green'});
            $BtnAddData.attr('disabled', false);
        }
    }

    function addselect(name, val) {
        $("#" + name).append("<option value='" + val + "' selected>" + val + "</option>");
    }
</script>