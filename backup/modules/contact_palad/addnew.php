
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css">
<style type="text/css">
.ui-datepicker{
	width:200px;
	font-family:tahoma;
	font-size:11px;
	text-align:center;
}
</style>

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
$(function(){
	// แทรกโค้ต jquery
	$("#dateInput").datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>

<center>
<?php
if(isset($_POST['btwb'])){
	$chkver=$_SESSION['vervalue'];
	if($chkver<>$_POST['txtver']){
		echo"คุณกรอกรหัสความปลอดภัยไม่ถูกต้อง กรุณาตรวจสอบ";
	}elseif($_POST['txtsubject']==""){
		echo"คุณลืมกรอกหัวข้อเรื่อง";
	}elseif($_POST['detail1']==""){
		echo"คุณลืมใส่รายละเอียด";
	}elseif($_POST['txtnamepost']==""){
		echo"คุณลืมระบุชื่อของคุณ";
	}else{
		$sql="INSERT INTO tb_contact_palad_mas(subject,detail,postby,datepost,ip,status) Values('".$_POST['txtsubject']."','".$_POST['detail1']."','".$_POST['txtnamepost']."','".$_POST['dateInput']."','".$_SERVER['REMOTE_ADDR']."','0')";
		$rs=rsQuery($sql);
		if($rs){
			echo"<script>alert('เรื่องของคุณได้ถูกส่งไปยังท่านปลัดเทศบาลแล้วค่ะ');window.location.href='index.php?_mod=".$_GET['_mod']."';</script>";
		}
	}
}
?>
<form name="frmnews" method="POST" action="" enctype="multipart/form-data">
<table width="500" cellpadding="0" cellspacing="1" border="0" >
<tr >
	<td width="20%" class="tbl2">ชื่อเรื่อง</td>
	<td width="80%" class="tbl1" align=left><input type="text" name="txtsubject" style="border:1px solid;width:100%;" /></td>
</tr>
<tr >
	<td class="tbl2">วันที่</td>
	<td class="tbl1" align=left><?php echo date("Y-m-d");?><input type="hidden" name="dateInput" id="dateInput" value="<?php echo date("Y-m-d");?>" /></td>
</tr>
<tr >
	<td class="tbl2">รายละเอียด</td>
	<td class="tbl1" align=left height=70><textarea name="detail1" class="txtarea" style="border:1px solid;width:90%;height:100;"></textarea></td>
</tr>
<tr >
	<td valign="top" class="tbl2" align=left>รหัสปลอดภัย</td>
	<td align=left><?php include("verify_image.php");?>(พิมพ์ให้เหมือนทุกตัวอักษร)<br><input type="text" name="txtver" style="margin:2px;border:1px solid;height:23px;width:100px;"/></td>
</tr>
<tr >
	<td class="tbl2">ชื่อของคุณ/อีเมล์</td>
	<td class="tbl1" align=left><input type="text" name="txtnamepost"  style="width:50%; border:1px solid;" /></td>
</tr>
<tr >
	<td class="tbl1">&nbsp;</td>
	<td class="tbl1"><input class="bt" type="submit" name="btwb" value="เพิ่มข้อความ" /></td>
</tr>
</table>
</form>