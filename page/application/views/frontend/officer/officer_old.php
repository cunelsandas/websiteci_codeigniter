<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 30/4/2561
 * Time: 13:08
 */
?>
<div class="container">
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card card-shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4><?php echo $head; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $block_all = $this->db->distinct()->select('sid')->where($type)->order_by('sid asc', 'nolist asc')->get($table_name)->result_array();
                    /*var_dump($block_all);
                    var_dump($all);*/
                    ?>
                    <style>
                        body{
                            font-size: 1.4rem;
                        }
                        .photo_border {
                            border: 1px solid #ffff66;
                            padding: 5px;
                            width: 150px;
                            /*max-height: 185px;*/
                            height: 180px;
                            box-shadow: 5px 5px 5px #616161;
                            background-color: #ffffcc;
                            margin: 10px auto 10px auto;
                        }
                    </style>
                    <div class="card-body" style="background-color: #D8D9DB;">
                        <?php foreach ($block_all as $bKey => $bVal):
                            $folder_name = 'office';
                            $filename = $type['offid'] . '_' . $bVal['sid'] . '.png'; ?>
                            <?php if (file_exists(FOLDERIMG . $folder_name . '/' . $filename)): ?>
                            <div class="row mb-3">
                                <div class="col-lg-12 bg-white">
                                    <img src="<?php echo get_img($filename, $folder_name) ?>" alt="">
                                </div>
                            </div>
                        <?php endif; ?>
                            <div class="row text-center mb-2">
                                <?php foreach ($all AS $aKey => $aVal): ?>
                                    <?php $row_check = 0; ?>
                                    <?php if ($bVal['sid'] == $aVal['sid']): ?>
                                        <?php
                                        $block = $this->db->select('sid')->where('sid', $bVal['sid'])->where($type)->where('status', 1)->get($table_name)->num_rows();
                                        $blocks = $block;
                                        if ($block > 3) {
                                            $blocks = 3;
                                        }
                                        if ($aVal['sid'] == 1) {
                                            $blocks = 1;
                                        }
                                        ?>
                                        <div class="col-lg-<?php echo ceil(12 / $blocks) ?> pt-2">
                                            <img class="photo_border"
                                                 src="<?php get_ul($all[$aKey]['filename'], $all[$aKey]['folder_name']) ?>"
                                                 alt="">
                                            <p class="card-text"><b><?php echo $aVal['name']; ?></b></p>
                                            <p class="card-text"><b><?php echo $aVal['position']; ?></b></p>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>อำนาจหน้าที่ <?php echo $office_name; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="font-size:">
                    <?php echo $set_data['detail']; ?>
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

