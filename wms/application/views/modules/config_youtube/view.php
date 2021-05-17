<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/4/2561
 * Time: 10:09
 */
//var_dump($set_data)
?>
<div class="card card-shadow">
    <div class="card-header">
        <h2><?php echo $head; ?></h2>
    </div>
    <div class="card-body">
        <form action="<?php echo $site ?>" method="post">
            <div class="row mb-2">
                <div class="col-lg-3 text-lg-right mt-2">
                    <b>ชื่อวีดีโอ :</b>
                </div>
                <div class="col-lg-6">
                    <input type="text" name="name" id="name" class="form-control"
                           value="<?php echo IsVal($set_data['name']); ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-3 text-lg-right">
                    <b>video id (รหัสไฟล์วีดีโอของ Youtube) :</b>
                </div>
                <div class="col-lg-6">
                    <input type="text" name="video_id" id="video_id" class="form-control"
                           value="<?php echo IsVal($set_data['video_id']); ?>">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6 offset-lg-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="active" name="active"
                               value="1" <?php echo IsCheck($set_data['active']); ?>>
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6 offset-lg-3">
                    <button type="submit" class="btn btn-success btn-block">บันทึก</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card card-shadow mt-3">
    <div class="card-body">
        <?php if ($set_data['video_id'] != ''): ?>
            <div class="row">
                <div class="offset-lg-2 col-lg-8 text-lg-center">
                    <iframe width="400px" height="250px"
                            src="https://www.youtube.com/embed/<?php echo $set_data['video_id'] ?>"
                            frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <b>วิธีนำรหัสไฟล์วีดีโอใน Youtube</b>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-lg-center">
                <img src="<?php get_img('embed_youtube.jpg', 'bg') ?>" alt="">
            </div>
        </div>
    </div>
</div>
