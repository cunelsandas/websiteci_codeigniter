<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/2/2561
 * Time: 11:13
 */
?>
<body style="background: url('<?php echo base_url('img/bg.jpg') ?>');background-attachment: fixed; background-repeat: no-repeat; width: 100%; height: 100%">
<div class="container" style="opacity: 0.9; filter: alpha(opacity=50); ">
    <div class="row" style="margin-top: 10%;text-align: center">
        <div class="col-lg-4 offset-lg-1 col-md-5 offset-md-1">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <form action="<?php echo site_url('welcome/login') ?>" method="post" id="login">
                        <h4 class="card-title">เข้าสู่ระบบ</h4>
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" type="text" name="username" value=""
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-12">
                                <input class="form-control" type="password" name="password" value=""
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="row mt-1 text-center">
                            <div class="col-12">
                                <script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
                              <div class="g-recaptcha" data-callback="add_btn"
                                    data-sitekey="6LdnbtUZAAAAAFhdEWsnmw6i24UQvFKdIhkYcg_r"></div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-12" id="add_btn"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url('assets/plugin/datepicker-thai/datepicker.js') ?>"></script>





