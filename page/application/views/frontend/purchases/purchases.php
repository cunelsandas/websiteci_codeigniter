<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/3/2561
 * Time: 10:10
 */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-shadow">
                <div class="card-header">
                    <h2> <?php echo $head; ?></h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <input id="search-data-detail" type="text" class="form-control" placeholder="คำค้น">
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control" name="purchase_type" id="purchase_type" required>
                                <?php foreach ($purchase_type AS $purtVal): ?>
                                    <option value="<?php echo $purtVal['id'] ?>"><?php echo $purtVal['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div style="font-size: 1.1rem" id="div-show" data-site="<?php echo $site; ?>"></div>
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
    var $purchase_type = $('#purchase_type');
    load_page({data: '', page: 1, type: $purchase_type.val()}, url);
    $search.keyup(function (e) {
        $data = {data: $(this).val(), page: 1, type: $purchase_type.val()};
        url = div.attr('data-site');
        load_page($data, url)
    });
    $purchase_type.change(function () {
        $data = {data: $search.val(), page: 1, type: $purchase_type.val()};
        url = div.attr('data-site');
        load_page($data, url);
    });
    div.on('click', '.page-link', function (e) {
        e.preventDefault();
        url = $(this).attr('data-href');
        load_page({data: $search.val(), page: 1, type: $purchase_type.val()}, url);
    });

    function load_page($data, url) {
        div_show(div, url, $data, function () {
            return false;
        });
    }

</script>
