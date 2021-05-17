<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="js/popper.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript">







 

    $(function () {

        // แทรกโค้ต jquery

        $("#dateInput").datepicker({dateFormat: 'yy-mm-dd'});

    });





</script>



<style>

    /* Always set the map height explicitly to define the size of the div

     * element that contains the map. */

    body {

        background-color: #FFE3A6;

    }

    h4 {
        font-family: 'fc_lamoonregular', sans-serif;
    }



    /* Optional: Makes the sample page fill the window. */

    #map2 {

        height: 400px;

        width: 100%;

    }

    textarea.form-control{

        border:none;

        background-color: #FFE3A6;

        border-bottom: dotted 2px ;

    }

    input[type="text"].form-control{

        border: none;

        background-color: #FFE3A6;

        border-bottom: dotted 2px ;

    }

    input[type="text"].form-control1{



    }

</style>





<?php



$nayok_position ="นายกเทศบาลตำบลแม่แรม";
require 'PHPMailer/vendor/autoload.php';



if (isset($_POST['sub'])) {
//
//    $check = getimagesize($_FILES["f_image"]["tmp_name"][0]);
    $check = getimagesize;

    if ($check == false) {



//        if ($_POST['f_subject'] == "") {
//
//            "T1";
//
//        }





    } else {



        if ($_POST['f_subject'] == "") {

            "T1";

        } else {

            /*

                                #EMAIL--------------------------------------------------



                                #EMAIL---------------------------------------------------------------------------------------------------------------------------------------



                                $fm = "admin@itglobal.co.th"; // *** ต้องใช้อีเมล์ @yourdomain.com เท่านั้น  ***

                                $to = "info@".$domainname;//

                                $custemail = "info@".$domainname; // อีเมล์ของผู้ติดต่อที่กรอกผ่านแบบฟอร์ม



                                $subj = $_POST['f_subject'];



                                // -------------------------------------------------------------------

                                $message.= $_POST['f_detail'];



                                // -------------------------------------------------------------------



                                $mesg = $message;



                                $mail = new PHPMailer();

                                $mail->CharSet = "utf-8";



                                $mail->SMTPDebug = 2;

                                $mail->IsSMTP();



                                $mail->Mailer = "smtp";

                                $mail->SMTPAutoTLS = false; //false//true

                                //$mail->SMTPSecure = 'ssl'; // บรรทัดนี้ ให้ Uncomment ไว้ เพราะ Mail Server ของโฮสต์ ไม่รองรับ SSL.

                                $mail->Port = "25"; // หมายเลข Port สำหรับส่งอีเมล์ 25 // 465



                                $mail->Host = "mail.itglobal.co.th"; //ใส่ SMTP Mail Server ของท่าน

                                $mail->Username = "noreply@itglobal.co.th"; //ใส่ Email Username ของท่าน (ที่ Add ไว้แล้วใน Plesk Control Panel)

                                $mail->Password = "456852aB"; //ใส่ Password ของอีเมล์ (รหัสผ่านของอีเมล์ที่ท่านตั้งไว้)

                                 //-------------------------------------------------------------------



                                //$mail->From = $fm;

                                $mail->SetFrom($fm);

                                $mail->AddAddress($to);

                                $mail->AddReplyTo($custemail);



                                $mail->Subject = $subj;

                                $mail->MsgHTML($mesg);

                                $mail->WordWrap = 50;

                                //



                                if(!$mail->Send()) {

                                echo "<script>alert('Send Mail ERROR')</script>";

                                echo "<script>console.log('".$mail->ErrorInfo."')</script>";

                                exit;

                            }

            */

            $to = "info@" . $domainname;

            $subject = $_POST['f_subject'];

            $txt = $_POST['f_detail'];



            $headers = "MIME-Version: 1.0\r\n";

            $headers .= "Content-type: text/html; charset=UTF-8\r\n";

            //$headers .= "From: " . $_POST['femail'] . "\r\n" ."CC: migarl38@hotmail.com";

            $headers .= "From: " . $_POST['f_email'] . " <" . $_POST['f_email'] . ">\r\n";

            $headers .= "Reply-to: " . $_POST['f_email'] . " <" . $_POST['f_email'] . ">\r\n";

            $headers .= "X-Priority: 3\r\n";

            $headers .= "X-Mailer: PHP mailer\r\n";



            mail($to, $subject, $txt, $headers);

//            echo "<script>alert('Send Mail OK')</script>";

            //echo "<script>console.log('".$mail->ErrorInfo."')</script>";

            #EMAIL--------------------------------------------------





            for ($i = 0; $i < count($_FILES['f_image']['name']); $i++) {





//                function check โฟดเดอก่อนดาวโหลด ก่อนอัพโหลด

                $filepathcheck = '../fileupload/waterwork';

                if (file_exists($filepathcheck)) {

//                    echo "<script>alert('The file exists')</script>";

                }else{

                    echo "<script>alert('ไม่มีนะ')</script>";

                    mkdir ($filepathcheck,0777, true);

                }



                $filename = $_FILES["f_image"]["name"][$i];

                $ext = end(explode(".", $filename));

                $newname = "Waterwork_Im_" . $_POST['id'] . '_' . $i . '.' . $ext;

                $filetmp = $_FILES["f_image"]["tmp_name"][$i];

                $filetype = $_FILES["f_image"]["type"][$i];

                $filepath = "../fileupload/waterwork/" . $newname;



                if (move_uploaded_file($filetmp, $filepath)) {



                    $sql = "INSERT INTO tb_files_image_waterwork(id_image,image_path,image_key) VALUES ('','" . $filepath . "','" . $_POST['f_key'] . "')";

                    $rs = rsQuery($sql);

                } else {

                    echo "<script>alert('ไม่มีการแนบรูปภาพ'); </script>";

                }

            }



            $sql = "INSERT INTO tb_waterwork(id,subject,detail,result,lat,lng,postby,address,email,datepost,ip,typewb,status,updatetime,image_key) Values('','" . $_POST['f_subject'] . "','" . $_POST['f_detail'] . "','','" . $_POST['f_lat'] . "','" . $_POST['f_lng'] . "','" . $_POST['f_name'] . "','" . $_POST['f_address'] . "','" . $_POST['f_email'] . "','" . $_POST['f_dateInput'] . "','" . $_SERVER['REMOTE_ADDR'] . "','1','1','0','" . $_POST['f_key'] . "')";

            $rs = rsQuery($sql);

            if ($rs) {

                echo "<script>alert('เรื่องของคุณได้ถูกส่งไปยังผุ้ที่เกี่ยวข้องแล้วค่ะ');window.location.href='waterwork';</script>";



            } else {

                echo "<script>alert('Err2'); </script>";

            }





        }



    }





}



