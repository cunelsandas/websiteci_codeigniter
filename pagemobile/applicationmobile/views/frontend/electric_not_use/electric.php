<?php

error_reporting(E_ALL ^ E_NOTICE);


?>
    <style type="text/css">
                          .ui-datepicker{
                              width:200px;
                              font-family: 'fc_lamoonregular', sans-serif;
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
        font-family: fc_lamoonregular;
        font-size:1.2rem;
        background-color: #eff1e2;
        padding: 10px;
        width: 70%;


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
<div class="content-box" align="center">
<p style="font-size: 2.0rem">รายการแจ้งไฟฟ้าสาธารณะ</p><hr><br>

<?php




$tablename="tb_electric";

empty($_GET['type'])?$type="":$type=$_GET['type'];
$modid=$_GET['_modid'];
if($type=="addnew"){			 //ตรวจสอบก่อนว่ามีการตั้งค่าของ $_GET['type'] เป็นการเพิ่มข่าวใหม่หรือเปล่า
	include "electric_add.php";
}elseif($type=="view"){	     //ตรวจสอบก่อนว่ามีการตั้งค่าของ $_GET['type'] เป็นการดูรายละเอียดข่าวสารหรือเปล่า
	include "electric_view.php";
}else{
	if(isset($_GET['active'])){
		$sql="UPDATE $tablename SET active='".$_GET['active']."' Where no='".$_GET['no']."'";
		$rs=rsQuery($sql);
		if($rs){
			echo"<script>window.location.href='index.php?_modid=".$modid."&_mod=".$_GET['_mod']."';</script>";
		}
	}
	if(isset($_GET['del'])){
		$sql="DELETE From $tablename Where no='".$_GET['del']."'";
		$rs=rsQuery($sql);
		if($rs){
			// update table tb_trans บันทึกการลบข้อมูล
			$updatetran=UpdateTrans('$tablename','delete',$_SESSION['username'],'ID:'.$_GET['del']);
			echo"<script>window.location.href='index.php?_modid=".$modid."&_mod=".$_GET['_mod']."';</script>";
		}
	}
?>
<p style="righ:0%; "><?php echo"<a href=\"../electric/add\" class='link'>เพิ่มรายการใหม่</a>";?></p>
<center>
<table width="100%" class="content-input" >
<tr >
	<td style="height: 40px" width="80%">&nbsp;รายการ</td>
	<td width="20%" align="center">วันที่แจ้ง</td>

</tr>
<?php
$pagelen = 15; //จำนวนที่แสดงผลข้อมูลต่อหน้า
	$range = 4 ; // ใส่จำนวนที่จะแสดงข้าง เลขปัจจุบัน ก็คือ ถ้าใส่ 2 แล้ว ตอนนี้แสดงอยู่หน้า 4 ก็จะเป็น 2 3 4 5 6 จะแสดงข้างเลข 4 อยู่ 2 จำนวน
	if(isset($_GET['page'])){
		$page=EscapeValue($_GET['page']);
	}else{
		$page="1";
	}
	$sql = "select no from $tablename"; //คิวรี่ข้อมูล เพื่อหาจำนวน แถว Comment ควร select แค่ ฟิวส์เดียว จะทำให้ทำงานได้ไวกว่า
	$result = rsQuery($sql);
	if($result){
		$totalrecords= $num_rows = mysqli_num_rows($result); //หาจำนวนแถวของขัอมูลทั้งหมด
	}else{
		$totalrecords= $num_rows = "0";
	}
	$totalpage = ceil($num_rows / $pagelen);
	$goto = ($page-1) * $pagelen; // หาหน้าที่จะกระโดดไป
	$start = $page - $range;
	$end = $page + $range;
	if ($start <= 1) {
		$start = 1;
	}
	if ($end >= $totalpage) {
		$end = $totalpage;
	}
	$sql = "select * from $tablename order by no DESC Limit $goto,$pagelen"; //ทำการแสดงผลโดยใช้คำสั่ง Limit เพื่อแสดงจำนวนข้อมูลต่อหน้า
	$result_reply = rsQuery($sql);

/*คิวรี่ข้อมูลออกมาเพื่อแสดงผล */
//$sql="Select * From $tablename Order by no DESC Limit $start1,$limit";
	//$sql1=$sql;
$Query = rsQuery($sql); //คิวรี่คำสั่ง
	$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
	if($totalp==0){
		echo"<tr height=\"30\">";
		echo"<td colspan=\"4\" align=\"center\">- - - - - - - - - - ยังไม่มีข้อมูล - - - - - - - - - -</td>";
		echo"</tr>";
		/*	วนลูปข้อมูล */
	}else{
		$i=$start;
		while($arr = mysqli_fetch_assoc($Query)){
			echo"<tr style='height: 40px' bgcolor=\"#FCEE98\" height=\"23\">";
			echo"<td>&nbsp;".$arr['subject']."</td>";
			echo"<td>&nbsp;".thaidate($arr['datecreate'])."</td>";
			echo"<td align=\"center\">";
			
			echo"</td>";
			
			echo"</tr>";
			$i++;
		}
	}
	echo"</table>";
	echo "</center>";


	echo"<p style=\"text-align:center;margin-left:45px;padding-bottom:10px;\">";
	echo "";
	if ($page > 1) {
		$back = $page - 1;
		echo "<a href=index.php?_mod=".$_GET['_mod']."&_modid=".$modid."&page=1><img src=\"images/bt_first.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\" align=top></a>&nbsp;&nbsp;";
		echo "<a href=index.php?_mod=".$_GET['_mod']."&_modid=".$modid."&page=$back><img src=\"images/bt_prev.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>&nbsp;&nbsp;";
			if ($start > 1) { echo "....."; }
	}
	$icount=1;
	For ($i=$start ; $i<=$end ; $i++) {
		$bgcolor = ($icount% 2)? '#0080ff' : '#ff0000'; //แสดงสีสลับเมื่อ ค่า i เพิ่มค่าไปเรื่อย ๆ
		if ($i == $page ) {
			echo "&nbsp;<b><font color=#787a8d>[".$i."]</font></b>&nbsp;&nbsp;&nbsp;" ;
		} else {
			echo "&nbsp;<a href=index.php?_mod=".$_GET['_mod']."&_modid=".$modid."&page=".$i." style=\"color:$bgcolor\"><font color=$bgcolor>".$i."</font></a>&nbsp;&nbsp;&nbsp;" ;
		}
		$icount++;
	}
	if ($page < $totalpage) {
		$next = $page +1;
		if ($end < $totalpage) { echo "....."; }
		echo "&nbsp;&nbsp;<a href=index.php?_mod=".$_GET['_mod']."&_modid=".$modid."&page=$next><img src=\"images/bt_next.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>";
		echo "&nbsp;<a href=index.php?_mod=".$_GET['_mod']."&_modid=".$modid."&page=$totalpage><img src=\"images/bt_last.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>";
	}
		echo "</p>";

// end if
}
?>
</div>
</div>
