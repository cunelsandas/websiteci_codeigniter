<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
/*$route['mod/(:any)'] = "mod/index/$1";
$route['image/(:any)'] = "find_data/data_image/$1";
$route['status/(:any)/(:any)/(:any)'] = "find_data/change_status/$1/$2/$3";

$route['save_img/(:any)'] = "data_image/save/$1";
$route['edit_img/(:any)/(:any)'] = "data_image/save/$1/$2";
$route['dis_img/(:any)/(:any)'] = "data_image/del/$1/$2";*/

$route['default_controller'] = 'welcome';
//$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/** custom route */
$route['contents/(:any)'] = "content/index/$1";
$route['personnels/(:any)'] = "personnel/index/$1";
$route['catalogs/(:any)'] = "catalog/index/$1";
$route['officers/(:any)/(:any)'] = "officer/index/$1/$2";
$route['files/(:any)/(:any)'] = "file/index/$1/$2";
$route['purchases/(:any)'] = "purchase/index/$1";
$route['youtubes/(:any)'] = "youtube/index/$1";
$route['web_boards/(:any)'] = "web_board/index/$1";
$route['votes/(:any)'] = "vote/index/$1";
$route['404_override'] = 'notfound';

//route group helpme_map
$route['helpmes/helpme'] = "helpme_map/menu_index";
$route['helpmes/index'] = "helpme_map/index/";
$route['helpmes/add'] = "helpme_map/add";
$route['helpmes/view/(:any)'] = "helpme_map/view/$1";

//route group paytax
$route['paytaxs/paytax'] = "paytax/index";
$route['paytaxs/add'] = "paytax/add";
$route['paytaxs/view/(:any)'] = "paytax/view/$1";

//route group paytax
$route['queues/queue'] = "queue/index";
$route['paytaxs/add'] = "paytax/add";
$route['paytaxs/view/(:any)'] = "paytax/view/$1";


//route direct line
$route['directs/direct'] = "direct_line/index/";
$route['directs/add'] = "direct_line/add";
$route['directs/view/(:any)'] = "direct_line/view/$1";

//route waterwork
$route['waterworks/waterwork'] = "waterwork/index/";
$route['waterworks/add'] = "waterwork/add";
$route['waterworks/view/(:any)'] = "waterwork/view/$1";

//route waterwork
$route['electrics/electric'] = "electric/index/";
$route['electrics/add'] = "electric/add";
$route['electrics/view/(:any)'] = "electric/view/$1";

//route accident
$route['accidents/accident'] = "accident/index";

$route['tellmes/tellme'] = "tellme/add";
/** custom route */

$route['itas/ita'] = "ita";
$route['lpas/lpa'] = "lpa";
$route['questionnaires/questionnaire'] = "questionnaire";

