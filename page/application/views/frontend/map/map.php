<style>
    <!--
    -->
    <?php //echo file_get_contents(FOLDERIMG . 'map/mapCustom.css') ?>
    .animation {
        width: 100%;
    }

    .container-blog {
        width: 100%;
        height: 900px;
        position: relative;
    }

    a {
        cursor: pointer;
    }

    .head-logo-map {
        background: url('<?php get_img('',''); ?>') top left no-repeat; /*logo.png,map*/
        top: 5px;
        left: 5px%;
        z-index: 3;
        width: 100%;
        height: 100%;
        opacity: 1;
        position: absolute;
        animation-name: stretchX;
        animation-duration: 2s;
    }

   /* .head-map {              head title text
        background: url('<?php get_img('Untitled-3.png','map'); ?>') top center no-repeat;
        top: 10px;
        z-index: 5;
        width: 100%;
        height: 100%;
        opacity: 1;
        position: absolute;
    } */

    .head-star {
        background: url('<?php get_img('','');?>') no-repeat; /*Untitled-2.jpg,map */
        top: 0;
        left: 70%;
        z-index: 3;
        width: 100%;
        height: 100%;
        opacity: 1;
        position: absolute;
    }

    .bg-map {
        /*background: url('<?php get_img('','');?>') top center no-repeat; */ /*bg.jpg,map*/
        top: 0;
        z-index: 1;
        width: 100%;
        height: 720px;
        opacity: 1;
    }

    .map {
        background: url('<?php get_img('map.png','map');?>') top center no-repeat;
        z-index: 2;
        top: 10px;
        width: 100%;
        height: 100%;
        opacity: 1;
        position: absolute;
    }

    .pu {
        background: url('<?php get_img('','');?>') top center no-repeat; /*pu.png,map*/
        width: 100%;
        height: 35%;
        left: 500px;
        z-index: 2;
        position: absolute;
        animation-name: head-pu;
        animation-duration: 2s;
    }

    .pin-map {
        position: absolute;
        z-index: 99;
        animation-name: stretch;
        animation-duration: 1.5s;
    }

    .pic {
        position: absolute;
        z-index: 1060;
        top: -26px;
        left: -190px;
        animation-name: stretch;
        animation-duration: 0s;
        border-image: linear-gradient();
    }

    @keyframes stretch {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-5px);
        }
        100% {
            transform: translateY(0px);
        }
    }

    @keyframes stretchX {
        0% {
            transform: translateX(0px);
        }
        50% {
            transform: translateX(-5px);
        }
        100% {
            transform: translateX(0px);
        }
    }

    @keyframes head-pu {
        0% {
            opacity: 0;
        }
        50% {
            opacity: 1;
            transform: rotate(7deg);
        }
        100% {
            opacity: 0;
        }
    }

    @keyframes star {
        0% {
            opacity: 0;
        }
        50% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }
</style>

<div class="container-blog" style="overflow:hidden; z-index:1;margin-top: -1%">
    <div class="animation" id="animation" style="width: 100%" data-img="<?php get_img('travel.png', 'map'); ?>">
     <!--   <div class="head-logo-map animated infinite" style="animation-delay: 0.2s;"></div>  -->
        <div class="head-map"></div>
   <!--     <div class="head-star animated infinite"></div> -->
    <!--    <div class="pu animated infinite"></div>
        <div class="pu animated infinite"></div> -->
        <div class="bg-map">
            <div class="map"></div>
            <div class="pin-map animated infinite" style="opacity: 1; top:7%;left: 52%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('Maengaddam.jpg', 'map'); ?>"
                   data-head="เขื่อนแม่งัดสมบูรณ์ชล"
                   data-detail="เขื่อนแม่งัดสมบูรณ์ชล เป็นเขื่อนที่สร้างขึ้นตามพระราชดำริของพระบาทสมเด็จพระเจ้าอยู่หัว เดิมชื่อว่า เขื่อนแม่งัด ตั้งอยู่บนลำน้ำแม่งัด สาขาแม่น้ำปิง ตำบลช่อแล อำเภอแม่แตง
                    จังหวัดเชียงใหม่ และยังตั้งอยู่ในอุทยานแห่งชาติศรีลานนา สำหรับทางเข้าเขื่อนอยู่ประมาณหลักกิโลเมตรที่ 41 บนทางหลวงหมายเลข 107 (สายเชียงใหม่-ฝาง) เลี้ยวขวาไปอีกประมาณ 11 กิโลเมตร">
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
            </div>
            <div class="pin-map animated infinite" style="opacity: 1; top: 12%;left: 72%;
    animation-delay: 0.2s;">
                <a class="popup" data-img="<?php get_img('watnongbua.jpg', 'map'); ?>"
                   data-head="วัดหนองบัว"
                   data-detail="วัดหนองบัว อยู่อำเภอแม่แตง แต่เดิมชื่อเมืองนิพพาน เป็นแหล่งท่องเที่ยงเชิงวัฒนธรรม มีศิลปะที่สวยงาม
