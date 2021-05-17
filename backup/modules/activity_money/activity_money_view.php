    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
	<script type="text/javascript" src="js/jquery-1.32.min.js"></script>
	<script type="text/javascript" src="js/jquery.colorbox.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
	<link type="text/css" media="screen" rel="stylesheet" href="css/colorbox.css" />

    <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>

<center>
<?php
$tablename="tb_activity_money";  //ª×èÍ µÒÃÒ§¢éÍÁÙÅ
$picfolder="fileupload/activity_money/";  //ª×èÍâ¿Åà´ÍÃìà¡çºÀÒ¾
$bordername="border-dot-blue";  //ª×èÍÊäµÃìÊÓËÃÑº¢ÍºáÊ´§¢éÍ¤ÇÒÁ
$borderpic="border-dash-green";

$no=EscapeValue($_GET['no']);

	$sql="Select * From ".$tablename." where no='$no'";
	$rs=rsQuery($sql);
	$row=mysqli_fetch_array($rs);
	?>

<TABLE cellspacing="1" cellpadding="1" width="100%" align="center" border="0"  class="tbl-border1">
	<TR>
		<TD align="left"><div class="subject"><?php echo $row['subject'];?></div>
		<?php
			echo "<div class=\"detail\">".$row['detail1']."</div>";
			if($showdate=="yes"){
				echo"<br>&nbsp;<div class=\"showdatepost\">".thaidate($row['datepost'])."</div>";
			}
			?>
</TD>
</tr>
</table>
<br>

<table width="100%" border="0" align="center">
	
	<tr>
<div id="gallery">
<?php
	$strSql="select * from filename where tablename='$tablename' AND masterid='".$row['no']."' Order by id DESC";	
	$rs2=rsQuery($strSql);
	$rs2_row=mysqli_num_rows($rs2);
	//¶éÒ rs2 ÁÕ¢éÍÁÙÅãËéáÊ´§ÀÒ¾áººãËÁè ¶éÒà»ç¹0ãËéáÊ´§ÀÒ¾µÒÁ code à¡èÒ
	if($rs2_row>0){ 
	//$i=0;
	while($rs_filename=mysqli_fetch_array($rs2)){
		
		$cpic=file_exists($picfolder.$rs_filename['filename']);
		if($cpic){
			echo"<a href=\"".$picfolder.$rs_filename['filename']."\" target=\"_blank\"><img src=\"".$picfolder.$rs_filename['filename']."\" ></a>&nbsp;";
		}
	}
	}else{
		
	for($i=1;$i<=16;$i++){
		$cpic=file_exists($picfolder.$row['no']."-$i.JPG");
		if($cpic){
			echo"<a href=".$picfolder.$row['no']."-$i.JPG  target=\"_blank\"><img src=".$picfolder.$row['no']."-$i.JPG  width=\"150\" height=150 style=\"margin:5px;\" border=\"0\" /></a>&nbsp;&nbsp;";
		}
	}
}

?>
</div>
</tr>

</table>
</div>