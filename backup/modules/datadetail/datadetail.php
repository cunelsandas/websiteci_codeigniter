<?php
	$tablename="tb_datadetail";
	$tabletype="tb_datadetail_type";
	if(isset($_GET['type'])){
		$type=EscapeValue(decode64($_GET['type']));
		$sql="select * from $tablename Where type='$type' And status='1' Order by no DESC Limit 0,1";
		$rs=rsQuery($sql);
		if($rs){
			$data=mysqli_fetch_array($rs);
			$subject=$data['subject'];
			$detail=$data['detail'];
			$type=$data['type'];
			$typename=FindRS("select * from $tabletype where id='$type'",name);
			echo "<div id=\"datadetail\">";
			echo "<p>$subject</p>";
			echo $detail;
			echo "</div>";
		}
	}
?>
