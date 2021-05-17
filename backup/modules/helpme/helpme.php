<div id="helpme">
<?php
!empty($_GET['no'])?$no=EscapeValue(decode64($_GET['no'])):null;
!empty($_GET['type'])?$type=EscapeValue(decode64($_GET['type'])):null;
$tablename="tb_helpme_mas";
if($type=="addnew"){
	include"modules/helpme/helpme_add.php";
}elseif($type=="view"){
	include"modules/helpme/helpme_view.php";
}else{
	?>
	<div valign="top"><img src="images/component/add_help.png"/>&nbsp;<?php echo"<a class=\"book\" href=\"index.php?_mod=".$_GET['_mod']."&type=".encode64('addnew')." \">แจ้งปัญหา/เรื่องร้องเรียน</a>";?></div><br>
	<div id="master-table">
	<table width="100%" border=0><tr><th width=10%>เลขคำร้อง</th><th width=20%>วันที่</th><th width=50%>เรื่อง</th><th width=20%>สถานะ</th></tr>
	<?php
	############################# แบ่งหน้าเพื่อให้แสดงผลรวดเร็ว #######################
	$pagelen = 15; //จำนวนที่แสดงผลข้อมูลต่อหน้า
	$range = 4 ; // ใส่จำนวนที่จะแสดงข้าง เลขปัจจุบัน ก็คือ ถ้าใส่ 2 แล้ว ตอนนี้แสดงอยู่หน้า 4 ก็จะเป็น 2 3 4 5 6 จะแสดงข้างเลข 4 อยู่ 2 จำนวน
	$page = EscapeValue($_GET['page']); //รับค่าตัวแปร page แบบ get
	if(empty($page)){ $page=1; } //ถ้าตัวแปรเพจยังไม่มี ให้ค่าเริ่มต้นของ $page เป็น 1
	$sql = "select id from $tablename Where status='1'"; //คิวรี่ข้อมูล เพื่อหาจำนวน แถว Comment ควร select แค่ ฟิวส์เดียว จะทำให้ทำงานได้ไวกว่า
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
	$sql = "select * from $tablename Where status='1' order by id DESC Limit $goto,$pagelen"; //ทำการแสดงผลโดยใช้คำสั่ง Limit เพื่อแสดงจำนวนข้อมูลต่อหน้า
	$result_reply = rsQuery($sql);
	
	/*คิวรี่ข้อมูลออกมาเพื่อแสดงผล */
	//$sql="Select * From ".$tablename." Where status='1'  Order by no DESC Limit $start1,$limit";
	$sql1=$sql;
	$Query = rsQuery($sql1); //คิวรี่คำสั่ง
//	$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
	if($totalrecords==0){
		echo "<tr><td colspan='4'>";
		echo"<p align=\"center\">- - - - - - - - - - ยังไม่มีข้อมูล- - - - - - - - - -</p><BR><BR><BR><BR>";
		echo "</td></tr></table></div>";	
		/*	วนลูปข้อมูล */
	}else{
	
		//$i=$start1;
		while($arr = mysqli_fetch_array($Query)){
			$processname=FindRS("select * from tb_helpme_process where id=".$arr['process'],"name");
			
			echo "<tr ><td id=\"helpme-td\"><a href=index.php?_mod=".$_GET['_mod']."&type=".encode64('view')."&no=".encode64($arr['id']).">".$arr['id']."</a></td>";
			echo "<td id=\"helpme-td\">".DateThai($arr['datepost'])."</td>";
			echo "<td id=\"helpme-td\"><a href=index.php?_mod=".$_GET['_mod']."&type=".encode64('view')."&no=".encode64($arr['id']).">".$arr['subject']."</a></td>";
			echo "<td id=\"helpme-td\">".$processname."</td></tr>";

			
		}
		echo "</table></div>";	
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
echo "</p>";

}
?>
</div>