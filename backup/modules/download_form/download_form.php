<div id="download">

<?php
$foldername="fileupload/download/";
$tablename="tb_download";
!empty($_GET['no'])?$no=$_GET['no']:null;
if($no<>""){
	include"modules/download_form/download_form_view.php";
}else{
$pagelen = 20; //จำนวนที่แสดงผลข้อมูลต่อหน้า
	$range = 4 ; // ใส่จำนวนที่จะแสดงข้าง เลขปัจจุบัน ก็คือ ถ้าใส่ 2 แล้ว ตอนนี้แสดงอยู่หน้า 4 ก็จะเป็น 2 3 4 5 6 จะแสดงข้างเลข 4 อยู่ 2 จำนวน
	$page = EscapeValue($_GET['page']); //รับค่าตัวแปร page แบบ get
	if(empty($page)){ $page=1; } //ถ้าตัวแปรเพจยังไม่มี ให้ค่าเริ่มต้นของ $page เป็น 1
	if(isset(EscapeValue($_GET['offid']))){
		$sql = "select no from $tablename Where status='1' and offid=".$_GET['offid']; //คิวรี่ข้อมูล เพื่อหาจำนวน แถว Comment ควร select แค่ ฟิวส์เดียว จะทำให้ทำงานได้ไวกว่า
	}else{
		$sql="Select no From $tablename Where status='1'";
	}
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
	if(isset($_GET['offid'])){
	//	$sql="Select tb_download.*,tb_officertype.id as oid,tb_officertype.name From $tablename  INNER JOIN tb_officertype ON tb_download.offid=tb_officertype.id where status='1' and offid='".$_GET['offid']."' order by tb_download.offid,no DESC Limit $goto,$pagelen"; //ทำการแสดงผลโดยใช้คำสั่ง Limit เพื่อแสดงจำนวนข้อมูลต่อหน้า
		$sql="Select * From $tablename where status='1' and offid='".$_GET['offid']."' order by offid,no DESC Limit $goto,$pagelen"; //ทำการแสดงผลโดยใช้คำสั่ง Limit เพื่อแสดงจำนวนข้อมูลต่อหน้า
	}else{
		//$sql="Select tb_download.*,tb_officertype.id as oid,tb_officertype.name From $tablename INNER JOIN tb_officertype ON tb_download.offid=tb_officertype.id where status='1' order by tb_download.offid, no DESC Limit $goto,$pagelen";
		$sql="Select * From $tablename where status='1' order by offid, no DESC Limit $goto,$pagelen";
	}
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
echo "<div id='master-table'>";
echo"<center>";
echo"<table width=\"100%\" cellpadding=\"1\" cellspacing=\"1\" class=\"tbl-border1\">";
echo"<tr>";
echo"<th width=\"50%\" align=\"center\">หัวข้อ</th>";
echo"<th width=\"30%\" align=\"center\">หน่วยงาน</th>";
echo"<th align=\"center\">ดาวน์โหลด</th>";
echo"</tr>";
while($arr = mysqli_fetch_array($Query)){
	if($bgcolor=="#FEEFFD"){
		$bgcolor="#FFFFFF";
	}else{
		$bgcolor="#FEEFFD";
	}
	$depname=FindRS("select name from tb_officertype where id=".$arr['offid'],"name");
	echo"<tr bgcolor=\"$bgcolor\">";
	echo"<td  align=\"left\" id=\"download-td\" >".$arr['subject']."</td>";
	echo"<td id=\"download-td\" >".$depname."</td>";
	echo"<td id=\"download-td\" align=\"center\">";
	$filename=SearchFileName($tablename,$arr['no']);
		if($filename!="ไม่พบเอกสาร"){
			if(file_exists($foldername.$filename)){
				echo"<a class=\"list\" href=".$foldername.$filename." target=_blank>Download</a>";
			}else{
				echo "ไม่พบเอกสาร";
			}
		}else{
			if(file_exists($foldername.$arr['doc']."")){
				echo"<a class=\"list\" href=".$foldername.$arr['doc']." target=_blank>Download</a>";
			}else{
				echo "ไม่พบเอกสาร";
		}
		}
	echo"</td>";
	echo"</td>";
	
	}
	echo"</table>";
	echo"</center></div>";
}
echo"<p style=\"text-align:center;margin-left:45px;padding-bottom:10px;\">";
echo "";
if ($page > 1) {
$back = $page - 1;
echo "<a href=$PHP_SELF?_mod=".encode64($mod)."&page=1><img src=\"images/bt_first.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\" align=top></a>&nbsp;&nbsp;";
echo "<a href=$PHP_SELF?_mod=".encode64($mod)."&page=$back><img src=\"images/bt_prev.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>&nbsp;&nbsp;";
if ($start > 1) { echo "....."; }
}
$icount=1;
For ($i=$start ; $i<=$end ; $i++) {
$bgcolor = ($icount% 2)? '#0080ff' : '#ff0000'; //แสดงสีสลับเมื่อ ค่า i เพิ่มค่าไปเรื่อย ๆ
if ($i == $page ) {
echo "&nbsp;<b><font color=#787a8d>[".$i."]</font></b>&nbsp;" ;
} else {
echo "&nbsp;<a href=$PHP_SELF?_mod=".encode64($mod)."&page=".$i." style=\"color:$bgcolor\"><font color=$bgcolor>".$i."</font></a>&nbsp;" ;
}
$icount++;
}
if ($page < $totalpage) {
$next = $page +1;
if ($end < $totalpage) { echo "....."; }
echo "&nbsp;&nbsp;<a href=$PHP_SELF?_mod=".encode64($mod)."&page=$next><img src=\"images/bt_next.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>";
echo "&nbsp;<a href=$PHP_SELF?_mod=".encode64($mod)."&page=$totalpage><img src=\"images/bt_last.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>";
}
echo "</p></div>";

}        