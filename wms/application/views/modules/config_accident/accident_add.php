<head>

<link type="text/css" href="css/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	

  <!-- datepicker thai year -->

 <script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>

<script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>

<style type="text/css">

.ui-datepicker{

	width:200px;

	font-family:tahoma;

	font-size:11px;

	text-align:center;

}

</style>

<script>

	$(function () {

		    var d = new Date();

		     var toDay =(d.getFullYear() + 543)  + '-' + (d.getMonth() + 1) + '-' + d.getDate();


	 $("#txtdateend").datepicker({ showOn: 'button', changeMonth: true, changeYear: true,dateFormat: 'yy-mm-dd', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],

              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],

              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],

              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});



	  $("#txtdateout").datepicker({ showOn: 'button', changeMonth: true, changeYear: true,dateFormat: 'yy-mm-dd', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],

              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],

              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],

              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

	});

</script>

<SCRIPT LANGUAGE="Javascript" SRC="../FusionCharts/FusionCharts.js"></SCRIPT>

</head>

<?php

	$tablename="tb_accident";

	$content="";



	if(isset($_POST['btsave'])){

		$date=$_POST['txtdate'];

		$type=EscapeValue($_POST['cbotype']);

		$moo=EscapeValue($_POST['cbomoo']);

		$address=EscapeValue($_POST['txtaddress']);

		$detail=EscapeValue($_POST['mytextarea']);

		$time=EscapeValue($_POST['cbotime']);

		$sick=EscapeValue($_POST['txtsick']);

		$injure=EscapeValue($_POST['txtinjure']);

		$dead=EscapeValue($_POST['txtdead']);



		$strSql="insert into  $tablename(date,type,moo,address,detail,time,sick,injure,dead) Values('$date','$type','$moo','$address','$detail','$time','$sick','$injure','$dead')";

		$rs=rsQuery($strSql);

		if($rs){

			$updatetran=UpdateTrans($table,'add',$_SESSION['username'],'ID:'.$id);

			echo"<script>alert('บันทึกข้อมูลเรียบร้อย');window.location.href='accident';</script>";

		}

	}

?>

 <body>
 <div class="card card-shadow" id="CardDetail">
     <div class="card-header">
         <div class="row">
             <div class="col-lg-12">
                 <h4><?php $head ="ระบบบันทึกสถิติอุบัติเหตุ";
                     echo $head; ?></h4>
             </div>
         </div>
     </div>
     <div class="card-body">
         <div class="row mb-2">
             <div class="col-lg-12">
             </div>
         </div>
         <div>
         </div>
     </div>

 <form name="frmnews" method="POST" action="" enctype="multipart/form-data">

	<table class="content-input" style="background-color: white">

		<tr>

			<th width="20%">วันที่</th><td width="80%"><input type="date" name="txtdate" id="txtdate" value="<?php echo $v_date;?>"></td>

		</tr>

		<tr>

			<th>ประเภท</th><td><select name="cbotype"><option value="0">-- เลือกข้อมูล --</option>

				<?php

					$sql="select * from tb_accident_type order by id";

					$rs=rsQuery($sql);

					if($rs){

						while($data=mysqli_fetch_assoc($rs)){

							$id=$data['id'];

							$name=$data['name'];

							echo "<option value='$id'>$name</option>";

						}

					}

					?>

					</select></td>

			</tr>

			<tr>

				<th>หมู่ที่</th><td><select name="cbomoo"><option value="0">-- เลือกข้อมูล --</option>

					<?php

						$msql="select * from tb_accident_moo order by id";

						$mrs=rsQuery($msql);

						while($m=mysqli_fetch_assoc($mrs)){

							$id=$m['id'];

							$name=$m['name'];

							echo "<option value='$id'>$name</option>";

					}

						?>

					

						</select></td>

				</tr>

				<tr>

					<th>สถานที่เกิดเหตุ</th><td><input type="text" name="txtaddress" value="<?php echo $v_address;?>" size="60"></td>

				</tr>

				<tr>

					<th>ช่วงเวลา</th><td><select name="cbotime"><option value="0">--เลือกข้อมูล--</option>

						<?php

							$sql="select * from tb_accident_time order by name";

								$rs=rsQuery($sql);

								if($rs){

									while($data=mysqli_fetch_assoc($rs)){

										$id=$data['id'];

										$name=$data['name'];

										echo "<option value='$id'>$name</option>";

						}

					}

						?>

						</select></td>

					</tr>

					<tr>

						<th>ผู้ป่วย</th><td><input type="text" name="txtsick" value="<?php echo $v_sick;?>"></td>

					</tr>

					<tr>

						<th>ผู้บาดเจ็บ</th><td><input type="text" name="txtinjure" value="<?php echo $v_injure;?>"></td>

					</tr>

					<tr>

						<th>ผู้เสียชีวิต</th><td><input type="text" name="txtdead" value="<?php echo $v_dead;?>"></td>

					</tr>

				<tr>

					<th>รายละเอียด</th><td><textarea name="mytextarea" id="mytextarea" > </textarea></td>

				</tr>

				<tr>

				<td></td><td><input type="submit" name="btsave" value="บันทึก"></td>

				</tr>

				</table>

				

  </form>

 </body>

</html>





<script src='../js/tinymce/tinymce.min.js'></script>

<script>

    tinymce.init({





        selector: '#mytextarea',

        theme: 'modern',

        width: "100%",

        height: 300,

        plugins: [

            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',

            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',

            'save table contextmenu directionality emoticons template paste textcolor'

        ],



        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',





        image_title: true,

        // enable automatic uploads of images represented by blob or data URIs

        automatic_uploads: true,

        // add custom filepicker only to Image dialog

        file_picker_types: 'image',

        file_picker_callback: function(cb, value, meta) {

            var input = document.createElement('input');

            input.setAttribute('type', 'file');

            input.setAttribute('accept', 'image/*');



            input.onchange = function() {

                var file = this.files[0];

                var reader = new FileReader();



                reader.onload = function () {

                    var id = 'blobid' + (new Date()).getTime();

                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;

                    var base64 = reader.result.split(',')[1];

                    var blobInfo = blobCache.create(id, file, base64);

                    blobCache.add(blobInfo);



                    // call the callback and populate the Title field with the file name

                    cb(blobInfo.blobUri(), { title: file.name });

                };

                reader.readAsDataURL(file);

            };



            input.click();

        }





    });





</script>