สังกัดคณะสงฆ์มหานิกาย สร้างเมื่อ พ.ศ. 2500 ได้รับการพระราชทานวิสุงคามสีมา เมื่อวันที่ 14 สิงหาคม พ.ศ. 2551">
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>
            <div class="pin-map animated infinite" style="opacity: 1; top: 18%;left: 86%;
    animation-delay: 0.7s;">
                <a class="popup" data-img="<?php get_img('watpaphai.jpg', 'map'); ?>"
                   data-head="วัดป่าไผ่"
                   data-detail="ชมศาสนาสถานจิตรกรรมฝาผนังเรื่องราวพุทธประวัติ กุฏิสงฆ์และวิหาร ปูชนียวัตถุพระพุทธรูปทองเหลือง พระพุทธรูปประทับยืนอุ้มบาตรพระ มหากัจจายน์เชื่อกันว่าสักการะแล้วขอพร ให้ชีวิตเป็นมหามงคล อุดม ด้วยลาภยศ">
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>
            <div class="pin-map animated infinite" style="opacity: 1; top: 19%;left: 60%;
    animation-delay: 0.6s;">
                <a class="popup" data-img="<?php get_img('watphajiddhraram.jpg', 'map'); ?>"
                   data-head="วัดป่าจิตตาราม"
                   data-detail="เจริญวิปัสสนากรรมฐานภายในวัดมีความร่มรื่นของพันธุ์ไม้นานาพันธุ์และนอกจากนี้ภายในวัดยังมีกุฏิของหลวงปู่แหวนเมื่อครั้งมาจำพรรษา">
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>
            <div class="pin-map animated infinite" style="opacity: 1; top: 20%;left: 66%;
    animation-delay: 0.3s;">
                <a class="popup" data-img="<?php get_img('watbaanmai.jpg', 'map'); ?>"
                   data-head="วัดบ้านใหม่"
                   data-detail="ไหว้พระทำบุญสะเดาะเคราะห์ดับทุกข์ ดับภัยต่างๆ ที่อาจเกิดขึ้นกับตัวเราก่อน และเชื่อกันว่าหากเราอธิฐานต่อพระพุทธรูปที่วัดนี้จะทำให้พ้นทุกข์ได้">
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div> 
            <div class="pin-map animated infinite" style="opacity: 1; top: 23%;left: 78%;
    animation-delay: 0.1s;">
                <a class="popup" data-img="<?php get_img('watcholaephangam.jpg', 'map'); ?>" data-head="วัดช่อแลพระงาม"
                   data-detail="วัดช่อแลพระงาม ตั้งอยู่ที่ เลขที่ 388 หมู่ 1 ตำบลช่อแล อำเภอ  แม่แตง จังหวัดเชียงใหม่ ได้เริ่มก่อตั้งเมื่อ พ.ศ. 2375 ซึ่งช่างฝีมือชาวม่าน (พม่า)
                   ร่วมกับชาวบ้านช่อแลที่มีฝีมือ ช่วยกันก่อสร้างองค์พระธาตุและลวดลายต่างๆ เป็นที่งดงามตามศิลปะล้านนาผสมม่าน เป็นที่สักการะบูชาของชาวบ้านช่อแลและพุทธศาสนิกชนเป็นเวลาช้านาน">
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>
            <div class="pin-map animated infinite" style="opacity: 1; top: 28%;left: 90%;
    animation-delay: 0.5s;">
                <a class="popup" data-img="<?php get_img('watsriphumin.jpg', 'map'); ?>" data-head="วัดศรีภูมินทร์(สันป่าสัก)"
                   data-detail="ไหว้พระเจ้าทันใจ เชื่อกันว่าเมื่อมาสักการะบูชาแล้วชีวิตจะมีสิริมงคลคิดสิ่งใดแล้วจะสมปรารถนา ชมศิลปะเจดีย์และกำแพงเก่า 12 ราศีที่มีประวัติความเป็นมายาวนานกว่า 100 ปี">
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>

     <!--       <div class="pin-map animated infinite" style="opacity: 1; top: 62%;left: 85%;
    animation-delay: 0.5s;">
                <a class="popup" data-img="<?php get_img('waterfall.jpg', 'map'); ?>" data-head="น้ำตกบัวตอง/น้ำพุเจ็ดสี"
                   data-detail="อุทยานแห่งชาติน้ำตกบัวตอง น้ำพุเจ็ดสี (เดิมเป็นวนอุทยาน) ตั้งอยู่ใน อ.แม่แตง จ.เชียงใหม่ เป็นน้ำตกที่ชาวต่างชาตินิยมมาปีน – เดินลุยหินขึ้นน้ำตก ตัวน้ำตกมีขนาดไม่ใหญ่มาก จำนวน 4 ชั้น ระยะทางของน้ำตกประมาณ 250 เมตร มีจุดเด่นตรงที่เป็นน้ำตกธารหินปูนแข็ง ปกคลุมด้วยแคลเซียมคาร์บอเนต ไม่ค่อยมีหินแหลมคม มีน้ำไหลตลอดทั้งปี และใสสะอาดมาก ความใสของน้ำเทียบเท่าน้ำในสระว่ายน้ำได้เลย

