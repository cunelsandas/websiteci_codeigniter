<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/4/2561
 * Time: 13:10
 */
?>

<div class="modal fade" id="ModalAddData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LabelModal"><?php echo $head; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-2">
                    <div class="col-lg-2 pr-lg-1 text-lg-right">
                        <b>ผู้ใช้งาน :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="name" id="name" class="form-control"
                               value="<?php echo IsVal($set_data['nameuser']) ?>">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-2 pr-lg-1 text-lg-right">
                        <b>นามสกุล :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="surname" id="surname" class="form-control"
                               value="<?php echo IsVal($set_data['surname']) ?>">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-2 pr-lg-1 text-lg-right">
                        <b>User name :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="username" id="username" class="form-control"
                               value="<?php echo IsVal($set_data['username']) ?>">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-2 pr-lg-1 text-lg-right">
                        <b>Password :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="password" id="password" class="form-control"
                               value="<?php echo IsVal($set_data['pwfix']) ?>">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-2 pr-lg-1 text-lg-right">
                        <b>ฝ่าย :</b>
                    </div>
                    <div class="col-lg-8">
                        <select name="section" id="section" class="form-control">
                            <?php foreach ($office_type as $ofKey => $ofVal): ?>
                                <option value="<?php echo $ofVal['office_type_id'] ?>" <?php echo IsSelect($set_data['depid'], $ofVal['office_type_id']) ?>><?php echo $ofVal['office_type_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"
                        id="Btn-save" data-href="<?php echo $site_save; ?>"><i class="fa fa-save"></i> บันทึก
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<script>
    var $Modal = $('#ModalAddData');
    $Modal.modal('show');
</script>
