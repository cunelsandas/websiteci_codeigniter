
<div id="activity_nayok">
<BR><BR><BR>

<?php
$tablename="tb_activity_nayok";  //ชื่อ ตารางข้อมูล
$picfolder="fileupload/activity_nayok/";  // ชื่ีอโฟลเดอร์เก็บภาพ
$bordername="border-dot-blue";  //ชื่อสไตร์สำหรับขอบแสดงข้อความ
$borderpic="picborder"; // ชื่อ id ของของแสดงรูปภาพ
$mod=ClearValue(decode64($_GET['_mod']));
!empty($_GET['no'])?$no=$_GET['no']:null;
if($no<>""){
	include"modules/activity_nayok/activity_nayok_view.php";
}else{
if(!isset($_GET['start'])){
		$start1=0;
	}else{
		$start1=$_GET['start'];
	}
	$limit = '10'; // แสดงผลหน้าละกี่หัวข้อ

	/* หาจำนวน record ทั้งหมด
	ปล. อันนี้ต้องใช้กับตัวแบ่งนะ ห้ามเอาออก*/
	$sql="Select * From ".$tablename." where status='1'";
	$Qtotal = rsQuery($sql); //คิวรี่ คำสั่ง
	$total = mysqli_num_rows($Qtotal); // หาจำนวน record

	/*คิวรี่ข้อมูลออกมาเพื่อแสดงผล */
	$sql="Select * From ".$tablename." Where status='1'  Order by no DESC Limit $start1,$limit";
	$Query = rsQuery($sql); //คิวรี่คำสั่ง
	$totalp = mysqli_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
	if($totalp==0){
		echo"<p align=\"center\">- - - - - - - - - - ยังไม่มีข้อมูล- - - - - - - - - -</p><BR><BR><BR><BR>";
		/*	วนลูปข้อมูล */
	}else{
		
		$i=$start;
		while($arr = mysqli_fetch_array($Query)){
			$strSql="select * from filename where tablename='$tablename' AND masterid='".$arr['no']."' Order by id DESC limit 0,1";	
			$rs2=mysqli_query($strSql);
			$rs_filename=mysqli_fetch_array($rs2);
			$rs_row=mysqli_num_rows($rs2);
			echo"<table width=\"100%\" cellpadding=\"0\" cellspacing=\"1\"  border=\"0\">";
			echo"<tr>";
			echo"<td class=\"tbl1\" >";
			
			echo"<table width=\"100%\" cellpadding=\"0\" cellspacing=\"1\"  border=\"0\">";
			echo"<tr>";
			echo"<td class=\"tbl1\" vlign=\"top\" width=\"150\" height=150 id='$borderpic'>";
			if($rs_row > 0){
			echo"<img src=".$picfolder.$rs_filename['filename']." width=150 height=150>";
			}else{
				echo"<img src=".$picfolder.$arr['no']."-1.JPG width=150 height=150>";
			}
			echo"</td>";
			echo"<td  valign=\"top\" id='$bordername'><font id=space10>";
			
			echo"<a class=\"list\" href=\"index.php?_mod=".encode64($mod)."&no=".encode64($arr['no'])."\"><b>".$arr['subject']."</b></a><br><font id=space10>";
			//$msg=iconv("UTF-8","TIS-620",$arr['detail1']);
			//$msg=substr($msg,0,250);
			//$msg=iconv("TIS-620","UTF-8",$msg);
			//$msg=$msg."....";
			//$detail=$arr['detail1'];
			$msg=wordwrap($arr['detail1'],200);
			echo $msg;
			if($showdate=="yes"){
			echo"<br></font>&nbsp;<font id=font-clay>".thaidate($arr['datepost'])."</font>";
			}
			echo"</td>";
			echo"</tr>";
			echo"</table>";
			
			echo"</td>";
			echo"</tr>";
			echo"</table><br>";
		}
	}


	/* ตัวแบ่งหน้า */
	$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า
	/* เอาผลหาร มาวน เป็นตัวเลข เรียงกัน เช่น สมมุติว่าหารได้ 3 เอามาวลก็จะได้ 1 2 3 */
	empty($_GET['page'])?$p="1":$p=$_GET['page'];
	echo"<p style=\"text-align:left;margin-left:45px;\">";
	for($i=1;$i<=$page;$i++){			
		if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
			echo "[<a class=\"cout\" href='index.php?_mod=".encode64($mod)."&start=".$limit*($i-1)."&page=$i'><font color=#CC0000><B>$i</B></font></A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
		}else{
			echo "[<a class=\"cout\" href='index.php?_mod=".encode64($mod)."&start=".$limit*($i-1)."&page=$i'>$i</A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
		}			
	}
	echo"</p></div>";
}

