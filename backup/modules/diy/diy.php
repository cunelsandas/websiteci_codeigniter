<?php
	
	$tablename="tb_diy";
	$tabletype="tb_diy_type";

		$type=decode64($_GET['type']);
		$no="0";
		if(isset($_GET['no'])){
			$no=decode64($_GET['no']);
		}
		

		if($no=="0"){
		$sql="select * from $tablename Where type='$type' And status='1' Order by no DESC Limit 0,1";
		}else{
				$sql="select * from $tablename Where no='$no' And status='1'";
		}
		
		$rs=rsQuery($sql);
		if($rs){
			$data=mysqli_fetch_array($rs);
			$subject=$data['subject'];
			$detail=$data['detail'];
			$type=$data['type'];
			$typename=FindRS("select * from $tabletype where id='$type'",name);
			echo "<div id=\"diy\">";
			echo "<p>$subject</p>";
			echo $detail;
			echo "</div>";
		}

	
?>
