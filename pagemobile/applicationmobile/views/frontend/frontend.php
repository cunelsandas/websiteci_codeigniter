<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/3/2561
 * Time: 13:44
 */
$content = 'aasdasdasdadsaaasdasdasdadsa';
$menu = 'top';
$this->load->view('component/head');
include 'myfnc.php';

	  
?>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v6.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="167289236615927"
  theme_color="#0066ff"
  logged_in_greeting="สวัสดีค่ะ ติดต่อสอบถามข้อมูลเพิ่มเติม โทร 053-857360 แฟกซ์ 053-857017"
  logged_out_greeting="สวัสดีค่ะ ติดต่อสอบถามข้อมูลเพิ่มเติม โทร 053-857360 แฟกซ์ 053-857017">
      </div>
<body>
<style>
    /* width */
    ::-webkit-scrollbar {
        width: 20px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #fcdee2;
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #fcdee2;
    }

    /*::-webkit-scrollbar {*/
    /*    width: 15px;*/
    } /* this targets the default scrollbar (compulsory) */

    /*::-webkit-scrollbar-track {*/
    /*    background-color: #b46868;*/
    /*} !* the new scrollbar will have a flat appearance with the set background color *!*/

    /*::-webkit-scrollbar-thumb {*/
    /*    background-color: rgba(0, 0, 0, 0.2);*/
    /*} !* this will style the thumb, ignoring the track *!*/

    /*::-webkit-scrollbar-button {*/
    /*    background-color: #7c2929;*/
    /*} !* optionally, you can style the top and the bottom buttons (left and right for horizontal bars) *!*/

    /*::-webkit-scrollbar-corner {*/
    /*    background-color: black;*/
    /*} !* if both the vertical and the horizontal bars appear, then perhaps the right bottom corner also needs to be styled *!*/
</style>
<div id="google_translate_element" style="position: absolute;right: 0;"></div>
<!-- menu -->
<?php
if ($menu == 'top') {
    $this->load->view('menu/menu_top');
} else {
    $this->load->view('menu/menu_top');
}
?>
<!-- end-menu -->

<!-- content -->
<?php if ($content == 'container-fluid'): ?>
<div class="container-fluid">
    <?php elseif ($content == 'container'): ?>
    <div class="container">
        <?php else: ?>
        <div style=width: 100%">
            <?php endif; ?>
            <?php $this->load->view($view, $data); ?>
        </div>
        <!-- end-content -->

        <!-- footer -->
        <?php
        $this->load->view('component/foot');
        ?>
        <!-- end-footer -->
</body>
<div id="fb-root"></div>
<script async defer>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- Translate -->
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'th',
            includedLanguages: 'en,lo,zh-CN,tl,id,ja,ko,ms,vi,my,km,th',
            layout: google.translate.TranslateElement.FloatPosition.TOP_RIGHT,
            autoDisplay: false
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- end-Translate -->
