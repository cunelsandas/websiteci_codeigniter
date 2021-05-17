<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/4/2561
 * Time: 15:01
 */
?>
<div class="card card-shadow">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-3">
                <h2><?php echo $head; ?></h2>
            </div>
            <div class="col-lg-9 text-lg-right">
                <a href="<?php echo $site_add ?>" class="btn btn-success"><?php echo $btn_add; ?></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-lg-2 mt-2">
                <b>หน่วยงาน :</b>
            </div>
            <div class="col-lg-3" id="site" data-site="<?php echo site_url('officer/search_group') ?>">
                <select name="type" id="type" class="form-control">
                    <?php foreach ($office_type as $item): ?>
                        <option value="<?php echo $item['office_type_id'] ?>"><?php echo $item['office_type_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php if (isset($work_type)) : ?>
            <div class="row mb-2">
                <div class="col-lg-2 mt-2">
                    <b>สายงานหลัก :</b>
                </div>
                <div class="col-lg-3">
                    <select name="work_type" id="work_type" class="form-control">
                        <?php foreach ($work_type as $item): ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        <?php endif; ?>
        <div class="row mb-2 hidden">
            <div class="col-lg-12">
                <div class="input-group">
                    <input id="search-data-detail" type="text" class="form-control" placeholder="คำค้น">
                </div>
            </div>
        </div>
        <div id="div-show" data-site="<?php echo $site; ?>"></div>
    </div>
</div>

<script>
    var div = $('#div-show');
    var url = div.attr('data-site');
    var $data = [];
    var $search = $('#search-data-detail');
    var $type = $('#type');
    var $work_type = $('#work_type');
    var $change = '.btn-change';
    var $remove = '.btn-remove';
    var page = 1;
    var $type_off = $('#type');
    load_page({data: $search.val(), page: 1, type: $type.val(), work_type: $work_type.val()}, url);
    $search.keyup(function (e) {
        $data = {data: $search.val(), page: 1, type: $type.val(), work_type: $work_type.val()};
        load_page($data, url)
    });
    $type.change(function () {
        $data = {data: $search.val(), page: 1, type: $type.val(), work_type: $work_type.val()};
        load_page($data, url)
    });
    $work_type.change(function () {
        $data = {data: $search.val(), page: 1, type: $type.val(), work_type: $work_type.val()};
        load_page($data, url)
    });
    div.on('click', '.page-link', function (e) {
        e.preventDefault();
        url = $(this).attr('data-href');
        load_page({data: $search.val(), page: 1, type: $type.val(), work_type: $work_type.val()}, url);
    });
    div.on('click', $change, function (e) {
        e.preventDefault();
        url = $(this).attr('data-href');
        load_page({data: $search.val(), page: 1, type: $type.val(), work_type: $work_type.val()}, url);
    });
    div.on('click', $remove, function (e) {
        e.preventDefault();
        $d = confirm('ต้องการลบสิ่งนี้ใช่ไหม?');
        if ($d) {
            url = $(this).attr('data-href');
            load_page({data: $search.val(), page: 1, type: $type.val()}, url);
        }
    });

    function load_page($data, url) {
        div_show(div, url, $data, function () {
            return false;
        });
    }


    $type_off.change(function () {
        ajax2data({select: $type_off.val(), type: ''}, $('#site').attr('data-site'), function (d) {
            add_select('#work_type', d, 'หัวหน้าฝ่าย/เจ้าหน้าที่');
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

    ajax2data({select: $type_off.val(), type: ''}, $('#site').attr('data-site'), function (d) {
        add_select('#work_type', d, 'หัวหน้าฝ่าย/เจ้าหน้าที่');
    });
</script>
