<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/mystyle.php">

<script type="text/javascript">



    <?php
    error_reporting(0);
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


    function DateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    function DateThai1($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate))+1;
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    function DateThai2($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate))+2;
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    function DateThai3($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate))+3;
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    function DateThai4($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate))+4;
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }


    ?>

    $(function () {
        // แทรกโค้ต jquery
        $("#dateInput").datepicker({dateFormat: 'yy-mm-dd'});
    });


</script>

<?php

  if(isset($_POST['Submit'])) {

    /*$province=FindRS("SELECT * FROM province WHERE PROVINCE_ID=".$_POST['frm_province'],PROVINCE_NAME);
    $amphur=FindRS("SELECT * FROM amphur WHERE AMPHUR_ID=".$_POST['frm_amphur'],AMPHUR_NAME);
    $district=FindRS("SELECT * FROM district WHERE DISTRICT_ID=".$_POST['frm_district'],DISTRICT_NAME);
    $moo = $_POST['frm_moo'];
*/
      $check = getimagesize($_FILES["frm_image"]["tmp_name"][0]);

                  $sql = "INSERT INTO tb_queue(id,name,tel,email,number,province,amphur,district,moo,num_home,start_date,end_date,for_work,location,lat,lng,post_ip,status,active)
                  Values('','" .$_POST['frm_name']. "','" .$_POST['frm_tel']. "','" .$_POST['frm_email']. "','" .$_POST['frm_number']. "','" .$_POST['frm_province']. "','" .$_POST['frm_amphur']. "'
                    ,'" .$_POST['frm_district']. "','" .$_POST['frm_moo']. "','" .$_POST['frm_numhome']. "'
                  ,'" .$_POST['frm_date_str']. "','" .$_POST['frm_date_end']. "','" .$_POST['frm_for']. "','" .$_POST['frm_location']. "'
                  ,'" .$_POST['frm_lat']. "','" .$_POST['frm_lng']. "','" .$_SERVER['REMOTE_ADDR']. "','1','1')";
                  $rs = rsQuery($sql);

                  $sql2 = "SELECT * FROM $table ORDER BY id DESC LIMIT 0,1";
                  $rss = rsQuery($sql2);
                  $num = mysqli_fetch_array($rss);
                  $lid = $num['id'];
                  $date = date("Y-m-d H:i:s");
                  $receiveno = "400" . $lid;

                for($i=0; $i<count($_POST['frm_ojb']); $i++){
                  $ojb_id = $_POST['frm_ojb'][$i];
                  $num_ojb = $_POST['frm_num'][$i];
                  $sql3 = "INSERT INTO tb_queue_obj(id,object_name,num_object,queue_id)
                  Values('','" .$ojb_id. "','" .$num_ojb. "','" .$lid. "')";
                  $rs = rsQuery($sql3);
                }





//                  include_once("itgmod/sent_email.php");

                  if ($rs) {
                      echo "<script>alert('คิวของคุณถูกจองแล้ว');</script>";
                  }else{
                      echo "<script>alert('มีข้อผิดพลาดในการจองคิว'); </script>" ;
                }


                if ($check !== false){

                            $sql2 = "SELECT * FROM $table ORDER BY id DESC LIMIT 0,1";
                            $rss = rsQuery($sql2);
                            $num = mysqli_fetch_array($rss);
                            $lid = $num['id'];
                            $date = date("Y-m-d H:i:s");

                        for($i=0; $i<count($_FILES['frm_image']['name']); $i++){

                            $filename = $_FILES["frm_image"]["name"][$i];
                            $ext = end(explode(".",$filename));
                            $newname = $table.'_'.$lid.'_'.$i.'.'.$ext;
                            $filetmp = $_FILES["frm_image"]["tmp_name"][$i];
                            $filetype = $_FILES["frm_image"]["type"][$i];
                            $filepath = $part.$newname;

                            if (move_uploaded_file($filetmp,$filepath)) {

                                $sql = "INSERT INTO files_image(id,table_name,master_id,file_name,edit_time)
                                VALUES ('','".$table."','".$lid."','".$newname."','".$date."')";
                                $rs = rsQuery($sql);

                            } else {
                                echo "<script>alert('มีข้อผิดพลาดจากการอัพรูปภาพ.'); </script>";
                            }
                        }
                    }

  }

  ?>


