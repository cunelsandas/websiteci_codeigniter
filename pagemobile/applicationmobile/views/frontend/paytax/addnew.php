
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript">

    $(function(){
        // แทรกโค้ต jquery
        $("#dateInput").datepicker({ dateFormat: 'yy-mm-dd' });
    });


</script>

<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    body{
        font-family: THK2DJuly8;
        font-size: 14px;
    }

    /* Optional: Makes the sample page fill the window. */
    #map2 {
        height: 400px;
        width: 100%;
    }
</style>

<?php
error_reporting(0);
//include '../myfnc11.php';
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


?>


<?php

require 'PHPMailer/vendor/autoload.php';

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

if(isset($_POST['sub'])) {
    $check = getimagesize($_FILES["f_image"]["tmp_name"][0]);
    if ($check == false){

        if ($_POST['f_name'] == "") {
            "T1";
        }  else {


            /*		#EMAIL---------------------------------------------------------------------------------------------------------------------------------------

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


//            $to = "info@".$domainname;
//            $subject = $_POST['f_subject'];
//            $txt = $_POST['f_detail'];
//
//            $headers = "MIME-Version: 1.0\r\n" ;
//            $headers .= "Content-type: text/html; charset=UTF-8\r\n" ;
//            //$headers .= "From: " . $_POST['femail'] . "\r\n" ."CC: migarl38@hotmail.com";
//            $headers .= "From: ".$_POST['f_email']." <".$_POST['f_email'].">\r\n" ;
//            $headers .= "Reply-to: ".$_POST['f_email']." <".$_POST['f_email'].">\r\n" ;
//            $headers .= "X-Priority: 3\r\n" ;
//            $headers .= "X-Mailer: PHP mailer\r\n" ;
//
//            mail($to,$subject,$txt,$headers);
//            echo "<script>alert('Send Mail OK1')</script>";

            #EMAIL---------------------------------------------------------------------------------------------------------------------------------------


            $sql = "INSERT INTO tb_paytax(id,subject,detail,result,lat,lng,postby,address,email,datepost,ip,typewb,status,updatetime)
						Values('','" .$_POST['f_subject']. "','" .$_POST['f_detail']. "','','" .$_POST['f_lat']. "','" .$_POST['f_lng']. "'
							,'" .$_POST['f_name']. "','" .$_POST['f_address']. "','" .$_POST['f_email']. "','" .$_POST['f_dateInput']. "'
							,'" .$_SERVER['REMOTE_ADDR']. "','1','1','0')";
            $rs = rsQuery($sql);
            if ($rs) {
                echo "<script>alert('การชำระภาษีของคุณเรียบร้อยแล้วค่ะ');window.location.href='index.php?_mod=" . $_GET['_mod'] . "';</script>";//
            }else{
                echo "<script>alert('Err'); </script>" ;
            }
        }

    }else{

        if ($_POST['f_name'] == "") {
            "T1";
        }  else {
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
//            $to = "info@".$domainname;
//            $subject = $_POST['f_subject'];
//            $txt = $_POST['f_detail'];
//
//            $headers = "MIME-Version: 1.0\r\n" ;
//            $headers .= "Content-type: text/html; charset=UTF-8\r\n" ;
//            //$headers .= "From: " . $_POST['femail'] . "\r\n" ."CC: migarl38@hotmail.com";
//            $headers .= "From: ".$_POST['f_email']." <".$_POST['f_email'].">\r\n" ;
//            $headers .= "Reply-to: ".$_POST['f_email']." <".$_POST['f_email'].">\r\n" ;
//            $headers .= "X-Priority: 3\r\n" ;
//            $headers .= "X-Mailer: PHP mailer\r\n" ;
//
//            mail($to,$subject,$txt,$headers);
//            echo "<script>alert('Send Mail OK')</script>";
            //echo "<script>console.log('".$mail->ErrorInfo."')</script>";
            #EMAIL--------------------------------------------------




            for($i=0; $i<count($_FILES['f_image']['name']); $i++){

                $filepathcheck = '../fileupload/paytax';
                if (file_exists($filepathcheck)) {
                    //   echo "<script>alert('The file exists')</script>";
                } else {
                    echo "<script>alert('ไม่มีนะ')</script>";
                    mkdir($filepathcheck, 0777, true);
                }

                $filename = $_FILES["f_image"]["name"][$i];
                $ext = end(explode(".", $filename));
                $newname = "Pay_Tax_" . $_POST['id'] . '_' . $i . '.' . $ext;
                $filetmp = $_FILES["f_image"]["tmp_name"][$i];
                $filetype = $_FILES["f_image"]["type"][$i];
                $filepath = "../fileupload/paytax/" . $newname;

                if (move_uploaded_file($filetmp,$filepath)) {

                    $sql = "INSERT INTO tb_files_image(id_image,image_path,image_key) VALUES ('','".$filepath."','".$_POST['f_key']."')";
                    $rs = rsQuery($sql);
                } else {
                    echo "<script>alert('Image not upload.'); </script>";
                }
            }

            $sql = "INSERT INTO tb_paytax(id,postby,id_card,telephone,email,pay_datetime,tax_type,datepost,ip,typewb,status,updatetime,image_key) Values('','".$_POST['f_name']. "','" .$_POST['f_idcard']. "','" .$_POST['f_telephone']. "','" .$_POST['f_email']. "','" .$_POST['f_paydatetime']. "','" .$_POST['f_taxtype']. "','" .$_POST['f_dateInput']. "','" .$_SERVER['REMOTE_ADDR']. "','1','1','0','".$_POST['f_key']."')";
            $rs = rsQuery($sql);
            $num = mysqli_fetch_array($rs);
            $lid = $num['id'];
            if ($rs) {
                $sql2 = "SELECT * FROM tb_paytax ORDER BY id DESC LIMIT 0,1";
                $rss = rsQuery($sql2);
                $num = mysqli_fetch_array($rss);
                $lid = $num['id'];
                echo "<script>alert('สามารถตรวจสอบได้ด้วยเลขที่ชำระภาษี  เลขที่:" .$lid."');window.location.href='paytax';</script>";

            }else{
                echo "<script>alert('Err2'); </script>" ;
            }




        }

    }


}

?>


<?php
$sql = "select * from tb_paytax order by id desc LIMIT 1";
$rs = rsQuery($sql);
$rs->num_rows;
$row = $rs->fetch_assoc();

?>
<center><?php echo '<img src="../../img/qr.png"/>' ?><?php echo '<img width="350px" src="../../img/qr2.png"/>' ?></center>
<center><label style="font-size: 20px;color: red">QR Code / เลขที่บัญชี สำหรับชำระภาษี</label></center>
<div class="container" style="text-align: left;font-size: 20px">
    <div class="col-md-12">

        <form name="form_help" id="form_help" method="POST" action="" enctype="multipart/form-data">

            <input type="hidden"  name="id" id="id" value="<?php $newid = $row['id']+1;  echo $newid; ?>">

            <div class="form-group">
                <div class="col-sm-10">
                    <label class="control-label"><b>วันที่:</b></label>
                    <?php echo date("Y-m-d");?>
                    <input type="hidden" name="f_dateInput" id="f_dateInput" value="<?php echo date("c");?>"
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">

                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    <label class="control-label"><b>ชื่อผู้ชำระภาษี:</b></label>
                    <input style="font-size: 20px;" type="text" class="form-control" id="f_name" name="f_name" required>
                </div>
            </div>
<!--            <div class="form-group">-->
<!--                <div class="col-sm-10">-->
<!--                    <label class="control-label"><b>ที่อยู่:</b></label>-->
<!--                    <input type="text" class="form-control" id="f_address" name="f_address">-->
<!--                </div>-->
<!--            </div>-->

            <div class="form-group">
                <div class="col-sm-10">
                    <label class="control-label"><b>ประเภทภาษี:</b></label>
                    <select style="font-size: 20px;" id="f_taxtype" name="f_taxtype" class="form-control">
                        <option selected>กรุณาเลือก</option>
                        <option value="1">ภาษีที่ดินและสิ่งปลูกสร้าง</option>
                        <option value="2">ภาษีป้าย</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <label class="control-label"><b>เลขบัตรประจำตัวประชาชน:</b></label>
                    <input style="font-size: 20px;" type="text" class="form-control" id="f_idcard" name="f_idcard" onKeyPress="CheckNum()" onkeyup="autoTab2(this,1)" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <label class="control-label"><b>เบอร์ติดต่อ:</b></label>
                    <input style="font-size: 20px;" type="text" class="form-control" id="f_telephone" name="f_telephone" onkeyup="autoTab2(this,2)" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <label class="control-label"><b>อีเมล/Line ID:</b></label>
                    <input style="font-size: 20px;" type="text" class="form-control" id="f_email" name="f_email" required>
                </div>
            </div>


<!--            <h5>ขอยื่นคำร้อง/แจ้งปัญหา</h5>-->
<!---->
<!--            <div class="form-group">-->
<!--                <div class="col-sm-10">-->
<!--                    <label class="control-label"><b>เรื่อง:</b></label>-->
<!--                    <input type="text" class="form-control" id="f_subject" name="f_subject" >-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <div class="col-sm-10">-->
<!--                    <label class="control-label"><b>รายละเอียด:</b></label>-->
<!--                    <textarea type="text" class="form-control" id="f_detail" name="f_detail" ></textarea>-->
<!--                </div>-->
<!--            </div>-->

            <div class="form-group">
                <div class="col-sm-10">
                    <label class="control-label"><b>รูปภาพหลักฐานการชำระภาษี:</b></label>
                    <input type="file"  name="f_image[]" id="f_image[]" multiple required>
                    <input type="hidden"  name="f_key" id="f_key" value="500<?php echo $newid; ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    <label class="control-label"><b>เวลาโอนเงิน(อ้างอิงจากสลิปธนาคาร):</b></label>
                    <input style="font-size: 20px;" type="datetime-local" class="form-control" id="f_paydatetime" name="f_paydatetime" required>
                </div>
            </div>



            <input type="hidden"  name="f_lat" id="f_lat">
            <input type="hidden"  name="f_lng" id="f_lng">

            <div class="form-group">
                <div class="col-sm-10">
                    เงื่อนไข<br>
                    1. กรุณาเช็คข้อมูลการชำระภาษีให้ถูกต้อง<br>
                    2. กรุณาป้อนข้อมูลให้ครบทุกช่อง มิฉะนั้นจะไม่สามารถบันทึกได้<br>
                    3. ข้าพเจ้าขอยืนยันข้อความทั้งหมดเป็นความจริง <br>
                </div>
            </div>


<!--            <div id="map2"></div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <div class="col-sm-10">-->
<!--                    <br>-->
<!--                    <label><b>ค้นหาสถานที่:</b></label>-->
<!--                    <input class="form-control" type="text" name="mapsearch" id="mapsearch">-->
<!--                </div>-->
<!--            </div>-->

    </div>

    <center><button style="font-size: 20px;" type="submit" name="sub" class="btn btn-success">บันทึก</button></center>
    </form>

</div>





<!--<script type = "text/javascript">-->
<!--    jQuery('#datetimepicker').datetimepicker();-->
<!---->
<!--    function checkID(id) {-->
<!--        var cid = id.replace(/-/g, '');-->
<!--        if(cid.length != 13) return false;-->
<!--        for(i=0, sum=0; i < 12; i++)-->
<!--            sum += parseFloat(cid.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(cid.charAt(12)))-->
<!--            return false; return true;-->
<!--    }-->
<!---->
<!--    function validate() {-->
<!---->
<!--        if( document.form_help.f_name.value == "" ) {-->
<!--            alert( "กรุณากรอก ชื่อ-สกุล!" );-->
<!--            document.form_help.f_name.focus() ;-->
<!--            return false;-->
<!--        }-->
<!--        if( document.myForm.frm_tel.value == "" ) {-->
<!--            alert( "กรุณากรอก เบอร์โทรศัพท์ !" );-->
<!--            document.myForm.frm_tel.focus() ;-->
<!--            return false;-->
<!--        }-->
<!--        // if( document.myForm.frm_email.value == "" ) {-->
<!--        //    alert( "กรุณากรอก อีเมล!" );-->
<!--        //    document.myForm.frm_email.focus() ;-->
<!--        //    return false;-->
<!--        // }-->
<!--        // if( document.myForm.frm_province.value == "" ) {-->
<!--        //    alert( "กรุณาเลือก จังหวัด!" );-->
<!--        //    document.myForm.frm_province.focus() ;-->
<!--        //    return false;-->
<!--        // }-->
<!--        // if( document.myForm.frm_amphur.value == "" ) {-->
<!--        //    alert( "กรุณาเลือก อำเภอ!" );-->
<!--        //    document.myForm.frm_amphur.focus() ;-->
<!--        //    return false;-->
<!--        // }-->
<!--        // if( document.myForm.frm_district.value == "" ) {-->
<!--        //    alert( "กรุณาเลือก ตำบล!" );-->
<!--        //    document.myForm.frm_district.focus() ;-->
<!--        //    return false;-->
<!--        // }-->
<!--        // if( document.myForm.frm_moo.value == "" ) {-->
<!--        //    alert( "กรุณากรอก หมู่ที่!" );-->
<!--        //    document.myForm.frm_moo.focus() ;-->
<!--        //    return false;-->
<!--        // }-->
<!--        // if( document.myForm.frm_numhome.value == "" ) {-->
<!--        //    alert( "กรุณากรอก บ้านเลขที่!" );-->
<!--        //    document.myForm.frm_numhome.focus() ;-->
<!--        //    return false;-->
<!--        // }-->
<!--        if( document.form_help.f_idcard.value == "" ) {-->
<!--            alert( "กรุณากรอก เลขบัตรประชาชน!" );-->
<!--            document.form_help.f_idcard.focus() ;-->
<!--            return false;-->
<!--        }else {-->
<!--            if(!checkID(document.form_help.f_idcard.value)){-->
<!--                alert('รหัสประชาชนไม่ถูกต้อง');-->
<!--                document.form_help.f_idcard.focus() ;-->
<!--                return false;-->
<!--            }-->
<!--        }-->
<!--        // if( document.myForm.frm_date_str.value == "" ) {-->
<!--        //    alert( "กรุณาเลือก วันที่มารับ!" );-->
<!--        //    document.myForm.frm_date_str.focus() ;-->
<!--        //    return false;-->
<!--        // }-->
<!--        // if( document.myForm.frm_date_end.value == "" ) {-->
<!--        //    alert( "กรุณาเลือก วันที่นำส่งคืน!" );-->
<!--        //    document.myForm.frm_date_end.focus() ;-->
<!--        //    return false;-->
<!--        // }-->
<!--        // if( document.myForm.frm_for.value == "" ) {-->
<!--        //    alert( "กรุณากรอก จุดประสงค์ในการใช้งาน!" );-->
<!--        //    document.myForm.frm_for.focus() ;-->
<!--        //    return false;-->
<!--        // }-->
<!--        // if( document.myForm.frm_location.value == "" ) {-->
<!--        //    alert( "กรุณากรอก สถานที่ในการรับบริการ!" );-->
<!--        //    document.myForm.frm_location.focus() ;-->
<!--        //    return false;-->
<!--        // }-->
<!---->
<!---->
<!--        return( true );-->
<!--    }-->
<!---->
<!--</script>-->


<!-- รหัสบัตรประชาชน -->
    <script type="text/javascript">
    function autoTab2(obj,typeCheck){
        /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
                หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
                4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
                รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
                หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
                ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
                */
        if(typeCheck==1){
            var pattern=new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
            var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้    
        }else{
            var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้
            var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้                
        }
        var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        for(i=0;i<pattern.length;i++){
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);
        }
    }

    function CheckNum(){
        if (event.keyCode < 48 || event.keyCode > 57){
            event.returnValue = false;
        }
    }
</script>
