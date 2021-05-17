<html>
<head>
    <title> ระบบคิว </title>
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

        .center {
            margin: auto;
            width: 20%;
            padding: 10px;
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

            img {
                max-height: none !important;
                height: 100% !important;


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


$nayok_position ="เทศบาลตำบลแม่แรม";
$customer_name ="เทศบาลตำบลแม่แรม";
$customer_tambon ="ตำบลแม่แรม";
$customer_amphur ="อำเภอแม่ริม";
$customer_province = "จังหวัดเชียงใหม่";

function connect()
{

    $server = "localhost";
    $user = "c149maeram";
    $pw = "maer46D&";
    $db = "c149maeram";
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


function thaidate($vardate="") {
    $_month_name = array("01"=>"มกราคม",  "02"=>"กุมภาพันธ์",  "03"=>"มีนาคม",
        "04"=>"เมษายน",  "05"=>"พฤษภาคม",  "06"=>"มิถุนายน",
        "07"=>"กรกฎาคม",  "08"=>"สิงหาคม",  "09"=>"กันยายน",
        "10"=>"ตุลาคม", "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม");

    /*
    $yy =substr($vardate,0,4);
    $mm =substr($vardate,5,2);
    $dd =substr($vardate,8,2);
    */
    $yy=substr($vardate,0,4);
    $mm=substr($vardate,5,2);
    $dd=substr($vardate,8,2);

    $yy += 543;
    if ($yy==543){
        $dateT = "-";
    }else{
        $dateT=$dd ." ".$_month_name[$mm]."  ".$yy;
    }
    return $dateT;
}

function DateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear"; //, $strHour:$strMinute";
}

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

$code=trim($_GET['id']);
$result=rsQuery("Select * from tb_queue Where id=$code");

if (!$result) {
    echo "ไม่พบคำร้องเลขที่ ". $code;
}
else {


    // ออกเอกสารเป็นไอ.ที.โกลโบล อัพเดท status_print


    $r = mysqli_fetch_assoc($result);
    $id="ระบบจองคิวออนไลน์";
    $datepost=DateThai(date('j-n-Y'));
    $name=$r['postby'];
    $address=$r['address'];
    $email=$r['email'];
    $lat =$r['lat'];
    $lng =$r['lng'];

    $detail=$r['detail'];
    $ip=$r['ip'];
    $process=FindRS("select * from tb_helpme_process where id=".$r['id'],"name");
    $result=$r['result'];
    $to="เรียน      ".$nayok_position;
    //$writeform="เขียนที่     ".$customer_name;
    $writeform="";
    $text1="ข้าพเจ้า ".$name."<br>   ที่อยู่".$address."  <br>หมายเลขไอพี ".$ip."<br>  โทรศัพท์/อีเมล์ ".$email;
    $end="จึงเรียนมาเพื่อโปรดพิจารณา";
    $title="ระบบจองคิว";
    $subject=$r['subject'];
    $text2=$detail;


}



;



$html='<br><br><div align="center">'.$title.'</div><div align="left">'.'<br>'.$datepost.'<br>'.$subject.'<br>ผู้แจ้ง'.$name.'<br>ที่อยู่'.$address.'&nbsp;&nbsp;email '.$email.'<br>'.$to.'<br><br><span style="text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$text1.'</span><br><span style="text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;'.$text2.'</span><br>';

$html_end='<br><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$end.'</div><br><br><br><table width="100%"><tr><td width="60%">&nbsp;</td><td width="40%" align="center"></td></tr><tr><td>&nbsp;</td><td align="center"></td></tr></table>';
$html_all=$html.$html_detail.$html_pic.$html_end;
echo '<div class="page">

							<div class="subpage">
							 <div class="center">
							 <img src="../img/krut.jpg" width="87" height="96">
							</div>
							<div id="thfont">
							<table height="100%" width="100%" border="0">
								<tr>
								<td valign="top" width="100%" height="100%">
								<table width="100%" border="0">
								<tr><td colspan="2" height="40px"></td></tr>
								<tr>
									<td width="50%">'.$id.'</td><td width="50%" align="right">สำนักงาน'.$customer_name.'</td>
								</tr>
								<tr>
									<td></td><td align="right">'.$customer_tambon.'  '.$customer_amphur.'  '.$customer_province.' </td>
								</tr>
								<tr>
									<td></td><td>วันที่ '.$datepost.'</td>
								</tr>
								<tr>
									<td colspan="2">เรื่อง&nbsp;&nbsp;&nbsp;&nbsp; ผู้รับบริการ 7 วันข้างหน้า</td>
								</tr>
								<tr>
							
								</tr>
								
								<tr>
									<td colspan="2" style="text-align:justify">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$detail.'
									</td>
								</tr>';

if ($lat!=0){

    echo '<tr>
								<td colspan="2" align="center">
								<br>
								<div id="map" style="height: 400px; width: 100%;"></div>
								<br>
                                </td>
								</tr>';
}

echo '								
								<tr>
								
								</tr>
								<tr>
								
								</tr>
								
							
								<tr>
								
								</tr>
								<tr>
								
								</tr>
								
							</table>
							</div>
							</div>
							</div>';



?>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th style="border: solid 1px black">ลำดับ</th>
        <th style="border: solid 1px black">ชื่อผู้จอง</th>
        <th style="border: solid 1px black">เรื่อง</th>
        <th style="border: solid 1px black">วันที่</th>
        <th style="border: solid 1px black">เวลา</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $sql = "SELECT * FROM tb_queue join tb_queue_obj ON tb_queue.id = tb_queue_obj.id WHERE start_date BETWEEN CURRENT_DATE+1 AND CURRENT_DATE+7 ORDER BY start_date ASC";
    $rs = rsQuery($sql);
    $n=1;

    while ($row = mysqli_fetch_array($rs)){
        $status = FindRS("select * from tb_status where id=".$row['status'],"status");
        echo '<tr>
                              <td style="width:10%;border:solid 1px black">'.$n.'</td>
                              <td style="width:30%;border:solid 1px black">'.$row["name"].'</td>
                              <td style="width:20%;border:solid 1px black">'.$row["object_name"].'</td>
                              <td style="width:20%;border:solid 1px black">'.thaidate($row["start_date"]).'</td>
                              <td style="width:20%;border:solid 1px black">'.$row["end_date"].'</td>
                             
                              <a class="btn btn-success" href="main.php?_mod='.$mod.'&_modid='.$modid.'&type=View&id='.$row["id"].'"><i class="fas fa-eye"></i></a>
                              <a class="btn btn-danger" onclick="btn_delete('.$row["id"].')"><i class="fas fa-trash-alt"></i></a>
                              </td>
                            </tr>';
        $n++;
    }
    ?>

    </tbody>
</table>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDg49SZLUZdLu8KQ80fEAPJkbdBUqyN-vw&libraries=places" ></script>

<script>

    var Lat = parseFloat(<?php echo $lat; ?>);
    var Lng = parseFloat(<?php echo $lng;?>);
    //alert(Lat+" "+Lng);
    //console.log(Lat+Lng);

    myLatLng = {lat: Lat, lng: Lng};
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 17,
        styles: [

            {
                featureType: 'road',
                elementType: 'geometry.fill',
                stylers: [
                    {
                        color: '#8e8f9d'
                    }
                ]
            },
            {
                featureType: 'road',
                elementType: 'labels.text.fill',
                stylers: [
                    {
                        color: '#05050a'
                    }
                ]
            }

        ]

    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
    });


</script>

</body>
</html>


