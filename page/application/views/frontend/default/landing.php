
<script type="text/css" src="css/custom.css" ></script>
<style>


    ::-webkit-scrollbar {
        width: 15px;
    } /* this targets the default scrollbar (compulsory) */

    /*::-webkit-scrollbar-track {*/
    /*    background-color: #b46868;*/
    /*} !* the new scrollbar will have a flat appearance with the set background color *!*/

    /*::-webkit-scrollbar-thumb {*/
    /*    background-color: rgba(0, 0, 0, 0.2);*/
    /*} !* this will style the thumb, ignoring the track *!*/

    /*::-webkit-scrollbar-button {*/
    /*    background-color: #7c2929;*/
    /*} !* optionally, you can style the top and the bottom buttons (left and right for horizontal bars) *!*/

    /*::-webkit-scrollbar-corner {*/
    /*    background-color: black;*/
    /*} !* if both the vertical and the horizontal bars appear, then perhaps the right bottom corner also needs to be styled *!*/



    body{
        font-family: 'fc_lamoonregular', 'sans-serif';
    }

    .vl {
        border-right:3px solid #603913;

    }
    div #content-travel{
    }
    .first-letter {
        font-size:5.0rem;
        color: black;
    }
    .triangle-down {
        width: 0;
        height: 0;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-top: 25px solid #603913;
        margin-top: -1.0%;
        margin-left: 49%;
        z-index: -1;

    }
    h4 {
        font-weight: 900;
    }

    p {
        font-family: 'fc_lamoonregular';
    }

    h1,h2 {
        font-family: 'fc_lamoonregular';
    }

    h3,h4 {
        font-family: 'fc_lamoonregular';
    }

    h5,h6 {
        font-family: 'fc_lamoonregular';
    }

    .x-topbar p {
        font-family : 'fc_lamoonregular';
    }

    .x-brand {
        font-family : 'fc_lamoonregular';
    }

    body,a {
        font-family : 'fc_lamoonregular';
    }



</style>

<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/3/2561
 * Time: 13:57
 */
?>
<hr class="phone-hide" style="background-color: #FFDE17;height: 40px;margin-top: -2%">
<div id="content-advertise" class="container-fluid"  style="margin-left:5%;">
    <div class="row mt-3">
        <div class="col-lg-8 mb-4 mb-lg-0">
            <div>
                <span>
                <h4 class="phone-hide" style="width: 100%; font-weight: bold; text-align: left;margin-top: -4.8%;margin-left: 5%;font-family: 'fc_lamoonregular',sans-serif ">ประชาสัมพันธ์</h4>
                    <h4 style="width: 100%; font-weight: bold; text-align: right;margin-top: -4.2%;margin-left:10%  ">ช่องทางลัด</h4>
                    </span>
            </div>
            <div class="card border-0" style="margin-top: 4%;" >
                <div class="card-body p-0">
                    <div class="bd-example"  style="margin-left:"  >
                        <?php
                        $tb_new = $this->db->select('*')->from('tb_slideshow')->order_by('id', 'DESC')->limit('20')->get()->result_array();
                        ?>
                        <div id="advertisecarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" style="bottom: -30px;">
                                <?php foreach ($tb_new AS $nKey => $nVal): $active = $nKey == 0 ? 'active' : '' ?>
                                    <li data-target="#advertisecarousel" data-slide-to="<?php echo $nKey; ?>"
                                        class="<?php echo $active; ?>"
                                        style="height: 3px; "  ></li>
                                <?php endforeach; ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php foreach ($tb_new AS $nKey => $nVal): $active = $nKey == 0 ? 'active' : '';
                                    $file = $nVal['filename'] ?>
                                    <div class="carousel-item <?php echo $active; ?>" style="height: 550px;">
                                        <?php if($nVal['link'] != ''):?>
                                            <a href="<?php echo $nVal['link'];?>" target="_blank"> <!--25/11/62-->
                                                <img class="d-block w-100 h-100"
                                                     src="<?php get_ul($file, 'slideshow'); ?>"
                                                     data-holder-rendered="true">
                                            </a>
                                        <?php else:?>
                                        <img class="d-block w-100 h-100"
                                             src="<?php get_ul($file, 'slideshow'); ?>"
                                             data-holder-rendered="true">
                                        <?php endif;?><!--25/11/62-->
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <a class="carousel-control-prev" href="#advertisecarousel" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#advertisecarousel" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 text-lg-right text-center" style="margin-left:-4%;"> <!-- overflow: auto;height: 600px ใช้ scrollbar เมื่อลงbanner เยอะ   -->
            <h4 class="pc-hide" style="width: 100%; margin-top: 2% font-weight: bold;font-family: fc_lamoonregular; background-color: #FFDE17 ">ช่องทางลัด</h4>
            <?php
            $shortcutposition = $this->db->select('id')->where('name', 'shortcut')->get('tb_banner_position')->row('id');
            $shortcut = $this->db->where('position', $shortcutposition)->where('status', 1)->get('tb_banner')->result_array();
            ?>
            <div>
                <?php foreach ($shortcut AS $key => $val):
                    $ex = substr($val['link_to'], 0, 1);
                    $target = $ex == '#' ? '' : '_blank';
                    $link = $ex == '#' ? site_url(substr($val['link_to'], 1)) : $val['link_to'];
                    $file = search_img_one('tb_banner', $val['id']); ?>
                    <ul class="pl-0">
                        <li>
                            <a href="<?php echo $link; ?>" target="<?php echo $target ?>">
                                <img src="<?php get_ul($file, 'banner') ?>">
                            </a>
                        </li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<hr class="phone-hide" style="border-top: 5px solid transparent;border-color: #FFDE17">
