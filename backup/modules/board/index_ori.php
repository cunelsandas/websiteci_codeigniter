<?php
	$foldername="fileupload/board/";
?>
<div id="board">
<center>  
<BR><BR><BR><BR>

<br>
 <table align="center" border=0>
<tr>

		<td>
		<table width="260" border="0" cellpadding="0" cellspacing="0" bgcolor=#FFFFFF>
              <tr> <!-- หัวของกรอบ-->
                <td width="20"><img src="images/component/cor01.jpg" width="20" height="6"></td>
                <td background="images/component/cor02.jpg"><img src="images/component/cor02.jpg" width="20" height="6"></td>
                <td width="20"><img src="images/component/cor03.jpg" width="20" height="6"></td>
              </tr>
              <tr> 
			  <?php  //  ประธานสภา
				$sqlhead="Select * From tb_board Where sid='1' And status='1'";
				//$sql="Select * From tb_officer Where offid='".$_GET['ID']."'";
				$rshead=rsQuery($sqlhead);
				$arr=mysql_fetch_array($rshead);
				$filename=SearchFileName("tb_board",$arr['no']);
				if($filename!="ไม่พบเอกสาร"){
					$pic=$filename;
				}else{
					$pic=$arr['no']."-1.JPG";
				}
				$history=!empty($arr['history'])?"<div class=\"tooltip\"><img src=\"images/document_icon.png\"><span>".$arr['history']."</span></div>":"";
			?>
                <td background="images/component/cor07.jpg">&nbsp;</td><!-- ด้านซ้ายของขอบ-->
				<td width="240" align="center"><img src="<?php echo $foldername.$pic;?>" width="135" height="165"><br><br><font  color="#0033FF"  size=2><?php echo $arr['name'];?><br><?php echo $arr['position'];?></font><?php echo $history;?></td>
				<td background="images/component/cor08.jpg">&nbsp;</td><!--ด้านขวาของขอบ-->
              </tr>
              <tr> <!--ด้านล่างของกรอบ-->
                <td><img src="images/component/cor05.jpg" width="20" height="6"></td>
                <td background="images/component/cor06.jpg"><img src="images/component/cor06.jpg" width="20" height="6"></td>
                <td><img src="images/component/cor04.jpg" width="20" height="6"></td>
              </tr>
            </table>
		</td>
		<tr><td height="20">&nbsp;</td>
</tr>
</table>

<table border="0">
	<tr>
		<td>
		<table border="0">
		
		<tr>
		 <?php //รองประธาน
			$i=1;
			$sql="Select * From tb_board Where sid='2' And status='1'";
			$rs=rsQuery($sql);
			if(mysql_num_rows($rs)>0){
				while($row=mysql_fetch_array($rs)){
					$filename=SearchFileName("tb_board",$row['no']);
					if($filename!="ไม่พบเอกสาร"){
						$pic=$filename;
					}else{
						$pic=$row['no']."-1.JPG";
					}
					$history=!empty($row['history'])?"<div class=\"tooltip\"><img src=\"images/document_icon.png\"><span>".$row['history']."</span></div>":"";
				echo"<td align=\"center\">";
				echo"<table style=\"margin:10px;\" class=\"tbl-border\" border=\"0\">";
				echo"<tr>";
				echo"<td align=\"center\" background=\"images/bg_border.jpg\" width=\"170\" height=\"220\"><img src=".$foldername.$pic." width=\"135\" height=\"165\"><br/><font color=\"#FF6600\"  size=2>".$row['name']."<br/>".$row['position']."</font>$history";
				echo"</tr>";
				echo"</table>";
				echo"</td>";
				if($i==3){
					echo"</tr></tr>";
					$i=0;
				}
					$i++;
				}
				}
			?>
	
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<!-- end -->

<div align=left>
<table border=0>
<tr>
<td align=left>
	<table border="0">	
		<tr>
		 <?php // เลขา
	$i=1;
	$sql="Select * From tb_board Where sid='3' And status='1'";
	$rs=rsQuery($sql);
	if(mysql_num_rows($rs)>0){
		while($row=mysql_fetch_array($rs)){
			$filename=SearchFileName("tb_board",$row['no']);
			if($filename!="ไม่พบเอกสาร"){
					$pic=$filename;
				}else{
					$pic=$row['no']."-1.JPG";
				}
				$history=!empty($row['history'])?"<div class=\"tooltip\"><img src=\"images/document_icon.png\"><span>".$row['history']."</span></div>":"";
			echo"<td>";
			echo"<table style=\"margin:10px;\" class=\"tbl-border\" border=\"0\">";
				echo"<tr>";
					echo"<td align=\"center\" background=\"images/bg_border.jpg\" width=\"170\" height=\"220\"><img src=".$foldername.$pic." width=\"135\" height=\"165\"><br/><font color=\"#FF6600\"  size=2>".$row['name']."<br/>".$row['position']."</font>$history";
				echo"</tr>";
			echo"</table>";
			echo"</td>";
			if($i==3){
				echo"</tr></tr>";
				$i=0;
			}
			$i++;
		}
	}
	?>
	</tr>
	</table>
	</td>
	</tr>
