<div class="container">
    <div class="card card-shadow">
        <div class="card-header"></div>
        <div class="card-body" style="min-height: 300px;"></div>
    </div>
</div>
<!-- Load Facebook SDK for JavaScript --><!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution="setup_tool"
     page_id="435969766469383"
     theme_color="#13cf13"
     logged_in_greeting="ติดต่อสอบถามข้อมูลได้เลยนะครับ"
     logged_out_greeting="ติดต่อสอบถามข้อมูลได้เลยนะครับ">
</div>