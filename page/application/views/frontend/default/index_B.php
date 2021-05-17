<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/3/2561
 * Time: 13:57
 */
?>
<div id="content-advertise" class="container">
    <div class="row mt-3">
        <div class="col-lg-8 mb-4 mb-lg-0">
            <div>
                <h3 style="border-bottom: 2px solid red;width: 60%;">ประชาสัมพันธ์</h3>
            </div>
            <div class="card">
                <div class="card-body p-0">
                    <div class="bd-example">
                        <?php
                        $tb_new = $this->db->select('*')->from('tb_slideshow')->order_by('id', 'DESC')->limit('20')->get()->result_array();
                        ?>
                        <div id="advertisecarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" style="bottom: -30px;">
                                <?php foreach ($tb_new AS $nKey => $nVal): $active = $nKey == 0 ? 'active' : '' ?>
                                    <li data-target="#advertisecarousel" data-slide-to="<?php echo $nKey; ?>"
                                        class="<?php echo $active; ?>"
                                        style="height: 10px;"></li>
                                <?php endforeach; ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php foreach ($tb_new AS $nKey => $nVal): $active = $nKey == 0 ? 'active' : '';
                                    $file = $nVal['filename'] ?>
                                    <div class="carousel-item <?php echo $active; ?>" style="height: 350px;">
                                        <img class="d-block w-100 h-100"
                                             src="<?php get_ul($file, 'slideshow'); ?>"
                                             data-holder-rendered="true">
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
        <div class="col-lg-4 text-lg-left text-center">
            <h2 style="text-decoration: underline;color: #005cbf;">ช่องทางลัด</h2>
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

