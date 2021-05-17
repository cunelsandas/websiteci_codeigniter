      <table width="599" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="8"><img src="images/t1.jpg" width="599" height="8"></td>
        </tr>
        <tr>
          <td valign="top" background="images/t2.jpg">
				<p style="margin-left:15px;"><strong>ผู้บริหาร</strong></p>
				<center>
<table border="1"> 
<tr>
	<?php  // ประธานสภา
	$i=1;
$sql="Select tb_header.*,tb_headtype.hid as hid,tb_headtype.nametype From tb_header INNER JOIN tb_headtype ON tb_header.headid=tb_headtype.hid where headid=1";

//	$sql="Select * from tb_staff where staffid=1";
	$rs=rsQuery($sql);
	if(mysql_num_rows($rs)>0){
		while($row=mysql_fetch_array($rs)){
			echo"<td>";
			echo"<table style=\"margin:10px;\">";
				echo"<tr>";
					echo"<td align=\"center\"><img src=\"images/header/".$row['no']."-1.JPG\" width=\"100\" height=\"160\"><br/>".$row['name']."<br/>".$row['nametype']."";
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
</table>
<table border="1">
<tr>
	<?php // รองประธานสภา
	$i=1;
$sql="Select tb_header.*,tb_headtype.hid as hid,tb_headtype.nametype From tb_header INNER JOIN tb_headtype ON tb_header.headid=tb_headtype.hid where headid=2";
	$rs=rsQuery($sql);
	if(mysql_num_rows($rs)>0){
		while($row=mysql_fetch_array($rs)){
			echo"<td>";
			echo"<table style=\"margin:10px;\">";
				echo"<tr>";
					echo"<td align=\"center\"><img src=\"images/header/".$row['no']."-1.JPG\" width=\"100\" height=\"160\"><br/>".$row['name']."<br/>".$row['nametype']."";
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
</table>
<table border="1">
<tr>
	<?php
	$i=1;
$sql="Select tb_header.*,tb_headtype.hid as hid,tb_headtype.nametype From tb_header INNER JOIN tb_headtype ON tb_header.headid=tb_headtype.hid where headid=3";
	$rs=rsQuery($sql);
	if(mysql_num_rows($rs)>0){
		while($row=mysql_fetch_array($rs)){
			echo"<td>";
			echo"<table style=\"margin:10px;\">";
				echo"<tr>";
					echo"<td align=\"center\"><img src=\"images/header/".$row['no']."-1.JPG\" width=\"100\" height=\"160\"><br/>".$row['name']."<br/>".$row['nametype']."";
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
</table>
<table border="1">
<tr>
	<?php
	$i=1;
$sql="Select tb_header.*,tb_headtype.hid as hid,tb_headtype.nametype From tb_header INNER JOIN tb_headtype ON tb_header.headid=tb_headtype.hid where headid=4";
	$rs=rsQuery($sql);
	if(mysql_num_rows($rs)>0){
		while($row=mysql_fetch_array($rs)){
			echo"<td>";
			echo"<table style=\"margin:10px;\">";
				echo"<tr>";
					echo"<td align=\"center\"><img src=\"images/header/".$row['no']."-1.JPG\" width=\"100\" height=\"160\"><br/>".$row['name']."<br/>".$row['nametype']."";
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
</table>

</center>
</td>
			</tr>
        <tr>
          <td height="8"><img src="images/t3.jpg" width="599" height="8"></td>
        </tr>
      </table>