<style>
    body {
        font-family:THSarabunNew;
    }
    h1,h2,h3,h4,h5{
        font-family:THSarabunNew;
    }
    .center {
        margin: auto;
        width: 70%;
        border: 3px solid #fcdee2;
        padding: 10px;
    }
</style>

<div>



<!-- Main -->
  <section style="width: 80%;" class="center">
    <div class="inner">
      <div class="content">
          <!-- Heading -->
          <div id="heading" >
              <h1>ระบบจองคิวออนไลน์</h1>
          </div>

        <div class="row">
          <div class="col-12 col-12-medium">

              <form method="post" action="#" onsubmit="return(validate());" name="myForm" enctype="multipart/form-data">
                <div class="row gtr-uniform">
                  <!-- Break -->
                  <div class="col-12 col-12-xsmall">
                    <h3>ข้อมูลผู้จอง</h3>
                  </div>
                  <div class="col-5 col-5-xsmall" style="margin: 0 auto;">
                    <input style="font-size: 20px" class="form-control" type="text" name="frm_name" id="frm_name" value="" placeholder="ชื่อ-สกุล" />
                  </div>
                  <div class="col-5 col-5-xsmall" style="margin: 0 auto">
                    <input style="font-size: 20px" class="form-control" type="text" name="frm_tel" id="frm_tel" value="" placeholder="เบอร์โทรศัพท์" onkeyup="autoTab2(this,2)"/>
                  </div>
<!--                  <div class="col-6 col-12-xsmall">-->
<!--                    <input class="form-control" type="email" name="frm_email" id="frm_email" value="" placeholder="อีเมล" />-->
<!--                  </div>-->
                  <!-- Break -->
                  <!-- Break -->
                  <div class="col-12 col-12-xsmall">
                    <h3>เลขบัตรประชาชน</h3>
                  </div>
<!--                  <div class="col-3 col-12-xsmall">-->
<!--                    <select name="frm_province" id="frm_province">-->
<!--                      <option value="">- จังหวัด -</option>-->
<!--                    --><?php
//                      $sql = "SELECT * FROM province";
//                      $rs = rsQuery($sql);
//                      while ($row = mysqli_fetch_array($rs)) {
//                        echo "<option value=".$row['PROVINCE_ID'].">".$row['PROVINCE_NAME']."</option>";
//                      }
//                    ?>
<!--                    </select>-->
<!--                  </div>-->
<!--                  <div class="col-3 col-12-xsmall">-->
<!--                    <select name="frm_amphur" id="frm_amphur">-->
<!--                      <option value="">- อำเภอ -</option>-->
<!--                    </select>-->
<!--                  </div>-->
<!--                  <div class="col-2 col-12-xsmall">-->
<!--                    <select name="frm_district" id="frm_district">-->
<!--                      <option value="">- ตำบล -</option>-->
<!--                    </select>-->
<!--                  </div>-->
<!--                  <div class="col-2 col-12-xsmall">-->
<!--                    <input type="text" name="frm_moo" id="frm_moo" value="" placeholder="หมู่ที่" />-->
<!--                  </div>-->
<!--                  <div class="col-2 col-12-xsmall">-->
<!--                    <input type="text" name="frm_numhome" id="frm_numhome" value="" placeholder="บ้านเลขที่" />-->
<!--                  </div>-->
                  <!-- Break -->

                  <!-- Break -->
                  <div class="col-5 col-5-xsmall" style="margin: 0 auto">
<!--                    <label>เลขบัตรประชาชน</label>-->
                    <input style="font-size: 20px" class="form-control" type="text" name="frm_number" id="frm_number" placeholder="เลขบัตรประชาชน" onKeyPress="CheckNum()" onkeyup="autoTab2(this,1)"></input>
                  </div>
