
<div id="activity">


<?php
$tablename="tb_activity";  //ชื่อ ตารางข้อมูล
$picfolder="fileupload/activity/";  // ชื่ีอโฟลเดอร์เก็บภาพ
$bordername="border-dot-blue";  //ชื่อสไตร์สำหรับขอบแสดงข้อความ
$borderpic="picborder"; // ชื่อ id ของของแสดงรูปภาพ
$mod=EscapeValue(decode64($_GET['_mod']));
!empty($_GET['no'])?$no=$_GET['no']:null;
if($no<>""){
	include"modules/activity/activity_view.php";
}else{

	$pagelen =15; //จำนวนที่แสดงผลข้อมูลต่อหน้า
	$range = 4 ; // ใส่จำนวนที่จะแสดงข้าง เลขปัจจุบัน ก็คือ ถ้าใส่ 2 แล้ว ตอนนี้แสดงอยู่หน้า 4 ก็จะเป็น 2 3 4 5 6 จะแสดงข้างเลข 4 อยู่ 2 จำนวน
	$page = EscapeValue($_GET['page']); //รับค่าตัวแปร page แบบ get
	if(empty($page)){ $page=1; } //ถ้าตัวแปรเพจยังไม่มี ให้ค่าเริ่มต้นของ $page เป็น 1
	$sql = "select no from $tablename Where status='1'"; //คิวรี่ข้อมูล เพื่อหาจำนวน แถว Comment ควร select แค่ ฟิวส์เดียว จะทำให้ทำงานได้ไวกว่า
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
	$sql = "select * from $tablename Where status='1' order by no DESC Limit $goto,$pagelen"; //ทำการแสดงผลโดยใช้คำสั่ง Limit เพื่อแสดงจำนวนข้อมูลต่อหน้า
	
	
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
		while($arr = mysqli_fetch_array($Query)){
			$strSql="select * from filename where tablename='$tablename' AND masterid='".$arr['no']."' Order by id DESC limit 0,1";	
			$rs2=rsQuery($strSql);
			$rs_filename=mysqli_fetch_array($rs2);
			$rs_row=mysqli_num_rows($rs2);
						
			echo"<table width=\"100%\">";
			echo"<tr>";
			echo"<td valign=\"top\" >";
			if($rs_row > 0){
				echo"<img src=".$picfolder.$rs_filename['filename'].">";
			}else{
				echo"<img src=".$picfolder.$arr['no']."-1.JPG >";
			}
			echo"</td>";
			echo"<td  valign=\"top\">";
			
			echo"<div class=\"subject\"><a href=\"index.php?_mod=".encode64($mod)."&no=".encode64($arr['no'])."\">".$arr['subject']."</a></div>";
			//$msg=iconv("UTF-8","TIS-620",$arr['detail1']);
			//$msg=substr($msg,0,250);
			//$msg=iconv("TIS-620","UTF-8",$msg);
			//$msg=$msg."....";
			//$detail=$arr['detail1'];
			//$msg=wordwrap($arr['detail1'],200);
			$msg=$arr['detail1'];
			echo "<div class=\"detail150\">$msg</div>";
			if($showdate=="yes"){
				echo"<div class=\"showdatepost\">".thaidate($arr['datepost'])."</div>";
			}
			
			echo"</td>";
			echo"</tr>";
			echo"</table><br>";
			
			
		}
	}
//$i = 1;
//	while($fetch_pro = mysqli_fetch_array($result_reply)){
//		$bgcolor = ($i % 2)? '#EAF1FF' : '#fafafa'; //แสดงสีสลับเมื่อ ค่า i เพิ่มค่าไปเรื่อย ๆ
//		$i++;
//	}
echo "<div id=\"page_count\">";
if ($page > 1) {
	$back = $page - 1;
	echo "<a href=\"$PHP_SELF?_mod=".encode64($mod)."&page=1\" title=\"หน้าแรก First Page\">|<<img src=\"images/bt_first.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\" align=top></a>";
	echo "<a href=\"$PHP_SELF?_mod=".encode64($mod)."&page=$back\" title=\"ย้อนกลับ Previous Page\"><<<img src=\"images/bt_prev.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>";
	if ($start > 1) { echo "....."; }
}
	$icount=1;
	For ($i=$start ; $i<=$end ; $i++) {
		$bgcolor = sprintf("#%06x",rand(0,16777215)); //แสดงสีสลับเมื่อ ค่า i เพิ่มค่าไปเรื่อย ๆ
		if ($i == $page ) {
			echo "<b><font color=#787a8d><a title=\"ขณะนี้คุณอยู่หน้าที่$i\">".$i."</a></font></b>" ;
		} else {
			echo "<a href=\"$PHP_SELF?_mod=".encode64($mod)."&page=".$i."\" title=\"ไปหน้าที่ $i\" style=\"color:$bgcolor\">".$i."</a>" ;
		}
	$icount++;
	}
if ($page < $totalpage) {
	$next = $page +1;
	if ($end < $totalpage) { echo "....."; }
	echo "<a href=\"$PHP_SELF?_mod=".encode64($mod)."&page=$next\" title=\"หน้าต่อไป Next Page\">>><img src=\"images/bt_next.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>";
	echo "<a href=\"$PHP_SELF?_mod=".encode64($mod)."&page=$totalpage\" title=\"หน้าสุดท้าย Last Page\">>|<img src=\"images/bt_last.png\" style=\"width:50px;height:25px;border:0;vertical-align: text-bottom;\"></a>";
}
echo "<p>ขณะนี้คุณอยู่ที่หน้า $page</p></div></div>";

}
?>