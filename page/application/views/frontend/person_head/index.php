<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/3/2561
 * Time: 9:34
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
                    .photo_border {
                        border: 1px solid #ffff66;
                        padding: 5px;
                        width: 150px;
                        max-height: 185px;
                        box-shadow: 5px 5px 5px #616161;
                        background-color: #ffffcc;
                        margin: 10px auto 10px auto;
                    }
                </style>
                <?php
                $block1 = $this->db->select('sid')->where('sid', 1)->get($table_name)->num_rows();
                $block2 = $this->db->select('sid')->where('sid', 2)->get($table_name)->num_rows();
                $block3 = $this->db->select('sid')->where('sid', 3)->get($table_name)->num_rows();
                $block4 = $this->db->select('sid')->where('sid', 4)->get($table_name)->num_rows();
                ?>
                <div class="card-body" style="background-color: #D8D9DB;">
                    <div class="row text-center">
                        <?php foreach ($all AS $aKey => $aVal): ?>
                            <?php if ($aVal['sid'] == 1) : ?>
                                <div class="col-lg-<?php echo ceil(12 / $block1) ?> pt-2">
                                    <img class="photo_border"
                                         src="<?php get_ul($aVal['filename'], $aVal['folder_name']) ?>"
                                         alt="">
                                    <p class="card-text"><b><?php echo $aVal['name']; ?></b></p>
                                    <p class="card-text"><b><?php echo $aVal['position']; ?></b></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="row text-center">
                        <?php foreach ($all AS $aKey => $aVal): ?>
                            <?php if ($aVal['sid'] == 2) : ?>
                                <div class="col-lg-<?php echo ceil(12 / $block2) ?> pt-2">
                                    <img class="photo_border"
                                         src="<?php get_ul($aVal['filename'], $aVal['folder_name']) ?>"
                                         alt="">
                                    <p class="card-text"><b><?php echo $aVal['name']; ?></b></p>
                                    <p class="card-text"><b><?php echo $aVal['position']; ?></b></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="row text-center">
                        <?php foreach ($all AS $aKey => $aVal): ?>
                            <?php if ($aVal['sid'] == 3) : ?>
                                <div class="col-lg-<?php echo ceil(12 / $block3) ?> pt-2">
                                    <img class="photo_border"
                                         src="<?php get_ul($aVal['filename'], $aVal['folder_name']) ?>"
                                         alt="">
                                    <p class="card-text"><b><?php echo $aVal['name']; ?></b></p>
                                    <p class="card-text"><b><?php echo $aVal['position']; ?></b></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>