<!--                  <div class="col-6 col-12-xsmall">-->
<!--                    <label>แนบไฟล์บัตรประชาชน</label>-->
<!--                    <input type="file" name="frm_image[]" id="frm_image[]" ></input>-->
<!--                  </div>-->
                  <!-- Break -->

                  <!-- Break -->
                  <div class="col-12 col-12-xsmall" style="margin:2% auto">
                    <h3>มีความประสงค์ขอจองคิวรับบริการเรื่อง</h3>
                  </div>
                  <div class="col-4 col-12-small" style="margin: 0 auto">
                      <select style="font-size: 20px" class="form-control" name="frm_ojb[0]" id="frm_ojb[0]">
                        <option value="">- กรุณาเลือก -</option>
                      <?php
                        $sql = "SELECT * FROM tb_object";
                        $rs = rsQuery($sql);
                        while ($row = mysqli_fetch_array($rs)) {
                          echo "<option value=".$row['object'].">".$row['object']."</option>";
                        }
                      ?>
                      </select>
                  </div>
<!--                  <div class="col-2 col-12-xsmall">-->
<!--                    <input type="text" name="frm_num[0]" id="frm_num[0]" placeholder="จำนวน"/>-->
<!--                  </div>-->
<!--                  <div class="col-12 col-12-small" style="padding:0px"></div>-->
<!---->
<!--                  <div class="col-4 col-12-small">-->
<!--                    <select name="frm_ojb[1]" id="frm_ojb[1]">-->
<!--                      <option value="">- กรุณาเลือก -</option>-->
<!--                    --><?php
//                      $sql = "SELECT * FROM tb_object";
//                      $rs = rsQuery($sql);
//                      while ($row = mysqli_fetch_array($rs)) {
//                        echo "<option value=".$row['object'].">".$row['object']."</option>";
//                      }
//                    ?>
<!--                    </select>-->
<!--                  </div>-->
<!--                  <div class="col-2 col-12-xsmall">-->
<!--                    <input type="text" name="frm_num[1]" id="frm_num[1]" placeholder="จำนวน"/>-->
<!--                  </div>-->
<!--                  <div class="col-12 col-12-small" style="padding:0px"></div>-->
<!---->
<!--                  <div class="col-4 col-12-small">-->
<!--                    <input type="text" name="frm_ojb[2]" id="frm_ojb[2]" placeholder="อื่น ๆ"/>-->
<!--                  </div>-->
<!--                  <div class="col-2 col-12-xsmall">-->
<!--                    <input type="text" name="frm_num[2]" id="frm_num[2]" placeholder="จำนวน"/>-->
<!--                  </div>-->
<!--                  <div class="col-12 col-12-small" style="padding:0px"></div>-->
                  <!-- Break -->

                  <!-- Break -->
                  <div class="col-12 col-12-small" style="padding:0px"></div>
                  <div class="col-6 col-12-xsmall">
                      <h5><label>วันที่จะมารับบริการ</label></h5>
                    <input style="font-size: 20px" class="form-control" type="date" name="frm_date_str" id="frm_date_str" format="MM/DD/YYYY" placeholder="MM/DD/YYYY" value="<?php echo date("Y-m-j"); ?>"/>
                  </div>
                      <div class="col-6 col-12-small" style="margin: 0 auto">
                          <h5><label>เวลา</label></h5>
                          <select style="font-size: 20px" class="form-control" name="frm_date_end" id="frm_date_end">
                              <option value="">- กรุณาเลือก -</option>
                              <?php
                              $sql = "SELECT * FROM tb_time";
                              $rs = rsQuery($sql);
                              while ($row = mysqli_fetch_array($rs)) {
                                      echo "<option disable value=" . $row['time'] . ">" . $row['time'] .  " น.</option>";
                              }


                              ?>
                              <script>
                                  const picker = document.getElementById('frm_date_str');
                                  picker.addEventListener('input', function(e){
                                      var day = new Date(this.value).getUTCDay();
                                      if([6,0].includes(day)){
                                          e.preventDefault();
                                          this.value = '';
                                          alert('ปิดทำการวันเสาร์-อาทิตย์ กรุณาเลือกวัน-เวลาราชการ');
                                      }
                                  });
                              </script>
                          </select>
                      </div>
<!--                    <input class="form-control" type="time" name="frm_date_end" id="frm_date_end" />-->
                  </div>
                  <!-- Break -->

                  <!-- Break -->
