<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/4/2561
 * Time: 8:46
 */
?>
<div class="card card-shadow">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6">
                <h2><?php echo $head; ?></h2>
            </div>
            <div class="col-lg-6 text-lg-right">
                <a data-href="<?php echo $site_add; ?>" data-type="add"
                   class="btn btn-success text-white show-modal"><i class="fa fa-plus"></i>เพิ่มข้อมูลผู้ใช้</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-2 pr-lg-1 text-lg-right">
                <b>ผู้ใช้งาน :</b>
            </div>
            <div class="col-lg-6 pr-lg-1">
                <select name="user" id="user" class="form-control select">
                    <?php foreach ($user as $uKey => $uVal): ?>
                        <option value="<?php echo $uVal['userid']; ?>"><?php echo $uVal['nameuser']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-2 pl-lg-1">
                <a class="btn btn-warning btn-block text-white show-modal" data-type="edit"
                   data-href="<?php echo $site_add; ?>"><i class="fa fa-edit"></i> แก้ไขข้อมูลผู้ใช้</a>
            </div>
        </div>
        <div id="div-show" data-site="<?php echo $site; ?>"></div>
    </div>
</div>

<div id="data-user"></div>

<script>
    var div = $('#div-show'), $div = $('#data-user'), url = div.attr('data-site'), $data = [], $search = $('#user'),
        $BtnModal = $('.show-modal'), $MyData = [], $urlModal = '', $Modal = $('#ModalAddData');
    load_page({data: $search.val()}, url, div);
    $search.change(function () {
        $data = {'data': $(this).val()};
        load_page($data, url, div);
    });

    $BtnModal.click(function () {
        $urlModal = $(this).attr('data-href');
        $MyData = {type: $(this).attr('data-type'), user: $search.val()};
        load_page($MyData, $urlModal, $div);
    });

    $div.on('click', '#Btn-save', function () {
        var SetUrl = $(this).attr('data-href');
        var SetData = {
            name: $('#name').val(),
            surname: $('#surname').val(),
            username: $('#username').val(),
            password: $('#password').val(),
            section: $('#section').val()
        };
        a2data(SetData, SetUrl, function (a) {
            if (a.type == 'insert') {
                addselect($search, a);
                load_page({data: $search.val()}, url, div);
            } else if (a.type == 'update') {
                $search.find('option').remove();
                $search.select2({
                    data: a.user,
                    theme: 'bootstrap4'
                });
                load_page({data: $search.val()}, url, div);
            } else {
                alert('เกิดข้อผิดพลาด');
            }
            $Modal.modal('hide');
        });
    });

    function load_page($data, url, div) {
        div_show(div, url, $data, function () {
            return false;
        });
    }

    function addselect(selector, val) {
        selector.append("<option value='" + val.value + "' selected>" + val.option + "</option>");
    }
</script>