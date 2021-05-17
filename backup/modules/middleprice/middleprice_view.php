<?php
$no=EscapeValue(decode64($_GET['no']));
$tablename="tb_middleprice";
$foldername="fileupload/middleprice/";
$sql="Select * from $tablename where no=$no";
$rs=rsQuery($sql);
$row=mysqli_fetch_array($rs);

?>
<center>
<table width="100%" cellpadding="1" cellspacing="1" border="0" class="tbl-border1" style="margin-bottom:10px;">
	<tr >
		<td colspan="2" class="tbl2" align="left" style="padding:8px;">&nbsp;ชื่อเอกสาร&nbsp;:&nbsp;<?php echo $row['subject'];?>&nbsp;
		<?php 
			if($showdate=="yes"){
					echo "&nbsp;[&nbsp;".thaidate($row['datepost'])."&nbsp;]";
					}
			
			?>
			</td>
	</tr>
	<tr>
		<td  width="120" valign="top" class="tbl2" style="padding:8px;">รายละเอียดเอกสาร</td>
		<td width="480" valign="top" class="tbl1" style="padding:8px;"><?php echo nl2br($row['detail']);?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td style="padding:8px;">
		<?php
		$filename=SearchFileName($tablename,$no);
		if($filename != "ไม่พบเอกสาร"){
			if(file_exists($foldername.$filename)){
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
			if(file_exists($foldername.$row['doc']."")){
				echo"<a href=".$foldername.$row['doc']." target=_blank>Download</a>";
			}else{
				echo "ไม่พบเอกสาร";
			}
		}
		?>
		</td>
	</tr>
</table>
</center>
</div>