?>





<?php

function connect(){
    global $g_user;
    global $g_pw;
    global $g_db;

    $server="localhost";
    $user="c149maeram";
    $pw="maer46D&";
    $db="c149maeram";
    $conn = new mysqli($server, $user, $pw, $db);

    /*
     * This is the "official" OO way to do it,
     * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
     */
    if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') '. $conn->connect_error);
    }
    return $conn;
}


function rsQuery($sql){
    $con=connect();
    if($sql==""){
        return false;
    }else{
        $con->set_charset("utf8");

        $rs=$con->query($sql);
        if($rs !== false){
            //	$error=$con->error;
            return $rs;
        }else{
            $error=$con->error;
            return $error;
        }
    }
    $rs->free();
    $con->close();
}

function FindRS($strSQL,$FieldName)
{
    $con=connect();

    //mysqli_query($con,"SET NAMES utf8");
    $con->set_charset("utf8");
    $rs=$con->query($strSQL);

    //$rs_row=$rs->num_rows;
    if ($rs) {
        //$findvalue=mysqli_result($rs,0,$FieldName);
        //mysqli_data_seek($rs, 0);
        $row = $rs->fetch_assoc();
        $findvalue=$row[$FieldName];
        return $findvalue;
    }
    else {
        return "Not Found";
    }
    $rs->free();
    $con->close();
}

