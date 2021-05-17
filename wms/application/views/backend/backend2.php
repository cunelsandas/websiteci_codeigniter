<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/2/2561
 * Time: 13:33
 */
$menu = 'leftmenu';
$menu = 'navbar';
$this->load->view('component/head');
if (!$this->session->user_id) {
    redirect();
    $this->session->sess_destroy();
}

include 'myfnc2.php';
include 'connect.php';
?>
<body style="background-color: #e8e8e8;">
<?php $this->load->view('backend/theme/head/head'); ?>

<?php if ($menu == 'leftmenu'): ?>
    <div class="container-fluid mb-5">
        <div class="row mt-2 mb-3">
            <div class="mb-3" id="leftmenu">
                <?php $this->load->view('backend/theme/menu/leftmenu'); ?>
            </div>
            <div id="leftcontent">
                <?php $this->load->view($view, $data); ?>
            </div>
        </div>
    </div>
<?php elseif ($menu == 'navbar') : ?>
    <?php $this->load->view('backend/theme/menu/navbar'); ?>
    <div class="container">
        <div class="row mt-2 pb-3">
            <div class="col-lg-12">
                <?php $this->load->view($view, $data); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php $this->load->view('component/foot'); ?>
</body>
<?php //var_dump(GetMenu()); ?>
<?php //var_dump(GetSubMenu(1)); ?>

