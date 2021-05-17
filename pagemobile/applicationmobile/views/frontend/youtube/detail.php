<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 11/4/2561
 * Time: 11:46
 */
?>
<?php foreach ($data as $key => $val): ?>
    <div class="row mt-2 mb-2">
        <div class="col-lg-6">
            <a data-href="http://www.youtube.com/embed/<?php echo $val['video_id']; ?>?autoplay=1"
               class="youtube-yeah">
                <img src="http://i3.ytimg.com/vi/<?php echo $val['video_id']; ?>/0.jpg"
                     width="100%">
            </a>
        </div>
        <div class="col-lg-6">
            <b><?php echo $val['name']; ?></b>
        </div>
    </div>
<?php endforeach; ?>
<div id="youtube-player">
    <div class="modal fade" id="modal-youtube" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: transparent;border:0;">
                <div class="modal-body p-0" id="iframe-show-modal">
                </div>
                <div class="modal-footer p-0" style="border:0;">
                    <button type="button" class="btn btn-danger" id="modal-close-youtube" data-dismiss="modal">ปิด
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var $Youtube = $('.youtube-yeah'), $ModalYoutube = $('#modal-youtube'),
            $ModalClose = $('#modal-close-youtube'), $IframeShow = $('#iframe-show-modal'), $Iframe;
        $Youtube.click(function () {
            $ModalYoutube.modal({backdrop: 'static', keyboard: false});
            $Iframe = $('<iframe>', {
                src: $(this).attr('data-href'),
                id: 'myFrame',
                frameborder: 0,
                scrolling: 'no',
                height: '450',
                width: '100%'
            })
            $IframeShow.append($Iframe);
        });
        $ModalClose.click(function () {
            $IframeShow.find('#myFrame').remove();
        });
        $ModalYoutube.on('shown.bs.modal', function () {
            console.clear()
        });
        $ModalYoutube.on('hidden.bs.modal', function () {
            console.clear()
        });
    </script>
</div>
<?php $this->load->view('component/pagination'); ?>