$sql = "select * from tb_waterwork order by id desc LIMIT 1";

$rs = rsQuery($sql);

$rs->num_rows;

$row = $rs->fetch_assoc();



?>



<hr style="background-color: #fff0f2;height: 10px;margin-top: -2%">

<h4 style="width: 100%;height: 35px; font-weight: bold; text-align: center;margin-left:;background-color: pink;color: white;margin-top: -1.3%;font-size: 1.5rem">แจ้งซ่อมประปาสาธารณะ</h4>



<div class="container" style="text-align: left;">

    <div class="col-md-12">



        <form name="form_help" id="form_help" method="POST" action="" enctype="multipart/form-data">



            <input type="hidden" name="id" id="id" value="<?php $newid = $row['id'] + 1;

            echo $newid; ?>">





            <div class="form-group">

                <div align="center" style="margin-top: 2%">

                    <h4>เทศบาลตำบลแม่แรม 404 หมู่ 1 ตำบลแม่แรม อำเภอแม่ริม จังหวัดเชียงใหม่ 50180</h4>
                    <h4>หมายเลขโทรศัพท์ : 053-044350 </h4>

                    <hr style="border-style: dashed" color="black" width="50%">

                </div>





                <div class="col-sm-10" style="font-size: 20px">

                    <label class="control-label"><b>วันที่:</b></label>

                    <?php echo date("Y-m-d"); ?>

                    <input type="hidden" name="f_dateInput" id="f_dateInput" value="<?php echo date("c"); ?>"

                </div>

            </div>

            <div class="form-group">

                <div class="col-sm-10" style="font-size: 20px">

                    <label class="control-label"><b>เรียน:</b></label>

                    <?php echo $nayok_position; ?>

                </div>

            </div>

            <div class="form-group" style="font-size: 20px">

                <div class="col-sm-10">

                    <label class="control-label"><b>เรื่อง</b></label>

                    <input type="text" style="font-size: 20px" class="form-control" id="f_subject" name="f_subject" value="แจ้งซ่อมประปาสาธารณะ" required>

                </div>

            </div>


            <div class="form-group">

                <div class="col-sm-10">

                    <label style="font-size: 20px" class="control-label"><b>รายละเอียดการแจ้งซ่อมประปา</b></label>

                    <textarea style="font-size: 20px"  type="text" class="form-control" id="f_detail" name="f_detail" placeholder="กรุณากรอกข้อมูลให้ครบถ้วน เช่น สถานที่ใช้สังเกตุ สถานที่ใกล้เคียง ลักษณะการซ่อม เป็นต้น" required></textarea>

                </div>

            </div>


            <div class="form-group">

                <div class="col-sm-10" style="font-size: 20px">

                    <label class="control-label"><b>ผู้ร้องเรียน&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b></label>

                    <input type="text" class="form-control1" id="f_name" name="f_name" placeholder="ชื่อผู้ร้องเรียน">

                </div>

            </div>

            <div class="form-group">

                <div class="col-sm-10" style="font-size: 20px">

                    <label class="control-label"><b>ที่อยู่แจ้งซ่อม&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b></label>

                    <input type="text" class="form-control1" id="f_address" name="f_address" placeholder="เช่น หมู่ที่ ตำบล เป็นต้น">

                </div>

            </div>

            <div class="form-group">

                <div class="col-sm-10" style="font-size: 20px">

                    <label class="control-label"><b>อีเมล์/เบอร์ติดต่อ &nbsp&nbsp&nbsp:</b></label>

                    <input type="text" class="form-control1" id="f_email" name="f_email" placeholder="เบอร์โทรศัพท์ที่สามารถติดต่อได้">

                </div>

            </div>



            <!--     <h5 style="font-family: 'FC Lamoon',Serif;font-size: 1.3rem">ขอยื่นคำร้อง/แจ้งปัญหา</h5> -->





            <div class="form-group" style="font-size: 20px">

                <div class="col-sm-10">

                    <label class="control-label"><b>รูปภาพ:</b></label>

                    <input type="file" name="f_image[]" id="f_image[]" multiple>

                    <input type="hidden" name="f_key" id="f_key" value="600<?php echo $newid; ?>">

                </div>

            </div>

            <input type="hidden" name="f_lat" id="f_lat">

            <input type="hidden" name="f_lng" id="f_lng">


            <center>
            <label style="font-size: 20px" class="control-label"><b>ปักหมุดบริเวณที่แจ้งซ่อมประปา</b></label>
            </center>
            <div id="map2"></div>



            <div class="form-group">

                <div class="col-sm-10">

                    <br>

                    <label><b>ค้นหาสถานที่:</b></label>

                    <input class="form-control" type="text" name="mapsearch" id="mapsearch">
                </div>

            </div>

            <div class="form-group">

                <div class="col-sm-10">

                    เงื่อนไข<br>

                    1. กรุณาป้อนข้อมูลให้ครบทุกช่อง มิฉะนั้นจะไม่สามารถบันทึกได้<br>

                    2. กรุณาใช้คำที่สุภาพและไม่เป็นการหมิ่นประมาท ใส่ร้ายผู้อื่น<br>

                    3. ทางทีมงานขอสงวนสิทธิ์ในการลบข้อความไม่เหมาะสมใดๆโดยมิต้องแจ้งล่วงหน้า<br>

                    **รายละเอียดและชื่อของท่านจะไม่ถูกเปิดเผย <br>

                    ข้าพเจ้าขอยืนยันข้อความทั้งหมดเป็นความจริง <br>

                </div>

            </div>

            <center>

                <button style="margin-bottom: 2%" type="submit" name="sub" id="myButton" class="btn btn-primary" >บันทึก</button>

            </center>


        </form>

    </div>

