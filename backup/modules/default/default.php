<?php
		$img_new="<img src=images/new.gif>";
?>
<html>
<head>
<!-- เพลง -->
<!--<embed src="fileupload/mp3/march.mp3" autostart="true" loop="false" hidden="true">  -->
</head>

<body>
    <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $AutoPlaySteps: 4,
              $SlideDuration: 160,
              $SlideWidth: 200,
              $SlideSpacing: 3,
              $Cols: 4,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 4
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 1,
                $SpacingY: 1
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 809);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 03 css */
        /*
        .jssorb03 div           (normal)
        .jssorb03 div:hover     (normal mouseover)
        .jssorb03 .av           (active)
        .jssorb03 .av:hover     (active mouseover)
        .jssorb03 .dn           (mousedown)
        */
        .jssorb03 {
            position: absolute;
        }
        .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
            position: absolute;
            /* size of bullet elment */
            width: 21px;
            height: 21px;
            text-align: center;
            line-height: 21px;
            color: white;
            font-size: 12px;
            background: url('images/b03.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb03 div { background-position: -5px -4px; }
        .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
        .jssorb03 .av { background-position: -65px -4px; }
        .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }

        /* jssor slider arrow navigator skin 03 css */
        /*
        .jssora03l                  (normal)
        .jssora03r                  (normal)
        .jssora03l:hover            (normal mouseover)
        .jssora03r:hover            (normal mouseover)
        .jssora03l.jssora03ldn      (mousedown)
        .jssora03r.jssora03rdn      (mousedown)
        */
        .jssora03l, .jssora03r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('images/a03.png') no-repeat;
            overflow: hidden;
        }
        .jssora03l { background-position: -3px -33px; }
        .jssora03r { background-position: -63px -33px; }
        .jssora03l:hover { background-position: -123px -33px; }
        .jssora03r:hover { background-position: -183px -33px; }
        .jssora03l.jssora03ldn { background-position: -243px -33px; }
        .jssora03r.jssora03rdn { background-position: -303px -33px; }
    </style>
<div id="travel">
 <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden;">
           
            <?php
					$tb_name="tb_travel";
					$div_name="travel";
					$foldername="fileupload/travel/";
					$sql="Select * From $tb_name Where status=1 Order by datepost DESC";
					
					$rs=rsQuery($sql);
					
					while($row_news=mysqli_fetch_array($rs)){
					if ($row_news){
						$strSql="select * from filename where tablename='$tb_name' AND masterid='".$row_news['no']."' Order by Rand() limit 1";	
						$rs2=rsQuery($strSql);
						$rs_filename=mysqli_fetch_array($rs2);
						$showimage=SearchImage($tb_name,$row_news['no'],$foldername,"0");
					}
					
					 echo "<div style='display: none;'>";
					 echo "<a href=index.php?_mod=".encode64($div_name)."&no=".encode64($row_news['no'])." ><img data-u='image' src='$showimage' /></a>";
					 echo "</div>";
								
					}
					?>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:21px;height:21px;">
                <div data-u="numbertemplate"></div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <a href="http://www.jssor.com" style="display:none">Bootstrap Carousel</a>
    </div>
    <script>
        jssor_1_slider_init();
    </script>
	
	</div>
	<BR>
<div id="default-news">
	 <?php
					$tb_name="tb_news";
					$div_name="news";
					$foldername="fileupload/news/";
					echo "<table width='90%' border='0'><th colspan='2'></th>";
					$sql="Select * From $tb_name Where status=1 Order by datepost DESC limit 0,3";
					
					$rs=rsQuery($sql);
					
					while($row_news=mysqli_fetch_array($rs)){
					$showimage=SearchImage($tb_name,$row_news['no'],$foldername,"0");
					
					
					echo "<tr>";
					echo "<td width=\"30%\"><img src='$showimage' ></td>";
					echo "<td valign='center' colspan='2'><div id=subject><a href=index.php?_mod=".encode64($div_name)."&no=".encode64($row_news['no'])." >-:-&nbsp;".$row_news['subject']."&nbsp;-:-</a></div><div id=detail>".$row_news['detail1']."</div></td>";
					
					
					echo "</tr>";
				
					}
					echo "<tr><td colspan=\"2\" align=\"right\" valign=\"bottom\" height=\"10\"><a href=\"index.php?_mod=".encode64($div_name)."\" class='readmore'></a></td></tr>";
					echo "</table>";
