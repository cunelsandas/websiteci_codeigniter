<?php
$sql="Select * From tb_contact_palad_mas Where heid='".$_GET['no']."'";
$rs=rsQuery($sql);
$row=mysqli_fetch_array($rs);
?>
<table width="500" cellpadding="1" cellspacing="1" border="0" style="margin:10px;">
<tr height="25" bgcolor="#F3C218">
	<td colspan="2">หัวข้อกระทู้ : <?php echo $row['subject'];?></td>
</tr>
<tr>
	<td width="120" valign="top" bgcolor="#FFE8FF">รายละเอียด</td>
	<td width="380" valign="top" bgcolor="#FFE8FF"><?php echo nl2br($row['detail']);?></td>
</tr>
<tr>
	<td bgcolor="#FFE8FF">ผู้โพสต์</td>
	<td bgcolor="#FFE8FF"><?php echo $row['postby'];?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>IP : <?php echo $row['ip'];?>&nbsp;วันที่ : <?php echo thaidate($row['datepost']);?></td>
</tr>
</table>
<?php
$sql="Select * From tb_contact_palad_sub Where heid='".$_GET['no']."' Order by no";
$rs=rsQuery($sql);
if(mysqli_num_rows($rs)>0){
	while($arr=mysqli_fetch_array($rs)){
		echo"<table width=\"500\" cellpadding=\"1\" cellspacing=\"1\" border=\"0\" style=\"border:1px solid;margin:10px;color:#000000;\">";
		echo"<tr height=\"23\" bgcolor=\"#9BD2FB\">";
		echo"<td colspan=\"2\">Re: ".$row['subject']."</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td width=\"120\">ข้อความ</td>";
		echo"<td width=\"380\">".nl2br($arr['detail'])."</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td colspan=\"2\">โดย : ".$arr['postby']."&nbsp;IP : ".$arr['ip']."&nbsp;วันที่ : ".thaidate($arr['datepost'])."</td>";
		echo"</tr>";
		echo"<tr height=\"8\" bgcolor=\"#9BD2FB\">";
		echo"<td colspan=\"2\">&nbsp;</td>";
		echo"</tr>";
		echo"</table>";
	}
}
?>