ถัดจากน้ำตกบัวตองไปประมาณ 250 เมตรเป็นบ่อน้ำพุเจ็ดสี ตาน้ำของน้ำตกบัวตอง น้ำในบ่อมองเห็นเป็นสีฟ้ามีความใสมาก มองลึกได้ถึงก้นบ่อ">
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>  -->



            <div class="pin-map animated infinite" style="opacity: 1; top:46%;left: 50%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('maejobaandin.jpeg', 'map'); ?>"
                   data-head="แม่โจ้บ้านดิน"
                   data-detail="ชุมชนบ้านแม่โจ้ได้จัดทำโครงการดูแลรักษาป่าไม้และต้นน้ำในผืนป่าชุมชน โดยมีกลุ่มเยาวชนในหมู่บ้านแม่โจ้เป็นผู้ดำเนินการและใช้ชื่อว่า
“กลุ่มวัยโจ๋แม่โจ้บ้านดิน” ซึ่งมีสมาชิกทั้งหมด 12 คน  ดูแลรักษาผืนป่าจำนวน 500 ไร่ ปลูกป่า/ฟื้นฟูป่าในพื้นที่ป่าไม่สมบรูณ์ถูกบุกรุกถากกาง
สร้างฝายชะลอน้ำตามลำธารล่องน้ำเพื่อเพิ่มความชุ่มชื้นให้กับบริเวณต้นน้ำ เพราะเมื่อผืนป่าขาดความชุ่มชื้นจะเอื้อต่อการเกิดไฟป่า ก่อให้เกิดปัญหา
มลพิษจากหมอกควันไฟตามมา  ทางกลุ่มวัยโจ๋แม่โจ้บ้านดินมีความปรารถนาที่จะรักษาผืนป่าและต้นน้ำของอุทยานแห่งชาติศรีลานนาในเขตบ้านแม่โจ้
ให้ดำรงอยู่อย่างยั่งยืน"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>


            <div class="pin-map animated infinite" style="opacity: 1; top:33%; left: 69%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('beach.jpg', 'map'); ?>"
                   data-head="หาดทรายขาวเมืองแกน"
                   data-detail="พบพื้นที่ริมแม่น้ำปิงเหมาะที่จะให้นักท่องเที่ยวกางเต้นท์ได้กว่า1,000 คน หาดทรายสวยงามริมน้ำปิงใสสะอาด ท่านนายกฯ เตรียมจัดห้องน้ำและความปลอดภัยรองรับนักท่องเที่ยวที่จะหลั่งไหลมาเที่ยว "งานหนาวนี้ที่เมืองแกน ""
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>

           <div class="pin-map animated infinite" style="opacity: 1; top:40%; left: 56%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('watwangdang.jpg', 'map'); ?>"
                   data-head="วัดวังแดง"
                   data-detail="ไหว้พระประธานพระธาตุและชมศิลปกรรมล้านนาเก่าแก่ ชมความแปลกของวิหารหันหน้าไปทางใต้ไม่เหมือนที่อื่น
                   ขอพรพระให้ชีวิตประสบสุขสำเร็จไร้ซึ่งอุปสรรคมีอายุยืนเป็นร่มโพธิ์ร่มไทรให้กับลูกหลานต่อไปนานๆ"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>

            <div class="pin-map animated infinite" style="opacity: 1; top:39%; left: 70%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('watmuangkam.jpg', 'map'); ?>"
                   data-head="วัดม่วงคำ"
                   data-detail="ชมจิตรกรรมฝาผนังเรื่อง พระเจ้าสิบชาติและพระเวสสันดร หอสวดมนต์ภายในมีจิตรกรรมฝาผนัง
                   ชมพระเจดีย์องค์รวมล้านนาซึ่งผสมผสานระหว่างพระธาตุดอยสุเทพ พระธาตุหริภุญไชย พระธาตุช่อแลรวมเป็นพระธาตุองค์รวมองค์เดียว"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>

            <div class="pin-map animated infinite" style="opacity: 1; top:36%; left: 89%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('watnongon.jpg', 'map'); ?>"
                   data-head="วัดหนองออน"
                   data-detail="เชิญชมอุโบสถ ศาลาการเปรียญ กุฏิสงฆ์ และพระพุทธรูปปางห้ามญาติเก่าแก่สวยงามตามแบบศิลปะของชาวล้านนา"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>


            <div class="pin-map animated infinite" style="opacity: 1; top:50%; left: 60%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('watpajee.jpg', 'map'); ?>"
                   data-head="วัดป่าจี้"
                   data-detail="สักการะครูบาศรีวิชัย เพื่อความเป็นสิริมงคล นมัสการครูบาใจผู้ก่อตั้งวัดชมศิลปกรรมฝาผนังพุทธประวัติพระบรมธาตุศรีวิชัยเจดีย์ทรงล้านนาไทยเก่าแก่ 100 ปี"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div> 

            <div class="pin-map animated infinite" style="opacity: 1; top:50%; left: 75%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('muangkaen.jpg', 'map'); ?>"
                   data-head="เทศบาลเมืองแกนพัฒนา"
                   data-detail="เทศบาลเมืองเมืองแกนพัฒนา แรกจัดตั้งมีฐานะเป็นสุขาภิบาลเมืองแกนพัฒนา และได้รับการยกฐานะเป็นเทศบาลตำบลเมืองแกนพัฒนาตามราชบัญญัติเปลี่ยนแปลงฐานะของสุขาภิบาลเป็นเทศบาล
                   พ.ศ. 2542 เมื่อวันที่ 25 พฤษภาคม พ.ศ. 2542 ต่อมาเมื่อวันที่ 19 มีนาคม พ.ศ. 2550 จึงได้รับการยกฐานะอีกครั้งเป็นเทศบาลเมืองเมืองแกนพัฒนาจนถึงปัจจุบัน"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>

            <div class="pin-map animated infinite" style="opacity: 1; top:50%; left: 82%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('cosmosflower.jpg', 'map'); ?>"
                   data-head="ทุ่งดอกคอสมอส"
                   data-detail="หนาวนี้ที่เมืองแกน เทศกาลท่องเที่ยวประจำปีของเทศบาลเมืองเมืองแกนพัฒนา ไฮไลท์ในงานคือ ทุ่งดอกไม้เมืองหนาวนานาพันธุ์
                   โดยเฉพาะทุ่งดอกคอสมอส หรือ ภาษาเหนือเรียกว่า ดอกคำแผ้แหล้ ที่จะชูช่ออวดสีสันเต็มทุ่งกว้างกว่า 20 ไร่ พร้อมจัดทำสะพานไม้ไผ่ ให้นักท่องเที่ยวได้เดินชมดอกไม้สีสันต่าง ๆ แบบใกล้ชิด"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>

            <div class="pin-map animated infinite" style="opacity: 1; top:61%; left: 78%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('memorialstatue.jpg', 'map'); ?>"
                   data-head="อนุสาวรีย์พระเจ้าสามฝั่งแกน"
                   data-detail="ในตำนานเก่าแก่แต่โบราณมีการเรียกนามของพญาสามฝั่งแกนต่างกันไปนาๆ เช่น “ ดิษฐกุมาร” หรือ “เจ้าดิส” ในตำนานชินกาลมาลีปกรณ์ “พระเจ้าสามปรายงค์แม่ใน”
                   ในตำนานไม่ปรากฏนามและ “พญาสามประหญาฝั่งแกน” ในหนังสือประวัติศาสตร์ล้านนา ของสรัสวดี อ๋องสกุลเป็นต้น

