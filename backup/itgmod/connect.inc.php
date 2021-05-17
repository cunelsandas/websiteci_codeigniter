<?php
//	error_reporting(E_ALL); //สำหรับเช็ค error
//	ini_set('error_reporting', E_ALL);
//	ini_set('display_errors',1);
date_default_timezone_set('Asia/Bangkok');  //วันเวลาให้เป็นของไทย
####################### connect database ##########################

$gloActivity_fileno=6;  // เก็บค่าจำนวนไฟล์ในการอัพโหลด 
$gloNews_fileno=6;
$gloPurchase_fileno=3;
$gloOtop_fileno=6;
$gloTravel_fileno=6;
$gloDownloadform_fileno=1;
$gloFile_fileno=10;
$gloGoverment_fileno=1; //ส่วนราชการ
$gloHeader_fileno=1;  //ผู้บริหาร
$gloOfficer_fileno=1;  //เจ้าหน้าที่
$gloBoard_fileno=1;  //สมาชิก
$gloTip_fileno=3;  //สาระน่าร

$onemb=1048576;  // 1 mb = 1,048,576 bytes

$gloPicture_filesize=$onemb*20;  // กำหนดขนาดรูปภาพ
$gloData_filesize=$onemb*50;  // กำหนดขนาดไฟล์เอกสารต่างๆ  	1 MB = 1,048,576 bytes

$gloFullSlideshow_fileno=10;  // จำนวนภาพที่แสดงในหน้าแรกของ FullSlider
$gloFullSlide_width="1200px";  //กำหนดขนาดความว้างภาพ slide show
$gloFullSlide_height="600px";  // กำนหดขนาดความสูง slide show

$glo_youtube_width="370";  // กำหนดความกว่างไฟล์ youtube หน่วย px
$glo_youtube_height="240";

$gloSlideshow_fileno=20;  // จำนวนภาพที่แสดงในหน้าแรกของ Slideshow
$gloSlide_width="1100px";  //กำหนดขนาดความว้างภาพ slide show
$gloSlide_height="300px";  // กำนหดขนาดความสูง slide show

//ตัวแปรเก็บข้อมูลลูกค้า
$customer_name = "เทศบาลเมืองเมืองแกนพัฒนา";
$customer_tambon="ตำบลอินทขิล";
$customer_amphur="อำเภอแม่แตง";
$customer_province="จังหวัดเชียงใหม่";
$customer_address="เลขที่ 9 หมู่10 ตำบลอินทขิล อำเภอแม่แตง จังหวัดเชียงใหม่ 50150";
$customer_tel="โทรศัพท์ 053-857360 โทรสาร 053-857-017<br>E-Mail : info@muangkaen.go.th";
$domainname="www.muangkaen.go.th/";
$nayok_position ="นายกเทศมนตรีเมืองเมืองแกนพัฒนา";
$nayok_name="นางสุดารัตน์ อินทราศี";
$palad_name="";
$showdate="yes"; //แสดงวันที่กำกับ ค่าคือ yes/no
$head_background="<img src=images/head_bg.jpg width=950 height=250>";
$startdate="1/12/2555";  //วันเริ่มนับสถิติ

$customer_lat="19.1442047";
$customer_lng="98.9960995";

# Connect database

$g_user="root";
$g_pw='12345678';
$g_db="web";


include_once("myfnc.php");
?>