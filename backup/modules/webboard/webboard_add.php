<link rel="stylesheet" type="text/css" href="CSS/jquery-ui-1.7.2.custom.css">
<style type="text/css">
.ui-datepicker{
	width:200px;
	font-family:tahoma;
	font-size:11px;
	text-align:center;
}
</style>

<script type="text/javascript" src="Js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="Js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
$(function(){
	// แทรกโค้ต jquery
	$("#dateInput").datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>

<center>
<?php
session_start();
if(isset($_POST['btwb'])){
	$chkver=$_SESSION['vervalue'];
	if($chkver<>$_POST['txtver']){
		echo"คุณกรอกรหัสความปลอดภัยไม่ตรงกับภาพ กรุณาพิมพ์ให้ตรงกับภาพ";
	}elseif($_POST['txtsubject']==""){
		echo"กรุณากรอกชื่อเรื่อง";
	}elseif($_POST['detail1']==""){
		echo"กรุณาใส่รายละเอียด";
	}elseif($_POST['txtnamepost']==""){
		echo"กรุณาระบุชื่อของคุณ";
	}else{
		$dt=date("Y-m-d H:i:s");
		$dt2=date("Y-m-d");
		$subject=EscapeValue($_POST['txtsubject']);
		$detail1=EscapeValue($_POST['txtdetail1']);
		$postby=EscapeValue($_POST['txtnamepost']);

		$sql="INSERT INTO tb_wb_mas(subject,detail,postby,datepost,ip,status,deleted,createdate) Values('$subject','$detail1','$postby','$dt2','".$_SERVER['REMOTE_ADDR']."','1','0','$dt')";
		$rs=rsQuery($sql);
		if($rs){
			echo"<script>alert('บันทึกข้อมูลเรียบร้อย');window.location.href='index.php?_mod=".$_GET['_mod']."';</script>";
		}
	}
}
?>

<form name="frmnews" method="POST" action="" enctype="multipart/form-data">
<table >
<tr >
	<td width="20%" class="tbl2">ชื่อเรื่อง*</td>
	<td width="80%" class="tbl1" align=left><input type="text" class="txt" name="txtsubject"  size=50/></td>
</tr>

<input type="hidden" name="dateInput" id="dateInput" value="<?php echo date("Y-m-d");?>" />

<tr >
	<td class="tbl2">รายละเอียด*</td>
	<td class="tbl1" align=left><textarea name="detail1" class="txtarea" cols=50 rows=5></textarea></td>
</tr>
<tr >
	<td class="tbl2">ชื่อ*</td>
	<td class="tbl1" align=left><input type="text" name="txtnamepost"  size=30 /></td>
</tr>
<tr>
	<td class="tbl1"></td>
	<td>1.กรุณาใช้คำที่สุภาพ ไม่ใส่ร้ายหรือหมิ่นประมาทผู้อื่น<br>2.ทางทีมงานขอสงวนสิทธิ์ในการลบข้อความไม่เหมาะสมใดๆโดยมิต้องแจ้งล่วงหน้า<br>3.หากท่านตกลงตามเงื่อนไข กรุณาป้อนรหัสผ่านให้เหมือนด้านล่างนี้
	</td>
</tr>
<tr >
	<td valign="top" class="tbl2">รหัสผ่าน</td>
	<td class="tbl1" align=left><img src="/itgmod/verify_image.php"><input type="text" name="txtver" ></td>
</tr>
<tr>
	<td class="tbl2"></td>
	<td class="tbl1" align=left><input class="bt" type="submit" name="btwb" value="บันทึก" /></td>
</tr>
</table>
</form>
</center>
<BR><BR>
