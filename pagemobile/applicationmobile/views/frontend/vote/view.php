<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/5/2561
 * Time: 15:49
 */
$head_vote = !$check_vote ? 'ขอเชิญร่วมแสดงความเห็น' : 'ผลการแสดงความคิดเห็น';
//var_dump($process);
?>
<div class="modal fade" id="ModalVote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle"
                    data-field="<?php echo $set['id']; ?>"
                ><?php echo $head_vote; ?>ในหัวข้อ <?php echo $set['name']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (!$check_vote): ?>
                    <div class="row">
                        <div class="col-8 offset-2">
                            <?php foreach ($set_sub as $ssKey => $ssVal): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="vote"
                                           id="vote<?php echo $ssVal['id'] ?>"
                                           value="<?php echo $ssVal['id'] ?>">
                                    <label class="form-check-label"
                                           for="vote<?php echo $ssVal['id'] ?>"
                                    ><?php echo $ssVal['name']; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="row mt-1 text-center">
                        <div class="col-8 offset-2">
                            <script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
                            <div class="g-recaptcha" data-callback="save" data-expired-callback="resave"
                                 data-sitekey="6Let9toUAAAAACtw_kSyENkwJGToZUDpRBbhBuVZ">
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <div class="col-12 text-center ">
                            <b>คุณได้แสดงความคิดเห็นในหัวข้อนี้แล้ว</b>
                        </div>
                    </div>
                <?php endif; ?>
                <hr>
                <?php foreach ($process as $pcKey => $pcVal):
                    $color = sprintf("#%06x", rand($pcKey, 16777215)); ?>
                    <div class="row mb-2">
                        <div class="col-2 text-right"><?php echo $pcVal['name']; ?></div>
                        <div class="col-8">
                            <div class="progress" style="height: 30px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                     role="progressbar"
                                     style="width: <?php echo $pcVal['process'] ?>%;background-color: <?php echo $color ?>;"
                                     aria-valuenow="10"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                    <b><?php echo $pcVal['process'] != 0 ? $pcVal['process'] . '%' : ''; ?></b>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"><?php echo $pcVal['count'] ?> คะแนน</div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <?php if (!$check_vote): ?>
                    <button type="button" class="btn btn-primary" id="BtnVote"
                            data-set="<?php echo site_url('utility/setcaptcha'); ?>"
                            data-site="<?php echo $site_vote; ?>"
                            disabled>บันทึก/Vote
                    </button>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<script>
    var $ModalVote = $('#ModalVote'), $BtnVote = $('#BtnVote'), $ModalTitle = $('#ModalTitle');
    $ModalVote.modal('show');

    function save(response) {
        var $site = $BtnVote.attr('data-set');
        var $data = {ss: response};
        a2data($data, $site, function (d) {
            if (d) {
                $BtnVote.attr('disabled', false);
            }
        });
    }

    $BtnVote.click(function () {
        var $site = $(this).attr('data-site'), $radio = $('input[name="vote"]:checked').val(),
            $Field = $ModalTitle.attr('data-field'), $data = {vote: $radio, field: $Field};
        if ($radio) {
            a2data($data, $site, function (a) {
                if (a) {
                    $ModalVote.modal('hide');
                }
            });
        } else {
            alert('กรุณาเลือกรายการโหวต !!');
        }
    });

    function resave() {
        $ModalVote.modal('hide');
    }

</script>