</div>





 <!--  <script>  script check empty value

    jQuery("#form_help").submit(function (evt) {

    //At this point the browser will have performed default validation methods.



    //If you want to perform custom validation do it here.

    if (jQuery("input[Name='f_name']").val().length < 4) {

    alert("first Input must have 4 characters according to my custom validation!");

    evt.preventDefault();

    return;

    }

    alert("Values are correct!");

    });

    </script>



    <script type="text/javascript">

        document.getElementById("myButton").onclick = function () {

            location.href = "waterwork";

        };

    </script>



</div> -->





 <script async defer

        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDg49SZLUZdLu8KQ80fEAPJkbdBUqyN-vw&callback=initMap&libraries=places"></script>

<script>

    function initMap() {

        myLatLng = {lat: 18.9203286, lng: 98.9171082};

        var map = new google.maps.Map(document.getElementById('map2'), {

            center: myLatLng,

            zoom: 15

        });



        var marker = new google.maps.Marker({

            position: myLatLng,

            map: map,

            draggable: true

        });



        google.maps.event.addListener(marker, 'dragend', function () {

            var lat = marker.getPosition().lat();

            var lng = marker.getPosition().lng();



            document.getElementById("f_lat").value = lat.toFixed(5);

            document.getElementById("f_lng").value = lng.toFixed(5);



        });



        var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));



        google.maps.event.addListener(searchBox, 'places_changed', function () {

            var places = searchBox.getPlaces();



            var bounds = new google.maps.LatLngBounds();

            var i, place;

            for (i = 0; place = places[i]; i++) {

                console.log(places);

                bounds.extend(place.geometry.location);

                marker.setPosition(place.geometry.location);

                var item_lat = place.geometry.location.lat();

                var item_lng = place.geometry.location.lng();

            }



            document.getElementById("f_lat").value = item_lat.toFixed(5);

            document.getElementById("f_lng").value = item_lng.toFixed(5);



            google.maps.event.addListener(marker, 'dragend', function () {

                var lat = marker.getPosition().lat();

                var lng = marker.getPosition().lng();



                document.getElementById("f_lat").value = lat.toFixed(5);

                document.getElementById("f_lng").value = lng.toFixed(5);

            });



            map.fitBounds(bounds);

            map.setZoom(15);



        });

    }



</script>