<div>
    <h4 style="width: 100%; font-weight: bold; text-align: center; margin-top: -1.4%;background-image: linear-gradient(180deg,#FFDE17,white);height: 50px">ข่าวสาร<a style="color:#603913;font-size: 25px">ความเคลื่อนไหว</a> </h4>
</div>

<div id="content-tab-advertise" class="container-fluid">
    <div class="row" style="margin-top: 3%;margin-left: 3%;margin-right: 3%">
        <div class="col-lg-12">
            <div class="bd-example bd-example-tabs" style="margin-top: -2%">
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #FFE3A6">
                    <li class="nav-item">
                        <a class="nav-link active show" id="advt-tab" data-toggle="tab" href="#tab-advt" role="tab"
                           aria-controls="advt-tab" aria-selected="false" style="font-size: 1.3rem">ข่าวประชาสัมพันธ์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="purchase-tab" data-toggle="tab" href="#tab-purchase" role="tab"
                           aria-controls="purchase-tab" aria-selected="false" style="font-size: 1.3rem">จัดซื้อจัดจ้าง</a>

                    </li>

                    <!--ADD EGP TAB -->
                    <li class="nav-item">
                        <a class="nav-link" id="purchase-egp" data-toggle="tab" href="#tab-purchaseegp" role="tab"
                           aria-controls="purchase-tab" aria-selected="false" style="font-size: 1.3rem">จัดซื้อจัดจ้าง e-GP</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="announce-tab" data-toggle="tab" href="#tab-announce" role="tab"
                           aria-controls="announce-tab" aria-selected="false" style="font-size: 1.3rem">ประกาศ/ทั่วไป</a>
                    </li> 


                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#tab-register" role="tab"
                           aria-controls="register-tab" aria-selected="false" style="font-size: 1.3rem">ข่าวรับสมัครงาน</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent1">
                    <!-- tab-ข่าวประชาสัมพันธ์ -->

                    <div class="tab-pane fade active show" id="tab-advt" role="tabpanel" aria-labelledby="advt-tab" style="margin-top: 2%">
                        <?php
                        $tb_new = $this->db->select('*')->from('tb_news')->where('status', 1)->limit('9')->order_by('no', 'DESC')->get()->result_array();

                        $tb_apply = 'tb_news';
                        $applys = $this->db->where('status', 1)->limit(9)->order_by('no', 'DESC')->get($tb_apply)->result_array();

                        ?>
                        <div class="row ">
                            <?php foreach ($tb_new AS $nKey => $nVal):
                            $file = search_img_one('tb_news', $nVal['no']); ?>
                                <div class="col-md-4 ">
                                    <div class="card mb-4 "  style="border: none">
                                        <div class="row no-gutters">
                                        <img class="card-img-top" style="width:75px ;height: 75px;"
                                             src="<?php get_ul($file, 'news'); ?>"
                                             data-holder-rendered="true">
                                            <div class ="col-md-8" >
                                        <div class="card-body ">
                                            <h5 class="card-title">
                                                <a href="<?php echo site_url('catalog/view/news/' . $nVal['no']) ?>" style="color: black">
                                                    <?php /*echo substr($nVal['subject'], 0, 100) . '...' */
                            ?>
                                                    <?php echo $nVal['subject']; ?>
                                                </a>

                                            </h5>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>


                    <!--    <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>ข่าวประชาสัมพันธ์</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php if (count($applys) > 0): ?>
                                                    <?php foreach ($applys AS $nKey => $nVal): ?>
                                                        <a href="<?php echo site_url('catalog/view/news/' . $nVal['no']) ?>"><?php echo $nVal['subject']; ?></a>
                                                        <hr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <div class="text-center">
                                                        <a href="#">ไม่พบข้อมูล</a>
                                                    </div>
                                                    <hr>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        -->


                        <div class="row mt-1">
                            <div class="col-lg-12 text-right">
                                <a href="<?php echo site_url('catalogs/news'); ?>"> <img id="logo-header" src="<?php get_img('getall.png', 'button'); ?>" height="40px;"></a>
                            </div>
                        </div>
                    </div>
                    <!-- end-tab-ข่าวประชาสัมพันธ์ -->
                    <!-- tab-ข่าวจัดซื้อจัดจ้าง -->
                    <div class="tab-pane fade" id="tab-purchase" role="tabpanel" aria-labelledby="purchase-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="border:hidden" >
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h5>ประกาศการจัดซื้อจัดจ้าง</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <?php
                                                $purchase_type = $this->db->select('*')->get('tb_purchase_group')->result_array();
                                                ?>
                                                <select name="purchase_type" id="purchase_type"
                                                        class="form-control"  style="font-size: 1.25rem;color: black">
                                                    <?php foreach ($purchase_type AS $ptKey => $ptVal): ?>
                                                        <option value="tab-purchase-<?php echo $ptVal['id'] ?>" style="font-size: 1.25rem;color: black"><?php echo $ptVal['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" >
                                        <?php foreach ($purchase_type AS $ptKey => $ptVal):$purchase_hide = $ptKey != 0 ? 'purchase-hide' : '';
                                            $purchase_data = $this->db->select('*')->from('tb_purchase')->where('groupid', $ptVal['id'])->limit('5')->order_by('no', 'DESC')->get()->result_array(); ?>
                                            <div class="tab-purchase-<?php echo $ptVal['id'] ?> tab-purchase <?php echo $purchase_hide; ?>">
                                                <?php if (count($purchase_data) > 0): ?>
                                                    <?php foreach ($purchase_data AS $pdKey => $pdVal): ?>
                                                        <a href="<?php echo site_url('purchase/view/purchase/' . $pdVal['no']) ?> "style="font-size: 1.2rem;color: black"><?php echo "<font color='red'> > </font> {$pdVal['subject']}"; ?></a>
                                                        <hr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <div class="text-center">
                                                        <a href="#">ไม่พบข้อมูล</a>
                                                    </div>
                                                    <hr>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <script>
                                        var $sl_pt = $('#purchase_type'), $tab_pc = $('.tab-purchase');
                                        $sl_pt.change(function () {
                                            var $pc_tab_show = $(this).val();
                                            $tab_pc.addClass('purchase-hide');
                                            $('.' + $pc_tab_show).removeClass('purchase-hide');
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-12 text-right">
                                <a href="<?php echo site_url('purchases/purchase') ?>"><img id="logo-header" src="<?php get_img('getall.png', 'button'); ?>" height="40px;"></a>
                            </div>
                        </div>
                    </div>
                    <!-- end-tab-ข่าวจัดซื้อจัดจ้าง -->

                    <!-- tab-ข่าวจัดซื้อจัดจ้าง g-EP -->
                    <div class="tab-pane fade" id="tab-purchaseegp" role="tabpanel" aria-labelledby="purchase-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="border:hidden">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-8">
                                            </div>
                                               <iframe id='subject_only'  src='http://egp.itglobal.co.th/itg/4500601' width="100%" height="400px" frameborder="none" " ></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end-tab-ข่าวจัดซื้อจัดจ้าง G-ep -->

                    <!-- ประกาศทั่วไป  -->
                    <div class="tab-pane fade" id="tab-announce" role="tabpanel" aria-labelledby="announce-tab" style="margin-top: 2%">
                        <?php
                        $tb_new = $this->db->select('*')->from('tb_announce')->where('status', 1)->limit('9')->order_by('no', 'DESC')->get()->result_array();

                        $tb_apply = 'tb_announce';
                        $applys = $this->db->where('status', 1)->limit(9)->order_by('no', 'DESC')->get($tb_apply)->result_array();

                        ?>
                        <div class="row ">
                            <?php foreach ($tb_new AS $nKey => $nVal):
                                $file = search_img_one('tb_announce', $nVal['no']); ?>
                                <div class="col-md-4 ">
                                    <div class="card mb-4 "  style="border: none">
                                        <div class="row no-gutters">
                                            <img class="card-img-top" style="width:75px ;height: 75px;"
                                                 src="<?php get_ul($file, 'announce'); ?>"
                                                 data-holder-rendered="true">
                                            <div class ="col-md-8" >
                                                <div class="card-body ">
                                                    <h5 class="card-title">
                                                        <a href="<?php echo site_url('catalog/view/announce/' . $nVal['no']) ?>"  style="font-size: 1.25rem;color: black">
                                                            <?php /*echo substr($nVal['subject'], 0, 100) . '...' */
                                                            ?>
                                                            <?php echo $nVal['subject']; ?>
                                                        </a>

                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>


                        <!--    <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>ข่าวประชาสัมพันธ์</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php if (count($applys) > 0): ?>
                                                    <?php foreach ($applys AS $nKey => $nVal): ?>
                                                        <a href="<?php echo site_url('catalog/view/announce/' . $nVal['no']) ?>"><?php echo $nVal['subject']; ?></a>
                                                        <hr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <div class="text-center">
                                                        <a href="#">ไม่พบข้อมูล</a>
                                                    </div>
                                                    <hr>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        -->


                        <div class="row mt-1">
                            <div class="col-lg-12 text-right">
                                <a href="<?php echo site_url('catalogs/announce'); ?>"><img id="logo-header" src="<?php get_img('getall.png', 'button'); ?>" height="40px;"></a>
                            </div>
                        </div>
                    </div>

                    <!-- end -->

                    <!-- tab-ข่าวสมัครงาน -->
                    <div class="tab-pane fade" id="tab-register" role="tabpanel" aria-labelledby="register-tab">
                        <?php
                        $tb_apply = 'tb_applys';
                        $applys = $this->db->where('status', 1)->limit(5)->order_by('no')->get($tb_apply)->result_array();
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="border:hidden">
                                    <div class="card-header">
                                        <div class="row">

                                              <!--  <h5>ข่าวรับสมัครงาน</h5> -->

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php if (count($applys) > 0): ?>
                                                    <?php foreach ($applys AS $apKey => $apVal): ?>
                                                        <a href="<?php echo site_url('catalog/view/apply/' . $apVal['no']) ?>"style="font-size: 1.2rem;color: black"><?php echo "<font color='red'> > </font> {$apVal['subject']}"; ?></a>
                                                        <hr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <div class="text-center">
                                                        <a href="#">ไม่พบข้อมูล</a>
                                                    </div>
                                                    <hr>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-12 text-right">
                                <a href="<?php echo site_url('catalogs/apply') ?>"><img id="logo-header" src="<?php get_img('getall.png', 'button'); ?>" height="40px;"></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<hr style="border-top: 10px solid transparent;border-color: #FFDE17;z-index: 1">
<div>
    <h4 style="width: 100%;height: 50px; font-weight: bold; text-align: center;margin-left:;background-color: #603913;color: white;margin-top: -1.3%;padding-top: 0.8%"ิ>กิจกรรมเทศบาลเมืองแกนพัฒนา</h4>
</div>
<div id="content-activities" class="container-fluid" style="margin-top: -4%;background-color: #FFE3A5;">
    <div class="row mt-5" style="margin-left: 3%;margin-right: 3%;">
        <div class="col-lg-12">
            <div class="bd-example bd-example-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true" style="font-size: 1.3rem">ภาพกิจกรรม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false" style="font-size: 1.3rem">วิดีโอกิจกรรม</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php $activity_data = $this->db->select('*')->where('status', 1)->limit(4)->order_by('no', 'DESC')->get('tb_activity')->result_array(); ?>
                        <div class="row">
                            <?php foreach ($activity_data as $atKey => $atVal): $file = search_img_one('tb_activity', $atVal['no']); ?>
                                <div class="col-lg-3">
                                    <div class="card" style="border: none;">
                                        <img class="card-img-top" style="height:260px"
                                             src="<?php get_ul($file, 'activity'); ?>"
                                             data-holder-rendered="true">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="<?php echo site_url('catalog/view/activity/' . $atVal['no']) ?>" style="font-size: 1.4rem;color: black"  >
                                                    <?php /*echo substr($atVal['subject'], 0, 100) . '...' */ ?>
                                                    <?php echo $atVal['subject']; ?>
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-12 text-right">
                                <a href="<?php echo site_url('catalogs/activity') ?>" style="margin-bottom: 2%;margin-top: 1%"><img src="<?php get_img('getallwhite.png', 'button'); ?>" height="40px;" style="margin-bottom: 2%"></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <?php $video = $this->db->where('active', 1)->limit(4)->get('tb_youtube')->result_array();
                        $cVideo = count($video) > 4 ? 4 : count($video); ?>
                        <div class="row">
                            <?php foreach ($video as $vdoKey => $vdoVal): ?>
                                <div class="col-lg-<?php echo ceil(12 / $cVideo); ?>">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <a data-href="http://www.youtube.com/embed/<?php echo $vdoVal['video_id'] ?>?autoplay=1"
                                               class="youtube-yeah">
                                                <img src="http://i3.ytimg.com/vi/<?php echo $vdoVal['video_id'] ?>/0.jpg"
                                                     width="100%">
                                            </a>
                                        </div>
                                        <div class="card-footer" style="font-size: 1.4rem;color: black">
                                            <?php echo $vdoVal['name'] ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-lg-right">
                                <a href="<?php echo site_url('youtubes/youtube') ?> " style="margin-bottom: 2%;margin-top: 1%"><img src="<?php get_img('getallwhite.png', 'button'); ?>" height="40px;" style="margin-bottom: 2%"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content-executive" class="phone-hide" style="margin-top: -2%;">
    <div class="row mt-5">
        <div class="col-lg-12" style="width:100%">
            <div style="height: 650px;background: url('<?php get_img('executive.png', ''); ?>')top center no-repeat;margin-top: -1.5%;">
            </div>
        </div>
    </div>
</div>

<div id="content-map" class="phone-hide" >
    <?php $this->load->view('frontend/map/map.php'); ?>
</div>
    <div id="content-travel" class="mb-2 phone-hide" style="background: url('<?php get_img('asset1.png', 'bg'); ?>')center center no-repeat ;background-size:100% 100% ;min-height: 800px;min-width: auto;z-index: -1;opacity: 1;">
        <div class="text-center">
            <!-- <div class="parallax-container" data-parallax="scroll" data-bleed="10"
             data-image-src="<?php /*echo site_url('get_file/fd_img/bg-head.jpg/bg') */ ?>"
             data-natural-width="1400" data-natural-height="500" style="min-height:700px;text-align: center;">
 -->
            <div style="position:relative;z-index: 6;height:325px;width:100%;background: url('<?php get_img('travel6.jpg', 'map') ?>')top center no-repeat;"></div>
            <div class="container">
                <?php $travel = $this->db->select('*')->where('status', 1)->limit(3)->get('tb_travel')->result_array(); ?>
                <div class="row col-lg-12" style="margin-top: -10%">
                    <?php foreach ($travel as $tvKey => $tvVal):$file = search_img_one('tb_travel', $tvVal['no']) ?>

                        <div class="col-lg-4 vl">
                            <a href="<?php echo site_url('catalog/view/travel/' . $tvVal['no']); ?>">
                                <div class="card border-0" style="color: #603913;font-size: 1.5rem;background-color: transparent;font-style: italic;font-weight: bolder;">
                                    <img class="card-img-top " style="height: 250px;"
                                         src="<?php get_ul($file, 'travel'); ?>"
                                         data-holder-rendered="true">
                                    <div class="card-body" style="height: 100px;opacity:1;">
                                        <img style="margin-right: 3%;margin-top:2.2%;width: 18px;height: 17px" src="<?php get_img('assetdot.png','icon') ?>"
                                        <h3 class="card-title"><?php  echo $tvVal['subject'];?></h3>
                                        <?php /*echo substr_replace($tvVal['detail1'], '...', '500'); */ ?>
                                        <!--<p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>-->
                                    </div>

                                </div>
                            </a>
                        </div>
                    <?php endforeach;  ?>

                </div>
                <hr style="border-top: 3px solid transparent;border-color: #603913;margin-top: -2.5%;width: 100%">
            </div>


        </div>
        <!--</div>-->
    </div>
</div>

<div id="content-tab-activities" class="phone-hide" style="margin-top: 5%;background-color:#E0F0FB;height: 540px">
    <div class="container" style="background-color: #E0F0FB;z-index: -100" >
        <h4 style="text-align: center;margin-top: 2%;font-weight: bold;font-size: 2.5rem"><a style=" color: #00A79D;font-size: 2.5rem">สื่อ</a>ประชาสัมพันธ์</h4>
        <?php $video = $this->db->where('active', 1)->limit(1)->get('tb_youtube')->result_array();
        $cVideo = count($video) > 1 ? 1 : count($video); ?>
        <div class="row text-center" style="margin-top: 3%">
            <?php foreach ($video as $vdoKey => $vdoVal): ?>
                <div class="col-lg-<?php echo ceil(4 / $cVideo); ?> mb-2"
                     style="height:320px;margin-left:10%;background: url('<?php get_img('bg-book.png', 'bg'); ?>')top left no-repeat ;z-index: 1">
                    <p style="margin-top: -8%;margin-left: -80%;font-weight: bolder;font-size: 1.25rem">วารสารออนไลน์</p>
<!--                        <a href="--><?php //echo site_url('files/file/95') ?><!--" class="btn btn-outline" style="margin-top:80%;background-color: orange;color: black;margin-left: -45%">ดูวารสารประจำปี</a>-->
                       <!-- <img src="http://i3.ytimg.com/vi/<?php echo $vdoVal['video_id'] ?>/0.jpg"
                             height="230px" style="margin-top: 15px;"> -->
                   <div style="margin-top: 110%;margin-left: -100%"><p style="font-weight: bolder">วารสารเทศบาล <br>
                           ประจำปี 2561</p>
                       <div class="row mt-1">
                           <div class="col-lg-12 text-left" style="margin-left: 55%;margin-top: -8%">
                               <a href="<?php echo site_url('files/file/95') ?>"><img src="<?php get_img('getall.png', 'button'); ?>" height="40px;"></a>
                           </div>

                       </div>
                   </div>
                    </a>

                </div>
        </div>
            <?php endforeach; ?>

            <div class ="col-lg-12" style="background: url('<?php get_img('new-table.png', 'bg'); ?>')top center no-repeat;height:194px;z-index: 0;margin-top: -8%;"></div>

        <?php $video = $this->db->where('active', 1)->limit(2)->get('tb_youtube')->result_array();
        $cVideo = count($video) >  2 ? 2 : count($video); ?>
        <div class="row text-center" style="margin-top: -38%;margin-left: 30%">
            <?php foreach ($video as $vdoKey => $vdoVal): ?>
                <div class="col-lg-<?php echo ceil(12 / $cVideo); ?> mt-2"
                     style="height:300px;background: url('<?php get_img('bg-video.png', 'bg'); ?>')top center no-repeat">
                    <a data-href="http://www.youtube.com/embed/<?php echo $vdoVal['video_id'] ?>?autoplay=1"
                       class="youtube-yeah">
                        <img src="http://i3.ytimg.com/vi/<?php echo $vdoVal['video_id'] ?>/0.jpg"
                             height="230px" style="margin-top: 12px;width: 300px">
                    </a>
                    <p style="margin-top: -80%;margin-right:60%;font-weight: bolder;font-size: 1.25rem">มัลติมีเดีย</p>
                </div>


            <?php endforeach; ?>

          <!--  <div class ="col-lg-12" style="background: url('<?php get_img('new-table.png', 'bg'); ?>')top center no-repeat;height:194px;z-index: -1;margin-top: -2%"></div> -->
        </div>

        <div class="row" style="margin-top: 1%">
            <div class="col-lg-12 text-lg-right">
                <div style="margin-top: -3.3%;margin-right:10%"><p style="font-weight: bolder">ที่นี่...เมืองแกน เทศบาลเมืองเมืองแกนพัฒนา  <a href="<?php echo site_url('youtubes/youtube') ?>"><img src="<?php get_img('getall.png', 'button'); ?>" height="40px;"></a> </div>
            </div>
        </div>
    </div>
</div>

<div id="content-service" style="background:;min-height: 400px;" class="mt-2"  >
    <?php $menu_service = GetMenus(7) ?>
    <div class="row text-center" style="margin-top:-1%;">
        <div class="col-lg-12 mt-4" >
            <h4 style="width: 100%;height: 45px; font-weight: bold; text-align: center;margin-left:;background-color: #603913;color: white;margin-top: -1.3%;padding-top: 0.8%"ิ>บริการประชาชน</h4>
            <div class="triangle-down"></div>

      <!--     <div class="col-lg-12 mt-4">
                <div class="row">
            <img src="<?php get_img('tax.png', 'menus'); ?>" alt="" style="float: left;margin-left: 20%" >
                    <ul>
                    <li>dd</li>
                    <li>dd</li>
                    <li>dd</li>
                    </ul>

            <img src="<?php get_img('tax.png', 'menus'); ?>" alt="" style="float: left;margin-left: 20%" >
                    <ul>
                        <li><a href="<?php echo site_url('files/files20') ?>">dd</a></li>
                        <li>dd</li>
                        <li>dd</li>
                    </ul>
            <img src="<?php get_img('tax.png', 'menus'); ?>" alt="" style="float: left;margin-left: 20%" >
                    <ul>
                        <li>dd</li>
                        <li>dd</li>
                        <li>dd</li>
                    </ul>
            </div>
            </div> -->

        </div>
    </div>
    <div class="container-fluid text-center" style="margin-top: 3%;">
        <div class="row">
            <?php foreach ($menu_service AS $key => $val): ?>
                <div class="col-lg-4">
                    <div class="row" >
                        <div class="col-lg-8 text-lg-right pr-1">
                          <img src="<?php get_img($val['image'], 'menus'); ?>" alt="" width="275px">
                        </div>
                 <!--       <div class="col-lg-7">
                            <h5 style="padding-top: 20px;text-align: left" class=""><?php echo $val['menu_name']; ?></h5>
                        </div>  -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="text-align: left;margin-left: 30%;margin-top: -3%"  >
                            <ul>
                                <?php $menu_sub_service = GetMenusSub($val['menu_id']); ?>
                                <?php foreach ($menu_sub_service AS $sKey => $sVal): ?>
                                    <li style="list-style-type:disc">
                                        <a href="<?php echo site_url($sVal['controller'] . '/' . $sVal['name_type'] . '/' . $sVal['type']); ?>" style="font-size: 1.2rem;color:#603913"><?php echo $sVal['sub_name']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<hr class="phone-hide" style="border-top: 5px solid transparent;border-image: linear-gradient(to right,#0099CC 0%, #f27280 100%);border-image-slice: 1;margin-top: 5%">
    <img style="margin-top:-4.8%;margin-left: 43%" src="<?php get_img('linkweb.png', 'button'); ?>"
<div id="content-link" class="phone-hide"">

    <div id="content-link" class="phone-hide" style="background: url('<?php get_img('asset1.png', 'bg'); ?>')center center no-repeat ;background-size:100% 100% ;min-height: 600px;min-width: auto;z-index: -1;opacity: 0.9";>

    <div class="parallax-container" data-parallax="scroll" data-bleed="10"
             data-image-src="<?php /*get_img('building-vector-3.jpg', 'bg') */ ?>"
             data-natural-width="1400" data-natural-height="500" style="height:500px;width: 100%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 md-6 ">
                    <div style="margin-top:20px;font-weight: bold;color: #000000;padding-top: 10px;">
                    </div>
                </div>
            </div>
            <?php
            $link_out_position = $this->db->select('id')->where('name', 'link_out')->get('tb_banner_position')->row('id');
            $link_out = $this->db->where('position', $link_out_position)->where('status', 1)->get('tb_banner')->result_array();
            ?>
            <div class="text-center col-lg-12" >
                <?php foreach ($link_out as $loKey => $loVal):
                    $ex = substr($loVal['link_to'], 0, 1);
                    $target = $ex == '#' ? '' : '_blank';
                    $file = search_img_one('tb_banner', $loVal['id']); ?>
                    <a href="<?php echo $loVal['link_to'] ?>" target="<?php echo $target ?>">
                        <img src="<?php get_ul($file, 'banner') ?>"style="width: 300px;height: 100px">
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <!--</div>-->

    <!--<div class="parallax-container" data-parallax="scroll" data-bleed="10"
         data-image-src="<?php /*get_img('nightsafari.jpg', 'bg') */ ?>"
         data-natural-width="1400" data-natural-height="500" style="height:500px;width: 100%;">
-->
  <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div style="margin: 15px 5%;font-weight: bold;color: #ffffff;">
                    <h1 style="text-decoration: underline;">ลิงค์เว็บไซต์ภายในหน่วยงาน</h1>
                </div>
            </div>
        </div>
        <?php
        $link_in_position = $this->db->select('id')->where('name', 'link_in')->get('tb_banner_position')->row('id');
        $link_in = $this->db->where('position', $link_in_position)->where('status', 1)->get('tb_banner')->result_array();
        ?>
        <div class="text-center">
            <?php foreach ($link_in as $liKey => $liVal):
                $ex = substr($liVal['link_to'], 0, 1);
                $target = $ex == '#' ? '' : '_blank';
                $file = search_img_one('tb_banner', $liVal['id']); ?>
                <a href="<?php echo $liVal['link_to'] ?>" target="<?php echo $target ?>">
                    <img src="<?php get_ul($file, 'banner') ?>">
                </a>
            <?php endforeach; ?>
        </div>

    </div> -->
</div>
<!--</div>-->

<div id="content-link" class="phone-hide">
    <!--<div class="parallax-container" data-parallax="scroll" data-bleed="10"
             data-image-src="<?php /*get_img('building-vector-3.jpg', 'bg') */ ?>"
             data-natural-width="1400" data-natural-height="500" style="height:500px;width: 100%;">
-->
   <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div style="margin-top:20px;margin-left: 5%;font-weight: bold;color: #000000;padding-top: 10px;">
                    <h1 style="text-decoration: underline;">ลิงค์อื่นที่น่าสนใจ</h1>
                </div>
            </div>
        </div>
        <?php
        $link_out_position = $this->db->select('id')->where('name', 'link_out')->get('tb_banner_position')->row('id');
        $link_out = $this->db->where('position', $link_out_position)->where('status', 1)->get('tb_banner')->result_array();
        ?>
        <div class="text-center">
            <?php foreach ($link_out as $loKey => $loVal):
                $ex = substr($loVal['link_to'], 0, 1);
                $target = $ex == '#' ? '' : '_blank';
                $file = search_img_one('tb_banner', $loVal['id']); ?>
                <a href="<?php echo $loVal['link_to'] ?>" target="<?php echo $target ?>">
                    <img src="<?php get_ul($file, 'banner') ?>">
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div> -->
<!--</div>-->

<div id="youtube-player">
    <div class="modal fade" id="modal-youtube" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: transparent;border:0;">
                <div class="modal-body p-0" id="iframe-show-modal">
                </div>
                <div class="modal-footer p-0" style="border:0;">
                    <button type="button" class="btn btn-danger" id="modal-close-youtube" data-dismiss="modal">ปิด
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var $Youtube = $('.youtube-yeah'), $ModalYoutube = $('#modal-youtube'),
            $ModalClose = $('#modal-close-youtube'), $IframeShow = $('#iframe-show-modal'), $Iframe;
        $Youtube.click(function () {
            $ModalYoutube.modal({backdrop: 'static', keyboard: false});
            $Iframe = $('<iframe>', {
                src: $(this).attr('data-href'),
                id: 'myFrame',
                frameborder: 0,
                scrolling: 'no',
                height: '450',
                width: '100%'
            })
            $IframeShow.append($Iframe);
        });
        $ModalClose.click(function () {
            $IframeShow.find('#myFrame').remove();
        });
        $ModalYoutube.on('shown.bs.modal', function () {
            console.clear()
        });
        $ModalYoutube.on('hidden.bs.modal', function () {
            console.clear()
        });
    </script>
</div>
<?php
// $this->load->view('frontend/modal/modal'); // 25/11/62
$this->load->view('frontend/qrcode/qrcode');
?>
    <!-- Popup -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" />
    <a id="popuplink" href="#inline" style="display:none;"></a>
    <div id="inline" style="display:none;text-align:center;">
        <div style="height: 500px;width:1024px;background: url('<?php get_img('popup1.jpg', 'popup'); ?>')no-repeat center;">


        </div>
        <p><a href="javascript:;" onclick="jQuery.fancybox.close();" style="background-color:#333;padding:5px 10px;color:#fff;border-radius:5px;text-decoration:none;">ปิดหน้าต่างนี้</a></p>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.js"></script>



        <script>
            jQuery(document).ready(function () {
                function openFancybox() {
                    setTimeout(function () {
                        jQuery('#popuplink').trigger('click');
                    }, 500);
                };
                var visited = jQuery.cookie('visited');
                if (visited == 'yes') {
                    // second page load, cookie active
                } else {
                    openFancybox(); // first page load, launch fancybox
                }
                jQuery.cookie('visited', 'yes', {
                    expires: 1 // the number of days cookie  will be effective
                });
                jQuery("#popuplink").fancybox({modal:true, maxWidth: 1024, overlay : {closeClick : true}});
            });
        </script>


<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution="setup_tool"
     page_id="435969766469383"
     logged_in_greeting="ติดต่อสอบถามข้อมูลได้เลยนะครับ"
     logged_out_greeting="ติดต่อสอบถามข้อมูลได้เลยนะครับ">
</div>



