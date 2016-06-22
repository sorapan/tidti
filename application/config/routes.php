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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['std_logincheck'] = 'Login/logincheck';
$route['admin/admin_logincheck'] ='login/admincheck';

$route['admin/login'] = 'Login/adminLogin';
//////////STUDENT PAGE
$route['student'] = 'student_page/index';
$route['student/addmac'] = 'student_page/add_mac';
$route['student/submitlocation'] = 'student_page/submit_location';
$route['student/deletemac'] = 'student_page/delete_mac';
$route['student/signout'] = 'student_page/signout';
$route['student/getprogramdata'] = 'student_page/getprogram';

//////////PROFESSOR PAGE
$route['professor'] = 'professor_page/index';
$route['professor/submit_detail'] = 'professor_page/submit_detail';
$route['professor/addmac'] = 'professor_page/addmac';
$route['professor/deletemac'] = 'professor_page/deletemac';
$route['professor/logout'] = 'professor_page/logout';

//////////ADMIN PAGE
$route['admin'] = 'admin/index';
$route['admin/log'] = 'admin/log';
$route['admin/manage'] = 'admin/manage';
$route['admin/manage/(:any)'] = 'admin/adduser/$1';
$route['admin/mac'] = 'admin/mac';
$route['admin/mac/(:any)'] = 'admin/editmac/$1';
$route['admin/user'] = 'admin/user';
$route['admin/AddManualUser'] = 'admin/AddManualUser';
$route['admin/mac/setDataToEditById/(:any)'] = 'admin/setDataToEditById/$1';
$route['admin/deleteMac/(:any)'] = 'admin/deletemac/$1';
$route['admin/searchLog'] = 'admin/searchLog';
