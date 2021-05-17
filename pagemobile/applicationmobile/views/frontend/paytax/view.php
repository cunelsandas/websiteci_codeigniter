

<style>
    * {
        box-sizing: border-box;
    }

     body{
         font-family: THK2DJuly8;
         font-size: 14px;
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

$sql="Select * From tb_paytax Where id='" . $last . "'";
$rs=rsQuery($sql);
$row=mysqli_fetch_array($rs);
$processname=FindRS("select * from tb_paytax_status where id=".$row['typewb'],"name");


$sql1="Select * From tb_files_image Where image_key='".$row['image_key']."'";
$rs1=rsQuery($sql1);
?>

<div class="container">
    <div class="panel panel-default col-md-8" style="border: solid 1px #c3c3c3;border-radius: 12px;">
        <h2>ข้อมูลการชำระภาษี</h2>
        <div style="font-size: 20px" class="panel-body">
            <p>เลขที่ชำระภาษี : <?php echo $row['id'];?></p>
            <p>วันที่แจ้ง : <?php echo DateTimeThai($row['datepost']);?></p>
            <p>ประเภทภาษี : <?php if($row['tax_type']==0) {
                    echo "<td>" . 'ไม่เลือกประเภท' . "</td>";
                }
                elseif ($row['tax_type']==1){
                    echo "<td>" . 'ภาษีที่ดินและสิ่งปลูกสร้าง' . "</td>";
                }
                elseif ($row['tax_type']==2){
                    echo "<td>" . 'ภาษีป้าย' . "</td>";
                } ?></p>
            <p>สถานะ : <?php
                if($row['typewb'] == 2) {
                    echo "<b style='background-color:forestgreen;'>" . $processname . "</b>";
                }
                elseif ($row['typewb'] == 1){
                    echo "<b style='background-color:orange'>" . $processname . "</b>";
                }
                ?>
            </p>
        </div>
    </div>



    <!-- The four columns -->
    <div class="row col-md-8">
        <?php
//        while ($row1 = $rs1->fetch_assoc()){
//            echo '<div class="column">';
//            //echo '<a href="'.$row1['image_path'].'" target="_blank">';
//            echo '<img onclick="myFunction(this);" style="border: 1px solid #ddd; border-radius: 4px;
//        padding: 5px; width: 100px; height:auto;" src="'.$row1['image_path'].'"></a>';
//            echo '</div>';
//        }
//        ?>
    </div>


    <div class="row col-md-8">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
        <img id="expandedImg" style="width:100%">
        <div id="imgtext"></div>
    </div>


        <div class="col-md-8">
            <br>
            <center><A class="btn btn-default" HREF="javascript:history.back()">ย้อนกลับ</A></center>
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
