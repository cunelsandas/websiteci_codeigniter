<!--  <script type="text/javascript" src="js/jquery.js"></script> -->
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

<?php
$tablename="tb_files";  //ชื่อ ตารางข้อมูล
$picfolder="fileupload/files/";  // ชื่อโฟลเดอร์เก็บภาพ
$bordername="border-dot-blue";  //ชื่อสไตร์สำหรับขอบแสดงข้อความ
$borderpic="border-dash-green";
$no=EscapeValue(decode64($_GET['no']));
$sql="Select $tablename.*,tb_filestype.name From $tablename INNER JOIN tb_filestype ON $tablename.filetypeid=tb_filestype.fid where $tablename.no='$no'";
$rs=rsQuery($sql);
$row=mysqli_fetch_array($rs);

?>
<center>
<div id="master-table">
<table width="90%" cellpadding="1" cellspacing="1" border="0" class="tbl-border1" style="margin-bottom:10px;">
	<tr >
		<td colspan="2" class="tbl2" align="left" style="padding:8px;">&nbsp;ชื่อ&nbsp;:&nbsp;<?php echo$row['subject'];?>
		<?php if($showdate=="yes"){
				echo "&nbsp;[&nbsp;".thaidate($row['datepost'])."&nbsp]";
				}
			?></td>
	</tr>
	<tr>
		<td class="tbl2" style="padding:8px;">ประเภท</td>
		<td  class="tbl1" style="padding:8px;"><?php echo $row['name'];?></td>
	</tr>
	<tr>
		<td  width="120" valign="top" class="tbl2" style="padding:8px;">รายละเอียด</td>
		<td width="480" valign="top" class="tbl1" style="padding:8px;"><?php echo nl2br($row['detail']);?></td>
	</tr>
	</table>
	</div>
	<!--<tr>
		<td>&nbsp;</td>
		<td style="padding:8px;">
		<?php
		$filename=SearchFileName($tablename,$no);
		if($filename != "ไม่พบเอกสาร"){
			if(file_exists($picfolder.$filename)){
				$filetype=checkfiletype($filename);
						if($filetype=="pdf"){
							echo"<a href=".$foldername.$filename." target=\"_blank\"><img src=\"images/pdf.gif\" title=\"ดาวน์โหลดเอกสาร\"></a>";
							}else{
							echo"<a href=".$foldername.$filename." target=\"_blank\"><img src=".$foldername.$filename."  width=\"20%\" height=\"20%\"></a>";
						}
			}else{
				echo "file not found [".$filename."]";
				
			}
		}else{
			if(file_exists($picfolder.$row['doc']."")){
				echo"<a href=".$picfolder.$row['doc']." target=_blank>Download</a>";
			}else{
			echo "ไม่พบเอกสาร";
		}
		}
		?>
		</td>
	</tr>
</table>-->
<table width="90%" border="0" align="center">
	
	<tr>
<div id="gallery">
<?php
	$strSql="select * from filename where tablename='$tablename' AND masterid='".$row['no']."' Order by id DESC";	
	$rs2=rsQuery($strSql);
	$rs2_row=mysqli_num_rows($rs2);
	//ถ้า rs2 มีข้อมูลให้แสดงภาพแบบใหม่ ถ้าเป็น0ให้แสดงภาพตาม code เก่า
	if($rs2_row>0){ 
	//$i=0;
	while($rs_filename=mysqli_fetch_array($rs2)){
		
		$cpic=file_exists($picfolder.$rs_filename['filename']);
		$type=strtolower(substr($rs_filename['filename'],-3));
		if($cpic){
			if($type<>"pdf"){
			echo"<a href=".$picfolder.$rs_filename['filename']." target=\"_blank\"><img src=".$picfolder.$rs_filename['filename']." width=\"150\" height=150 id='$borderpic' /></a>&nbsp;&nbsp;";
			
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
	$rs2=rsQuery($strSql);
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
<A HREF="javascript:history.back()">ย้อนกลับ</A> 
</center>