<!--                  <div class="col-6 col-12-xsmall">-->
<!--                    <input type="text" name="frm_for" id="frm_for" placeholder="เพื่อนำไปใช้ในงาน"/>-->
<!--                  </div>-->
<!--                  <div class="col-6 col-12-xsmall">-->
<!--                    <input type="text" name="frm_location" id="frm_location" placeholder="จัดอยู่ที่"/>-->
<!--                  </div>-->
                  <!-- Break -->




                  <!-- Break -->
<!--                  <div class="col-12 col-12-xsmall">-->
<!--                    <h3>แผนที่จัดงาน</h3>-->
<!--                    <div class="row">-->
<!--                        <div class="col-4">-->
<!--                        </div>-->
<!--                        <div class="col-4">-->
<!--                          <input class="form-control" type="text" name="mapsearch" placeholder="ค้นหาสถานที่" id="mapsearch">-->
<!--                        </div>-->
<!--                        <div class="col-4">-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-12 col-12-xsmall" style="padding: 0px; border: solid 1px; border-color: rgba(0, 0, 0, 0.25); margin: 10px 0px 10px 40px;">-->
<!--                    <div id="map2"></div>-->
<!--                  </div>-->
                  <!-- Break -->

                  <!-- Break -->
<!--                  <input type="hidden" name="frm_lat" id="frm_lat"/>-->
<!--                  <input type="hidden" name="frm_lng" id="frm_lng"/>-->
                  <!-- Break -->

