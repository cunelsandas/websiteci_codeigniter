<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/3/2561
 * Time: 13:26
 */
//var_dump($data);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php if ($set == []): ?>
                <!--เพิ่มกระทู้ใหม่-->
                <div class="card card-shadow">
                    <div class="card-header">
                        <h4><?php echo $head; ?></h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo $site_save; ?>">
                            <div class="row mb-3">
                                <div class="col-lg-2 text-lg-right">
                                    ชื่อเรื่อง :
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="topic" name="topic">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-2 text-lg-right">
                                    รายละเอียด :
                                </div>
                                <div class="col-lg-8">
                                    <textarea class="form-control" rows="3" name="detail"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-2 text-lg-right">
                                    โดย :
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="person" name="person">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-8 offset-lg-2">
                                    ป้อนรหัสยืนยัน : เงื่อนไข<br>
                                    1. กรุณาป้อนข้อมูลให้ครบทุกช่อง มิฉะนั้นจะไม่สามารถบันทึกได้<br>
                                    2. กรุณาใช้คำที่สุภาพและไม่เป็นการหมิ่นประมาท ใส่ร้ายผู้อื่น<br>
                                    3. ทางทีมงานขอสงวนสิทธิ์ในการลบข้อความไม่เหมาะสมใดๆโดยมิต้องแจ้งล่วงหน้า<br>
                                    ข้าพเจ้าขอยืนยันที่จะปฏิบัติตามเงื่อนไข<br>
                                    <script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
                                    <div class="g-recaptcha" data-callback="add_btn"
                                         data-sitekey="6LdnbtUZAAAAAFhdEWsnmw6i24UQvFKdIhkYcg_r"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-8 offset-lg-2" id="add_btn"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--เพิ่มกระทู้ใหม่-->
            <?php else: ?>
                <!--ตอบกระทู้-->
                <!--หัวข้อกระทู้-->
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-10">
                                        กระทู้ ID [ <?php echo $set['wid']; ?> ]:
                                        <?php echo $set['subject']; ?>
                                    </div>
                                    <div class="col-lg-2 text-lg-right">
                                        <?php echo $delete = $set['deleted'] == 1 ? 'ถูกแจ้งลบ' : ''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo nl2br($set['detail']); ?></p>
                            </div>
                            <div class="card-footer">
                                โดย <i class="fa fa-user-circle"></i> <?php echo $set['postby']; ?>
                                <i class="fa fa-calendar"></i> <?php echo DateTimeThai($set['createdate']); ?>
                                <i class="fa fa-street-view"></i>IP <?php echo $set['ip']; ?>
                                <a href="<?php echo $inform; ?>"
                                   class="btn btn-danger btn-sm float-lg-right btn-inform">ลบ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--หัวข้อกระทู้-->
                <!--คำตอบกระทู้-->
                <?php foreach ($set_sub AS $ssKey => $ssVal): if ($ssVal['status'] == 1): ?>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="card text-white bg-info mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            RE:: ตอบกระทู้ ID [ <?php echo $ssVal['wid']; ?>
                                            ]: <?php echo $set['subject']; ?>
                                        </div>
                                        <div class="col-lg-2 text-lg-right">
                                            <?php echo $delete = $ssVal['deleted'] == 1 ? 'ถูกแจ้งลบ' : ''; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo nl2br($ssVal['detail']); ?></p>
                                </div>
                                <div class="card-footer">
                                    โดย <i class="fa fa-user-circle"></i> <?php echo $ssVal['postby']; ?>
                                    <i class="fa fa-calendar"></i> <?php echo DateTimeThai($ssVal['createdate']); ?>
                                    <i class="fa fa-street-view"></i>IP <?php echo $ssVal['ip']; ?>
                                    <a href="<?php echo $inform_sub . $ssVal['no']; ?>"
                                       class="btn btn-danger btn-sm float-lg-right btn-inform">ลบ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; endforeach; ?>
                <!--คำตอบกระทู้-->
                <!--ฟอร์มตอบกระทู้-->
                <div class="row mb-3">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="card">
                            <div class="card-header">
                                <h4>ตอบกระทู้</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo $site_save; ?>" method="post">
                                    <div class="row mb-3">
                                        <div class="col-lg-2 text-lg-right">
                                            รายละเอียด :
                                        </div>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" rows="3" name="detail"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-2 text-lg-right">
                                            โดย :
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="person" name="person">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-8 offset-lg-2">
                                            ป้อนรหัสยืนยัน : เงื่อนไข<br>
                                            1. กรุณาป้อนข้อมูลให้ครบทุกช่อง มิฉะนั้นจะไม่สามารถบันทึกได้<br>
                                            2. กรุณาใช้คำที่สุภาพและไม่เป็นการหมิ่นประมาท ใส่ร้ายผู้อื่น<br>
                                            3. ทางทีมงานขอสงวนสิทธิ์ในการลบข้อความไม่เหมาะสมใดๆโดยมิต้องแจ้งล่วงหน้า<br>
                                            ข้าพเจ้าขอยืนยันที่จะปฏิบัติตามเงื่อนไข<br>
                                            <script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
                                            <div class="g-recaptcha" data-callback="add_btn"
                                                 data-sitekey="6LdnbtUZAAAAAFhdEWsnmw6i24UQvFKdIhkYcg_r"></div>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-8 offset-lg-2" id="add_btn"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--ฟอร์มตอบกระทู้-->
                <!--ตอบกระทู้-->
            <?php endif; ?>
        </div>
        <script !src="">
            $('.btn-inform').click(function () {
                return confirm('คุณต้องการแจ้งลบสิ่งนี้ใช่ไหม?');
            });
        </script>
    </div>
</div>
