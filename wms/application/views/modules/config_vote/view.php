<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/5/2561
 * Time: 8:50
 */
//var_dump($set_data);
//var_dump($vote_detail);
?>
<div class="modal fade" id="ModalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="HeadModal"
                    data-field="<?php echo $set_data['id']; ?>"><?php echo $head; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">ชื่อหัวข้อ</div>
                    <div class="col-lg-8">
                        <input type="text" name="name" id="name" value="<?php echo IsVal($set_data['name']) ?>"
                               class="form-control">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">วันที่</div>
                    <div class="col-lg-8">
                        <input type="text" name="date" id="date"
                               value="<?php echo DateB(IsVal($set_data['date'])) ?>"
                               class="form-control datepick">
                    </div>
                </div>
                <?php if ($set_data['id'] != ''): ?>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-lg-6 offset-lg-2 pr-lg-1">
                            <input type="text" name="NewOption" id="NewOption" class="form-control"
                                   placeholder="ตัวเลือกใหม่">
                        </div>
                        <div class="col-lg-2 text-lg-right pl-lg-1">
                            <a id="AddOption" class="btn btn-success btn-block text-white"
                               data-site="<?php echo $site_save_detail; ?>">
                                <i class="fa fa-plus"></i>เพิ่มตัวเลือก</a>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8 offset-lg-2">
                            <table class="table table-bordered table-sm" id="OptionTable">
                                <thead>
                                <tr>
                                    <th class="text-center">ตัวเลือก</th>
                                    <th class="text-center" width="100px">จัดการ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="tr-html" hidden>
                                    <td class="text-center">
                                        <input type="text" class="form-control border-0 bg-white TextName" disabled>
                                    </td>
                                    <td class="text-center">
                                        <a data-href="<?php echo $site_save_detail; ?>"
                                           data-field=""
                                           class="btn btn-warning btn-sm text-white btn-edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a data-href="<?php echo $site_del_detail; ?>"
                                           data-field=""
                                           class="btn btn-danger btn-sm text-white btn-del-option">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php foreach ($vote_detail as $vdKey => $vdVal): ?>
                                    <tr>
                                        <td class="text-center">
                                            <input type="text" class="form-control border-0 bg-white TextName"
                                                   value="<?php echo $vdVal['name'] ?>" disabled>
                                        </td>
                                        <td class="text-center">
                                            <a data-href="<?php echo $site_save_detail; ?>"
                                               data-field="<?php echo $vdVal['id']; ?>"
                                               class="btn btn-warning btn-sm text-white btn-edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a data-href="<?php echo $site_del_detail; ?>"
                                               data-field="<?php echo $vdVal['id']; ?>"
                                               class="btn btn-danger btn-sm text-white btn-del-option">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="Vote" data-href="<?php echo $site_save; ?>">
                    บันทึก
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<script>
    var ModalS = $('#ModalShow'), BtnEdit = '.btn-edit', BtnDelOption = '.btn-del-option',
        BtnAddOption = $('#AddOption'),
        OptionTable = $('#OptionTable tbody'), NewOption = $('#NewOption'), $Field = $('#HeadModal').attr('data-field'),
        Vote = $('#Vote'), TextName = $('#name'), TextDate = $('#date'),
        page = parseInt($('.pagination .page-item.active .page-link').text());
    ModalS.modal('show');
    ModalS.on('hide.bs.modal', function () {
        $data = {data: search.val(), page: page};
        url = div.attr('data-site');
        load_page($data, url, div)
    });
    OptionTable.on('click', BtnEdit, function () {
        var Text = $(this).closest('tr').find('.TextName'), Url = $(this).attr('data-href'),
            $field = $(this).attr('data-field');
        if (Text.attr('disabled')) {
            Text.attr('disabled', false);
            Text.focus();
        } else {
            Text.attr('disabled', true);
            var Data = {field: $Field, data: Text.val()};
            Url = Url + $field;
            UpdateOption(Data, Url, Text);
        }
        $(this).toggleClass('btn-success');
        $(this).toggleClass('btn-warning');
        $(this).find('i').toggleClass('fa-edit');
        $(this).find('i').toggleClass('fa-save');
    });
    BtnAddOption.click(function () {
        var Data = {data: NewOption.val(), field: $Field};
        var Url = $(this).attr('data-site');
        if (NewOption.val() != '') {
            a2data(Data, Url, function (e) {
                AddTable(e);
            });
        } else {
            alert('กรุณากรอกข้อมูล');
        }
    });
    OptionTable.on('click', BtnDelOption, function () {
        var confirms = confirm('คุณต้องการลบสิ่งนี้ใช้หรือไม่?');
        if (confirms) {
            var field = $(this).attr('data-field'), Data = {field: field}, Url = $(this).attr('data-href') + field,
                tr = $(this).closest('tr');
            a2data(Data, Url, function (e) {
                e ? tr.remove() : '';
            });
        }
    });
    Vote.click(function () {
        var Url = $(this).attr('data-href'), Data = {name: TextName.val(), date: TextDate.val()};
        a2data(Data, Url, function (e) {
            ModalS.modal('hide');
        });
    });

    function AddTable(e) {
        var tr = $('.tr-html').html();
        OptionTable.append('<tr class="new-tr">' + tr + '</tr>');
        var NewTr = OptionTable.find('.new-tr:last');
        NewTr.find('.TextName').val(e.name);
        NewTr.find('.btn-edit').attr('data-field', e.value);
        NewTr.find('.btn-del-option').attr('data-field', e.value);
    }

    function UpdateOption(Data, Url, Text) {
        a2data(Data, Url, function (e) {
            e ? Text.val(e.name) : '';
        });
    }

    $('.datepick').datepicker({
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true,
        language: "th-th"
    });
</script>