ตำนานพื้นเมืองเชียงใหม่ ฉบับวัดเมธังกราวาส จังหวัดแพร่ กล่าวถึงที่มาของพระนามพญาสามฝั่งแกนว่า ทรงได้รับการตั้งพระนามตามสถานที่ประสูติ ช่วงนั้นพระราชมารดาของพระองค์ทรงครรภ์ได้ 8 เดือน
เจ้าแสนเมืองมาพาไปประพาสตามหัวเมืองต่างๆ ถึงสิบสองปันนาลื้อ พอล่วง 7 เดือนผ่านไป จึงเสด็จกลับมาที่พันนาสามฝั่งแกน และประสูติราชบุตรที่นั่น ในปัจจุบันสันนิษฐานว่าอยู่ที่ ตำบลอินทขิล อำเภอ แม่แตง จังหวัด เชียงใหม่ โดยบริเวณเมืองเก่านี้มีแม่น้ำสามสาย ได้แก่ 1. แม่น้ำแกน 2. แม่น้ำปิง และ3. แม่น้ำสงัด หรืองัด

ในงานวิจัย รายงานการสำรวจพื้นฐาน ทุ่งพันแอกพันเฝือเมืองแกน ของศูนย์วัฒนธรรมเชียงใหม่ วิทยาลัยครูเชียงใหม่ได้สันนิษฐานว่าพระนามของพระองค์อาจมาจากทั้งชื่อเมืองพันนาฝั่งแกน หรือชื่อแม่น้ำสามฝั่งแกน ในกรณีของชื่อแม่น้ำแกน
อรุณรัตน์ วิเชียรเขียว อาจารย์ภาควิชาประวัติศาสตร์ วิทยาลัยครูเชียงใหม่ สันนิษฐานว่า อาจมาจากคำว่า “กั่งแก๊น” ซึ่งตำนานเมืองแกนกล่าวว่า เป็นอาการคับแค้นใจของประชาชนในเมืองแกนที่ถูกศัตรูรุกราน แล้วกวาดต้อนผู้คนไปทำให้พลัดพรากกัน หรืออาจมาจากคำว่า “แก๊น” แปลว่ากลาง"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div> 

            <div class="pin-map animated infinite" style="opacity: 1; top:68%; left: 52%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('watsanpatong.jpg', 'map'); ?>"
                   data-head="วัดสันป่าตอง(อินทขิล)"
                   data-detail="ชมวิหารไม้เก่าแก่และไหว้องค์พระประธานในวิหารซึ่งมีองค์เดียวชาวบ้านเรียกกันว่า พระเจ้าโตน(โทน) อันเป็นสถานที่ตั้งศาลหลักเมืองในอดีตและเลื่องชื่อการขอพรเรื่องความรัก"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>

            <div class="pin-map animated infinite" style="opacity: 1; top:68%; left: 61%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('watbaanden.jpg', 'map'); ?>"
                   data-head="วัดเด่นสะหรีศรีเมืองแกน(วัดบ้านเด่น)"
                   data-detail="วัดบ้านเด่นสะหรีศรีเมืองแกน หรือที่เรียกกันว่า วัดบ้านเด่น เดิมชื่อ      วัดหรีบุญเรือง อยู่ที่ตำบลอินทขิล อำเภอแม่แตง จังหวัดเชียงใหม่ เป็นวัดที่สร้างขึ้นด้วยศิลปะล้านนาประยุกต์ ตั้งเด่นบนเนินเตี้ยๆ
                   เห็นได้แต่ไกล มีความ วิจิตรงดงามตระการตาด้วยศิลปะสถาปัตยกรรมไทยล้านนา"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>

            <div class="pin-map animated infinite" style="opacity: 1; top:69%; left: 66%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('watbaanpong.jpg', 'map'); ?>"
                   data-head="วัดบ้านปง"
                   data-detail="วัดบ้านปง ตั้งอยู่เลขที่ 267 หมู่ที่ 7 ตำบลอินทขิล อำเภอแม่แตง จังหวัดเชียงใหม่ สามารถกราบนมัสการสรีระร่างหลวงปู่ครูบาหน้อยที่มรณภาพและสังขารไม่เน่าเปื่อย"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>

            <div class="pin-map animated infinite" style="opacity: 1; top:75%; left: 50%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('kiln-museum.jpg', 'map'); ?>"
                   data-head="พิพิธภัณฑ์แหล่งเตาอินทขิลเมืองแกน"
                   data-detail="แหล่งเตาอินทขิลเมืองแกน ตั้งอยู่หมู่ที่ 11 บ้านสันป่าตอง ต.อินทขิล อ.แม่แตง จ.เชียงใหม่ ซิ่งเดิมเมืองแกนมีประวัติศาสตร์ความเป็นมาที่ยาวนานหลายร้อยปี
                   เป็นชุมชนโบราณก่อตั้งมาตั้งแต่สมัยอาณาจักร์ล้านนา(พ.ศ.1801-พ.ศ.1854)ผู็คลสมัยนั้นได้สร้างสรรค์วัฒนธรรม อารยธรรม วัดวาอาราม กำแพงเมืองโบราณ สิ่งก่อสร้างต่างๆคิดค้นเทคโนโลยี
                    ผลิดศิลปกรรม วรรณกรรม  และหัตกรรมต่างๆ ทิ่งไว้เป็นหลักหลักฐานทางโบราณคดี และประวัติศาสตร์อันเป็นมรดก
          และมื่อปี 2537 นายภาสกร โทณวนิก อาจารย์ประจำสถาบันราชภัฏเชียงใหม่ และรศ. สรัสวัดี อ๋องสกุล อาจารย์ประจำสถาบันราชภัฏเชียงใหม่ ได้สำรวจข้อมูลค้นพบร่องรอยดินเผาไฟ รูปทรงกลมในบริเวณบ้าน
           นายดวงดี ใจทะนง ราษฏรบ้านสันป่าตอง หมู่ที่ 11 ต.อินทขิล อ.แม่แตง จ.เชียงใหม่ พบว่าเป็นแหล่งเตาเผาเครื่องถ้วยชามซึ่งเป็นแหล่งใหม่ล่าสุดของจังหวัดเชียงใหม่ มีอายุระหว่าง 500-600 ปี
           หลักฐานที่พบสวนใหญ่เป็นเครื่องถ้วยชามโบราณเนื่อแกร่ง เคลือบสีเขียวอ่อน หรือศิลาดล และชนิดเคลือบน้ำตาลโดยใช้ดินเหนียวสีขาวซึ่งเป็นลักษณะเฉพาะของท้องถิ่น
          เทศบาลเมืองเมืองแกนพัฒนาได้จึงได้ก่อสร้างพิพิธภัณฑ์แหล่งเตาอินทขิลเมืองแกนขึ้นเพื่อรักษา และอนุรักษ์ไว้พร้อมกับให้ผู้ที่สนใจและคนในท้องถิ่นได้เรียนรู้แหล่งที่มาและประวัติศาสตร์ของเมืองแกนถิ่นกำเนิด"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>


            <div class="pin-map animated infinite" style="opacity: 1; top:73%; left: 85%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('wataranwiwek.jpg', 'map'); ?>"
                   data-head="วัดอรัญวิเวก"
                   data-detail="สำนักสงฆ์เก่าแก่ที่มีมาตั้งแต่อดีตการจัดสร้างสำนักสงฆ์ในช่วงนั้นเป็นการรวมตัวของชาวบ้านในตำบลบ้านปงที่มีจิตใจเลื่อมใสศรัทธาในพระพุทธศาสนา เน้นการสนทนาธรรม นั่งวิปัสสนา รักษาศีล ภาวนา เน้นเรียนรู้เน้นการปฏิบัติจริง"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>


            <div class="pin-map animated infinite" style="opacity: 1; top:81%; left: 70%;
    animation-delay: 0.4s;">
                <a class="popup" data-img="<?php get_img('festivalmuangkaen.jpg', 'map'); ?>"
                   data-head="เทศกาลหนาวนี้ที่เมืองแกน"
                   data-detail="หนาวนี้ที่เมืองแกน เทศกาลท่องเที่ยวประจำปีของเทศบาลเมืองเมืองแกนพัฒนา ไฮไลท์ในงานคือ ทุ่งดอกไม้เมืองหนาวนานาพันธุ์ โดยเฉพาะทุ่งดอกคอสมอส หรือ ภาษาเหนือเรียกว่า ดอกคำแผ้แหล้
                   ที่จะชูช่ออวดสีสันเต็มทุ่งกว้างกว่า 20 ไร่ พร้อมจัดทำสะพานไม้ไผ่ ให้นักท่องเที่ยวได้เดินชมดอกไม้สีสันต่าง ๆ
