<style>
	.body-bg_ita{
		margin-top:20px;
		padding:20px;
		background-color:white;
}
	.submenu_ita{
	margin-left:30px;
	padding:5px;
	color:#3e9f40;
        font-size: 1.2rem;
}
	.detail_ita{
	margin-left:50px;
	padding:5px;
	font-size:1.2rem;
	
	}
	.itgtoggle{
		padding:10px;
		color:#0000ff;
		background-color:#e2e2e2;
		border:solid 0.5px #8d8d8d;
		font-size:1.3rem;

	}
	.itgtoggle:hover{
		color:#ff0000;
	}
	.header_ita{
		color:#000080;
        font-size: 2rem;
        text-align: center;
	}
</style>
<div class='body-bg_ita'><p class='header_ita'>แบบประเมิน ITA (Integrity and Transparency Assessment) พ.ศ. 2564</p><p class='header_ita'><?php echo 'เทศบาลตำบลแม่แรม';?></p><br>
<?php
error_reporting(E_ALL & ~E_NOTICE);

function connect(){
    global $g_user;
    global $g_pw;
    global $g_db;

    $server="localhost";
    $user=USEUSER;
    $pw=USEPASSWORD;
    $db=USEDATABASE;
    $conn = new mysqli($server, $user, $pw, $db);

    /*
     * This is the "official" OO way to do it,
     * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
     */
    if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') '. $conn->connect_error);
    }
    return $conn;
}


function rsQuery($sql){
    $con=connect();
    if($sql==""){
        return false;
    }else{
        $con->set_charset("utf8");

        $rs=$con->query($sql);
        if($rs !== false){
            //	$error=$con->error;
            return $rs;
        }else{
            $error=$con->error;
            return $error;
        }
    }
    $rs->free();
    $con->close();
}
	$sql="select * from tb_ita_menu_2564 Order by listno ASC";
	$rs=rsQuery($sql);
	if($rs){
		$strTable .="<dl >";
		while($data=mysqli_fetch_assoc($rs)){
			$id=$data['id'];
			$name=$data['name'];
			$strTable .="<div class='itgmenudata'><div class='itgtoggle'><dt>$name</dt>";
			$sql_sub="select * from tb_ita_submenu_2564 where menuid=$id Order by listno ASC";
				$rsSub=rsQuery($sql_sub);
				if($rsSub){
					$strTable .="</div><ul class='itghidedata' style='display:none;'>";
					while($dataSub=mysqli_fetch_assoc($rsSub)){
						$submenuid=$dataSub['id'];
						$subname=$dataSub['name'];
						$strTable .="<li class='submenu_ita'>$subname</li>";
						$sql_detail="select * from tb_ita_detail_2564 where submenuid=$submenuid Order by listno ASC";
						$rsDetail=rsQuery($sql_detail);
						if($rsDetail){
							$strTable .="<ul>";
							while($dataDetail=mysqli_fetch_assoc($rsDetail)){
								$detailid=$dataDetail['id'];
								$detailname=$dataDetail['name'];
								$modid=$dataDetail['modid'];
								$modname=$dataDetail['modname'];
								$link=$dataDetail['link'];
								if($link<>null || $link<>""){
									$strTable .="<li class='detail_ita'><a href='$link' target='_blank'>$detailname</a></li>";
								}else{
									$strTable .="<li class='detail_ita' style='color:#589a80;'>$detailname</li>";
								}
							}
							$strTable .="</ul>";
						}
						
					}
					$strTable .="</ul></div>";
				}
			
		}
		$strTable .="</dl>";
	}
		echo "<div style='text-align:left;'>";
		echo $strTable;
		echo "</div>";

		//http://songkwae.go.th/index.php?_mod=aXRh
?>
</div>

<SCRIPT language="javascript" type="text/javascript">
$(document).ready(function(){
// TOGGLE SCRIPT
	$('.itghidedata').hide();
	$('.itgmenudata').css('cursor', 'pointer');
 	$('div.itgtoggle').click(function(event){
	$(this).parents('.itgmenudata').find('.itghidedata').slideToggle("fast");
		return false;
	}); // END TOGGLE
 });
</script>
