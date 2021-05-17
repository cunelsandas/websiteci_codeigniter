<link href="css/jquery-bubble-popup-v3.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery-bubble-popup-v3.min.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
$(document).ready(function(){
		
		$('.showpopup').CreateBubblePopup();
				//$(this).SetBubblePopupInnerHtml({
				//				innerHtml:$(this).attr('value')

				//})
				$('.showpopup').mouseover(function(){
					$(this).ShowBubblePopup( {

									position : $(this).attr('name'),  //จัดตำแหน่ง
									align	 : 'center',
									
									innerHtml:$(this).attr('value'),

									innerHtmlStyle: {
														color:'#FFFFFF', 
														'text-align':'center'
													},

									themeName: 'all-violet',
									themePath: 'images/jquerybubblepopup-themes'
								 
								} );
				});
});
//-->
</script>
