
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
session_start();
if(isset($_POST['btwb'])){
	$chkver=$_SESSION['vervalue'];
	if($chkver<>$_POST['txtver']){
		echo"คุณกรอกรหัสยืนยันไม่ตรงกับภาพ กรุณาตรวจสอบ";
	}elseif($_POST['txtsubject']==""){
		echo"กรุณากรอกชื่อเรื่อง";
	}elseif($_POST['detail']==""){
		echo"กรุณาใส่รายละเอียด";
	}elseif($_POST['txtname']==""){
		echo"กรุณาระบุชื่อของคุณ";
	}elseif($_POST['txtaddress']==""){
		echo "กรุณาป้อนที่อยู่";
	}elseif($_POST['txtemail']==""){
		echo "กรุณาป้อนอีเมล์หรือเบอร์โทรศัพท์";
	}else{
		$subject=EscapeValue($_POST['txtsubject']);
		$detail=EscapeValue($_POST['txtdetail']);
		$name=EscapeValue($_POST['txtname']);
		$address=EscapeValue($_POST['txtaddress']);
		$email=EscapeValue($_POST['txtemail']);
		$status="1";
		$process="1";
		$result="";
		$dt=date("Y-m-d H:i:s");
		$sql="INSERT INTO tb_helpme_mas(subject,detail,name,datepost,ip,status,address,email,process,result) Values('$subject','$detail','$name','$dt','".$_SERVER['REMOTE_ADDR']."','$status','$address','$email','$process','$result')";
		$rs=rsQuery($sql);
		if($rs){
			$strsql="select id from tb_helpme_mas Order by id DESC Limit 0,1";
			$rs1=rsQuery($strsql);
			$rsrow=mysqli_fetch_row($rs1);
			echo"<script>alert('คำร้องของคุณเลขที่$rsrow[0] ข้อมูลถูกบันทึกแล้วขอบคุณค่ะ');window.location.href='index.php?_mod=".$_GET['_mod']."';</script>";
		}
	}
}
?>
<form name="frmnews" method="POST" action="" enctype="multipart/form-data">
<table width="100%" cellpadding="0" cellspacing="1" border="0"  class="tbl-border1">
<tr >
	<td class="tbl2" width="30%" align="right">วันที่ :</td>	<td class="tbl1" width="70%"><?php echo date("Y-m-d");?><input type="hidden" name="dateInput" id="dateInput" value="<?php echo date("c");?>" /></td>
</tr>
<tr>
	<td class="tbl2" align="right">เรียน :</td>
	<td class="tbl1"><?php echo $nayok_position;?></td>
</tr>
<tr >
	<td class="tbl2" align="right">ข้าพเจ้าชื่อ :</td>
	<td class="tbl1"><input type="text" name="txtname"  style="width:50%; border:1px solid;" /></td>
</tr>
<tr>
	<td class="tbl2" align="right">ที่อยู่ :</td>
	<td class="tbl1"><input type="text" name="txtaddress" style="width:90%;border:1px solid;"></td>
</tr>
<tr>
	<td class="tbl2" align="right">อีเมล์ / เบอร์ติดต่อ :</td>
	<td class="tbl1"><input type="text" name="txtemail" style="width:50%;border:1px solid;"></td>
</tr>
<tr>
	<td colspan=2 class="tbl2">ขอยื่นคำร้อง / แจ้งปัญหา</td>
</tr>
<tr >
	<td width="100" class="tbl2" align="right">เรื่อง :</td>
	<td width="400" class="tbl1"><input type="text" name="txtsubject" style="border:1px solid;width:80%;" /></td>
</tr>

<tr >
	<td class="tbl2" align="right">รายละเอียด :</td>
	<td class="tbl1"><textarea name="detail" class="txtarea" style="border:1px solid;width:90%;"></textarea></td>
</tr>

<tr >
	<td valign="top" class="tbl2" align="right">ป้อนรหัสยืนยัน :</td>
	<td class="tbl1">เงื่อนไข<br>1. กรุณาป้อนข้อมูลให้ครบทุกช่อง มิฉะนั้นจะไม่สามารถบันทึกได้<br>2. กรุณาใช้คำที่สุภาพและไม่เป็นการหมิ่นประมาท ใส่ร้ายผู้อื่น<br>3. ทางทีมงานขอสงวนสิทธิ์ในการลบข้อความไม่เหมาะสมใดๆโดยมิต้องแจ้งล่วงหน้า<br>**รายละเอียดและชื่อของท่านจะไม่ถูกเปิดเผย <br>ข้าพเจ้าขอยืนยันข้อความทั้งหมดเป็นความจริง <br>(กรุณาพิมพ์อักษรให้เหมือนดังภาพ)<img src="itgmod/verify_image.php"><input type="text" name="txtver" style="margin:2px;border:1px solid;height:23px;width:100px;"/></td>
</tr>

<tr >
	<td class="tbl1">&nbsp;</td>
	<td class="tbl1"><input class="bt" type="submit" name="btwb" value="บันทึก" /></td>
</tr>
</table>
</form>
