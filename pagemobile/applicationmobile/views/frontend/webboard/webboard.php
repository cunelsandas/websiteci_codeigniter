<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/3/2561
 * Time: 11:09
 */
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10">
                            <h4><?php echo $head; ?></h4>
                        </div>
                        <div class="col-lg-2">
                            <a href="<?php echo $site_view; ?>" class="btn btn-success float-right">เพิ่มกระทู้</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-group mb-3">
                                <input id="search-data-detail" type="text" class="form-control" placeholder="คำค้น">
                            </div>
                        </div>
                    </div>
                    <div id="div-show" data-site="<?php echo $site; ?>"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var div = $('#div-show');
    var url = div.attr('data-site');
    var $data = [];
    var $search = $('#search-data-detail');
    load_page({data: '', page: 1}, url);
    $search.keyup(function (e) {
        $data = {data: $(this).val(), page: 1};
        url = div.attr('data-site');
        load_page($data, url)
    });
    div.on('click', '.page-link', function (e) {
        e.preventDefault();
        url = $(this).attr('data-href');
        load_page({data: $search.val(), page: 1}, url);
    });

    function load_page($data, url) {
        div_show(div, url, $data, function () {
            return false;
        });
    }
</script>