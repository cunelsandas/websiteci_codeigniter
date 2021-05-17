<?php
	$foldername="fileupload/officer/";
	$tablename="tb_officer";
	$blockno="20";
//กำหนดจำนวนรูปต่อแถว เริ่มจาก 0
	$block_colno=array("0",
												"1",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3",
												"3");
	//กำหนดตำแหน่งรูป left,center,right เริ่มจาก 0
	$align=array("center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center",
								"center");

			$id=decode64($_GET['ID']);
			$sql="Select * From tb_officertype Where id='".$id."'";
			$rs=rsQuery($sql);
			$row=mysqli_fetch_array($rs);
			$detail=$row['detail'];
			$depname=$row['name'];
			
			//echo "<span style='font-size:30px;color:#ffff00;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;'>$depname</span>";
		?>
<script type="text/javascript">
   function open_new_window(URL)
   {
   NewWindow = window.open(URL,"_blank","toolbar=no,menubar=0,status=0,copyhistory=0,scrollbars=yes,resizable=1,location=0,Width=600,Height=600") ;
   NewWindow.location = URL;
   }
 </script>
		
<div id="officer">
<?php echo "<img src=\"images/officer_$id.png\">"; ?>
<br>
<center>	  



<?php
	for($x = 1; $x <= $blockno; $x++) {
		echo "<table border=\"0\"  align=\"center\" width=\"100%\">";
		$cpic=file_exists("images/".$id."_".$x.".png");
		if($cpic){
		echo "<tr><td colspan='3' align='left' width='100%' bgcolor='#ccffce'><img src='images/".$id."_".$x.".png'></td></tr>";
		}
		
		echo	"<tr>";
		 // พนักงานเจ้าหน้าที่  บล๊อกการแสดง $x
				$i=1;
				$sql="Select * From $tablename Where offid='".$id."' And sid='".$x."' And status='1' order by nolist";
				$rs=rsQuery($sql);
				if(mysqli_num_rows($rs)>0){
						while($row=mysqli_fetch_array($rs)){
							if ($row['name'] == "blank") {
								echo"</tr><tr>";
							}elseif ($row['position'] == "blank") {
								echo"</tr><tr>";
							}else{
							$filepath=SearchImage($tablename,$row['no'],$foldername,"0");
							$history=!empty($row['history'])?"<br><a href=\"#\" onclick=\"open_new_window('../modules/popup/history_popup.php?no=".encode64($row['no'])."&tb=".encode64('tb_officer')."&p=".encode64('officer')."');\"><img src=\"images/document_icon.png\"></a>":"";
							echo"<td valign=\"top\" align=\"".$align[$x]."\">";
							echo"<table height=\"100%\" border=\"0\">";
							echo"<tr>";
							echo"<td align=\"center\"><img src=".$filepath ." class=\"photo_border\"><br/>".$row['name']."<br/>".$row['position']."$history<br/><br/>";
							echo"</td></tr>";
							echo"</table>";
							echo"</td>";
								if($i==$block_colno[$x]){
									echo"</tr><tr>";
									$i=0;
								}
							$i++;
						}
						}
				}
	
	echo "</tr>";
	echo "</table>";
}
?>
</center>
</div>
<div style="padding:10px;">
<a name="detail"  style="padding-left:18px;color:#0129cb;font-family:THNiramitAS,'Angsana New',Tahoma , sans-serif;font-size:20px;">
	<?php
		echo "<p>อำนาจหน้าที่ $depname</p>"; 
		 echo $detail;
	?>
</a>
</div>