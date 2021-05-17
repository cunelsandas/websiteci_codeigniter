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

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;



/** custom route */

$route['contents/(:any)'] = "content/index/$1";

$route['personnels/(:any)'] = "personnel/index/$1";

$route['catalogs/(:any)'] = "catalog/index/$1";

$route['officers/(:any)'] = "officer/index/$1";

$route['publics/(:any)'] = "public_officer/index/$1";

$route['files/(:any)'] = "file/index/$1";

$route['workgroups/(:any)'] = "workgroup/index/$1";

$route['youtubes/(:any)'] = "youtube/index/$1";

$route['marquees/(:any)'] = "marquee/index/$1";

$route['banners/(:any)'] = "banner/index/$1";

$route['group_menus/(:any)'] = "group_menu/index/$1";

$route['menus/(:any)'] = "menu/index/$1";

$route['menu_subs/(:any)'] = "menu_sub/index/$1";

$route['purchases/(:any)'] = "purchase/index/$1";

$route['web_boards/(:any)'] = "web_board/index/$1";

$route['officer_types/(:any)'] = "officer_type/index/$1";

$route['publics_types/(:any)'] = "public_type/index/$1";

$route['file_types/(:any)'] = "file_type/index/$1";

$route['paths/(:any)'] = "path/index/$1";

$route['permissions/(:any)'] = "permission/index/$1";

$route['slideshows/(:any)'] = "slideshow/index/$1";

$route['votes/(:any)'] = "vote/index/$1";

$route['404_override'] = 'notfound';

/** custom route */



$route['helpmes/(:any)'] = "helpme/index/$1";
$route['helpmes/view/(:any)'] = "helpme/view/$1";

$route['electrics/(:any)'] = "electric/index/$1";
$route['electrics/view(:any)'] = "electric/view/$1";

$route['waterworks/(:any)'] = "waterwork/index/$1";
$route['waterworks/view/(:any)'] = "waterwork/view/$1";

$route['paytaxs/(:any)'] = "paytax/index/$1";
$route['paytaxs/view/(:any)'] = "paytax/view/$1";

$route['queues/(:any)'] = "queue/index/$1";
$route['queues/view/(:any)'] = "queue/view/$1";

$route['tellmes/(:any)'] = "tellme/index/$1";
$route['tellmes/view/(:any)'] = "tellme/view/$1";



$route['directs/(:any)'] = "direct/index/$1";
$route['directs/view/(:any)'] = "direct/view/$1";


$route['reports/(:any)'] = "report/index/$1";
$route['reportsdirect/(:any)'] = "reportdirect/index/$1";
$route['reportsroyal/(:any)'] = "reportroyal/index/$1";
$route['reportsqueue/(:any)'] = "reportqueue/index/$1";
$route['reportsqueue2/(:any)'] = "reportqueue/index2/$1";
$route['reportswaterwork/(:any)'] = "reportwaterwork/index/$1";
$route['reportselectric/(:any)'] = "reportelectric/index/$1";


$route['accidents/(:any)'] = "accident/index/$1";
$route['accidents/view(:any)'] = "accident/view/$1";

$route['questionnaires/(:any)'] = "questionnaire/index/$1";
$route['questionnaires/view(:any)'] = "accident/view/$1";

$route['itas/(:any)'] = "ita/index/$1";
$route['itas/view(:any)'] = "ita/view/$1";

$route['ita2564s/(:any)'] = "ita2564/index/$1";
$route['ita2564s/view(:any)'] = "ita2564/view/$1";

$route['lpas/(:any)'] = "lpa/index/$1";
$route['lpas/view(:any)'] = "lpa/view/$1";

$route['people_opinions/(:any)'] = "people_opinion/index/$1";
$route['people_opinions/view/(:any)'] = "people_opinion/view/$1";




