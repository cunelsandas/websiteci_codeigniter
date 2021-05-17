
 <!-- For SlideShow nivo-slider -->
	<link rel="stylesheet" href="nivo-slider/default/default.css" type="text/css" media="screen" />
     <link rel="stylesheet" href="nivo-slider/nivo-slider.css" type="text/css" media="screen" />
	<!-- end SlideShow -->
	<br><br>
<center>
<div id="file">
<p style="margin-left:15px;">
		<?php
			$tablename="tb_files";
			$type=EscapeValue(decode64($_GET['type']));
			$sql="Select * From tb_filestype Where fid='".$type."'";
			$rs=rsQuery($sql);
			$row=mysqli_fetch_array($rs);
		?><strong><?php echo $row['name']?></strong></p>
</center>	
<br>
<?php

!empty($_GET['no'])?$no=$_GET['no']:null;
if($no<>""){
	include"modules/files/files_view.php";
}else{
	$pagelen = 20; //จำนวนที่แสดงผลข้อมูลต่อหน้า
	$range = 4 ; // ใส่จำนวนที่จะแสดงข้าง เลขปัจจุบัน ก็คือ ถ้าใส่ 2 แล้ว ตอนนี้แสดงอยู่หน้า 4 ก็จะเป็น 2 3 4 5 6 จะแสดงข้างเลข 4 อยู่ 2 จำนวน
	$page = EscapeValue($_GET['page']); //รับค่าตัวแปร page แบบ get
	if(empty($page)){ $page=1; } //ถ้าตัวแปรเพจยังไม่มี ให้ค่าเริ่มต้นของ $page เป็น 1
	$sql = "select no from $tablename Where filetypeid=$type And status='1'"; //คิวรี่ข้อมูล เพื่อหาจำนวน แถว Comment ควร select แค่ ฟิวส์เดียว จะทำให้ทำงานได้ไวกว่า
	$result = rsQuery($sql)or die(mysqli_error());
	$totalrecords= $num_rows = mysqli_num_rows($result); //หาจำนวนแถวของขัอมูลทั้งหมด
	$totalpage = ceil($num_rows / $pagelen);
	$goto = ($page-1) * $pagelen; // หาหน้าที่จะกระโดดไป
	$start = $page - $range;
	$end = $page + $range;
	if ($start <= 1) {
		$start = 1;
	}
	if ($end >= $totalpage) {
		$end = $totalpage;
	}
	$sql = "select * from $tablename Where filetypeid=$type And status='1' order by datepost DESC, no DESC Limit $goto,$pagelen"; //ทำการแสดงผลโดยใช้คำสั่ง Limit เพื่อแสดงจำนวนข้อมูลต่อหน้า
	$result_reply = rsQuery($sql);
	
	/*คิวรี่ข้อมูลออกมาเพื่อแสดงผล */
	//$sql="Select * From ".$tablename." Where status='1'  Order by no DESC Limit $start1,$limit";
	$sql1=$sql;
	$Query = rsQuery($sql1); //คิวรี่คำสั่ง
//	$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
	if($totalrecords==0){
		echo"<p align=\"center\">- - - - - - - - - - ยังไม่มีข้อมูล- - - - - - - - - -</p><BR><BR><BR><BR>";
		/*	วนลูปข้อมูล */
	}else{

		$i=$start;
		echo"<center>";
		echo"<table width=\"90%\" cellpadding=\"1\" cellspacing=\"1\" id=\"master-table\">";
		echo"<tr>";
		echo"<th width=\"75%\" align=\"left\" >รายการ</th>";
		if($showdate=="yes"){
			echo"<th align=\"center\" >วันที่</th>";
		}
		echo"</tr>";
		while($arr = mysqli_fetch_array($Query)){
		if($bgcolor=="#FEEFFD"){
			$bgcolor="#FFFFFF";
		}else{
			$bgcolor="#FEEFFD";
		}
		echo"<tr>";
		echo"<td align=\"left\"><a href=index.php?_mod=".$_GET['_mod']."&no=".encode64($arr['no']).">".$arr['subject']."</a></td>";
	if($showdate=="yes"){
	echo"<td align=right >".thaidate($arr['datepost'])."</td>";
	}
	echo"</td>";
	}
	echo"</table>";
	echo"</center>";
}
echo"<p style=\"text-align:center;margin-left:45px;padding-bottom:10px;\">";
echo "";
if ($page > 1) {
$back = $page - 1;
echo "<a href=$PHP_SELF?_mod=".encode64($mod)."&page=1&type=".$_GET['type']."><img src=\"images/bt_first.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\" align=top></a>&nbsp;&nbsp;";
echo "<a href=$PHP_SELF?_mod=".encode64($mod)."&page=$back&type=".$_GET['type']."><img src=\"images/bt_prev.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>&nbsp;&nbsp;";
if ($start > 1) { echo "....."; }
}
$icount=1;
For ($i=$start ; $i<=$end ; $i++) {
$bgcolor = ($icount% 2)? '#0080ff' : '#ff0000'; //แสดงสีสลับเมื่อ ค่า i เพิ่มค่าไปเรื่อย ๆ
if ($i == $page ) {
echo "&nbsp;<b><font color=#787a8d>[".$i."]</font></b>&nbsp;" ;
} else {
echo "&nbsp;<a href=$PHP_SELF?_mod=".encode64($mod)."&page=".$i."&type=".$_GET['type']." style=\"color:$bgcolor\"><font color=$bgcolor>".$i."</font></a>&nbsp;" ;
}
$icount++;
}
if ($page < $totalpage) {
$next = $page +1;
if ($end < $totalpage) { echo "....."; }
echo "&nbsp;&nbsp;<a href=$PHP_SELF?_mod=".encode64($mod)."&page=$next&type=".$_GET['type']."><img src=\"images/bt_next.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>";
echo "&nbsp;<a href=$PHP_SELF?_mod=".encode64($mod)."&page=$totalpage&type=".$_GET['type']."><img src=\"images/bt_last.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>";
}
echo "</p></div>";

}

