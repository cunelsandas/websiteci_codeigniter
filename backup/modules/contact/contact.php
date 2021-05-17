<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-8">
	<TITLE><?php echo "หมายเลขโทรศัพท์ ".$customer_name;?></TITLE>
	  <meta name="Keywords" content="<?php echo $customer_name."  ".$customer_tambon."  ".$customer_amphur."  ".$customer_province;?>">
  <meta name="Description" content="<?php echo $customer_name."  ".$customer_tambon."  ".$customer_amphur."  ".$customer_province;?>">
	<style>
			#tb1 table{
				background:#ccffff;
				color:#006600;
			}
			#tb1 td{
				background:#99cc00;
				color:#990000;
			}
			#tb1 td:hover{
				background:#ffff99;
			}
				#tb2 table{
				background:#ff9900;
				color:#000000;
				}
				#tb2 td:hover{
				background:#ff6600;
			}
				#tb3 table{
				background:#82cace;
				color:#000000;
				}

				#tb3 th{
				background:#214550;
				color:#ffffff;
				}
				#tb3 td{
				background:#428a9f;
				color:#ffffff;
				}
				#tb3 td:hover{
				background:#b1e7c1;
				color:#000000;
			}
	</style>
</HEAD>
<BODY bgcolor="#ffffff">
<div id="contact">
	<center>
	<img src="./images/logo.jpg">
	<p><?php echo $customer_name .'  '.$customer_province;?></p>
	<p>หมายเลขโทรศัพท์</p>
	<div id="tb1">
	<table width="70%">
		<tr>
			<td width="70%"><?php echo $nayok_position;?></td><td width="30%">053-276491 ต่อ 804 , 809</td>
		</tr>
		<tr>
			<td><?php echo "เลขานุการ".$nayok_position;?></td><td>053-276491 ต่อ 809</td>
		</tr>
	</table>
	</div>
	<br>
	<div id="tb2">
	<table bgcolor="#f1b77c" width="70%">
		<tr>
			<td width="70%">งานป้องกันและบรรเทาสาธารณภัย </td><td width="30%">053-805182 ตลอด 24 ชั่วโมง </td>
		</tr>
	</table>
	</div>
	<br>
	<div id="tb3">
	<table bgcolor="#ffff66" width="70%">
		<tr>
			<th width="70%"><?php echo $customer_name;?></th><th width="30%">053-276491, 053-447657  053-447911, 053-805184</th>
		</tr>
		<tr>
			<td>สำนักปลัด</td><td>ต่อ 112  </td>
		</tr>
		<tr>
			<td>กองคลัง</td><td>ต่อ 206  </td>
		</tr>
		<tr>
			<td>กองช่าง</td><td>ต่อ 345  </td>
		</tr>
		<tr>
			<td>กองสาธารณสุขฯ</td><td>ต่อ 403  </td>
		</tr>
		<tr>
			<td>กองสวัสดิการ</td><td>ต่อ 602 </td>
		</tr>
		<tr>
			<td>กองวิชาการ</td><td>ต่อ 115 </td>
		</tr>
		<tr>
			<td>กองศึกษา</td><td>ต่อ 503  </td>
		</tr>
		<tr>
			<td>งานประชาสัมพันธ์</td><td>ต่อ 0  </td>
		</tr>
		<tr>
			<td>งานจัดเก็บรายได้</td><td>ต่อ 203 </td>
		</tr>
		<tr>
			<td>บริการจุดเดียวเบ็ดเสร็จ</td><td>ต่อ 302 </td>
		</tr>

		</table>
		</div>
	</center>
	</div>
			<br>
		<center>
		แผนที่เทศบาลเมืองแม่เหียะ
		</center>
	<center>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(18.7432976,98.9638969),
    zoom:18,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</HEAD>
<BODY>
<div id="contact">
	
	<div id="default-map"style="border:solid 3px#ff3333;width:580px;height:400px;padding:5px;box-shadow:5px 5px 5px 5px #000000;background-color:#ccffff" valign="center" align="center">
			<div id="googleMap" style="width:575px;height:395px;"></div><BR><BR>
			</div>
			</center>
</BODY>
</HTML>