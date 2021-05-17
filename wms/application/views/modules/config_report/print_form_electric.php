<html>
<head>
    <title> บริการออนไลน์ - แจ้งไฟฟ้าสาธารณะ </title>
    <meta name="Generator" content="EditPlus">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style>



        @import url(../../../font/thsarabunnew.css);
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }


        .page {
            font-family:THSarabunNew,THBaijam,THK2DJuly8,THChakraPetch,THNiramitAS,Tahoma ,sans-serif;
            font-size:12px;
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            margin: 1cm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);

        }
        .subpage {

            padding: 0.5cm;

            height: 245mm;
            outline: 2cm;
            background:url("img/krut.jpg") no-repeat top center;
        }
        #thfont {
            font-family: THSarabunNew,Tahoma ,sans-serif;

        }
        #thfont table td{
            font-size:12px;
        }

        @page {

            size: A4;
            margin: 0;
        }
        @media print {


            .page {
                font-family:THSarabunNew,THBaijam,THK2DJuly8,THChakraPetch,THNiramitAS,Tahoma ,sans-serif;
                font-size:12px;
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
            .subpage {

                padding: 0.5cm;

                height: 240mm;
                outline: 2cm;
                background:url("http://www.sunpukwan.go.th/images/krut.jpg") no-repeat top center;
            }
            #thfont {
                font-family:THSarabunNew,THBaijam,THK2DJuly8,THChakraPetch,THNiramitAS,Tahoma ,sans-serif;
                font-size:12px;
            }
            #thfont table td{
                font-size:12px;
            }
        }

    </style>
</head><body>

<?php
session_start();

include_once("../../../../../backup/itgmod/connect.inc.php");
include_once("../../../../../backup/itgmod/myfnc.php");
$nayok_position ="เทศบาลตำบลแม่แรม";
$customer_name ="เทศบาลตำบลแม่แรม";
$customer_tambon ="ตำบลแม่แรม";
$customer_amphur ="อำเภอแม่ริม";
$customer_province = "จังหวัดเชียงใหม่";


function connect()
{

    $server = "localhost";
    $user = "root";
    $pw = "12345678";
    $db = "web";
    $conn = new mysqli($server, $user, $pw, $db);


    if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
    }
    return $conn;
}

function rsQuery($sql)
{
    $con = connect();

    if ($sql == "") {
        return false;
    } else {
        $con->set_charset("utf8");

        $rs = $con->query($sql);
        if ($rs !== false) {
            //	$error=$con->error;
            return $rs;
        } else {
            $error = $con->error;
            return $error;
        }
    }
    $rs->free();
    $con->close();
}

###################### Find Data
function FindRS($sql, $FieldName)
{
    $con = connect();

    $con->set_charset("utf8");
    $rs = $con->query($sql);


    if ($rs) {

        $row = $rs->fetch_assoc();
        $findvalue = $row[$FieldName];
        return $findvalue;
    } else {
        return "Not Found";
    }
    $rs->free();
    $con->close();
}

$con = connect();
$con->set_charset("utf8");
$rs = $con->query($sql);

//
//if(isset($_GET['id'])){
//
//    $id = (int)$_GET['id'];
//
//    $query_fetch = mysqli_query($con,"SELECT * FROM tb_help_maps WHERE id = $id");
//
//    while($show = mysqli_fetch_array($query_fetch)){
//       echo "ID: " . $show['id'] . " " . $show['subject']. " :".$show['detail']." :$".$show['result']." <br></a>";
//   } // while loop brace
//
//} // isset brace
//echo '<a href="?id='.$show['id'].'">'.$show['subject'].' :'.$show['detail'].' :'.$show['result'].' <br></a>';


//if(isset($_GET['id'])){
//
//    $id = (int)$_GET['id'];
//    $code=trim($_GET['id']);
//    $query_fetch=mysqli_query($con,"SELECT * FROM tb_help_maps WHERE id=$id");
//
////    while($show = mysqli_fetch_array($query_fetch)){
////        echo "ID: " . $show['id'] . " " . $show['subject']. " :".$show['detail']." :$".$show['result']." <br></a>";
////        echo $id;
//  //  } // while loop brace
//} // isset brace

