<?php

$mod_id =  $_GET["_modid"] ;
$id =  $_GET["id"] ;
$modname=FindRS("select modname from tb_mod where modid=$mod_id","modname");
$tablename=FindRS("select tablename from tb_mod where modid=$mod_id","tablename");
$filename=FindRS("select foldername from tb_mod where modid=$mod_id","foldername");






if(isset($_POST['action'])) {

    //----------------- -Delete- ---------------

    if ($_POST['action'] == "remove_file") {

        $sqls = "select * from $tablename where id = " . $_POST['id'];
        $rss = rsQuery($sqls);
        $row1 = mysqli_fetch_array($rss);

        $sql = "delete from $tablename where id =" . $_POST['id'];
        $rs = rsQuery($sql);

        $sql = "delete from tb_request where master_id =" . $_POST['id'] . " and table_name = '".$tablename."'";
        $rs = rsQuery($sql);

        //$sql2 = "delete from files_image where master_id = ".$_POST['id']." and table_name = '". $tablename."'";
        $sql2 = "select * from files_image where master_id = ".$_POST['id']." and table_name = '". $tablename."'";
        $rs2  = rsQuery($sql2);


        while ($row2 = mysqli_fetch_array($rs2)) {
            $path = $path_image.$row2['file_name'];
            unlink($path);
            $sql = "delete from files_image where master_id = ".$_POST['id']." and table_name = '". $tablename."'";
            $rs = rsQuery($sql);
        };

        echo "ลบข้อมูลเรียบร้อยแล้วค่ะ!";

        //----------------- -remove_im- ---------------
    }elseif ($_POST['action'] == "remove_queue") {

        $sqls = "select * from tb_queue where id = " . $_POST['id'];
        $rss = rsQuery($sqls);
        $row1 = mysqli_fetch_array($rss);

        $sql2 = "delete from tb_queue_obj where queue_id = " . $row1['id'];
        $rs2 = rsQuery($sql2);

        $sql = "delete from tb_queue where id =" . $_POST['id'];
        $rs = rsQuery($sql);

        $sql = "delete from tb_request where master_id =" . $_POST['id'] . " and table_name = '".$tablename."'";
        $rs = rsQuery($sql);

        $sql2 = "select * from files_image where master_id = ".$_POST['id']." and table_name = '". $tablename."'";
        $rs2  = rsQuery($sql2);

        while ($row2 = mysqli_fetch_array($rs2)) {
            $path = $path_image.$row2['file_name'];
            unlink($path);
            $sql = "delete from files_image where master_id = ".$_POST['id']." and table_name = '". $tablename."'";
            $rs = rsQuery($sql);
        };

        echo "ลบข้อมูลเรียบร้อยค่ะ";

        //----------------- -remove_im- ---------------
    }elseif ($_POST['action'] == "remove_file_queue_ojb") {


        $sql = "delete from tb_object where id = " .$_POST['id'];
        $rs = rsQuery($sql);


        echo "ลบข้อมูลบริการเรียบร้อยค่ะ";

    }elseif ($_POST['action'] == "remove_file_queue_ojb2") {


        $sql3 = "delete from tb_time where id = " .$_POST['id'];
        $rs = rsQuery($sql3);


        echo "ลบข้อมูลเวลาเรียบร้อยค่ะ";

        //----------------- -remove_im- ---------------
    }elseif ($_POST['action'] == "remove_file_ask") {

        $sql = "delete from $tablename where id =" . $_POST['id'];
        $rs = rsQuery($sql);

        $sql = "delete from tb_request where master_id =" . $_POST['id'] . " and table_name = '".$tablename."'";
        $rs = rsQuery($sql);

        /*$sql2 = "select * from files_image where master_id = ".$_POST['id']." and table_name = '". $tablename."'";
        $rs2  = rsQuery($sql2);


        while ($row2 = mysqli_fetch_array($rs2)) {
            $path = $path_image.$row2['file_name'];
            unlink($path);
            $sql = "delete from files_image where master_id = ".$_POST['id']." and table_name = '". $tablename."'";
            $rs = rsQuery($sql);
        };*/

        echo "ลบข้อมูลเรียบร้อยแล้วค่ะ!";

        //----------------- -remove_im- ---------------
    }else{
        echo "action Null.";
    }
}else{
    echo "Not action.";
}
?>
