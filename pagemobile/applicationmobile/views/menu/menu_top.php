<style>
    div{
        font-family: 'fc_lamoonregular', sans-serif;
    }
</style>

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/3/2561
 * Time: 14:22
 */
$menu = GetGroupMenu();
//var_dump($menu);
$href = '';
?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/menu-top-ct.css') ?>">
<nav class="nav" id="nav-head" >
    <div class="head-logo">
        <a href="<?php echo site_url() ?>">
            <img id="logo-header" src="<?php get_img('logo-header.jpg', 'menus'); ?>" height="80px;">
        </a>
    </div>


    <div class="menu_top mt-2" >


        <div id="nav" style="margin-left: -3%;" >


            <ul class="top-level" align="center">
                <?php foreach ($menu AS $key => $val): ?>
                    <?php if ($val['group_link'] != '#'): ?>
                        <?php $href = site_url($val['group_link']); ?>
                        <?php $href = site_url($val['group_link']); ?>
                    <?php else: ?>
                        <?php $href = '#'; ?>
                    <?php endif; ?>
                    <li style="width: <?php echo $val['group_width']; ?>px;">
                        <a class="a-top" href="<?php echo $href; ?>" style="font-size: 1.25rem;font-family: fc_lamoonregular"
                           data-img="<?php get_img($val['group_img'], 'menus'); ?>"
                           data-tab="tab-<?php echo $val['group_id']; ?>"
                        ><?php echo $val['group_name'] ?></a>
                    </li>
                <?php endforeach; ?>
               <li>
                    <a class="a-top" href="http://maeram.go.th/roundcube/" target="_blank">
                        <img src="<?php get_img('icon-email.png', 'icon') ?>" alt="E-mail" width="32" height="32">
                    </a>
                </li>
                <li>
                    <a class="a-top" href="https://www.facebook.com/485504644943880/"
                       target="_blank">
                        <img src="<?php get_img('icon-facebook.png', 'icon') ?>" alt="Facebook" width="32"
                             height="32">
                    </a>
                </li>
                <li>
                    <a class="a-top" href="#"
                       target="_blank">
                        <img src="<?php get_img('icon-line.png', 'icon') ?>" alt="Line" width="32"
                             height="32">
                    </a>
                </li>
                <li>
                    <a class="a-top" href="https://www.youtube.com/" target="_blank">
                        <img src="<?php get_img('icon-youtube.png', 'icon') ?>" alt="Youtube" width="32" height="32">
                    </a>
                </li>
             <!--   <li>
                    <a class="a-top" href="search">
                        <img src="<?php get_img('icon-searc.png', 'icon') ?>" width="32" height="32">
                    </a>
                </li>
                -->
                <li>
                    <a class="a-top" href="http://maeram.go.th/wms/"
                       target="_blank">
                        <img src="<?php get_img('icon-setting.png', 'icon') ?>" alt="WMS" width="32"
                             height="32">
                    </a>
                </li>
                <li>
                    <a class="a-top" href="http://egp.itglobal.co.th/manage"
                       target="_blank">
                        <img src="<?php get_img('icon-hammer.png', 'icon') ?>" alt="EGP" width="32"
                             height="32">
                    </a>
                </li>

            </ul>

            <hr style="border-top: 7px solid transparent;border-color: #fcdee2;z-index: 1;margin-top: -1.3%">
        </div>

            <?php foreach ($menu AS $key => $val) : ?>
                <div class="tab-pane tab-menu"  id="tab-<?php echo $val['group_id'] ;  ?>">
                    <?php $menus = GetMenus($val['group_id']); ?>
                    <?php if ($menus != null): ?>
                        <?php $countMenus = (count($menus) > 0 ? ceil(12 / count($menus)) : 0); ?>

                        <div class="row" style="color:#603913;margin:0 0 0 auto;" >
                            <?php foreach ($menus as $index => $menu) : ?>
                                <?php $menusub = GetMenusSub($menu['menu_id']); ?>
