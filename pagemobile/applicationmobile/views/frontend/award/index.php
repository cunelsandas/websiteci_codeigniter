<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/3/2561
 * Time: 13:57
 */
?>
<hr style="border-top: 10px solid transparent;border-color: #FFDE17;z-index: 1;margin-top: -2%">
<div>
    <h4 style="width: 100%;height: 45px; font-weight: bold; text-align: center;margin-left:;background-color: #603913;color: white;margin-top: -1.3%"ิ>รางวัลเกียรติคุณ</h4>
</div>
<div id="content-activities" class="container-fluid" style="margin-top: -4%;background-color: #FFE3A5">
    <div class="row mt-5" style="margin-left: 15%;margin-right: 15%;">
        <div class="col-lg-12">
            <div class="bd-example bd-example-tabs" style="margin-top: 3%">


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php $activity_data = $this->db->select('*')->where('status', 1)->limit(9)->order_by('no', 'DESC')->get('tb_award')->result_array(); ?>
                        <div class="row">
                            <?php foreach ($activity_data as $atKey => $atVal): $file = search_img_one('tb_award', $atVal['no']); ?>
                                <div class="col-lg-4">
                                    <div class="card"  style="border: none; margin-bottom: 4%;width: 300px;height: 230px">
                                        <img class="card-img-top" style="height:160px; width: 280px;margin: 3% auto;"
                                             src="<?php get_ul($file, 'award'); ?>"
                                             data-holder-rendered="true">
                                        <div class="card-body" style="margin-bottom: -20%">
                                            <h5 class="card-title">
                                                <a href="<?php echo site_url('catalog/view/awards/' . $atVal['no']) ?>"  >
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
                                <a href="<?php echo site_url('catalogs/awards') ?>"
                                   class="btn btn-outline-success">ดูเพิ่มเติม</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

