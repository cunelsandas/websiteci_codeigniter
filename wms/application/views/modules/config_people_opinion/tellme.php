

<style>



</style>

<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$parts = explode('/', $_SERVER['REQUEST_URI']);

$last = end($parts);

$last = $row['id'];



$modid=$_GET['_modid'];

empty($_GET['type']) ? $type = "" : $type = $_GET['type'];


$tablename = "tb_people_opinion";



empty($_GET['type']) ? $type = "" : $type = $_GET['type'];



if ($type == "addnews") {             //ตรวจสอบก่อนว่ามีการตั้งค่าของ $_GET['type'] เป็นการเพิ่มข่าวใหม่หรือเปล่า

    include("tellme_add.php");

} elseif ($type == "view") {         //ตรวจสอบก่อนว่ามีการตั้งค่าของ $_GET['type'] เป็นการดูรายละเอียดข่าวสารหรือเปล่า

    include("tellme_view.php");

} else {





    if(isset($_GET['status'])){

        $sql="UPDATE $tablename SET status='".$_GET['status']."' Where id='".$_GET['no']."'";

        $rs=rsQuery($sql);

        if($rs){

            echo"<script>window.location.href='tellme?_modid=".$modid."&_mod=".$_GET['_mod']."';</script>";

        }

    }



    if (isset($_GET['del'])) {

        $sql = "DELETE From $tablename Where id='" . $_GET['del'] . "'";

        $rs = rsQuery($sql);

        if ($rs) {

            // update table tb_trans บันทึกการลบ

            $updatetran = UpdateTrans('$tablename', 'delete', $_SESSION['username'], 'ID:' . $id);

            echo "<script>window.location.href='tellme?_modid=" . $modid . "&_mod=" . $_GET['_mod'] . "';</script>";

        }

    }



    function Status($status)

    {

        $btn = 'btn-primary';

        $like = '<i class="fa fa-thumbs-o-up"></i>';

        if ($status == 0) {

            $btn = 'btn-danger';

            $like = '<i class="fa fa-thumbs-o-down"></i>';

        }

        $data = ['btn' => $btn, 'like' => $like];

        return $data;

    }





    ?>

<div class="card card-shadow" id="CardDetail">

    <div class="card-header">

        <div class="row">

            <div class="col-lg-12">

                <h4><?php $head ="ช่องทางแสดงความคิดเห็นของประชาชน";

                    echo $head; ?></h4>

            </div>

        </div>

    </div>

    <div class="card-body">

        <div class="row mb-2">

            <div class="col-lg-9">

                <a class="btn btn-primary btn-sm text-white"><i class="fa fa-thumbs-o-up"></i></a> = active :

                <a class="btn btn-danger btn-sm text-white"><i class="fa fa-thumbs-o-down"></i></a> = not active

            </div>

        </div>

    <div>

    </div>

    </div>



        <div class="row mb-2">

            <div class="col-lg-12">

                <div class="input-group">



                </div>

            </div>

        </div>

        <div id="div-show" data-site=""></div>

        <div id="div-modal"></div>

        <table id="example" class="table table-striped" style="width:100%">

            <thead>

            <tr class="text-center">

                <th>ลำดับ</th>

                <th>วันที่</th>

                <th>ชื่อผู้แสดงความคิดเห็น</th>

                <th>ขั้นตอน</th>

                <th>จัดการ</th>

            </tr>

            </thead>

            <tbody>

            <?php



            $sql = "select * from tb_people_opinion";

            $rs = rsQuery($sql);

            $n = 0;



            if ($rs->num_rows > 0) {

                    while ($row = $rs->fetch_assoc()) {

                    $processname = FindRS("select * from tb_helpme_process where id=" . $row['typewb'], "name");

                    $n = $n + 1;

                    echo "<tr><td class='text-center' width='50px'>" . $n . "</td>";

                    echo "<td class='text-center' width='120px'>" . DateThaiNa($row ['datepost']). "</td>";

                    echo "<td>" . $row['postby'] . "</td>";

                        echo "<td width='200px'>" . $processname . "</td>";


//                    echo "<td width='50' align=center>";
//
//                        if($row['status']=="0"){
//
//                            echo"<a class=\"btn btn-danger btn-sm text-white\" href=\"tellme?_modid=".$modid."&_mod=".$_GET['_mod']."&status=1&no=".$row['id']."\"><i class=\"fa fa-thumbs-o-down\"></i></a>";
//
//                        }else{
//
//                            echo"<a class=\"btn btn-primary btn-sm text-white\" href=\"tellme?_modid=".$modid."&_mod=".$_GET['_mod']."&status=0&no=".$row['id']."\"><i class=\"fa fa-thumbs-o-up\"></i></a>";
//
//                        }
//
//                        echo "</td>";

                       echo "<td width='100px' align=\"center\"><a class=\"btn btn-warning btn-sm text-white\" href=\"view/". $row['id'] . "\">
<i class=\"fa fa-edit btn-add\"></i>
</a>&nbsp;&nbsp;&nbsp;<a class=\"btn btn-danger btn-sm text-white\" href=\"tellme?_modid=" . $modid . "&_mod=" . $_GET['_mod'] . "&del=" . $row['id'] . "\" onclick=\"return confirm('คุณต้องการลบคำร้องนี้หรือไม่?');\">
 <i class=\"fa fa-trash-o btn-remove\"></i></td>";
                }

            }

            ?>

            </tbody>

        </table>

    </div>

    <?php

}

?>



<script>

    $(document).ready(function () {

        $('#example').DataTable();

    });

</script>