<!--                                <div class="col---><?php //echo $countMenus; ?><!-- pl-1 pr-1">  -->
                                    <div class="col-2 pl-1 pr-1">

                                    <b style="padding-left: 5%;font-size: 1.5rem"><?php echo $menu['menu_name']; ?></b>

                                    <!--                                    --><?php //var_dump($menusub); ?>
                                    <ul>
                                        <?php foreach ($menusub AS $smenu => $sval): ?>
                                            <li>
                                                <a href="<?php echo site_url($sval['controller'] . '/' . $sval['name_type'] . '/' . $sval['type']); ?>"style="font-size: 1.3rem">
                                                    <?php echo $sval['sub_name'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</nav>
<div id="main-dummy"></div>

<div id="menu-phone-div" class="text-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img id="logo-header-phone" src="<?php get_img('logo-header.jpg', 'menus'); ?>" height="80px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!--<li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>-->
                <?php $menu = GetGroupMenu(); ?>
                <?php foreach ($menu AS $key => $val) : ?>
                    <?php if ($val['group_link'] == '#'): ?>
                        <?php $menus = GetMenus($val['group_id']); ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-success text-white mt-1 mr-1" href="#"
                               id="navbarDropdown-<?php echo $key ?>"
                               role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $val['group_name']; ?>
                            </a>
                            <div class="dropdown-menu text-nowrap" aria-labelledby="navbarDropdown-<?php echo $key ?>">
                                <?php foreach ($menus AS $mKey => $mVal): ?>
                                    <?php $menusub = GetMenusSub($mVal['menu_id']); ?>
                                    <a class="dropdown-item" href="#"><?php echo $mVal['menu_name']; ?></a>
                                    <ul>
                                        <?php foreach ($menusub AS $smenu => $sval): ?>
                                            <li>
                                                <a href="<?php echo site_url($sval['controller'] . '/' . $sval['name_type'] . '/' . $sval['type']); ?>"
                                                   class="p-2"><?php echo $sval['sub_name'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success text-white mt-1 mr-1"
                               href="<?php echo site_url(); ?>"><?php echo $val['group_name']; ?>
                                <span class="sr-only">(current)</span></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
</div>

<!--<div class="parallax-container mb-4" data-parallax="scroll" data-position="center" data-bleed="10"
     data-image-src="<?php /*get_img('bg-head.jpg', 'bg') */ ?>"
     data-natural-width="1400" data-natural-height="900" style="height: 300px; text-align: center;">-->

    <!--<h1 id="title-maehia">
     "เมืองแห่งความสุข"  </h1> -->

    <div class="row" id="marquee-update" style="width: 101%;margin-left: auto; margin-right: auto;white-space: nowrap; margin-top: 3%">
        <div class="col-2 pl-1 pr-1" style="background-color: grey;border-radius: 10px 0 0 10px;">
            <h5 class="text-light pt-3">
                ประกาศ :
            </h5>
        </div>
        <div class="col-10 pl-1 pr-1 bg-light" style="border-radius: 0 10px 10px 0;">
            <div class="update-right" style="font-size: 1.11rem">
                <marquee class="pt-3" behavior="scroll" width="100%" height="100%" scrollamount="1" scrolldelay="20"
                         loop="-1"
                         truespeed="truespeed" onmouseover="this.stop()" onmouseout="this.start()">
                    <?php echo $this->db->select('txt1')->get('tb_marquee')->row('txt1'); ?>
                </marquee>
            </div>
        </div>
    </div>
</div>
<br>

<script>
    var $A_top = $('.a-top'), $img = '', $href = '', $tab = '', $head = $('#nav-head'), $logoHeader = $('#logo-header'),
        $menu_top = $('.menu_top'), $tab_pane = $('.tab-pane'), $main_dummy = $('#main-dummy'),
        $phone_div = $('#menu-phone-div');
    $A_top.hover(function () {
        $img = $(this).attr('data-img');
        $tab = $(this).attr('data-tab');
        $href = $(this).attr('href');
        $A_top.closest('li').css('background', 'none');
        $(this).closest('li').css('background', 'url(' + $img + ')');
        // $tab_pane.removeClass('current animated flipInX');
        $tab_pane.removeClass('current');
        $tab_pane.css('display', 'none');
        if ($href == '#') {
            $('#' + $tab).addClass('current');
            $('#' + $tab).css('display', 'block');
        }
    }, function () {
        $href = $(this).attr('href');
        if ($href != '#') {
            $tab_pane.removeClass('current');
            $A_top.closest('li').css('background', 'none');
        }
    });
    $(window).on('scroll', function () {
        var windowTop = $(window).scrollTop();
        if (windowTop > 200) {
            $head.addClass('animated fadeInDown fixed-top');
            $logoHeader.attr('height', '60px');
            $menu_top.css('top', '55px');
            $main_dummy.css('padding-top', '90px');
        } else {
            $head.removeClass('animated fadeInDown fixed-top');
            $logoHeader.attr('height', '80px');
            $menu_top.css('top', '70px');
            $main_dummy.css('padding-top', '0');
        }
        if (windowTop < 100) {
            $main_dummy.css('padding-top', '0');
        }
    });
    $(document).mouseup(function (e) {
        var container = $tab_pane;

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.css('display', 'none');
            $A_top.closest('li').css('background', 'none');
        }
    });
</script>