$code=trim($_GET['no']);
$result=rsQuery("Select * from tb_electric Where no=$code");

if (!$result) {
    echo "ไม่พบคำร้องเลขที่ ". $code;
}
else {


    // ออกเอกสารเป็นไอ.ที.โกลโบล อัพเดท status_print


    $r = mysqli_fetch_assoc($result);

    $no="".$r['no'];
    $date="วันที่ ".DateTimeThai($r['datecreate']);
    $name=$r['name'];
    $address=$r['add_address'];
    $email=$r['email'];
    $lat =$r['lat'];
    $lng =$r['lng'];
    $add_moo=$r['add_moo'];
    $moo=$r['moo'];
    $telephone=$r['telephone'];
    $process=FindRS("select * from tb_status where id=".$r['id'],"name");
    $add_province=FindRS("select * from province Where PROVINCE_ID='$add_province1'","PROVINCE_NAME");

    $result=$r['result'];
    $to="เรียน      ".$nayok_position;
    //$writeform="เขียนที่     ".$customer_name;
    $writeform="";
    $text1="ข้าพเจ้า ".$name."<br>   ที่อยู่".$address."  <br>หมายเลขไอพี ".$ip."<br>  โทรศัพท์/อีเมล์ ".$email;
    $end="จึงเรียนมาเพื่อโปรดพิจารณา";
    $title="คำร้องทุกข์ (ออนไลน์)";
    $subject=$r['subject'];
    $text2=$detail;

    $post_ip=$r['post_ip'];
    $remark=$r['remark'];
    $to="เรียน      ".$nayok_position;
    $writeform="เขียนที่     ".$customer_name;
    $text1="ข้าพเจ้า ".$name."    ที่อยู่ ".$add_moo."  อำเภอ  "."แม่แตง"."  จังหวัด  "."เชียงใหม่"."  โทรศัพท์ ".$telephone."  หมายเลขไอพี ".$post_ip;


        $picfolder="../../../fileupload/electric/";
        $folder="fileupload/electric/";
        $title="คำร้องซ่อมแซมไฟฟ้าสาธารณะ  (ออนไลน์)";
        $detail=$r['fix_with_code'];
        $subject="ขอซ่อมแซมไฟฟ้าสาธารณะ";
        $text2="มีความประสงค์ให้ ".$customer_name."  ซ่อมแซมไฟฟ้าสาธารณะ หมู่ที่ ".$moo."  ".$customer_tambon."  ".$customer_amphur."  ".$customer_province."  ดังรายละเอียดต่อไปนี้: " .
            $detail;

}



;


$html='<br><br><div align="center">'.$title.'</div><div align="left">'.$id.'<br>'.$datepost.'<br>'.$subject.'<br>ผู้แจ้ง'.$name.'<br>ที่อยู่'.$address.'&nbsp;&nbsp;email '.$email.'<br>'.$to.'<br><br><span style="text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$text1.'</span><br><span style="text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;'.$text2.'</span><br>';

