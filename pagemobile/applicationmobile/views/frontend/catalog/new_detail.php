<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 10:11
 */
?>
<?php if (count($data) > 0): ?>
    <?php foreach ($data AS $dKey => $dVal): $file = search_img_one($table_name, $dVal['no']); ?>
        <div class="row mb-3">
            <div class="col-lg-2"></div>
            <div class="col-lg-3">
                <div class="card text-center">
                    <a href="<?php echo $site_view . $dVal['no']; ?>"><img class="card-img" style="display: block;width: 100%"
                                                                           src="<?php get_ul($file, $folder_name) ?>"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <a style="color: hotpink" href="<?php echo $site_view . $dVal['no']; ?>"><?php echo $dVal['subject'] ?></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $string = $dVal['detail1'];
                        if (strlen($string) > 1000) {

                            // truncate string
                            $stringCut = substr($string, 0, 1000);
                            $endPoint = strrpos($stringCut, ' ');

                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= ' ... <a style="color:hotpink" href="'.$site_view . $dVal['no'].'">อ่านต่อ</a>';
                        }
                        echo $string;
                        echo "<br>";
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <b><?php echo DateThaiNa($dVal['datepost']); ?></b>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-lg-12 text-center">
        <h4>ไม่พบข้อมูล</h4>
    </div>
<?php endif; ?>
<?php $this->load->view('component/pagination'); ?>
