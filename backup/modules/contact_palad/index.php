<TABLE cellspacing="0" cellpadding="0" width="100%" align="center" border="0">
<TBODY>
<TR>
<TD width="1%"><IMG height="9" alt="" src="images/t_11.gif" width="10" border="0"></TD>
<TD width="49%" background="images/t_13.gif"><IMG height="9" alt="" src="images/t_12.gif" width="6" border="0"></TD>
<TD align="right" width="49%" background="images/t_13.gif"><IMG height="9" alt="" src="images/t_14.gif" width="6" border="0"></TD>
<TD width="1%"><IMG height="9" alt="" src="images/t_15.gif" width="10" border="0"></TD>
</TR>
<TR valign="top">
<TD background="images/t_fon_left.gif"><IMG height="6" alt="" src="images/t_21.gif" width="10" border="0"></TD>
<TD align="middle" colspan="2" rowspan="2"><br />&nbsp;&nbsp;&nbsp;<img src="images/62.png" />&nbsp;<strong>ติดต่อท่านปลัดเทศบาล</strong>


<?php
!empty($_GET['no'])?$no=$_GET['no']:null;
!empty($_GET['type'])?$type=$_GET['type']:null;
if($type=="addnew"){
	include"modules/contact_palad/addnew.php";
}elseif($type=="view"){
	include"modules/contact_palad/view.php";
}else{
	?>
	<p style="margin-left:10px;"><img src="images/add_24.png"/>&nbsp;<?php echo"<a class=\"book\" href=\"index.php?_mod=".$_GET['_mod']."&type=addnew \">เพิ่มข้อความใหม่</a>";?></p>
	<?php
	############################# แบ่งหน้าเพื่อให้แสดงผลรวดเร็ว #######################
	if(!isset($start)){
		$start = 0;
		
	}
	$limit = '20'; // แสดงผลหน้าละกี่หัวข้อ

	/* หาจำนวน record ทั้งหมด
	ปล. อันนี้ต้องใช้กับตัวแบ่งนะ ห้ามเอาออก*/
	$sql="Select * From tb_contact_palad_mas where status='0'";
	$Qtotal = rsQuery($sql); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record

	/*คิวรี่ข้อมูลออกมาเพื่อแสดงผล */
	$sql="Select * From tb_contact_palad_mas Where status='0' Order by heid DESC Limit $start,$limit";
	$Query = rsQuery($sql); //คิวรี่คำสั่ง
	$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
	if($totalp==0){
		echo"<p style=\"text-align:center;\">- - - - - - - - - - ยังไม่มีข้อมูล - - - - - - - - - -</p>";
		/*	วนลูปข้อมูล */
	}else{
		echo "<table width=100% border=0 class=tbl-border1><tr><td width=50%>หัวข้อ</td><td width=20%>จาก</td><td width=20%>วันที่</td><td width=10%>สถานะ</td></tr><tr>";
		$i=$start;

		while($arr = mysqli_fetch_array($Query)){
			echo"<td align=left class=tbl".$color1."><a class=\"book\" href=\"index.php?_mod=".$_GET['_mod']."&type=view&no=".$arr['heid']."\">";
			 echo $arr['subject']."</td>";
			echo "<td>".$arr['postby']."</td>";
			//$msg=iconv("UTF-8","TIS-620",$arr['detail']);
			//$msg=substr($msg,0,50);
			//$msg=iconv("TIS-620","UTF-8",$msg);
			//$msg=$msg."....";
			//echo $msg;
			echo"<td>".thaidate($arr['datepost'])."</td>";
			$sql="Select * From tb_contact_palad_sub Where heid='".$arr['heid']."'";
			$crs=rsQuery($sql);
			$num=mysqli_num_rows($crs);
			if($num==0){
				echo"<td><font style=\"color:red;\">รอ</font></td>";
			}else{
				echo"<td>ตอบแล้ว</td>";
			}
			echo"</tr>";
		}
		echo"</table>";
	}
	/* ตัวแบ่งหน้า */
	$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า

	/* เอาผลหาร มาวน เป็นตัวเลข เรียงกัน เช่น สมมุติว่าหารได้ 3 เอามาวลก็จะได้ 1 2 3 */
	empty($_GET['page'])?$p="1":$p=$_GET['page'];
	echo"<p style=\"text-align:left;\">";
	for($i=1;$i<=$page;$i++){			
		if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
			echo"[<a class=\"book\" href='index.php?_mod=".$_GET['_mod']."&start=".$limit*($i-1)."&page=$i'>$i</A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
		}else{
			echo"[<a class=\"book\" href='index.php?_mod=".$_GET['_mod']."&start=".$limit*($i-1)."&page=$i'>$i</A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
		}			
	}
	echo"</p>";
?>
<?php
}
?>	

</TD>
<TD background="images/t_fon_right.gif"><IMG height="6" alt="" src="images/t_23.gif" width="10" border="0"></TD>
</TR>
<TR valign="bottom">
<TD background="images/t_fon_left.gif"><IMG height="7" alt="" src="images/t_31.gif" width="10" border="0"></TD>
<TD background="images/t_fon_right.gif"><IMG height="7" alt="" src="images/t_33.gif" width="10" border="0"></TD>
</TR>
<TR>
<TD><IMG height="10" alt="" src="images/t_41.gif" width="10" border="0"></TD>
<TD background="images/t_fon_bot.gif"><IMG height="10" alt="" src="images/t_42.gif" width="6" border="0"></TD>
<TD align="right" background="images/t_fon_bot.gif"><IMG height="10" alt="" src="images/t_44.gif" width="6" border="0"></TD>
<TD><IMG height="10" alt="" src="images/t_45.gif" width="10" border="0"></TD>
</TR>
</TBODY>
</TABLE>