<!--                    <div style="height: 500px">-->
<!--                        <div class="row" style="margin-top: 2%">-->
<!--                        <div class="col-1 col-1-xsmall" style="background-color: green">-->
<!--                            <label>8:30</label>-->
<!--                            <input class="form-control" type="time" name="frm_date_end" id="frm_date_end" />-->
<!--                        </div>-->
<!--                        <div class="col-1 col-1-xsmall" style="background-color: green">-->
<!--                            <label>9:00</label>-->
<!--                            <input class="form-control" type="time" name="frm_date_end" id="frm_date_end" />-->
<!--                        </div>-->
<!--                        <div class="col-1 col-1-xsmall" style="background-color: green">-->
<!--                            <label>9:30</label>-->
<!--                            <input class="form-control" type="time" name="frm_date_end" id="frm_date_end" />-->
<!--                        </div>-->
<!--                        <div class="col-1 col-1-xsmall" style="background-color: green">-->
<!--                            <label>10:00</label>-->
<!--                            <input class="form-control" type="time" name="frm_date_end" id="frm_date_end" />-->
<!--                        </div>-->
<!--                        <div class="col-1 col-1-xsmall" style="background-color: green">-->
<!--                            <label>10:30</label>-->
<!--                            <input class="form-control" type="time" name="frm_date_end" id="frm_date_end" />-->
<!--                        </div>-->
<!--                        <div class="col-1 col-1-xsmall" style="background-color: green">-->
<!--                            <label>11:00</label>-->
<!--                            <input class="form-control" type="time" name="frm_date_end" id="frm_date_end" />-->
<!--                        </div>-->
<!--                        </div>-->
<!--                    </div>-->

                  <div class="col-4" style="margin:2% auto;" >
                    <ul class="actions">
                      <input style="font-size: 20px;cursor: pointer" class="form-control bg-success" type="submit" name="Submit" value="ยืนยันจองคิว" class="primary" /></li>
                     <input style="font-size: 20px;cursor:pointer;" class="form-control bg-warning" type="reset" value="ล้างข้อมูล" /></li>
                    </ul>
                  </div>
                </div>
              </form>
          </div>
        </div>
        <div class="col-10 col-10-xsmall" style="margin:2% auto">
            <h3>คิวจองวันที่  <?php echo DateThai(date('Y')) ?></h3>
        </div>
        <table id="example" class="table table-striped table-bordered col-12" style="width:100%;font-size: 16px">
            <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อผู้จอง</th>
                <th>วันที่</th>
                <th>เวลา</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM tb_queue WHERE start_date = curdate() ORDER BY id DESC";
            $rs = rsQuery($sql);
            $n=1;

            while ($row = mysqli_fetch_array($rs)){
                $status = FindRS("select * from tb_status where id=".$row['status'],"status");
                echo '<tr>
                              <td style="width:10%">'.$n.'</td>
                              <td style="width:50%">'.$row["name"].'</td>
                              <td style="width:10%">'.DateThai($row["start_date"]).'</td>
                              <td style="width:10%">'.$row["end_date"].'</td>
                     </tr>';
                $n++;
            }
            ?>
            </tbody>
        </table>
        <div class="col-10 col-10-xsmall" style="margin:2% auto">
            <h3>คิวจองวันที่ <?php $date = strtotime("+1 day"); echo DateThai1(date('Y', $date)); ?></h3>
        </div>
        <table id="example" class="table table-striped table-bordered col-12" style="width:100%;font-size: 16px">
            <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อผู้จอง</th>
                <th>วันที่</th>
                <th>เวลา</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM tb_queue WHERE start_date = curdate() +interval 1 day ORDER BY id DESC";
            $rs = rsQuery($sql);
            $n=1;

            while ($row = mysqli_fetch_array($rs)){
                $status = FindRS("select * from tb_status where id=".$row['status'],"status");
                echo '<tr>
                              <td style="width:10%">'.$n.'</td>
                              <td style="width:50%">'.$row["name"].'</td>
                              <td style="width:10%">'.DateThai($row["start_date"]).'</td>
                              <td style="width:10%">'.$row["end_date"].'</td>
                     </tr>';
                $n++;
            }
            ?>
            </tbody>
        </table>
        <div class="col-10 col-10-xsmall" style="margin:2% auto">
            <h3>คิวจองวันที่ <?php $date = strtotime("+2 day"); echo DateThai2(date('Y', $date)); ?></h3>
        </div>
        <table id="example" class="table table-striped table-bordered col-12" style="width:100%;font-size: 16px">
            <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อผู้จอง</th>
                <th>วันที่</th>
                <th>เวลา</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM tb_queue WHERE start_date = curdate() +interval 2 day ORDER BY id DESC";
            $rs = rsQuery($sql);
            $n=1;

            while ($row = mysqli_fetch_array($rs)){
                $status = FindRS("select * from tb_status where id=".$row['status'],"status");
                echo '<tr>
                              <td style="width:10%">'.$n.'</td>
                              <td style="width:50%">'.$row["name"].'</td>
                              <td style="width:10%">'.DateThai($row["start_date"]).'</td>
                              <td style="width:10%">'.$row["end_date"].'</td>
                     </tr>';
                $n++;
            }
            ?>
            </tbody>
        </table>
        <div class="col-10 col-10-xsmall" style="margin:2% auto">
            <h3>คิวจองวันที่ <?php $date = strtotime("+3 day"); echo DateThai3(date('Y', $date)); ?></h3>
        </div>
        <table id="example" class="table table-striped table-bordered col-12" style="width:100%;font-size: 16px">
            <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อผู้จอง</th>
                <th>วันที่</th>
                <th>เวลา</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM tb_queue WHERE start_date = curdate() +interval 3 day ORDER BY id DESC";
            $rs = rsQuery($sql);
            $n=1;

            while ($row = mysqli_fetch_array($rs)){
                $status = FindRS("select * from tb_status where id=".$row['status'],"status");
                echo '<tr>
                              <td style="width:10%">'.$n.'</td>
                              <td style="width:50%">'.$row["name"].'</td>
                              <td style="width:10%">'.DateThai($row["start_date"]).'</td>
                              <td style="width:10%">'.$row["end_date"].'</td>
                     </tr>';
                $n++;
            }
            ?>
            </tbody>
        </table>
        <div class="col-10 col-10-xsmall" style="margin:2% auto">
            <h3>คิวจองวันที่ <?php $date = strtotime("+4 day"); echo DateThai4(date('Y', $date)); ?></h3>
        </div>
        <table id="example" class="table table-striped table-bordered col-12" style="width:100%;font-size: 16px">
            <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อผู้จอง</th>
                <th>วันที่</th>
                <th>เวลา</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM tb_queue WHERE start_date = curdate() +interval 4 day ORDER BY id DESC";
            $rs = rsQuery($sql);
            $n=1;

            while ($row = mysqli_fetch_array($rs)){
                $status = FindRS("select * from tb_status where id=".$row['status'],"status");
                echo '<tr>
                              <td style="width:10%">'.$n.'</td>
                              <td style="width:50%">'.$row["name"].'</td>
                              <td style="width:10%">'.DateThai($row["start_date"]).'</td>
                              <td style="width:10%">'.$row["end_date"].'</td>
                     </tr>';
                $n++;
            }
            ?>
            </tbody>
        </table>
        </div>
    </div>
  </section>
