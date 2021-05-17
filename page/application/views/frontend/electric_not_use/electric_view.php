
<?php

error_reporting(E_ALL ^ E_NOTICE);

?>
<style type="text/css">
    .ui-datepicker{
        width:200px;
        font-family: fc_lamoonregular, sans-serif;
        font-size:11px;
        text-align:center;
    }

    @import url(../font/thsarabunnew.css);
    @import url(../font/th_niramit_as.css);
    @import url(../font/th_k2d_july8.css);
    @import url(../font/th_chakra_petch.css);
    @import url(../font/th_baijam.css);
    @import url("css/orgchart.css");

    @import url("css/tabcontent.css");
    @import url(../nivo-slider/default/default.css);
    @import url(../nivo-slider/nivo-slider.css);
    @import url("fullslideshow.css");
    * {
        padding:0px;
        margin:0px;
    }
    div.polaroid {

        width:260px;
        height:250px;
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-bottom: 25px;
        overflow:hidden;
        color:black;
    }

    div.container {
        text-align: center;
        padding: 10px 20px;
        overflow:hidden;
        color:black;
    }
    body{
        font-family:<?php echo $font_family;?>;
        font-size:<?php echo $font_size;?>px;
        line-height:150%;
        color:#<?php echo $font_color;?>;
        background:url(../images/bgpah.jpg);
        background-color:#<?php echo $body_bg;?>;
        font-weight:bold;
    }
    #containner{
        width:<?php echo $div_container_width;?>px;
        height:100%;
        margin:auto;
        background-color:#<?php echo $div_container;?>;
        box-shadow: -60px 0px 100px -90px #000000, 60px 0px 100px -90px #000000;
    }
    #header{
        width:<?php echo $div_container_width;?>px;
        height:<?php echo $div_header_height;?>px;
        background:url(../images/header.jpg) no-repeat;
        background-color:#455a49;

    }
    #header1{
        position: absolute;
        width:<?php echo $div_container_width;?>px;
        height:<?php echo $div_header_height;?>px;
        background:url(../images/header.png) no-repeat;
        z-index: 3;
    }
    #middle{
        padding:10px;
        width:<?php echo $div_container_width;?>px;
        margin: auto;
        /* Safari 3-4, iOS 1-3.2, Android 1.6- */
        -webkit-border-radius: 12px;
        /* Firefox 1-3.6 */
        -moz-border-radius: 12px;
        /* Opera 10.5, IE 9, Safari 5, Chrome, Firefox 4, iOS 4, Android 2.1+ */
        border-radius: 12px;
        box-shadow: -60px 0px 100px -90px #000000, 60px 0px 100px -90px #000000;
    }
    #middle_link{
        width:<?php echo $div_container_width;?>px;
        background-color:#28997a;
        height:100px;
        line-height:100px;
        padding-top:10px;

    }
    #middle_link img{
        padding-left:20px;
        padding-right:20px;
    }
    #content{

        width:850px;
        margin-left:310px;
        padding-top:20px;
        padding-left:40px;

    }
    #sidemenu{
        background-color:#<?php echo $div_sidemenu;?>;
        float:left;
        /*	margin-left:860px;*/
        width:310px;
        height:100%;
        padding-left:0px;
        min-height:500px;
        color:#ffffff;
        margin-bottom:30px;
        box-shadow:5px 5px 10px #3f3f3f;
    }
    #sidemenu a{
        color:#ffffff;
    }
    #sidemenu a:hover{
        color:#ffff00;
    }
    #sidemenu ul{
        list-style: none;

    }
    #sidemenu li{
        margin-left:20px;
        margin-bottom:5px;
        margin-top:5px;
        font-weight:bold;

    }
    #sidemenu li:before{
        content: "-:-  ";
        color:#ffffff;
    }

    #bottom{
        clear:both;
        background:url(../images/bottom.jpg) no-repeat;
        width:<?php echo $div_container_width;?>px;
        height:<?php echo $div_bottom_height;?>px;
    }
    .menutop{

        width:<?php echo $div_container_width;?>px;
        height:40px;
        background-color:#<?php echo $div_menutop;?>;
        line-height:40px;
        box-shadow:5px 5px 10px #3f3f3f;

    }
    .menutop img{
        width:160px;
        height:40px;
    }
    .menutop ul{
        margin:0px;
        list-style-type:none;
        width:auto;
        float:left;
    }

    .menutop ul li {
        display:block;
        float:left;
        margin:0 1px;
    }

    .menutop ul li a {
        display:block;
        float:left;
        color:#ffffff;
        text-decoration:none;
        padding:0px 20px 0px 20px;

    }

    .menutop ul li a span {
        padding:12px 60px 0 0;
        height:21px;
        float:left;
        font-weight: 100;

    }

    .menutop ul li a:hover {
        color:#0000ff;

    }

    .menutop ul li a:hover span {
        display:block;
        width:auto;
        cursor:pointer;
        color:#ff179c;
    }


    /* กรอบรูปแบบภาพถ่าย */
    .photo_border{
        border:1px solid #017DC5;
        padding:5px;
        width:150px;
        max-height:185px;
        box-shadow:5px 5px 5px #2e2e2e;
        margin-bottom:10px;
        background-color:#017DC5;

    }

    a{
        text-decoration:none;
        color:#000000;
    }
    a:hover{
        color:#ff3300;
        /*text-shadow:5px 5px 5px #840000;*/
    }
    #master-table{
        padding:5px;


    }
    #master-table table{
        width:90%;
        box-shadow:5px 5px 10px #000000;


    }

    #master-table th{
        font-weight:bold;
        color:#000000;
        padding:15px 10px 10px;
        background:#017dc5;
        border-collapse:collapse;


    }
    #master-table tr:hover{
        cursor:pointer;
    }
    #master-table tbody{background:#ffffcc;}
    #master-table td{color:#000000;border-top:1px dashed #fff;padding:10px;}
    #master-table tbody tr:hover td{
        color:#000000;
        background:#e4e4e4;


    }
    #master-table a{
        color:black;
    }


    a.readmore{
        background:url(../images/bt_readmore.jpg)no-repeat  bottom right;
        width:125px;
        height:40px;
        display: block;
        text-align: center;
        line-height: 30px;
        vertical-align: text-middle;
        color:#000000;
        text-decoration:none;
    }
    a:hover.readmore{
        /*	background:url(../images/bt_readmore_hover.png)no-repeat bottom right ; */
    }
    #subject{
        font-style:italic;


    }

    .subject {
        font-size :16px;
        color :#000000;
        font-weight:bold;

    }
    #detail{

        text-indent:30px;
        height:100px;
        overflow:hidden;
    }


    #marquee1{

        width:<?php echo $div_container_width-15;?>px;
        height:30px;
        line-height:30px;
        padding:0px 10px 0px 5px;
        /*	border-top:solid 1px #0000ff; */
        background-color:#<?php echo $marquee_bg;?>;

    }

    .banner_title{
        width:300px;
        border-top: 1px solid #2395d8;
        background: #2395d8;
        background: -webkit-gradient(linear, left top, left bottom, from(#2395d8), to(#017dc5));
        background: -webkit-linear-gradient(top, #2395d8, #017dc5);
        background: -moz-linear-gradient(top, #2395d8, #017dc5);
        background: -ms-linear-gradient(top, #2395d8, #017dc5);
        background: -o-linear-gradient(top, #2395d8, #017dc5);
        padding: 5px 20px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
        -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
        box-shadow: rgba(0,0,0,1) 0 1px 0;

        color: #ffffff;
        text-decoration: none;
        vertical-align: middle;
        margin-bottom:20px;
    }
    #banner{
        padding:5px;
        height:100%;


    }
    #banner td{
        padding:5px;

    }

    #slideshow{
        margin-top:30px;
        margin-bottom:40px;
        margin-left:20px;
        padding:auto;
        width:750px;
        height:350px;
        background-color:#bebebe;
        border:solid 8px white;
        /* Safari 3-4, iOS 1-3.2, Android 1.6- */
        -webkit-border-radius: 0px;
        /* Firefox 1-3.6 */
        -moz-border-radius: 0px;
        border-radius:0px;
        box-shadow:5px 5px 10px #3f3f3f;

    }
    /*  For slide Show Innovo */
    .theme-default #slider {

        margin:0px auto 0 auto;
        /* Make sure your images are the same size */
        /* Make sure your images are the same size */
        width:750px;
        height:350px;
    }
    .theme-pascal.slider-wrapper,
    .theme-orman.slider-wrapper {
        margin-top:150px;
    }

    #nayok{
        background:url("../images/nayok.jpg") no-repeat;
        width:230px;
        height:330px;
        margin-left:40px;
        margin-top:30px;
        margin-bottom:30px;
        float:left;
        box-shadow:5px 5px 10px #3f3f3f;
    }
    #palad{
        background:url("../images/palad.jpg") no-repeat;
        width:229px;
        height:377px;
        magin-top:40px;
    }
    #youtube{
        /*background:url("../images/mn_multimedia.png") no-repeat ; */
        padding:50px 5px 5px 5px;

    }

    #data_image{
        padding:50px 10px 10px 20px;
        color:#000099;
        padding-top:80px;
    }
    #data_image td{
        padding:15px;
        color:#000099;
        overflow:hidden;
        height:150px;
    }

    #data_image img{
        max-width:280px;
        max-height:220px;
        border: 1px solid #ccc;
        color:#000099;
        padding: 5px;
    }

    #data_table{

        padding:60px 10px 10px 20px;

    }


    #data_table img{
        max-width:180px;
        max-height:120px;
        border: 1px solid #ccc;
        padding: 5px;
    }


    #data_helpme{

        padding:50px 10px 10px 20px;

    }

    #data_helpme table{
        padding:4px;
        -webkit-border-radius: 5px;
        -moz-border-radius:5px;
        border-radius: 5px;
    }
    #data_helpme img{
        max-width:180px;
        max-height:120px;
        border: 1px solid #ccc;
        padding: 5px;
    }
    #data_download{

        padding:50px 10px 10px 20px;

    }


    #data_download img{
        max-width:180px;
        max-height:120px;
        border: 1px solid #ccc;
        padding: 5px;
    }


    #counter{

        margin:10px 0px 10px 0px;
        width:190px;
        height:350px;
        color:#336633;

        background: url(../images/counter_bg.png)no-repeat center center #ffffcc;

    }
    #counter table{
        margin:auto;
        border-style:solid 1px #cc3300;
        width:100%;
        height:100%;
        padding:5px;
        box-shadow:5px 5px 10px #8d8d8d;
    }
    #counter td{
        border:solid 1px #ff0000;
    }

    /* ตัวแบ่งหน้า */
    #page_count{
        width:90%;
        padding:10px;
        text-align:center;

    }
    #page_count img{
        display:none;
    }
    a.link,a.link:visited{
        color:white;
        padding: 4px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        background-color:#ffb380;
        -webkit-border-radius: 5px;
        -moz-border-radius:5px;
        border-radius: 5px;
        margin-right:4px;
    }
    a.link:hover{
        background-color:#f59d18;
        color:black;
    }


    #page_count a{
        color:white;
        padding: 4px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        background-color:#ff8a3c;
        -webkit-border-radius: 5px;
        -moz-border-radius:5px;
        border-radius: 5px;
        margin-right:4px;
        /*
            display: inline-block;

            width:20px;
            height:20px;
            padding:5px;
            margin-left:3px;
            margin-right:3px;
            text-decoration:none;
            border:solid 1px #ccc;
            text-align: center;
            */
    }
    #page_count a:hover{
        background-color:#dfe3e3;
        color:#099df7;

    }
    #page_count p{
        padding:10px;
        color:#0066ff;
    }

    .showdatepost{
        color:#0066ff;
        font-style:italic;
    }



    .sticky {
        position: fixed;
        width: 100%;
        left: 0;
        top: 0;
        z-index: 100;
        border-top: 0;
    }

    .tooltip{
        position:relative;
        z-index:24;



    }
    .tooltip:hover{
        z-index:25;

    }
    .tooltip span{
        display:none;
    }
    .tooltip:hover span{
        display:block;
        position:absolute;
        top:2em;
        left:2em;
        width:25em;
        text-shadow:1px 1px 10px #000000;
        background-color:#ff9900;
        color:#ffffff;
        -moz-box-shadow: 0 0 5px 5px #888;
        -webkit-box-shadow: 0 0 5px 5px#888;
        box-shadow: 0 0 5px 5px #888;
        padding:5px;
    }

    #webboard{
        padding-top:10px;
        background-image:url("../images/mn_webboard.png");
        background-repeat:no-repeat;
        background-position:top center;

    }
    .master {
        background-color:#ffff99;
        color:#004080;
    }
    #webboard a{
        color:black;
    }

    img.default{
        width:200px;
        height:180px;
        border:4px solid #ffffff;
        -webkit-border-radius: 15px;
        -moz-border-radius:15px;
        border-radius: 15px;
    }




    #mainwrapper {
        font: 10pt normal Arial, sans-serif;
        height: auto;
        margin: 60px auto 0 auto;
        text-align: center;
        width: 660px;
    }

    /* Image Box Style */
    #mainwrapper .box {
        border: 5px solid #ffffff;  /* สีกรอบรูป */
        border-radius: 10px;
        cursor: pointer;
        height: 182px;
        float: left;
        margin: 5px;
        position: relative;
        overflow: hidden;
        width: 200px;
        -webkit-box-shadow: 1px 1px 1px 1px #ccc;
        -moz-box-shadow: 1px 1px 1px 1px #ccc;
        box-shadow: 1px 1px 1px 1px #ccc;
    }
    #mainwrapper .box img {
        position: absolute;
        left: 0;
        -webkit-transition: all 300ms ease-out;
        -moz-transition: all 300ms ease-out;
        -o-transition: all 300ms ease-out;
        -ms-transition: all 300ms ease-out;
        transition: all 300ms ease-out;
    }

    /* Caption Common Style */
    #mainwrapper .box .caption {
        background-color: rgba(0,0,0,0.8);
        position: absolute;
        color: #fff;
        z-index: 100;
        -webkit-transition: all 300ms ease-out;
        -moz-transition: all 300ms ease-out;
        -o-transition: all 300ms ease-out;
        -ms-transition: all 300ms ease-out;
        transition: all 300ms ease-out;
        left: 0;
    }


    /** Caption 1: Simple **/
    #mainwrapper .box .simple-caption {
        height: 30px;
        width: 200px;
        display: block;
        bottom: -30px;
        line-height: 25pt;
        text-align: center;
    }

    /** Caption 2: Full Width & Height **/
    #mainwrapper .box .full-caption {
        width: 170px;
        height: 170px;
        top: -200px;
        text-align: left;
        padding: 15px;
    }

    /** Caption 3: Fade **/
    #mainwrapper .box .fade-caption, #mainwrapper .box .scale-caption  {
        opacity: 0;
        width: 170px;
        height: 170px;
        text-align: left;
        padding: 15px;
    }

    /** Caption 4: Slide **/
    #mainwrapper .box .slide-caption {
        width: 170px;
        height: 170px;
        text-align: left;
        padding: 15px;
        left: 200px;
    }

    /** Caption 5: Rotate **/
    #mainwrapper #box-5.box .rotate-caption {
        width: 170px;
        height: 170px;
        text-align: left;
        padding: 15px;
        top: 200px;
        -moz-transform: rotate(-180deg);
        -o-transform: rotate(-180deg);
        -webkit-transform: rotate(-180deg);
        transform: rotate(-180deg);
    }

    #mainwrapper .box .rotate {
        width: 200px;
        height: 400px;
        -webkit-transition: all 300ms ease-out;
        -moz-transition: all 300ms ease-out;
        -o-transition: all 300ms ease-out;
        -ms-transition: all 300ms ease-out;
        transition: all 300ms ease-out;
    }

    /** Caption 6: Scale **/
    #mainwrapper .box .scale-caption h3, #mainwrapper .box .scale-caption p {
        position: relative;
        left: -200px;
        width: 170px;
        -webkit-transition: all 300ms ease-out;
        -moz-transition: all 300ms ease-out;
        -o-transition: all 300ms ease-out;
        -ms-transition: all 300ms ease-out;
        transition: all 300ms ease-out;
    }

    #mainwrapper .box .scale-caption h3 {
        -webkit-transition-delay: 300ms;
        -moz-transition-delay: 300ms;
        -o-transition-delay: 300ms;
        -ms-transition-delay: 300ms;
        transition-delay: 300ms;
    }

    #mainwrapper .box .scale-caption p {
        -webkit-transition-delay: 500ms;
        -moz-transition-delay: 500ms;
        -o-transition-delay: 500ms;
        -ms-transition-delay: 500ms;
        transition-delay: 500ms;
    }

    /** Simple Caption :hover Behaviour **/
    #mainwrapper .box:hover .simple-caption {
        -moz-transform: translateY(-100%);
        -o-transform: translateY(-100%);
        -webkit-transform: translateY(-100%);
        opacity: 1;
        transform: translateY(-100%);
    }

    /** Full Caption :hover Behaviour **/
    #mainwrapper .box:hover .full-caption {
        -moz-transform: translateY(100%);
        -o-transform: translateY(100%);
        -webkit-transform: translateY(100%);
        opacity: 1;
        transform: translateY(100%);
    }

    /** Fade Caption :hover Behaviour **/
    #mainwrapper .box:hover .fade-caption, #mainwrapper .box:hover .scale-caption  {
        opacity: 1;
    }

    /** Slide Caption :hover Behaviour **/
    #mainwrapper .box:hover .slide-caption {
        background-color: rgba(0,0,0,1) !important;
        -moz-transform: translateX(-100%);
        -o-transform: translateX(-100%);
        -webkit-transform: translateX(-100%);
        opacity: 1;
        transform: translateX(-100%);
    }
    #mainwrapper .box:hover img#image-4 {
        -moz-transform: translateX(-100%);
        -o-transform: translateX(-100%);
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%);
        opacity: 1;
    }

    /** Rotate Caption :hover Behaviour **/
    #mainwrapper .box:hover .rotate {
        background-color: rgba(0,0,0,1) !important;
        -moz-transform: rotate(-180deg);
        -o-transform: rotate(-180deg);
        -webkit-transform: rotate(-180deg);
        transform: rotate(-180deg);
    }

    /** Scale Caption :hover Behaviour **/
    #mainwrapper .box:hover #image-6 {
        -moz-transform: scale(1.4);
        -o-transform: scale(1.4);
        -webkit-transform: scale(1.4);
        transform: scale(1.4);
    }

    #mainwrapper .box:hover .scale-caption h3, #mainwrapper .box:hover .scale-caption p {
        -moz-transform: translateX(200px);
        -o-transform: translateX(200px);
        -webkit-transform: translateX(200px);
        transform: translateX(200px);
    }


    .content-input	{
        font-family: THsarabunNew,Tahoma, Arial, Sans-Serif;
        font-size:12;
        background-color: #eff1e2;
        padding: 10px;


        size:landscape;
        margin-bottom:10px;

        /* Safari 3-4, iOS 1-3.2, Android 1.6- */
        -webkit-border-radius: 12px;

        /* Firefox 1-3.6 */
        -moz-border-radius: 12px;

        /* Opera 10.5, IE 9, Safari 5, Chrome, Firefox 4, iOS 4, Android 2.1+ */
        border-radius: 12px;
    }
    .content-input select{
        padding:2px;
        border: solid 1px #33677F;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        font-family: THsarabunNew,Tahoma, Arial, Sans-Serif;
        margin-left:5px;
        margin-bottom:5px;
    }
    .content-input input, .content-input textarea{
        margin-left:5px;
        margin-bottom:5px;
        padding:4px;
        -webkit-border-radius: 5px;
        -moz-border-radius:5px;
        border-radius: 5px;
        border:solid 1px;

    }
    .content-input input[type=submit]{
        background-color:#a4a4a4;
        color:white;
    }
    .content-input input[type=submit]:hover{
        background-color:#ff8040;
        color:black;
        cursor:pointer;
    }
    .content-input input[type=text],textarea,input[type=password]{
        width:300px;
    }
    .content-input input[type=text]:focus ,textarea:focus {
        /*font-family: Tahoma,  sans-serif;
        font-size: 13px;
        */
        background-color:#e1ffff;
        border: solid 1px #33677F;
    }
    .content-input .idle  {
        border: solid 1px #85b1de;

    }


    #image_only,
    #image_with_slide,
    #image_and_subject,
    #image_and_subject_with_slide,
    #image_and_detail_with_slide,
    #subject_only,
    #youtube,
    #purchase_with_tab,
    #purchase_by_group,
    #mouseover_left,
    #mouseover_right,
    #image6_only_big1,
    #image_only_group7ver,
    #image_only_group7hor {
        padding-top:10px;
        width:94%;
        background-color:#eec889;
        margin-bottom:30px;
        box-shadow:5px 5px 10px #3f3f3f;
    }

    #subject_only a:before{
        content: "  ";
    }

    #subject_only a {
        color:#000000;
    }

    #subject_only a:hover{
        color:#ffffff;
        /*text-shadow:5px 5px 5px #840000;*/
    }


    #purchase_with_tab a:before{
        content: "";
    }



    /* For img_filter */
    .grayscale{
        -webkit-filter: grayscale(100%); /* Chrome, Safari, Opera */
        filter: grayscale(100%);
    }

    .blur{
        -webkit-filter:blur(5px);
        filter:blur(5px);
    }
    .brightness{
        -webkit-filter:brightness(200%);
        filter:brightness(200%);
    }
    .contrast{
        -webkit-filter:contrast(200%);
        filter:contrast(200%);
    }
    .dropshadow{
        -webkit-filter:drop-shadow(8px 8px 10px black);
        filter:drop-shadow(8px 8px 10px black);
    }
    .huerotate{
        -webkit-filter:hue-rotate(90deg);
        filter:hue-rotate(90deg);
    }
    .invert{
        -webkit-filter:invert(100%);
        filter:invert(100%);
    }
    .opacity{
        -webkit-filter:opacity(30%);
        filter:opacity(30%);
    }
    .staturate{
        -webkit-filter:saturate(8);
        filter:saturate(8);
    }
    .sepia{
        -webkit-filter:sepia(100%);
        filter:sepia(100%);
    }
    .contrast-brightness{
        -webkit-filter:contrast(200%) brightness(150%);
        filter:contrast(200%) brightness(150%);
    }
    .none{
        -webkit-filter:none;
        filter:none;
    }
    /* จัดตำแหน่ง เลขาสภา บล๊อกการแสดงที่ 3 ให้อยู่ซ้าย กลาง ขวา  */
    .board_block3{
        /*float:right; */
        width:100%;
        margin:auto;  /* จัดกลาง */

        /* จัดซ้าย */

    }

    #person_head , #person_board,#person_officer {
        color:#000000;
        font-weight:bold;

    }

    fieldset{
        padding:10px;

    }

    .align-position{
        width:31%;
        margin-left:auto;
        margin-right:auto;
    }

