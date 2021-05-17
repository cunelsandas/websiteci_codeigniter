<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/5/2561
 * Time: 8:50
 */
?>
<div class="card card-shadow" id="CardDetail">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <h4><?php echo $head; ?></h4>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-lg-9">
                <a class="btn btn-primary btn-sm text-white"><i class="fa fa-thumbs-o-up"></i></a> = active :
                <a class="btn btn-danger btn-sm text-white"><i class="fa fa-thumbs-o-down"></i></a> = not active
            </div>
            <div class="col-lg-3 text-lg-right">
                <a data-href="<?php echo $site_add; ?>"
                   class="btn btn-success text-white btn-add"><?php echo $btn_add; ?></a>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-lg-12">
                <div class="input-group">
                    <input id="search-data-detail" type="text" class="form-control" placeholder="คำค้น">
                </div>
            </div>
        </div>
        <div id="div-show" data-site="<?php echo $site; ?>"></div>
        <div id="div-modal"></div>
        <script>
            var div = $('#div-show'), DivModal = $('#div-modal'), url = div.attr('data-site'), $data = [],
                search = $('#search-data-detail'), change = '.btn-change', remove = '.btn-remove', link = '.page-link',
                page = 1, BtnAdd = '.btn-add', CardDetail = $('#CardDetail');
            load_page({data: '', page: 1}, url, div);
            search.keyup(function (e) {
                $data = {data: search.val(), page: page};
                url = div.attr('data-site');
                load_page($data, url, div)
            });
            div.on('click', link, function (e) {
                e.preventDefault();
                $data = {data: search.val(), page: page};
                url = $(this).attr('data-href');
                load_page($data, url, div);
            });
            div.on('click', change, function (e) {
                e.preventDefault();
                $data = {data: search.val(), page: page};
                url = $(this).attr('data-href');
                load_page($data, url, div);
            });
            div.on('click', remove, function (e) {
                e.preventDefault();
                $d = confirm('ต้องการลบสิ่งนี้ใช่ไหม?');
                if ($d) {
                    $data = {data: search.val(), page: page};
                    url = $(this).attr('data-href');
                    load_page($data, url, div);
                }
            });
            CardDetail.on('click', BtnAdd, function () {
                var Url = $(this).attr('data-href');
                $data = {data: ''};
                load_page($data, Url, DivModal);
            });

            function load_page($data, url, div) {
                div_show(div, url, $data, function () {
                });
            }
        </script>
    </div>
</div>