<div id="content-tab-advertise" class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="bd-example bd-example-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="advt-tab" data-toggle="tab" href="#tab-advt" role="tab"
                           aria-controls="advt-tab" aria-selected="false">ข่าวประชาสัมพันธ์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="purchase-tab" data-toggle="tab" href="#tab-purchase" role="tab"
                           aria-controls="purchase-tab" aria-selected="false">ข่าวการจัดซื้อจัดจ้าง</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#tab-register" role="tab"
                           aria-controls="register-tab" aria-selected="false">ข่าวรับสมัครงาน</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent1">
                    <!-- tab-ข่าวประชาสัมพันธ์ -->
                    <div class="tab-pane fade active show" id="tab-advt" role="tabpanel" aria-labelledby="advt-tab">
                        <?php
                        $tb_new = $this->db->select('*')->from('tb_news')->where('status', 1)->limit('3')->order_by('no', 'DESC')->get()->result_array();
                        ?>
                        <div class="row">
                            <?php foreach ($tb_new AS $nKey => $nVal):
                                $file = search_img_one('tb_news', $nVal['no']); ?>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <img class="card-img-top"
                                             src="<?php get_ul($file, 'news'); ?>"
                                             data-holder-rendered="true">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="<?php echo site_url('catalog/view/news/' . $nVal['no']) ?>">
                                                    <?php /*echo substr($nVal['subject'], 0, 100) . '...' */
                                                    ?>
                                                    <?php echo $nVal['subject']; ?>
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-12 text-right">
                                <a href="<?php echo site_url('catalogs/news'); ?>" class="btn btn-outline-success">ดูเพิ่มเติม</a>
                            </div>
                        </div>
                    </div>
                    <!-- end-tab-ข่าวประชาสัมพันธ์ -->
                    <!-- tab-ข่าวจัดซื้อจัดจ้าง -->
                    <div class="tab-pane fade" id="tab-purchase" role="tabpanel" aria-labelledby="purchase-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
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
                                                        class="form-control">
                                                    <?php foreach ($purchase_type AS $ptKey => $ptVal): ?>
                                                        <option value="tab-purchase-<?php echo $ptVal['id'] ?>"><?php echo $ptVal['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($purchase_type AS $ptKey => $ptVal):$purchase_hide = $ptKey != 0 ? 'purchase-hide' : '';
                                            $purchase_data = $this->db->select('*')->from('tb_purchase')->where('groupid', $ptVal['id'])->limit('5')->order_by('no', 'DESC')->get()->result_array(); ?>
                                            <div class="tab-purchase-<?php echo $ptVal['id'] ?> tab-purchase <?php echo $purchase_hide; ?>">
                                                <?php if (count($purchase_data) > 0): ?>
                                                    <?php foreach ($purchase_data AS $pdKey => $pdVal): ?>
                                                        <a href="<?php echo site_url('purchase/view/purchase/' . $pdVal['no']) ?>"><?php echo $pdVal['subject']; ?></a>
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
                                <a href="<?php echo site_url('purchases/purchase') ?>"
                                   class="btn btn-outline-success">ดูเพิ่มเติม</a>
                            </div>
                        </div>
                    </div>
                    <!-- end-tab-ข่าวจัดซื้อจัดจ้าง -->
                    <!-- tab-ข่าวสมัครงาน -->
                    <div class="tab-pane fade" id="tab-register" role="tabpanel" aria-labelledby="register-tab">
                        <?php
                        $tb_apply = 'tb_applys';
                        $applys = $this->db->where('status', 1)->limit(5)->order_by('no')->get($tb_apply)->result_array();
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>ข่าวรับสมัครงาน</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php if (count($applys) > 0): ?>
                                                    <?php foreach ($applys AS $apKey => $apVal): ?>
                                                        <a href="<?php echo site_url('catalog/view/apply/' . $apVal['no']) ?>"><?php echo $apVal['subject']; ?></a>
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
                                <a href="<?php echo site_url('catalogs/apply') ?>"
                                   class="btn btn-outline-success">ดูเพิ่มเติม</a>
                            </div>
                        </div>
                    </div>
                    <!-- end-tab-ข่าวจัดซื้อจัดจ้าง -->
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content-activities" class="container">
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="bd-example bd-example-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">ภาพกิจกรรม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">วิดีโอกิจกรรม</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php $activity_data = $this->db->select('*')->where('status', 1)->limit(3)->order_by('no', 'DESC')->get('tb_activity')->result_array(); ?>
                        <div class="row">
                            <?php foreach ($activity_data as $atKey => $atVal): $file = search_img_one('tb_activity', $atVal['no']); ?>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <img class="card-img-top"
                                             src="<?php get_ul($file, 'activity'); ?>"
                                             data-holder-rendered="true">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="<?php echo site_url('catalog/view/activity/' . $atVal['no']) ?>">
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
                                <a href="<?php echo site_url('catalogs/activity') ?>"
                                   class="btn btn-outline-success">ดูเพิ่มเติม</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <?php $video = $this->db->where('active', 1)->limit(3)->get('tb_youtube')->result_array();
                        $cVideo = count($video) > 3 ? 3 : count($video); ?>
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
                                        <div class="card-footer">
                                            <?php echo $vdoVal['name'] ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-lg-right">
                                <a href="<?php echo site_url('youtubes/youtube') ?>"
                                   class="btn btn-outline-success">ดูทั้งหมด</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content-executive" class="phone-hide">
    <div class="row mt-5">
        <div class="col-lg-12">
            <div style="height: 436px;background: url('<?php get_img('executive.jpg', ''); ?>')top center no-repeat">
            </div>
        </div>
    </div>
</div>

<div id="content-map" class="phone-hide">
    <?php $this->load->view('frontend/map/map.php'); ?>
    <div id="content-travel" class="mb-2 phone-hide">
        <div class="text-center">
            <!-- <div class="parallax-container" data-parallax="scroll" data-bleed="10"
             data-image-src="<?php /*echo site_url('get_file/fd_img/bg-head.jpg/bg') */ ?>"
             data-natural-width="1400" data-natural-height="500" style="min-height:700px;text-align: center;">-->
            <div style="position:relative;z-index: 6;margin-top: -80px;height:250px;width:100%;background: url('<?php get_img('travel.png', 'map') ?>')top center no-repeat;"></div>
            <div class="container">
                <?php $travel = $this->db->select('*')->where('status', 1)->limit(3)->get('tb_travel')->result_array(); ?>
                <div class="row">
                    <?php foreach ($travel as $tvKey => $tvVal):$file = search_img_one('tb_travel', $tvVal['no']) ?>
                        <div class="col-lg-4">
                            <a href="<?php echo site_url('catalog/view/travel/' . $tvVal['no']); ?>">
                                <div class="card card-shadow">
                                    <img class="card-img-top"
                                         src="<?php get_ul($file, 'travel'); ?>"
                                         data-holder-rendered="true">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $tvVal['subject']; ?></h5>
                                        <?php /*echo substr_replace($tvVal['detail1'], '...', '500'); */ ?>
                                        <!--<p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>-->
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--</div>-->
    </div>
</div>

<div id="content-tab-activities" class="phone-hide">
    <div style="background: url('<?php get_img('Untitled-2.jpg', 'bg'); ?>')top center no-repeat;height:194px;"></div>
    <div class="container">
        <?php $video = $this->db->where('active', 1)->limit(3)->get('tb_youtube')->result_array();
        $cVideo = count($video); ?>
        <div class="row text-center">
            <?php foreach ($video as $vdoKey => $vdoVal): ?>
                <div class="col-lg-<?php echo ceil(12 / $cVideo); ?>"
                     style="height:256px;background: url('<?php get_img('bg-video.png', 'bg'); ?>')top center no-repeat">
                    <a data-href="http://www.youtube.com/embed/<?php echo $vdoVal['video_id'] ?>?autoplay=1"
                       class="youtube-yeah">
                        <img src="http://i3.ytimg.com/vi/<?php echo $vdoVal['video_id'] ?>/0.jpg"
                             height="230px" style="margin-top: 15px;">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-lg-12 text-lg-right">
                <a href="<?php echo site_url('youtubes/youtube') ?>" class="btn btn-outline-success">ดูทั้งหมด</a>
            </div>
        </div>
    </div>
</div>

<div id="content-service" style="background: #f3f3f3;min-height: 350px;" class="mt-2">
    <?php $menu_service = GetMenus(6) ?>
    <div class="row text-center">
        <div class="col-lg-12 mt-4">
            <hr style="border-top: 5px solid #7b92a4;">
            <h2 style="margin-top: -35px;color: #0072BB;background-color: #f3f3f3;width: 250px;margin-left: auto;margin-right: auto;white-space: nowrap;">
                บริการประชาชน</h2>
        </div>
    </div>
    <div class="container-fluid text-center text-lg-left">
        <div class="row">
            <?php foreach ($menu_service AS $key => $val): ?>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-5 text-lg-right pr-1">
                            <img src="<?php get_img($val['image'], 'menus'); ?>" alt="">
                        </div>
                        <div class="col-lg-7">
                            <h5 style="padding-top: 20px;" class=""><?php echo $val['menu_name']; ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul>
                                <?php $menu_sub_service = GetMenusSub($val['menu_id']); ?>
                                <?php foreach ($menu_sub_service AS $sKey => $sVal): ?>
                                    <li>
                                        <a href="<?php echo site_url($sVal['controller'] . '/' . $sVal['name_type'] . '/' . $sVal['type']); ?>"><?php echo $sVal['sub_name']; ?></a>
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

<div id="content-link" class="phone-hide"
     style="background: url('<?php get_img('nightsafari.jpg', 'bg'); ?>')center center no-repeat fixed;background-size:100% 100% ;min-height: 500px;min-width: 250px;">
    <!--<div class="parallax-container" data-parallax="scroll" data-bleed="10"
         data-image-src="<?php /*get_img('nightsafari.jpg', 'bg') */ ?>"
         data-natural-width="1400" data-natural-height="500" style="height:500px;width: 100%;">-->
    <div class="container-fluid">
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
    </div>
</div>
<!--</div>-->

<div id="content-link-out" class="phone-hide"
     style="background: url('<?php get_img('building-vector-3.jpg', 'bg'); ?>')center center no-repeat fixed;background-size:100% 100% ;min-height: 500px;min-width: 250px;">
    <!--<div class="parallax-container" data-parallax="scroll" data-bleed="10"
             data-image-src="<?php /*get_img('building-vector-3.jpg', 'bg') */ ?>"
             data-natural-width="1400" data-natural-height="500" style="height:500px;width: 100%;">-->
    <div class="container-fluid">
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
</div>
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
$this->load->view('frontend/modal/modal');
$this->load->view('frontend/qrcode/qrcode');
?>
<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution="setup_tool"
     page_id="435969766469383"
     logged_in_greeting="ติดต่อสอบถามข้อมูลได้เลยนะครับ"
     logged_out_greeting="ติดต่อสอบถามข้อมูลได้เลยนะครับ">
</div>
