<script type="text/javascript" src="../../../../assets/plugin/dataTable/js/jquery.dataTables.min.js"></script>
<style>
    body {
        font-family: "FC Lamoon",Serif;
        font-size: 16px;
    }
     i{
         width: 25px;
         height: 25px;
     }
    .table td,.table th{
        border-top: none;
        padding: .55rem;
    }
    .table thead th{
        border-bottom: 1px solid;
        border-top: 1px solid;
    }
    @media only screen and (max-width: 600px) {
        * {
            font-size: 14px;
        }
    }
</style>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<div id="helpme">


    <div class="container">

        <div class="card card-shadow">
            <div class="card-header">

                <center><div align="top center"><?php echo"<a style='font-size:22px' class='btn btn-info' href='add'>แจ้งปัญหา/เรื่องร้องเรียน</a>";?></div></center><br>
                <br>
                <div style="font-size: 20px">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>วันที่</th>
                            <th>เรื่อง</th>
                            <th>สถานะ</th>
                            <th>แสดงข้อมูล</th>
                        </tr>
                        </thead>
                        <tbody>
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

                        $sql = "select * from tb_help_maps WHERE status='1'";
                        $rs = rsQuery($sql);
                        $n = 0;


                        if ($rs->num_rows > 0) {

                            while ($row = $rs->fetch_assoc()) {
                                $processname = FindRS("select * from tb_helpme_process where id=" . $row['typewb'], "name");
                                $n = $n + 1;
                                echo "<tr><td>" . $n . "</td>";
                                echo "<td>" . DateThaiNa($row['datepost']) . "</td>";
                                echo "<td>" . $row['subject'] . "</td>";
                                echo "<td>" . $processname . "</td>";
                                echo "<td><center><a href='view/" .$row['id']. "'> >>คลิก<< </a></center></td></tr>";
                            }

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
