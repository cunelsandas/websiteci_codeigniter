    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
	<script type="text/javascript" src="js/jquery-1.32.min.js"></script>
	<script type="text/javascript" src="js/jquery.colorbox.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
	<link type="text/css" media="screen" rel="stylesheet" href="css/colorbox.css" />

    <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>

<center>
<?php
$tablename="tb_landscape";  //ชื่อ ตารางข้อมูล
$picfolder="images/landscape/";  // ชื่ีอโฟลเดอร์เก็บภาพ
$bordername="border-dot-blue";  //ชื่อสไตร์สำหรับขอบแสดงข้อความ
$borderpic="border-dash-green";

$no=$_GET['no'];

	$sql="Select * From ".$tablename." where no='$no'";
	$rs=rsQuery($sql);
	$row=mysqli_fetch_array($rs);
	?>

<TABLE cellspacing="1" cellpadding="1" width="100%" align="center" border="0"  class="tbl-border1">
<TR>

<TD  class="tbl1" align=left><?=$row['subject']?></b><BR>&nbsp;&nbsp;
		<?php
			//$msg=iconv("UTF-8","TIS-620",$row['detail1']);
			//$msg=iconv("TIS-620","UTF-8",$msg);
			//$msg=$msg."....";
			//echo $msg;
			echo $row['detail1'];
			echo"<br>&nbsp;<font id=font-clay>".thaidate($row['datepost'])."</font>";
			?>
</TD>
</tr>
</table>
<br>

<table width="100%" border="0" align="center">
	
	<tr>
	<td align="center">
<div id="gallery">
<?php
	$strSql="select * from filename where tablename='$tablename' AND masterid='".$row['no']."' Order by filename,id asc";	
	$rs2=mysqli_query($strSql);
	$rs2_row=mysqli_num_rows($rs2);
	//ถ้า rs2 มีข้อมูลให้แสดงภาพแบบใหม่ ถ้าเป็น0ให้แสดงภาพตาม code เก่า
	if($rs2_row>0){ 
	//$i=0;
	echo "<table width='100%' ><tr><th>ก่อนดำเนินการ</th><th>หลังดำเนินการ</th></tr>";
		echo "<tr><td align='center'>";
		while($rs_filename=mysqli_fetch_array($rs2)){
			$cpic=file_exists($picfolder.$rs_filename['filename']);
			$strfilename=strtolower($rs_filename['filename']);
			$needle="bf";
			if($cpic){
				
				if (strpos($strfilename,$needle) !== false) {
					//ถ้ามีคำว่า bf ให้แสดงรูป
					echo "<a href=".$picfolder.$rs_filename['filename']." target=\"_blank\"><img src=".$picfolder.$rs_filename['filename']." width=\"150\" height=150 id='$borderpic' /></a><br>";
				}else{
					//ถ้าไม่มีคำว่า ให้แสดงรูป
				}
				
			}
		}
		echo "</td>";
		echo "<td align='center'>";
		$strSql="select * from filename where tablename='$tablename' AND masterid='".$row['no']."' Order by filename,id asc";	
		$rs2=mysqli_query($strSql);
		while($rs_filename=mysqli_fetch_array($rs2)){
			$cpic=file_exists($picfolder.$rs_filename['filename']);
			$strfilename=strtolower($rs_filename['filename']);
			$needle="bf";
			if($cpic){
				
				if (strpos($strfilename,$needle) !== false) {
					//ถ้ามีคำว่า bf ให้แสดงรูป
					//echo "<a href=".$picfolder.$rs_filename['filename']." target=\"_blank\"><img src=".$picfolder.$rs_filename['filename']." width=\"150\" height=150 id='$borderpic' /></a><br>";
				}else{
					//ถ้าไม่มีคำว่า af ให้แสดงรูป
					echo "<a href=".$picfolder.$rs_filename['filename']." target=\"_blank\"><img src=".$picfolder.$rs_filename['filename']." width=\"150\" height=150 id='$borderpic' /></a><br>";
				}
				
			}
		}
		echo "</td>";
		echo "</tr></table>";
	}else{
		
	for($i=1;$i<=16;$i++){
		$cpic=file_exists($picfolder.$row['no']."-$i.JPG");
		if($cpic){
			echo"<a href=".$picfolder.$row['no']."-$i.JPG  target=\"_blank\"><img src=".$picfolder.$row['no']."-$i.JPG  width=\"150\" height=150 style=\"margin:5px;\" border=\"0\" /></a>";
		}
	}
}

?>
</div>
</td>
</tr>

</table>