<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 11/4/2561
 * Time: 9:05
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h2><?php echo $head; ?></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-9">
                        <a class="btn btn-primary btn-sm text-white"><i class="fa fa-thumbs-o-up"></i></a> = active :
                        <a class="btn btn-danger btn-sm text-white"><i class="fa fa-thumbs-o-down"></i></a> = not active
                    </div>
                    <div class="col-lg-3 text-right">
                        <a href="<?php echo $site_add; ?>" class="btn btn-success"><?php echo $btn_add; ?></a>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-12 pr-lg-1">
                        <div class="input-group">
                            <input id="search-data-detail" type="text" class="form-control" placeholder="คำค้น">
                        </div>
                    </div>
                </div>
                <div id="div-show" data-site="<?php echo $site; ?>"></div>
            </div>
        </div>
    </div>
</div>

<script>
    var div = $('#div-show');
    var url = div.attr('data-site');
    var $data = [];
    var $search = $('#search-data-detail');
    var $change = '.btn-change';
    var $remove = '.btn-remove';
    var $link = '.page-link';
    var $file_type = $('#file_type');
    var page = 1;
    load_page({data: '', page: 1, file_type: $file_type.val()}, url);
    $search.keyup(function (e) {
        $data = {data: $search.val(), page: page, file_type: $file_type.val()};
        url = div.attr('data-site');
        load_page($data, url)
    });
    $file_type.change(function (e) {
        e.preventDefault();
        $data = {data: $search.val(), page: page, file_type: $file_type.val()};
        load_page($data, url);
    });
    div.on('click', $link, function (e) {
        e.preventDefault();
        $data = {data: $search.val(), page: page, file_type: $file_type.val()};
        url = $(this).attr('data-href');
        load_page($data, url);
    });
    div.on('click', $change, function (e) {
        e.preventDefault();
        $data = {data: $search.val(), page: page, file_type: $file_type.val()};
        url = $(this).attr('data-href');
        load_page($data, url);
    });
    div.on('click', $remove, function (e) {
        e.preventDefault();
        $d = confirm('ต้องการลบสิ่งนี้ใช่ไหม?');
        if ($d) {
            $data = {data: $search.val(), page: page, file_type: $file_type.val()};
            url = $(this).attr('data-href');
            load_page($data, url);
        }
    });

    function load_page($data, url) {
        div_show(div, url, $data, function () {
            return false;
        });
    }
</script>


