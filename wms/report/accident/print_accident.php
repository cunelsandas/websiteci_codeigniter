	<html>
 <head>
  <title> รายงานการบริการการแพทย์ฉุกเฉิน </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style>
	@import url(../../../font/thsarabunnew.css);
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

	
    .page {
	font-family:THSarabunNew,THBaijam,THK2DJuly8,THChakraPetch,THNiramitAS,Tahoma ,sans-serif;
	font-size:12px;
        width: 21cm;
        min-height: 29.7cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		
    }
    .subpage {
	
        padding: 0.5cm;
        
        height: 245mm;
        outline: 2cm;
/*		background:url("../../../images/logo.png") no-repeat top center; */
    }
	.content-table{

	width:100%;
}
.content-table table{
	width:100%;
}
.content-table th{
	background-color:#437e32;
	color:#ffffff;
	font-size:12px;

}
.content-table td{
	font-size:12px;
	padding:5px;
	border-bottom:dashed 1px #acdf11;
}

.content-table  tr:hover td {
	background-color:#bedc92;
}
    
    @page {
		
        size: A4;
        margin: 0;
    }
    @media print {
		
		
		.page {
			font-family:THSarabunNew,THBaijam,THK2DJuly8,THChakraPetch,THNiramitAS,Tahoma ,sans-serif;
	font-size:12px;
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
		 .subpage {
	
        padding: 0.5cm;
        
        height: 240mm;
        outline: 2cm;
		/*background:url("http://www.sunpukwan.go.th/images/krut.jpg") no-repeat top center; */
    }
	
	.content-table{

	width:100%;
}
.content-table table{
	width:100%;
}
.content-table th{
	font-size:12px;
	color:#000000;
	background-color:none;

}
.content-table td{
	font-size:12px;
	padding:5px;
	border-bottom:solid 1px black;
}


    }

</style>
</head><body>
	<?php
		include_once("../../../itgmod/connect.inc.php");
		$tablename="tb_accident";
		if(isset($_GET['dstart'])){
		$datestart=EscapeValue($_GET['dstart']);
		$dateend=EscapeValue($_GET['dend']);
		$strYear = date("Y",strtotime($datestart));
		
		$caption="สรุปอุบัติเหตุจำแนกตามประเภท";
		$subcaption="ระหว่างวันที่.".DateThai($datestart)." ถึงวันที่ ".DateThai($dateend);
	
		$caption2="สรุปอุบัติเหตุจำแนกตามสถานที่เกิดเหตุ";
	
		$caption3="สรุปอุบัติเหตุจำแนกตามช่วงเวลาเกิดเหตุ";
		$subcaption3=$subcaption;
				
		$caption4="สรุปอุบัติเหตุจำแนกตาจำนวนผู้บาดเจ็บ";
		$subcaption4=$subcaption;
		
		$strSql="select type,count(id) as sumtype from $tablename where date between '$datestart' And '$dateend' Group By type Order by type";
		$strsql1=$strSql;
		$strSql2="select moo,count(id) as summoo from $tablename where date between '$datestart' And '$dateend' Group By moo Order by moo";
		$strsql2=$strSql2;

		$strSql3="select time,count(id) as sumtime from $tablename where date between '$datestart' And '$dateend' Group By time Order by time";
		$strsql3=$strSql3;

		$strSql4="select month(date) as summonth,sum(sick) as sumsick,sum(injure) as suminjure,sum(dead) as sumdead from $tablename where year(date)='$strYear' Group By summonth Order by summonth";
		$strsql4=$strSql4;

		}
		echo "<div class='page'><div class='subpage'>";
		echo "<center><img src='../../../images/logo.png' width='120px'><br>รายงานสรุปการบริการการแพทย์ฉุกเฉิน $customer_name<br>$subcaption</center>";
		echo "<table class='content-table'>";
		echo "<tr><th colspan='2'>$caption</th></tr>";
		echo "<tr><th>ประเภท</th><th>จำนวน</th></tr>";
		$rs=rsQuery($strSql);
		if($rs){
			while($data=mysqli_fetch_assoc($rs)){
				$type=$data['type'];
				$typename=FindRS("select name from tb_accident_type where id=$type",name);
				$sumtype=$data['sumtype'];
				echo "<tr><td>$typename</td><td>$sumtype</td></tr>";
			}
		}
		echo "</table>";
		
		echo "<br><br>";
		
		echo "<table class='content-table' width='100%'>";
		echo "<tr><th colspan='2'>$caption2</th></tr>";
		echo "<tr><th>หมู่่ที่</th><th>จำนวน</th></tr>";
		$rs=rsQuery($strSql2);
		if($rs){
			while($data=mysqli_fetch_assoc($rs)){
				$type=$data['moo'];
				$typename=$type;
				$sumtype=$data['summoo'];
				echo "<tr><td>$typename</td><td>$sumtype</td></tr>";
			}
		}
		echo "</table>";
		
		echo "<br><br>";
		
		echo "<table class='content-table'>";
		echo "<tr><th colspan='2'>$caption3</th></tr>";
		echo "<tr><th>ช่วงเวลาเกิดเหตุ</th><th>จำนวน</th></tr>";
		$rs=rsQuery($strSql3);
		if($rs){
			while($data=mysqli_fetch_assoc($rs)){
			
				$type=$data['time'];
				$typename=FindRS("select name from tb_accident_time where id=$type",name);
				$sumtype=$data['sumtime'];
				echo "<tr><td>$typename</td><td>$sumtype</td></tr>";
			}
		}
		echo "</table>";
		
		echo "<br><br>";

		
		echo "<table class='content-table'>";
		echo "<tr><th colspan='5'>$caption4</th></tr>";
		echo "<tr><th>เดือน</th><th>ผู้ป่วย</th><th>ผู้บาดเจ็บ</th><th>ผู้เสียชีวิต</th><th>รวม</th></tr>";
		
		$rs=rsQuery($strSql4);
		if($rs){
			while($data=mysqli_fetch_assoc($rs)){
				
				$type=$data['summonth'];
				
				$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
				$typename=$strMonthCut[$type];
				$sumsick=$data['sumsick'];
				$suminjure=$data['suminjure'];
				$sumdead=$data['sumdead'];
				$total=$sumsick+$suminjure+$sumdead;
				$totalsick+=$sumsick;
				$totalinjure+=$suminjure;
				$totaldead+=$sumdead;
				$sumtotal+=$total;
				echo "<tr><td>$typename</td><td>$sumsick</td><td>$suminjure</td><td>$sumdead</td><td>$total</td></tr>";
			}
				echo "<tr><td>รวม</td><td>$totalsick</td><td>$totalinjure</td><td>$totaldead</td><td>$sumtotal</td></tr>";
		}
		echo "</table>";
		
		
		echo "</div></div>";
	?>
 </body>
</html>
