<?php
$no=EscapeValue(decode64($_GET['no']));
$tablename="tb_purchase";
$foldername="fileupload/purchase/";
$sql="Select * from $tablename where no=$no";
$rs=rsQuery($sql);
$row=mysqli_fetch_array($rs);

?>
<center>
<div id="master-table">
<table width="100%">
	<tr >
		<td colspan="2" align="left" style="padding:8px;">&nbsp;ชื่อเอกสาร&nbsp;:&nbsp;<?php echo $row['subject'];?>&nbsp;
		<?php 
			if($showdate=="yes"){
					echo "&nbsp;[&nbsp;".thaidate($row['datepost'])."&nbsp;]";
					}
			
			?>
			</td>
	</tr>
	<tr>
		<td width="20%" valign="top" >รายละเอียดเอกสาร</td>
		<td  valign="top"  ><?php echo nl2br($row['detail']);?></td>
	</tr>
	<tr>
		<td></td>
		<td>
		<?php
	$strSql="select * from filename where tablename='$tablename' AND masterid='".$no."' Order by id DESC";	
	$rs2=rsQuery($strSql);
	$rs2_row=mysqli_num_rows($rs2);
	//ถ้า rs2 มีข้อมูลให้แสดงภาพแบบใหม่ ถ้าเป็น0ให้แสดงภาพตาม code เก่า
	if($rs2_row>0){ 
	//$i=0;
	while($rs_filename=mysqli_fetch_array($rs2)){
		
		$cpic=file_exists($foldername.$rs_filename['filename']);
		$type=strtolower(substr($rs_filename['filename'],-3));
		if($cpic){
			if($type<>"pdf"){
			echo"<a href=".$foldername.$rs_filename['filename']." target=\"_blank\"><img src=".$foldername.$rs_filename['filename']." width=\"150\" height=150 id='$borderpic' /></a>&nbsp;&nbsp;";
			
			}else{
				echo"<a href=".$foldername.$rs_filename['filename']." target=\"_blank\"><img src=\"images/pdf.gif\" title=\"ดาวน์โหลดเอกสาร\"></a>&nbsp;&nbsp;";
			}
		}
	}
	}else{
		
	for($i=1;$i<=16;$i++){
		$cpic=file_exists($foldername.$row['no']."-$i.JPG");
		if($cpic){
			echo"<a href=".$foldername.$row['no']."-$i.JPG  target=\"_blank\"><img src=".$foldername.$row['no']."-$i.JPG  width=\"150\" height=150 style=\"margin:5px;\" border=\"0\" /></a>&nbsp;&nbsp;";
		}
	}
}

?>
	
		</td>
	</tr>
</table>
</div>
</center>
</div>