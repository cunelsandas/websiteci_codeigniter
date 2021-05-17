<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/5/2561
 * Time: 13:53
 */
?>
<div class="container">
    <div class="card card-shadow">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12">
                    <h3><?php echo $head; ?></h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-group mb-3">
                                <input id="search-data-detail" type="text" class="form-control" placeholder="คำค้น">
                            </div>
                        </div>
                    </div>
                    <div id="div-show" data-site="<?php echo $site; ?>"></div>
                    <div id="div-modal"></div>
                    <script>
                        var div = $('#div-show'), DivModal = $('#div-modal'), url = div.attr('data-site'), $data = [],
                            $search = $('#search-data-detail'), $BtnVote = '.btn-vote', $PageLink = '.page-link';
                        load_page({data: $search.val(), page: 1}, url);
                        $search.keyup(function (e) {
                            $data = {data: $(this).val(), page: 1};
                            url = div.attr('data-site');
                            load_page($data, url)
                        });
                        div.on('click', $PageLink, function (e) {
                            e.preventDefault();
                            url = $(this).attr('data-href');
                            load_page({data: $search.val(), page: 1}, url);
                        });
                        div.on('click', $BtnVote, function (e) {
                            var $url = $(this).attr('data-href');
                            $data = {view: 'view'};
                            div_show(DivModal, $url, $data, function (a) {
                                return false;
                            });
                        });

                        function load_page($data, url) {
                            div_show(div, url, $data, function (a) {
                                return false;
                            });
                        }

                    </script>
                </div>
            </div>
            <hr>
            <div class="row mt-2">
                <div class="col-lg-12 text-center">
                    <a href="#" onclick="window.history.back()" class="btn btn-outline-secondary">ย้อนกลับ</a>
                </div>
            </div>
        </div>
    </div>
</div>