</table>
</div>
<div align="center">
<table>
<tr>
<td align=center>
	<table border="0">	
		<tr>
		 <?php // สมาชิก หมุ่ 1
	$i=1;
	$sql="Select * From tb_board Where sid='4' And status='1' order by nolist";
	$rs=rsQuery($sql);
	if(mysql_num_rows($rs)>0){
		while($row=mysql_fetch_array($rs)){
			$filename=SearchFileName("tb_board",$row['no']);
			if($filename!="ไม่พบเอกสาร"){
					$pic=$filename;
				}else{
					$pic=$row['no']."-1.JPG";
				}
			echo"<td>";
			echo"<table style=\"margin:10px;\" class=\"tbl-border\" border=\"0\">";
				echo"<tr>";
					echo"<td align=\"center\" background=\"images/bg_border.jpg\" width=\"170\" height=\"220\"><img src=".$foldername.$pic." width=\"135\" height=\"165\"><br/><font color=\"#FF6600\"  size=2>".$row['name']."<br/>".$row['position']."</font>$history";
				echo"</tr>";
			echo"</table>";
			echo"</td>";
			if($i==3){
				echo"</tr><tr>";
				$i=0;
			}
			$i++;
		}
	}
	?>
	</tr>
	</table>
	</td>
	</tr>
</table>

<br>
<table>
	<tr>
<td align=center>
	<table border="0">	
		<tr>
		 <?php // สมาชิก 2
	$i=1;
	$sql="Select * From tb_board Where sid='5' And status='1' order by nolist";
	$rs=rsQuery($sql);
	if(mysql_num_rows($rs)>0){
		while($row=mysql_fetch_array($rs)){
			$filename=SearchFileName("tb_board",$row['no']);
			if($filename!="ไม่พบเอกสาร"){
					$pic=$filename;
				}else{
					$pic=$row['no']."-1.JPG";
				}
			echo"<td>";
			echo"<table style=\"margin:10px;\" class=\"tbl-border\" border=\"0\">";
				echo"<tr>";
					echo"<td align=\"center\" background=\"images/bg_border.jpg\" width=\"170\" height=\"220\"><img src=".$foldername.$pic." width=\"135\" height=\"165\"><br/><font color=\"#FF6600\"  size=2>".$row['name']."<br/>".$row['position']."</font>$history";
				echo"</tr>";
			echo"</table>";
			echo"</td>";
			if($i==3){
				echo"</tr><tr>";
				$i=0;
			}
			$i++;
		}
	}
	?>
	</tr>
	</table>
	</td>
	</tr>
	</table>

	<br>
<table>
	<tr>
<td align=center>
	<table border="0">	
		<tr>
		 <?php // สมาชิก 3
	$i=1;
	$sql="Select * From tb_board Where sid='6' And status='1' order by nolist";
	$rs=rsQuery($sql);
	if(mysql_num_rows($rs)>0){
		while($row=mysql_fetch_array($rs)){
			$filename=SearchFileName("tb_board",$row['no']);
			if($filename!="ไม่พบเอกสาร"){
					$pic=$filename;
				}else{
					$pic=$row['no']."-1.JPG";
				}
			echo"<td>";
			echo"<table style=\"margin:10px;\" class=\"tbl-border\" border=\"0\">";
				echo"<tr>";
					echo"<td align=\"center\" background=\"images/bg_border.jpg\" width=\"170\" height=\"220\"><img src=".$foldername.$pic." width=\"135\" height=\"165\"><br/><font color=\"#FF6600\"  size=2>".$row['name']."<br/>".$row['position']."</font>$history";
				echo"</tr>";
			echo"</table>";
			echo"</td>";
			if($i==3){
				echo"</tr><tr>";
				$i=0;
			}
			$i++;
		}
	}
	?>
	</tr>
	</table>
	</td>
	</tr>
	</table>
		<!--  วนลูปแสดงรูป -->
</div>
</center>
</div>