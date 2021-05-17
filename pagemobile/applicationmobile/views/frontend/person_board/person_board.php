<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/3/2561
 * Time: 13:59
 */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-shadow">
                <div class="card-header text-center">
                    <h2><?php echo $head; ?></h2>
                </div>
                <style>
                    body{
                        font-size: 1.3rem;
                    }
                    .photo_border {
                        border: 1px solid #ffff66;
                        padding: 5px;
                        width: 150px;
                        max-height: 185px;
                        box-shadow: 5px 5px 5px #616161;
                        background-color: #ffffcc;
                        margin: 10px auto 10px auto;
                    }
                    p {
                        margin-bottom: 2px;
                    }
                </style>
                <?php
                $block_all = $this->db->distinct()->select('sid')->order_by('sid')->get($table_name)->result_array();
                ?>
                <div class="card-body" style="background-color: #D8D9DB;">
                    <?php foreach ($block_all as $bKey => $bVal): ?>
                        <div class="row text-center">
                            <?php foreach ($all AS $aKey => $aVal): ?>
                                <?php $row_check = ''; ?>
                                <?php if ($bVal['sid'] == $aVal['sid']): ?>
                                    <?php
                                    $block = $this->db->select('sid')->where('sid', $bVal['sid'])->where('status', 1)->get($table_name)->num_rows();
                                    if ($block > 4) {
                                        $block = 3;
                                    }
                                    ?>
                                    <?php if ($row_check != $aVal['sid']): ?>
                                        <?php $row_check = $aVal['sid']; ?>
                                        <div class="col-lg-<?php echo ceil(12 / $block) ?> pt-2">
                                            <img class="photo_border"
                                                 src="<?php get_ul($all[$aKey]['filename'], $all[$aKey]['folder_name']) ?>"
                                                 alt="">
                                            <p class="card-text"><b><?php echo $aVal['name']; ?></b></p>
                                            <p class="card-text"><b><?php echo $aVal['position']; ?></b></p>
                                            <?php if($aVal['telephone'] != null) : ?>
                                            <p class="card-text"><b>เบอร์โทรศัพท์ <?php echo $aVal['telephone']; ?></b></p>
                                            <?php endif; ?>
                                        </div>
                                    <br>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
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
