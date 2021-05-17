<script type="text/javascript" src="../../../../assets/plugin/dataTable/js/jquery.dataTables.min.js"></script>
<!--<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>-->
<style>
    body {
        font-family: "FC Lamoon",Serif;
        font-size: 16px;
    }
</style>

<div id="waterwork">
   

    <div class="container">

        <div class="card card-shadow">
            <div class="card-header">
                <div align="center">
                    <div align="top center"><?php echo"<a style='font-size:22px;text-decoration:underline'>แจ้งซ่อมประปาสาธารณะ</a>";?></div><br>
                    <div align="top center"><?php echo"<a class='btn btn-info' style='font-size:22px' href='add'>แจ้งซ่อมประปาสาธารณะ</a>";?></div><br>
                </div>
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

                        $sql = "select * from tb_waterwork WHERE status='1'";
                        $rs = rsQuery($sql);
                        $n = 0;


                        if ($rs->num_rows > 0) {

                            while ($row = $rs->fetch_assoc()) {
                                $processname = FindRS("select * from tb_waterwork_process where id=" . $row['typewb'], "name");
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
