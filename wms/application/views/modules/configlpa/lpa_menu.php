<?php
	$modid=$_GET['_modid'];
	$mod=$_GET['_mod'];
    $modname=FindRS("select modname from tb_mod where modid=$modid","modname");
    $tablename=FindRS("select tablename from tb_mod where modid=$modid","tablename");
	$type=$_GET['type'];


	$btvalue="addnew";
	$sqlShow="select * from $tablename Order by listno ASC";
	$rsShow=rsQuery($sqlShow);
	if($rsShow || msyqli_num_rows($rsShow)>0){
		while($data=mysqli_fetch_assoc($rsShow)){
			$id=$data['id'];
			$name=$data['name'];
			$listno=$data['listno'];
			$strTableDetail .="<tr><td style='padding: 10px;border-bottom: solid 1px black' align='center'>$name</td><td style='padding: 10px;border-bottom: solid 1px black' align='center'>$listno</td><td style='padding: 10px;border-bottom: solid 1px black' align='center'><a class=\"btn btn-warning btn-sm text-white\" href=\"lpa?_modid=".$modid."&_mod=".$_GET['_mod']."&type=".$type."&id=".$id."\"><i class=\"fa fa-edit btn-add\"></i></a>&nbsp;&nbsp;&nbsp;<a class=\"btn btn-danger btn-sm text-white\" href=\"lpa?_modid=".$modid."&_mod=".$_GET['_mod']."&type=".$type."&del=".$id."\" onclick=\"return confirm('คุณต้องการลบรายการนี้ใช่หรือไม่ ?');\"><i class=\"fa fa-trash-o btn-remove\"></i></a></td>";
		}

	}
	if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="select * from $tablename where id=$id";
	$rsView=rsQuery($sql);
	if($rsView){
		$data=mysqli_fetch_assoc($rsView);
		$vid=$data['id'];
		$vname=$data['name'];
		$vlistno=$data['listno'];
		$btvalue="edit";
	}
	}

	if(isset($_POST['btsave'])){
		
		$id=$_POST['id'];
		$name=$_POST['name'];
		$listno=($_POST['listno']=="")?"0":$_POST['listno'];
		if($_POST['btsave']=="addnew"){
			$sql="insert into $tablename(name,listno)values('$name',$listno)";
			$msg="เพิ่มข้อมูลใหม่สำเร็จ";
		}else{
			$sql="update $tablename SET name='$name',listno=$listno where id=$id";
			$msg="แก้ไขข้อมูลสำเร็จ";
		}
			$rs=rsQuery($sql);
			if($rs){
				echo "<script>alert('".$msg."');window.location.href='lpa?_modid=".$modid."&_mod=".$mod."&type=".$type."';</script>";
			}
			

	}

	if(isset($_GET['del'])){
        $sql = "DELETE From $tablename Where id='" . $_GET['del'] . "'";
        $rs=rsQuery($sql);
        if($rs){
            // update table tb_trans บันทึกการลบ
            $updatetran=UpdateTrans('$tablename','delete',$_SESSION['username'],'ID:'.$_GET['del']);
            echo"<script>window.location.href='lpa?_modid=".$modid."&_mod=".$_GET['_mod']."&type=".$type."';</script>";
        }
    }

?>
<form name='frmlpa' action='' method='POST'>
<div class='content-box'>
    <p align="center" style="margin-top: 2%;text-decoration: underline;font-size: 1.3rem;font-weight: bold">หัวข้อ"หลัก"การประเมิน LPA</p>
	<hr>
    <div class='content-input' style="text-align: center">
			<table width='100%'>
				<tr>
					<td>ชื่อ<input type='text' name='name' value='<?php echo $vname;?>'>&nbsp;ลำดับที่<input type='text' name='listno' value='<?php echo $vlistno;?>'></td>
				</tr>
				<tr>
					<td><input type='hidden' name='id' value='<?php echo $vid;?>'><input type='submit' name='btsave' value='เพิ่มหัวข้อหลัก'></td>
				</tr>
			</table>
		</div>

		<div class='content-table'>
            <table width='100%' style="margin: auto;">
                <tr style="text-align: center;background-color: pink;height: 40px;">
					<th width='70%'>รายการ</th>
					<th width='20%'>ลำดับการแสดงผล</th>
					<th width='10%'></th>
				</tr>
				<?php echo $strTableDetail;?>
			</table>
		</div>
</div>
</form>

