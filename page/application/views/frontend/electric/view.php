<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<style>

    * {
        box-sizing: border-box;
    }


        /* The grid: Four equal columns that floats next to each other */
    .column {
        float: left;
        width: 20%;
        padding: 10px;
    }


    /* Style the images inside the grid */
    .column img {
        opacity: 0.8;
        cursor: pointer;
    }

    .column img:hover {
        opacity: 1;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }


    /* Expanding image text */
    #imgtext {
        position: absolute;
        bottom: 15px;
        left: 15px;
        color: white;
        font-size: 20px;
    }

    /* Closable button inside the expanded image */
    .closebtn {
        position: absolute;
        top: 10px;
        right: 15px;
        color: rgb(255, 249, 255);
        font-size: 45px;
        cursor: pointer;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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



$parts = explode('/', $_SERVER['REQUEST_URI']);
$last = end($parts);


$sql = "Select * From tb_electric Where id='" . $last . "'";
$rs = rsQuery($sql);
$row = mysqli_fetch_array($rs);
$processname = FindRS("select * from tb_electric_process where id=" . $row['typewb'], "name");


$sql1 = "Select * From tb_files_image_electric Where image_key='" . $row['image_key'] . "'";
$rs1 = rsQuery($sql1);
?>

<div class="container-fluid" style="margin-left: 18%;font-size: 22px">
    <div class="panel panel-default col-md-8" style="border: solid 1px #c3c3c3;border-radius: 12px">
        <h2>แจ้งซ่อมไฟฟ้าสาธารณะ</h2>
        <div class="panel-body">
            <p>เลขคำร้อง : <?php echo $row['id']; ?></p>
            <p>วันที่แจ้ง : <?php echo DateTimeThai($row['datepost']); ?> น.</p>
            <p>เรื่อง : <?php echo $row['subject']; ?></p>
            <p>รายละเอียด : <?php echo $row['detail']; ?></p>
            <p>ชื่อผู้แจ้ง : <?php echo $row['postby']; ?></p>
            <p>ที่อยู่แจ้งซ่อม : <?php echo $row['address']; ?></p>
            <p>สถานะ : <?php echo $processname; ?></p>
            <p>ผลการดำเนินการ : </p>
            <p><font style="background-color: orange;font-size: 2.0rem"> <?php echo $row['result']; ?></font></p> <br>
        </div>
    </div>


    <!-- The four columns -->
    <div class="row col-md-12">
        <?php
        while ($row1 = $rs1->fetch_assoc()) {
            echo '<div class="column">';
          //  echo '<a href="'.$row1['image_path'].'" target="_blank">';
            echo '<img onclick="myFunction(this);" style="border: 1px solid #ddd; border-radius: 4px;
        padding: 5px; width: 100px; height:auto;" src= "'.base_url(''.$row1['image_path'].'').'"></a>';
            echo '</div>';

        }
        ?>
    </div>


    <div class="row col-md-12">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
        <img id="expandedImg" style="width:100%">
        <div id="imgtext"></div>
    </div>


    <div class="col-md-12" style="margin-bottom: 3%">
        <br>
        <center><a style="font-size: " class="btn btn-default" HREF="javascript:history.back()">ย้อนกลับ</a></center>
    </div>


</div>


<script>
    function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        expandImg.parentElement.style.display = "block";
    }
</script>
