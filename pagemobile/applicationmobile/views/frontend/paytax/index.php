
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<style>
	body{
		font-family: THK2DJuly8;
		font-size: 14px;
	}
    .center {
        margin: auto;
        width: 4%;
        padding: 10px;
    }

    .centerdiv {
        margin: auto;
        width: 80%;
        padding: 10px;
    }
</style>

<script type="text/javascript">



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


    ?>

    $(function () {
        // แทรกโค้ต jquery
        $("#dateInput").datepicker({dateFormat: 'yy-mm-dd'});
    });


</script>

<div>

	<div class="center"><?php echo"<a style='font-size:22px' class='btn btn-info' href=\"add \">แจ้งข้อมูลชำระภาษี</a>";?></div><br>


    <br>
    <div style="font-size: 20px" class="centerdiv">
        <table id="example" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>เลขที่ชำระภาษี</th>
                <th>วันที่</th>
                <th>สถานะการชำระภาษี</th>
                <th>แสดงข้อมูล</th>
            </tr>
            </thead>
            <tbody>
                <?php

                $sql = "select * from tb_paytax WHERE status='1'";
                $rs = rsQuery($sql);
                $n = 0;



                if($rs->num_rows>0){

                    while ($row = $rs->fetch_assoc()){
                        $processname=FindRS("select * from tb_paytax_status where id=".$row['typewb'],"name");
                        $n = $n+1;
                        echo "<tr><td>".$row['id']."</td>";

                        echo "<td>".DateTimeThai($row['datepost'])." น.</td>";
                        echo "<td>" . $processname . "</td>";
                        echo "<td><center><a href='view/" .$row['id']. "'> >>คลิก<< </a></center></td></tr>";
                    }

                }
                ?>
            </tbody>
        </table>
    </div>
}



    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>