?>	
</div>
<br>
<div id="default-activity">
	<center>
	
	 <?php
					$tb_name="tb_activity";
					$div_name="activity";
					$foldername="fileupload/activity/";
					$sql="Select * From $tb_name Where status=1 Order by datepost DESC limit 0,6";
					
					$rs=rsQuery($sql);
					echo "<table><tr><td>";
					echo "<div id=\"mainwrapper\">";
					while($row_news=mysqli_fetch_array($rs)){
						$numrow=$numrow+1;
				//	if ($row_news){
				//		$strSql="select * from filename where tablename='$tb_name' AND masterid='".$row_news['no']."' Order by Rand() limit 1";	
				//		$rs2=rsQuery($strSql);
				//		$rs_filename=mysqli_fetch_array($rs2);
				//	}
					$showimage=SearchImage($tb_name,$row_news['no'],$foldername,"0");
					$subject=$row_news['subject'];
					$detail=$row_news['detail1'];
					echo "<div id=\"box-6\" class=\"box\">";
					echo "<a href=index.php?_mod=".encode64($div_name)."&no=".encode64($row_news['no'])." ><img id=\"image-6\" src='$showimage'>";
					echo "<span class=\"caption scale-caption\">";
					echo "<h3>".$subject."</h3>";
					echo "<p>".$detail."</p>";
					echo "</span>";
					echo "</div>";
				
				
					}
					echo "</div>";
					echo "</td></tr>";
					echo "<tr><td colspan=\"3\" align=\"right\" valign=\"center\" ><a href=\"index.php?_mod=".encode64($div_name)."\" class=\"readmore\"></a></td></tr>";
?>
	
		
		
			
		
	</table>
	</center>
</div>
<br>

<!-- จัดซื้อจัดจ้าง -->
    <div id="default-purchase">
				
					<table width=90% border=0>
					
					<tr><td>
					<?php 
						$tb_name="tb_purchase";
					$div_name="purchase";
						$sql="Select * From $tb_name where status='1' Order by datepost DESC limit 0,6";
		  					rsQuery("SET NAMES utf8");
							 $rs=rsQuery($sql);
							while($row = mysqli_fetch_array($rs)){
								$datediff=DateDiff($row['datepost'],date("Y-m-d"));
								if($datediff<=10){
									$img=$img_new;
									
								}else{
									$img="";
								}
								
								echo "<li><a href=index.php?_mod=".encode64($div_name)."&no=".encode64($row['no'])."><b>".$row['subject']."</b>&nbsp;</a>".$img."</li>";
							}
							?>
                
				<div align="right" valign="center"><a href="index.php?_mod=<?php echo encode64($div_name);?>" class="readmore"></a></div>
				
				</td></tr></table>
            </div>	
			<br><br>
	


<div id="youtube">
			<?php
				$sql="select * from tb_youtube where active='1' Order by id DESC Limit 0,2";
				$rs=rsQuery($sql);
				if($rs){
					echo "<table><tr>";
					while($data=mysqli_fetch_array($rs)){
						$video_id=$data['video_id'];
						
						echo "<td><iframe width=\"$glo_youtube_width\" height=\"$glo_youtube_height\" src=\"https://www.youtube.com/embed/$video_id\" frameborder=\"0\" allowfullscreen></iframe><td>";
					}
					echo "</tr></table>";
				}
			?>
	</div>
<br>

	
</body>
</html>
