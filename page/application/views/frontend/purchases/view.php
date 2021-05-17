<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 14:39
 */
//var_dump($data);
$files = search_img($table_name, $set['no']);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="min-height: 300px">
                <div class="card-header">
                    <div class="fb-share-button float-right" data-layout="button_count" data-mobile-iframe="true"></div>
                    <b class="float-right">[<?php echo DateThaiNa($set['datepost']) ?>]</b>
                    <h4><?php echo $set['subject'] ?></h4>
                </div>
                <div class="card-body font-weight-bold" style="font-size: 1.4rem">
                    <div class="row">
                        <div class="col-lg-2 text-lg-right">
                            รายละเอียด :
                        </div>
                        <div class="col-lg-10">
                            <?php echo $set['detail']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 text-lg-right">
                            ไฟล์เอกสาร :
                        </div>
                        <div class="col-lg-10">
                            <?php foreach ($files AS $fKey => $fVal): $exten = explode('.', $fVal['filename'])[1];
                                if ($exten == 'pdf' || $exten == 'PDF'): ?>
                                    <a href="<?php get_pdf($fVal['filename'], $folder_name) ?>" target="_blank">
                                        <img src="<?php get_img('pdf.png', '') ?>" width="15%">
                                    </a>
                                    <br>
                                    <br>
                                    <embed src="<?php get_pdf($fVal['filename'], $folder_name) ?>" width="80%" height="700px"
                                           pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
                                <?php elseif ($exten == 'doc' || $exten == 'docx'): ?>
                                    <a href="<?php get_pdf($fVal['filename'], $folder_name) ?>" target="_blank">
                                        <img src="<?php get_img('doc.png', '') ?>" width="15%">
                                    </a>
                                <?php elseif ($exten == 'xls' || $exten == 'xlsx'): ?>
                                    <a href="<?php get_pdf($fVal['filename'], $folder_name) ?>" target="_blank">
                                        <img src="<?php get_img('xls.png', '') ?>" width="15%">
                                    </a>
                                <?php else: ?>
                                    <div class="row card-img-show">
                                        <a class="a-img-show href="<?php get_ul($fVal['filename'], $folder_name) ?>">
                                        <img src="<?php get_ul($fVal['filename'], $folder_name) ?>" width="100%">
                                        </a>
                                    </div>
                                    <br>
                                <?php endif; ?>
                            <?php endforeach; ?>
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
    </div>
</div>