</style>

<?php
	$tablename="tb_electric";
	$point_no="5";
	$file_no=($gloNews_fileno-1);   // กำหนด array จำนวน file ที่ต้องการ  $glo...มาจากไฟล์ connect.ini.php
	$limitsize=$gloPicture_filesize;  //กำหนกขนาดไฟล์ที่ต้องการให้อัพโหลด หารด้วย 1000  1k
	$SizeInMb=@round(($limitsize/$onemb));
	$content="";
	$foldername="/fileupload/electric/";
?>
<link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.7.2.custom.css">
<style type="text/css">
.ui-datepicker{
	width:200px;
	font-family:tahoma;
	font-size:11px;
	text-align:center;
}
</style>
 <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.7.2.custom.min.js"></script>

<script language="javascript">
// Start XmlHttp Object
function uzXmlHttp(){
    var xmlhttp = false;
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlhttp = false;
        }
    }

    if(!xmlhttp && document.createElement){
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
// End XmlHttp Object

function data_show(select_id,result){
	var url = '../lib/data.php?select_id='+select_id+'&result='+result;
	//alert(url);

    xmlhttp = uzXmlHttp();
    xmlhttp.open("GET", url, false);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
    xmlhttp.send(null);
	document.getElementById(result).innerHTML =  xmlhttp.responseText;
}
//window.onLoad=data_show(5,'amphur');
</script>

<script type="text/javascript">
$(function(){
	// แทรกโค้ต jquery
	$("#datefinish").datepicker({ dateFormat: 'yy-mm-dd' });
});



function Chkfrm()
        {
				var obj0 = document.form_fifa.txtsubject;
                var obj1 = document.form_fifa.txtname;
				var obj2 = document.form_fifa.txttel;
				var obj3 = document.form_fifa.txtadd_address;
				var obj4 = document.form_fifa.txtadd_province;
				var obj5 = document.form_fifa.txtadd_amphur;
				var obj6 = document.form_fifa.txtadd_tambol;
				var obj7 = document.form_fifa.txtmoo;

		if (obj0.value.length==0)
		{
			alert('กรุณาป้อนชื่อเรื่องที่ต้องการแจ้งปัญหา');
			obj0.focus();
			return false;
		}
		else if (obj1.value.length==0)   {
           alert('กรุณากรอกชื่อและนามสกุลของผู้แจ้งด้วยคะ');
           obj1.focus();
           return false;
        } else if (obj2.value.length==0)  {
           alert('กรุณากรอกหมายเลขโทรศัพท์สำหรับติดต่อด้วยคะ');
		    obj2.focus();
           return false;

		} else if (obj3.value.length==0){
			 alert('กรุณาป้อมที่อยู่ของผู้แจ้งด้วยค่ะ');
			obj3.focus();
			return false;
		} else if (obj4.value.length==0){
			alert('กรุณาเลือกจังหวัดของคุณด้วยค่ะ');
			obj4.focus();
			return false;
		} else if (obj5.length==0){
			alert('กรุณาเลือกอำเภอด้วยค่ะ');
			obj5.focus();
			return false;
		}else if (obj6.length==0){
			alert('กรุณาเลือกตำบลก่อนค่ะ');
			obj6.focus();
			return false;
		}else if (obj7.value.length==0){
			alert('กรุณาเลือกหมู่ ที่เกิดปัญหาก่อนค่ะ');
			obj7.focus();
			return false;

		}else{
			return true;
		}

}
</script>
<?php
	if(isset($_GET['del'])){
		$filenameFordel=FindRS("select * from filename where id=".$_GET['del'],"filename");
		//echo "File for Delete ".$_SERVER['DOCUMENT_ROOT'].$foldername.$filenameFordel;
		if($filenameFordel<>"Not Found"){
			unlink($_SERVER['DOCUMENT_ROOT'].$foldername.$filenameFordel);
		}
		$sql="DELETE From filename Where id='".$_GET['del']."'";
		$rs=rsQuery($sql);


}
	if($_POST['btadd']){
		$no=$_GET['no'];
		$date=date('Y-m-d');
		$date_create=date('Y-m-d H:i:s');
		$name=EscapeValue($_POST['txtname']);
		$tel=$_POST['txttel'];
		$email=$_POST['txtemail'];
		$add_address=$_POST['txtadd_address'];
		$add_moo=$_POST['txtadd_moo'];
		$add_tambol=$_POST['txtadd_tambol'];
		$add_amphur=$_POST['txtadd_amphur'];
		$add_province=$_POST['txtadd_province'];
		$moo=$_POST['txtmoo'];
		$remark=EscapeValue($_POST['txtremark']);
		$post_ip=$_SERVER['REMOTE_ADDR'];
		$subject=EscapeValue($_POST['txtsubject']);
		$status=$_POST['cbostatus'];
		$datefinish=$_POST['datefinish'];
		$officer=$_POST['cboofficer'];
		$result=EscapeValue($_POST['txtresult']);
		$mooban=$_POST['txtmooban'];

		for($i=1;$i<=$point_no;$i++){
				if($i==$point_no){
					$end="";
				}else{
					$end=";";
				}
				$m.=$_POST['p'.$i].$end;
		}
		$file=array();
		$size=array();
		$type=array();
		$images=array();
		 // วนรับค่าจาก control
	for ($i=0;$i<=$file_no;$i++){
		$file[$i]=$_FILES['file'.$i]['name'];
		$size[$i]=$_FILES['file'.$i]['size'];
		$type[$i]=strtolower(substr($file[$i],-4));
		$images[$i]=$_FILES['file'.$i]['tmp_name'];
	}
	//วนเช็ค file type
	for ($i=0;$i<=$file_no;$i++){
		$x=$i+1;
		$strCheckFile=CheckFileUpload($file[$i],$size[$i],$limitsize,$SizeInMb,$x);
		if($strCheckFile[0]=="no"){
			echo $strCheckFile[1];
			exit();
		}
	}

		if($_POST['active']=="on"){
			$ac="1";
		}else{
			$ac="0";
		}

		//$stradd="insert into $tablename(date,datecreate,name,telephone,email,add_address,add_moo,add_tambol,add_amphur,add_province,subject,moo,fix_with_code,remark,post_ip,status,active,result) values('$date','$date_create','$name','$tel','$email','$add_address','$add_moo','$add_tambol','$add_amphur','$add_province','$subject','$moo','$m','$remark','$post_ip','0','$ac','$result')";
		$stradd="Update $tablename SET name='$name',telephone='$tel',email='$email',add_address='$add_address',add_moo='$add_moo',add_tambol='$add_tambol',add_amphur='$add_amphur',add_province='$add_province',subject='$subject',moo='$moo',fix_with_code='$m',remark='$remark',post_ip='$post_ip',status='$status',active='$ac',result='$result',datefinish='$datefinish',officer='$officer',mooban='$mooban' Where no=".$_GET['no'];
		$rs=rsQuery($stradd);
		if($rs){

			$sql="Select * From $tablename Where no='".$_GET['no']."'";
			$rss=rsQuery($sql);
			$r=mysqli_fetch_assoc($rss);
			$id=$r['no'];
			// loop insert ชื่อไฟล์และcopy ไฟล์
			$newfile=array();
			for ($i=0;$i<=$file_no;$i++){
				$x=$i+1;
				if($file[$i]<>""){
					$newfile[$i]=$tablename.'_'.$id."_".$x.$type[$i];
					if($type[$i]==".pdf"){
						copy($_FILES['file'.$i]['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$foldername.$newfile[$i]);  // สั่งให้ copy รูปจาก temp ไปยัง พาท ที่เราต้องการ
					}else{
						$uploadimage=resizeimage($images[$i],$newfile[$i],$foldername,$domainname,'0','true');
					}
					$filename="INSERT INTO filename(tablename,masterid,filename) Values('".$tablename."','".$id."','".$newfile[$i]."')";
					$uppicname=rsQuery($filename);
				}
			}
			$updatetran=UpdateTrans($tablename,'add',$_SESSION['username'],'ID:'.$id);
			echo"<script>alert('บันทึกข้อมูลเรียบร้อย');
			window.location.href='index.php?_mod=".$_GET['_mod']."';</script>";

		}

	}
	$sql="Select * from $tablename where no=".$_GET['no'];
	$rs=rsQuery($sql);
	$data=mysqli_fetch_assoc($rs);
	$name=$data['name'];
		$tel=$data['telephone'];
		$email=$data['email'];
		$add_address=$data['add_address'];
		$add_moo=$data['add_moo'];
		$add_tambol=$data['add_tambol'];
		$add_amphur=$data['add_amphur'];
		$add_province=$data['add_province'];
		$province_name=FindRS("select * from province Where PROVINCE_ID='$add_province'","PROVINCE_NAME");
		$amphur_name=FindRS("select * from amphur Where AMPHUR_ID='$add_amphur'","AMPHUR_NAME");
		$tambol_name=FindRS("select * from district Where DISTRICT_ID='$add_tambol'","DISTRICT_NAME");
		$moo=$data['moo'];
		$remark=$data['remark'];
		$result=$data['result'];
		$active=$data['active'];
		$status=$data['status'];
		$subject=$data['subject'];
		$array=explode(';',$data['fix_with_code']);
		$datefinish=$data['datefinish'];
		$officer=$data['officer'];
		$mooban=$data['mooban'];
?>
<div class="content-input">
<form name="form_fifa" id="inputArea" action="" method="POST" enctype="multipart/form-data"  onSubmit="return Chkfrm()">
	<fieldset>
		<legend>ข้อมูลผู้แจ้ง</legend>

		<label for="txtno">เลขที่</label>
		<input type="text" name="txtno" value="<?php echo EscapeValue($_GET['no']);?> " disabled="disabled">
		<label for="txtsubject" class="label">เรื่อง <font color="red">*</font> </label>
		<input type="text" name="txtsubject" value="<?php echo $subject;?>" readonly/><br>
		<label for="txtname" class="label">ชื่อ-นามสกุล <font color="red">*</font></label>
		<input type="text" name="txtname" value="<?php echo $name;?>" readonly/>

		<label for="txttel">โทรศัพท์ <font color="red">*</font></label>
		<input type="text" name="txttel" value="<?php echo $tel;?>" readonly/>
		<br><label for="txtemail">อีเมล์</label>
		<input type="input" name="txtemail" value="<?php echo $email;?>" readonly/>
		<label for="txtaddress">บ้านเลขที่ <font color="red">*</font></label>
		<input type="text" name="txtadd_address" value="<?php echo $add_address;?>" readonly>
		<br><label for="txtmoo">ที่อยู่</label>
		<input type="text" name="txtadd_moo" size="50" value="<?php echo $add_moo;?>" readonly>
		<label for="txtmoo">จังหวัด <font color="red">*</font></label>
			<?php
				echo "<select name=\"txtadd_province\" id=\"province\" onchange=\"data_show(this.value,'amphur');\"><option value=\"".$add_province."\">$province_name</option>";
				$province="select * from province order by PROVINCE_NAME";
				$rs=rsQuery($province);
				while($data=mysqli_fetch_assoc($rs)){
					echo "<option value=\"".$data['PROVINCE_ID']."\">".$data['PROVINCE_NAME']."</option>";
				}
				echo "</select>";
			?>
	</fieldset>
	<br>
	<fieldset>
		<legend>รายละเอียด</legend>
			<br>
				ข้าพเจ้ามีความประสงค์ให้<?php echo $customer_name;?> ซ่อมแซมไฟฟ้าสาธารณะ หมู่ที่ <font color="red">*</font>:<?php
					echo "<select name=\"txtmoo\" id=\"txtmoo\" style=\"width:20px;\"><option value=\"$moo\">$moo</option>";
					for($i=1;$i<=10;$i++){
						echo "<option value=$i>$i</option>";
						}
					echo "</select>";
					echo "&nbsp;&nbsp;&nbsp;<br>หมู่บ้าน&nbsp;:&nbsp;<input type=\"text\" name=\"txtmooban\" size=\"60\">";
					?> &nbsp;<?php echo $customer_tambon;?>
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสเสา หรือสถานที่หรือจุดอ้างอิง(กรณีไม่ทราบรหัสเสา)<br>
			<?php
					$i=0;
					foreach($array as $fixwithcode){
					$i+="1";
					echo "จุดที่$i&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" id=\"text1\" name=\"p$i\" value=\"$fixwithcode\" ><br>";
				}



			?>
			<br>

			<br>
				<label for="txtb">หมายเหตุ</label>
				<textarea rows="4" cols="100" name="txtremark" style="width:500px"><?php echo $remark;?></textarea>

				<br>
				<label>สถานะงาน</label>
				<select name="cbostatus" disabled>
					<?php
						$sql="select * from tb_status order by id";
						$rsstatus=rsQuery($sql);
						if($rsstatus){
							$statusname=FindRS("select * from tb_status where id=".$status,"name");
							echo "<option value=\"".$status."\">".$statusname."</option>";
							while($data=mysqli_fetch_assoc($rsstatus)){
								echo "<option value=\"".$data['id']."\">".$data['name']."</option>";
							}
						}
						?>
				</select>
				<br>
				<label for="txtresult">ผลการดำเนินการ</label>
				<textarea rows="4" cols="100" name="txtresult" style="width:500px;" disabled><?php echo $result;?></textarea>
				<br>
		<!--		<label for="cbolight">หลอดไฟ</label>
				<select name="cbolight">
					<?php
						if($light<>""){
							echo "<option value=\"".$light."\">".$light." วัตต์</option>";
						}else{
							echo "<option value=''></option>";
						}
					?>

					<option value="18">18 วัตต์</option>
					<option value="36">36 วัตต์</option>
				</select>
				<select name="cbolightno">
					<?php

						echo "<option value='$lightno'>$lightno</option>";
						for($x=0;$x<=5;$x++){
							echo "<option value=\"".$x."\">".$x."</option>";
						}
					?>
				</select>จำนวน

				<label for="cbostarter">สตาร์ทเตอร์</label>
							<select name="cbostarter">
					<?php
						echo "<option value='$starter'>$starter</option>";
						for($x=0;$x<=5;$x++){
							echo "<option value=\"".$x."\">".$x."</option>";
						}
					?>
				</select>
					จำนวน
				<label for="cboballard">บัลลาสต์</label>
						<select name="cboballard">
					<?php
						echo "<option value='$ballard'>$ballard</option>";
						for($x=0;$x<=5;$x++){
							echo "<option value=\"".$x."\">".$x."</option>";
						}
					?>
				</select> จำนวน
				<label for="cbolamp">กิ่งโคม</label>
						<select name="cbolamp">
					<?php
						echo "<option value='$lamp'>$lamp</option>";
						for($x=0;$x<=5;$x++){
							echo "<option value=\"".$x."\">".$x."</option>";
						}
					?>
				</select> จำนวน
				<label for="txtwired">สายไฟ</label>
				<input type="text" name="txtwired" value="<?php echo $wired;?>"> เมตร
				<label for="txtother">อื่นๆ</label>
				<input type="text" name="txtother" value="<?php echo $other;?>">
				<br>
				<label for="cboofficer">เจ้าหน้าที่ผู้ดำเนินการ</label>
				<select name="cboofficer">
				<?php
					$sql="select * from tb_officer";
					$r=rsQuery($sql);
					echo "<option value=\"".$officer."\">".$officer."</option>";
					while($d=mysqli_fetch_assoc($r)){
						echo "<option value=\"".$d['name']."\">".$d['name']."</option>";
					}
					?>
					</select>
				<br>
				-->
				<label>วันที่ดำเนินการเสร็จ</label>
				<input type="text" name="datefinish" disabled id="datefinish" value="<?php echo $datefinish;?>">
				<br>

				<label>ไฟล์ภาพขนาดไม่เกิน <?php echo $SizeInMb;?> Mb (jpg,png,bmp,gif,pdf)</label><br>

	<?php  //วนลูปสร้าง file control เพื่อรับไฟล์ที่จะทำการอัพโหลด
		for ($i=0; $i<=$file_no;$i++){
			echo "ไฟล์ที่&nbsp;".($i+1). '&nbsp;&nbsp;<input type=file name=file'.$i.' size=50 /><br />';
		}
	?>
	<label>สถานะ Active หมายถึงให้แสดงหัวข้อนี้ เอาเครื่องหมายออกเพื่อปิดการแสดงผล</label>
	<br>
	<?php
	if($active==0){
			echo "<input type=\"checkbox\" name=\"active\" style=\"margin:0px;display:inline;padding:0px;width:30px;\"/>Active";
		}else{
			echo "<br><input type=\"checkbox\" name=\"active\" style=\"margin:0px;display:inline;padding:0px;background-color:#ffff00;width:30px;\" checked/>&nbsp;Active";
		}
			echo "<br><br>";
			echo "<input type=\"submit\" name=\"btadd\" value=\"บันทึก\">&nbsp;&nbsp;";
			echo "<input type=\"button\" name=\"print\" onclick=\"window.open('modules/report/print_form_electric.php?tb=".encode64('tb_electric')."&no=".encode64($_GET['no'])."')\" value=\"พิมพ์คำร้อง\">&nbsp;&nbsp;";
	//		echo "<input type=\"button\" name=\"print\" onclick=\"window.open('modules/report/report_gl_01.php?tb=".encode64('tb_electric')."&no=".encode64($_GET['no'])."')\" value=\"พิมพ์รายงานสรุป\">&nbsp;&nbsp;";
	//		echo "<input type=\"button\" name=\"print\" onclick=\"window.open('modules/report/print_mail.php?tb=".encode64('tb_electric')."&no=".encode64($_GET['no'])."')\" value=\"พิมพ์จดหมายแจ้งกลับ\">&nbsp;&nbsp;";
		?>
	</fieldset>
	<br>
	<?php
		$strpicture="Select * from filename Where tablename='".$tablename."' AND masterid='".$_GET['no']."' Order by id";
		$rs=rsQuery($strpicture);
		while($arr = mysqli_fetch_assoc($rs)){
			$fileno=substr($arr['filename'],-5,1);
			echo "<img src=..".$foldername.$arr['filename']." width=300 height=300>&nbsp;&nbsp;ไฟล์ที่ ".$fileno."&nbsp;".$arr['filename']."&nbsp;<a href=\"index.php?_mod=".$_GET['_mod']."&type=view&no=".$_GET['no']."&del=".$arr['id']."\" onclick=\"return confirm('คุณต้องการลบภาพนี้หรือไม่?');\">[ลบ]</a><br><br>";
		}
?>
</form>
</div>
