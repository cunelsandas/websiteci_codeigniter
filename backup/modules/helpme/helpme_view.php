
<?php
$v_no=EscapeValue(decode64($_GET['no']));
$sql="Select * From tb_helpme_mas Where id='".$v_no."'";
$rs=rsQuery($sql);
$row=mysqli_fetch_array($rs);
$processname=FindRS("select * from tb_helpme_process where id=".$row['process'],"name");
?>

<table width="100%" cellpadding="1" cellspacing="1" >
<tr height="25">
	<td colspan="2" align=left>เลขคำร้อง : <?php echo $row['id'];?></td>
</tr>
<tr class=tbl3 height="25" >
	<td colspan="2" align=left class="helpme">วันที่แจ้ง : <?php echo DateTimeThai($row['datepost']);?>
	<br><br>เรื่อง : <?php echo $row['subject'];?>
	<!--<br><br>ชื่อผู้แจ้ง : <?php echo $row['name'];?><br>&nbsp;-->
	</td>
</tr>
<!--<tr class=tbl3 height="25" bgcolor="#F3C218">
	<td colspan="2" align=left>เรื่อง : <?php echo $row['subject'];?></td>
</tr>

<tr class=tbl3>
	<td bgcolor="#FFE8FF" colspan=2>ชื่อผู้แจ้ง : <?php echo $row['name'];?></td>
	
</tr>-->
<tr>
	<td colspan=2>&nbsp;&nbsp;</td>
</tr>
<tr>
	<td colspan=2>สถานะ : <?php echo $processname;?></td>

	
</tr>
<tr>
	<td colspan=2>ผลการดำเนินการ</td>
</tr>
<tr>
	<td colspan=2 id="helpme-result">&nbsp;<?php echo $row['result'];?></td>
</tr>

</table>
</div>