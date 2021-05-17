<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 -->
 
<!--<div><p>แบบสอบถาม (Questionnaire)</p></div>-->
<?php
	//include "../../../itgmod/connect.inc.php";
	
	if(isset($_GET['del'])){
		echo "del";
	}
	if(isset($_GET['index'])){
		include "questionnaire_index1.php";
	}elseif(isset($_GET['master'])){
		include "questionnaire_master1.php";
	}elseif(isset($_GET['submaster'])){
		include "questionnaire_submaster1.php";
	}elseif(isset($_GET['detail'])){
		include "questionnaire_detail1.php";
	}elseif(isset($_GET['result'])){
		include "questionnaire_result1.php";
	}else{
		
?>

    

<!--<form name='frmproject' method='post' action=''>-->
<!--	-->
<!--		<div class='form-inline'>-->
<!--			<label >สร้างแบบสอบถามใหม่</label>-->
<!--		-->
<!--			<input type='text' name='txtname' class='form-control ml-2'>-->
<!--			<input type='submit' name='btadd' class='btn btn-info ml-2' value='บันทึก'>-->
<!---->
<!--		</div>-->
<!--	-->
<!--</form>-->
        <div class="card card-shadow" id="CardDetail">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12">
                    <h4><?php $head = "แบบสอบถาม";
                        echo $head; ?></h4>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-lg-12">
                <div class="input-group">

                </div>
            </div>
        </div>
        <div id="div-show" data-site="<?php echo $site; ?>"></div>
        <div id="div-modal"></div>
<div>
	<table class='table table-bordered'>
		<tr>
			<th>รายการแบบสอบถาม</th>
		</tr>
		<?php
			$sql="select * from tb_questionnaire_project order by id";
			$rs=newQuery($sql);
			
			if($rs->rowCount()>0){
				while($data = $rs->fetch()){
					$id=$data['id'];
					$name=$data['name'];
					echo "<tr><td><a href='questionnaire?_mod=".$_GET['_mod']."&_modid=".$_GET['_modid']."&index=$id&p_id=$id'>$name</a></td></tr>";
//                    <a href='?del=$id'>ลบ</a>
				}
			}
		?>
	</table>
</div>
</div>
	<?php }?>