$html_end='<br><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$end.'</div><br><br><br><table width="100%"><tr><td width="60%">&nbsp;</td><td width="40%" align="center"></td></tr><tr><td>&nbsp;</td><td align="center"></td></tr></table>';
$html_all=$html.$html_detail.$html_pic.$html_end;
//echo '<div class="page">
//
//							<div class="subpage">
//
//							<div id="thfont">
//							<table height="100%" width="100%" border="0">
//								<tr>
//								<td valign="top" width="100%" height="100%">
//								<table width="100%" border="0">
//								<tr><td colspan="2" height="40px"></td></tr>
//								<tr>
//									<td width="50%">'.$id.'</td><td width="50%" align="right">สำนักงาน'.$customer_name.'</td>
//								</tr>
//								<tr>
//									<td></td><td align="right">'.$customer_tambon.'  '.$customer_amphur.'  '.$customer_province.' </td>
//								</tr>
//								<tr>
//									<td></td><td>วันที่ '.$datepost.'</td>
//								</tr>
//								<tr>
//									<td colspan="2">เรื่อง&nbsp;&nbsp;&nbsp;&nbsp;'.$subject.'</td>
//								</tr>
//								<tr>
//									<td colspan="2">เรียน&nbsp;&nbsp;&nbsp;&nbsp;'.$nayok_position.'</td>
//								</tr>
//
//								<tr>
//									<td colspan="2" style="text-align:justify">
//										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$detail.'
//									</td>
//								</tr>';


			echo '<div class="page">
							<div class="subpage">
							<div id="thfont">
							<table height="100%" width="100%" border="0" style="background:url('.$image_file.') center center  no-repeat;">
								<tr>
								<td valign="top" width="100%" height="100%">
								<table width="100%" border="0">
								<tr><td colspan="2" align="center">'.$title.'</td></tr>
								<tr><td colspan="2" height="40px">เลขคำร้อง '.$no.'</td></tr>
								<tr>
									<td width="50%"></td><td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เขียนที่สำนักงาน'.$customer_name.'</td>
								</tr>
								<tr>
									<td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								</tr>
								<tr>
									<td></td><td>'.$date.'</td>
								</tr>
								<tr>
									<td colspan="2">เรื่อง&nbsp;&nbsp;&nbsp;&nbsp;'.$subject.'</td>
								</tr>
								<tr>
									<td colspan="2">เรียน&nbsp;&nbsp;&nbsp;&nbsp;'.$nayok_position.'</td>
								</tr>
								<tr>
									<td colspan="2">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$text1.'<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$text2.'<br>
									
									</td>
								</tr>
								<tr>
									<td colspan="2">';
										switch($tablename){
										case "tb_electric":
											foreach($detail as $fixwithcode){
												$i+="1";
												$html_detail .='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$i.'  '.$fixwithcode.'<br>';
											}

											//$html_detail.=$map.'<br><table width="100%" border ="1" height="300"><tr><td height="300">&nbsp;</td></tr></table>';
											break;
										case "tb_infrastructure":
											$html_detail='';
											break;
									}
										echo $html_detail;
										$strSql="select * from filename where tablename='$tablename' AND masterid='".$no."' Order by id DESC Limit 0,3";
										$rs2=rsQuery($strSql);
										$rs2_row=mysqli_num_rows($rs2);
										//ถ้า rs2 มีข้อมูลให้แสดงภาพแบบใหม่ ถ้าเป็น0ให้แสดงภาพตาม code เก่า
										if($rs2_row>0){
											//$i=0;
											echo '<br><table><tr>';
											while($rs_filename=mysqli_fetch_assoc($rs2)){
												$cpic=file_exists($picfolder.$rs_filename['filename']);
												$type=strtolower(substr($rs_filename['filename'],-3));
												$strfilename=strtolower($rs_filename['filename']);
												$needle="bf";
												if($cpic){
													if($type<>"pdf"){
														if (strpos($strfilename,$needle) !== false) {
															//ถ้ามีคำว่า bf ให้แสดงรูป
															$html_pic.='<td><a href="http://www.sunpukwan.go.th/'.$folder.$rs_filename['filename'].'" target="_blank"><img src="'.$picfolder.$rs_filename['filename'].'" width="180" height="140"></a></td>';

														}else{
															//ถ้าไม่มีคำว่าbf ให้แสดงรูป
															//$html_pic.='';

														}
													}
												}
												}
											echo '</tr></table>';
										}
echo'</td>
								</tr>
								<tr>
									<td colspan="2" align="center">จึงเรียนมาเพื่อโปรดพิจารณา</td>
								</tr>
								<tr>
									<td></td><td align="center">ขอแสดงความนับถือ</td>
								</tr>
								<tr>
									<td></td><td height="100px"></td>
								</tr>
								<tr>
									<td></td><td align="center">(&nbsp;'.$name.'&nbsp;)</td>
								</tr>
								<tr>
									<td></td><td align="center">ผู้ร้องเรียน</td>
								</tr>
								
								</table>
								</td>
								</tr>
								
				</table>
				</div>
				</div>
				</div>';


echo "</body></html>";
?>


