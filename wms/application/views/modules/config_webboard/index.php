<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 20/2/2561
 * Time: 13:11
 */
?>
<div class="card card-shadow">
    <div class="card-header">
        <h2><?php echo $head; ?></h2>
    </div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-lg-12 text-right">
                <a href="<?php echo $site_add; ?>" class="btn btn-success"><?php echo $btn_add; ?></a>
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
    </div>
</div>
<script>
    var div = $('#div-show');
    var url = div.attr('data-site');
    var $data = [];
    var $search = $('#search-data-detail');
    var $change = '.btn-change';
    var $remove = '.btn-remove';
    var page = 1;
    load_page({data: '', page: 1}, url);
    $search.keyup(function (e) {
        $data = {data: $(this).val(), page: page};
        url = div.attr('data-site');
        load_page($data, url)
    });
    div.on('click', '.page-link', function (e) {
        e.preventDefault();
        url = $(this).attr('data-href');
        load_page({data: $search.val(), page: page}, url);
    });
    div.on('click', $change, function (e) {
        e.preventDefault();
        url = $(this).attr('data-href');
        load_page({data: $search.val(), page: page}, url);
    });
    div.on('click', $remove, function (e) {
        e.preventDefault();
        $d = confirm('ต้องการลบสิ่งนี้ใช่ไหม?');
        if ($d) {
            url = $(this).attr('data-href');
            load_page({data: $search.val(), page: page}, url);
        }
    });

    function load_page($data, url) {
        div_show(div, url, $data, function () {
            return false;
        });
    }
</script>