ไม่เพียงเท่านั้น ยังมีมุมถ่ายรูปน่ารัก ๆ อีกหลายจุด ทั้งกังหันลมสไตล์ยุโรป กังหันน้ำไม้ไผ่ ขนาดใหญ่ ก๊อกน้ำลอยฟ้า รองเท้ายักษ์ สะพานสีขาว ฟาร์มแกะ เป็นต้น บรรยากาศช่างคล้ายกับอยู่ต่างประเทศเลยทีเดียว
รวมถึงมีกิจกรรม สาธิตการทำอาหารพื้นเมืองในกระทะยักษ์ ทำไส้อั่วสุมนไพรย่างยาวที่สุดในโลก (ครึ่งกิโลเมตร) การแสดงวัฒนธรรมพื้นบ้าน ตลอดจนการออกร้านจำหน่ายสินค้า OTOP สินค้าแฮนด์เมด สินค้าขึ้นชื่อของเมืองแกนพัฒนา และอาหารพื้นเมืองหลากหลายเมนู อย่าง น้ำพริกหนุ่มครกหลวง ให้อิ่มอร่อยกันด้วย"
                >
                    <img src="<?php get_img('icon-map.png', 'map'); ?>" alt="">
                </a>
            </div>




        </div>
    </div>
</div>
<style>
    .modal-backdrop.show {
        opacity: 0.8;
    }

    #detail-pg-modal {
        text-align: justify;
	font-size:1.4rem;
    }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" style="padding: 30px;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="pic animated" style="margin-top: 23%; margin-left: 50%;width: 400px;height: 275px">
            <img src="" alt="" id="img-tv" height="100%" width="100%" align="center">
        </div>
        <div class="modal-content">
            <div class="modal-header" style="padding: 0; height: 66px;">
                <img src="" id="head-img" style="width: 100%;top: -60px;position: relative;margin-top: 5%">
                <div class="close" style="padding: 0;position: absolute;top: -6px;left: 769px;opacity: 1;"
                     data-dismiss="modal">
                    <img src="<?php get_img('close.png', 'map'); ?>" alt=""
                         style="width: 50px;height: 50px">
                </div>
            </div>
            <div class="modal-body">
                <h1 id="head-tv-modal" style="text-align: center;margin-top: 4%"></h1>
              <div id="head-tv-img" style="width: 300px;height: 300px;">
                    <img src="" id="head-tv-img" style="width: 100%;">
                </div>
                <div id="detail-pg-modal"></div>
            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-primary">รายละเอียด</button>-->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#head-img').attr('src', $('#animation').attr('data-img'));
    $('#exampleModal').on('show.bs.modal', function () {
        $('#head-tv-modal').text('');
        $('#detail-pg-modal').text('');
    });
    $('.popup').click(function () {
        $('#exampleModal').modal('show');
         $('#img-tv').attr('src', $(this).attr('data-img'));
         $('#head-tv-img').attr('src', $(this).attr('data-img1'));
        $('#head-tv-modal').text($(this).attr('data-head'));
        $('#detail-pg-modal').text($(this).attr('data-detail'));
    });
</script>
