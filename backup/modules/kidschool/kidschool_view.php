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
$tablename="tb_kidschool";  //ชื่อ ตารางข้อมูล
$picfolder="fileupload/kidschool/";  // ชื่ีอโฟลเดอร์เก็บภาพ
$bordername="border-dot-red";  //ชื่อสไตร์สำหรับขอบแสดงข้อความ
$borderpic="border-dash-green";

$no=EscapeValue(decode64($_GET['no']));

	$sql="Select * From ".$tablename." where no='$no'";
	$rs=rsQuery($sql);
	$row=mysqli_fetch_array($rs);
	?>

<TABLE cellspacing="1" cellpadding="1" width="100%" align="center" border="0"  class="tbl-border1">
<TR>

<TD align="left"><div class="subject"><?=$row['subject']?></div>
		<?php
			//$msg=iconv("UTF-8","TIS-620",$row['detail1']);
			//$msg=iconv("TIS-620","UTF-8",$msg);
			//$msg=$msg."....";
			//echo $msg;
			echo "<div class=\"detail\">".$row['detail1']."</div>";
			if($showdate=="yes"){
			echo"&nbsp;<font id=\"text-clay\">".thaidate($row['datepost'])."</font>";
			}
			?>
</TD>
</tr>
</table>
<br>

<table width="100%" border="0" align="center">
	
	<tr>
<div id="gallery">
<?php
	$strSql="select * from filename where tablename='$tablename' AND masterid='".$row['no']."' Order by id DESC";	
	$rs2=mysqli_query($strSql);
	$rs2_row=mysqli_num_rows($rs2);
	//ถ้า rs2 มีข้อมูลให้แสดงภาพแบบใหม่ ถ้าเป็น0ให้แสดงภาพตาม code เก่า
	if($rs2_row>0){ 
	//$i=0;
	while($rs_filename=mysqli_fetch_array($rs2)){
		
		$cpic=file_exists($picfolder.$rs_filename['filename']);
		$type=strtolower(substr($rs_filename['filename'],-3));
		if($cpic){
			if($type<>"pdf"){
			echo"<a href=".$picfolder.$rs_filename['filename']." target=\"_blank\"><img src=".$picfolder.$rs_filename['filename']." width=\"150\" height=150 id='$borderpic' /></a>";
			
			}
		}
	}
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
</tr>
<tr><br><br></tr>
<tr> <!-- pdf -->
		<?php
	$strSql="select * from filename where tablename='$tablename' AND masterid='".$row['no']."' Order by id DESC";	
	$rs2=mysqli_query($strSql);
	$rs2_row=mysqli_num_rows($rs2);
	//ถ้า rs2 มีข้อมูลให้แสดงภาพแบบใหม่ ถ้าเป็น0ให้แสดงภาพตาม code เก่า
	if($rs2_row>0){ 
	//$i=0;
	while($rs_filename=mysqli_fetch_array($rs2)){
		
		$cpic=file_exists($picfolder.$rs_filename['filename']);
		$type=strtolower(substr($rs_filename['filename'],-3));
		if($cpic){
			if($type=="pdf"){
			
				echo"&nbsp;&nbsp;<a href=".$picfolder.$rs_filename['filename']." target=\"_blank\" title=\"เอกสาร PDF\"><img src=\"images/pdf.gif\" style=\"border:none;width:80px;height:95px;\" /></a>&nbsp;&nbsp;";
			}
		}
	}
	}

?>
</tr>
</table>
</div>