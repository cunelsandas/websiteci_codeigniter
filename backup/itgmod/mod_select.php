<?php
!empty($_GET['_mod'])?$mod1=$_GET['_mod']:null;

$mod=EscapeValue(decode64($mod1));
switch($mod){
	case "rescue";
		include("modules/rescue/rescue.php");
		break;
	
	case 'helpme': 
		include("modules/helpme/helpme.php");
		break;
	
	case 'contact':
		include("modules/contact/contact.php");
		break;

	case 'news':
		include("modules/news/news.php");
		break;
		
	case 'otop':
		include("modules/otop/otop.php");
		break;
	
	case 'travel':
		include("modules/travel/travel.php");
		break;
	
	case 'tip':
		include("modules/tip/tip.php");
		break;

	case 'datadetail':
		include("modules/datadetail/datadetail.php");
		break;

	case 'purchase':
		include("modules/purchase/purchase.php");
		break;

	
	case 'activity':
		include("modules/activity/activity.php");
		break;
	
	case 'authority':
		include("modules/authority/authority.php");
		break;

	case 'files':
		include("modules/files/files.php");
		break;

	case 'download':
		include("modules/download_form/download_form.php");
		break;

	case 'officer':
		include("modules/officer/officer.php");
		break;

	case 'head':
		include("modules/head/head.php");
		break;

	case 'chiefofficer':
		include("modules/chiefofficer/chiefofficer.php");
		break;
	
	case 'board':
		include("modules/board/board.php");
		break;

	case 'webboard':
		include("modules/webboard/webboard.php");
		break;
		
	case 'nayok':
		include("modules/nayok/nayok.php");
		break;

	case 'kidschool':
		include("modules/kidschool/kidschool.php");
		break;

	case 'middleprice':
		include("modules/middleprice/middleprice.php");
		break;

	case 'kidschool_news':
		include("modules/kidschool_news/kidschool_news.php");
		break;
	case 'activity_yota':
		include("modules/activity_yota/activity_yota.php");
		break;
	case 'activity_money':
		include("modules/activity_money/activity_money.php");
		break;
	case 'activity_elec':
		include("modules/activity_elec/activity_elec.php");
		break;

	case 'yota_building':
		include("modules/yota_building/yota_building.php");
		break;
	case 'yota_law':
		include("modules/yota_law/yota_law.php");
		break;

	case 'doc1':
		include("modules/doc1/yota_law.php");
		break;
	default:
		include("modules/default/default.php");
		break;
}
?>
