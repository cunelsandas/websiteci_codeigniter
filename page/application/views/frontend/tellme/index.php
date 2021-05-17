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
</style>

<div id="helpme">


    <div class="container">

        <div class="card card-shadow">
            <div class="card-header">

                <div align="top center"><?php echo"<a class='btn btn-info' href='add'>แจ้งปัญหา/เรื่องร้องเรียน</a>";?></div><br>
                <br>
                <div>
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

                        $sql = "select * from tb_tellme WHERE status='1'";
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