</div>

  <script type = "text/javascript">
      jQuery('#datetimepicker').datetimepicker();

        function checkID(id) {
        var cid = id.replace(/-/g, '');
        if(cid.length != 13) return false;
        for(i=0, sum=0; i < 12; i++)
        sum += parseFloat(cid.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(cid.charAt(12)))
        return false; return true;
      }

        function validate() {

           if( document.myForm.frm_name.value == "" ) {
              alert( "กรุณากรอก ชื่อ-สกุล!" );
              document.myForm.frm_name.focus() ;
              return false;
           }
           if( document.myForm.frm_tel.value == "" ) {
              alert( "กรุณากรอก เบอร์โทรศัพท์ !" );
              document.myForm.frm_tel.focus() ;
              return false;
           }
           // if( document.myForm.frm_email.value == "" ) {
           //    alert( "กรุณากรอก อีเมล!" );
           //    document.myForm.frm_email.focus() ;
           //    return false;
           // }
           // if( document.myForm.frm_province.value == "" ) {
           //    alert( "กรุณาเลือก จังหวัด!" );
           //    document.myForm.frm_province.focus() ;
           //    return false;
           // }
           // if( document.myForm.frm_amphur.value == "" ) {
           //    alert( "กรุณาเลือก อำเภอ!" );
           //    document.myForm.frm_amphur.focus() ;
           //    return false;
           // }
           // if( document.myForm.frm_district.value == "" ) {
           //    alert( "กรุณาเลือก ตำบล!" );
           //    document.myForm.frm_district.focus() ;
           //    return false;
           // }
           // if( document.myForm.frm_moo.value == "" ) {
           //    alert( "กรุณากรอก หมู่ที่!" );
           //    document.myForm.frm_moo.focus() ;
           //    return false;
           // }
           // if( document.myForm.frm_numhome.value == "" ) {
           //    alert( "กรุณากรอก บ้านเลขที่!" );
           //    document.myForm.frm_numhome.focus() ;
           //    return false;
           // }
           if( document.myForm.frm_number.value == "" ) {
              alert( "กรุณากรอก เลขบัตรประชาชน!" );
              document.myForm.frm_number.focus() ;
              return false;
           }else {
             if(!checkID(document.myForm.frm_number.value)){
             alert('รหัสประชาชนไม่ถูกต้อง');
             document.myForm.frm_number.focus() ;
             return false;
           }
           }
           // if( document.myForm.frm_date_str.value == "" ) {
           //    alert( "กรุณาเลือก วันที่มารับ!" );
           //    document.myForm.frm_date_str.focus() ;
           //    return false;
           // }
           // if( document.myForm.frm_date_end.value == "" ) {
           //    alert( "กรุณาเลือก วันที่นำส่งคืน!" );
           //    document.myForm.frm_date_end.focus() ;
           //    return false;
           // }
           // if( document.myForm.frm_for.value == "" ) {
           //    alert( "กรุณากรอก จุดประสงค์ในการใช้งาน!" );
           //    document.myForm.frm_for.focus() ;
           //    return false;
           // }
           // if( document.myForm.frm_location.value == "" ) {
           //    alert( "กรุณากรอก สถานที่ในการรับบริการ!" );
           //    document.myForm.frm_location.focus() ;
           //    return false;
           // }


           return( true );
        }

  </script>





  <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#frm_province').change(function() {
                    $.ajax({
                        type: 'POST',
                        data: {data: $(this).val()},
                        url: 'modules/test/select.php',
                        success: function(data) {
                            $('#frm_amphur').html(data);
                        }
                    });
                    return false;
                });

                $('#frm_amphur').change(function() {
                    $.ajax({
                        type: 'POST',
                        data: {data2: $(this).val()},
                        url: 'modules/test/select.php',
                        success: function(data) {
                            $('#frm_district').html(data);
                        }
                    });
                    return false;
                });

            });
        </script>


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
