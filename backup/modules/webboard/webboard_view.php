<?php
$timedate=date("Y-m-d");
//แจ้งลบกระทู้ย่อย
if(isset($_GET['subno'])){
	$subno=EscapeValue($_GET['subno']);
	$str="update tb_wb_sub set deleted='1' where no='$subno'";
	$rs=mysqli_query($str);
	echo "<script>alert('ระบบรับแจ้งการลบ ID : ".$_GET['subno']." ไว้แล้ว');window.location.href='index.php?_mod=".$_GET['_mod']."&type=".$_GET['type']."&no=".$_GET['no']."';</script>";
}

//แจ้งลบกระทู้หลัก
if(isset($_GET['masno'])){
	$masno=EscapeValue($_GET['masno']);
	$str="update tb_wb_mas set deleted='1' where wid='$masno'";
	$rs=mysqli_query($str);
	echo "<script>alert('ระบบรับแจ้งการลบ  ID : ".$_GET['masno']." ไว้แล้ว');window.location.href='index.php?_mod=".$_GET['_mod']."&type=".$_GET['type']."&no=".$_GET['no']."';</script>";
}

if(isset($_POST['btaddpost'])){
	$chkver=$_SESSION['vervalue'];
	if($chkver<>$_POST['txtver']){
		echo"คุณกรอกรหัสผ่านไม่ตรงกับภาพ กรุณาตรวจสอบ";
	}elseif($_POST['txtpostadd']==""){
		echo"กรุณากรอกรายละเอียด";
	}elseif($_POST['txtname']==""){
		echo"กรุณาป้อนชื่อของคุณ";
	}else{
	$dt=date("Y-m-d H:i:s");
	$sql="INSERT INTO tb_wb_sub(wid,detail,postby,datepost,ip,status,deleted,createdate) VALUES('".EscapeValue($_GET['no'])."','".EscapeValue($_POST['txtpostadd'])."','".EscapeValue($_POST['txtname'])."','$timedate','".$_SERVER['REMOTE_ADDR']."','1','0','$dt')";
	$rs=rsQuery($sql);
	if($rs){
		echo"<script>alert('บันทึกข้อมูลเรียบร้อย');window.location.href='index.php?_mod=".$_GET['_mod']."&type=".$_GET['type']."&no=".$_GET['no']."';</script>";
	}
}
}
$sql="Select * From tb_wb_mas Where status='1' AND wid='".$_GET['no']."'";
$rs=rsQuery($sql);
$row=mysqli_fetch_array($rs);
$cdate=$row['createdate'];
			if($cdate==null){
				$dt=DateThai($row['datepost']);
			}else{
				$dt=DateTimeThai($row['createdate']);
			}
?>
<center>
<table  >
<tr>
	<td align="left" class="master" ><font id=wb-subject>
		กระทู้ ID [<?php echo $row['wid'];?>] : <?php echo "&nbsp;&nbsp;".$row['subject'];?></font><br><br>&nbsp;
		<font id=wb-detail><?php echo nl2br($row['detail']);?></font><br><br>&nbsp;&nbsp;&nbsp;
		<font id=text-clay>&nbsp;&nbsp;โดย&nbsp;<?php echo $row['postby'];?>&nbsp;&nbsp;IP :<?php echo $row['ip'];?>&nbsp;&nbsp;วันที่ : <?php echo $dt;?></font>&nbsp;&nbsp;&nbsp;
		<?php
		echo "<a href=index.php?_mod=".$_GET['_mod']."&type=".$_GET['type']."&no=".$_GET['no']."&masno=".$row['wid']." class=list>แจ้งลบ</a>";
		?>
	</td>
</tr>

</table><br>

<?php
$sql="Select * From tb_wb_sub Where status='1'  AND wid='".$_GET['no']."' Order by no DESC";
$rs=rsQuery($sql);
if(mysqli_num_rows($rs)>0){
	while($arr=mysqli_fetch_array($rs)){
		$cdate=$arr['createdate'];
			if($cdate==null){
				$dt=DateThai($arr['datepost']);
			}else{
				$dt=DateTimeThai($arr['createdate']);
			}
		echo "<table width=90% cellpadding=1 cellspacing=1 border=0 class=tbl-2>";
	
		echo"<tr>";
		echo"<td align=left class=tbl-border-webboard-sub><font id=text-clay>Re : ID [".$arr['no']."]</font><br><br>&nbsp;";
		echo "<font id=wb-detail>".nl2br($arr['detail'])."</font><br><br>&nbsp;&nbsp;&nbsp;";
		echo "<font id=text-clay>ตอบโดย : ".$arr['postby']."&nbsp;IP : ".$arr['ip']."&nbsp;วันที่ : ".$dt."</font>&nbsp;&nbsp;&nbsp;<a href=index.php?_mod=".$_GET['_mod']."&type=".$_GET['type']."&no=".$_GET['no']."&subno=".$arr['no']." class=list>แจ้งลบ</a>";
		echo"</tr>";
		echo"</table><br>";
	}
}
?>
</center>
<hr style="width:90%;"><br>
<form name="frmaddpost" method="POST" action="">
<table >
<tr>
	<td width="20%" valign="top" class=tbl1><p>ตอบกระทู้</p></td>
	<td width="80%" valign="top" align=left ><textarea class="txtarea" name="txtpostadd" cols=50 rows=5></textarea></td>
</tr>
<tr>
	<td  valign="top" class=tbl1><p>ชื่อ</p></td>
	<td  valign="top" align=left><input type="text" name="txtname" size="30"></td>
</tr>
<tr>
	<td class="tbl1"></td>
	<td>1.กรุณาใช้คำที่สุภาพ ไม่ใส่ร้ายหรือหมิ่นประมาทผู้อื่น<br>2.ทางทีมงานขอสงวนสิทธิ์ในการลบข้อความไม่เหมาะสมใดๆโดยมิต้องแจ้งล่วงหน้า<br>3.หากท่านตกลงตามเงื่อนไข กรุณาป้อนรหัสผ่านให้เหมือนด้านล่างนี้
	</td>
</tr>
<tr >
	<td valign="top" class="tbl1">รหัสผ่าน</td>
	<td class="tbl1" align=left><img src="itgmod/verify_image.php"><input type="text" name="txtver" style="margin:2px;border:1px solid;height:23px;width:100px;"/></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td align=left><input class="bt" type="submit" name="btaddpost" value="ตอบกระทู้"/></td>
</tr>
</table>
</form>

