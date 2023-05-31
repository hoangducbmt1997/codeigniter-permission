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

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*
|--------------------------------------------------------------------------
| Route Dashboard
|--------------------------------------------------------------------------
*/

$route['default_controller'] 	= 'DashboardController';
$route['dashboard'] 			= 'DashboardController';
$route['403'] 					= 'DashboardController/access_denied';


/*
|--------------------------------------------------------------------------
| Route Home
|--------------------------------------------------------------------------
*/

$route['home'] 					= 'Home/HomeController/index';
$route['about'] 				= 'Home/HomeController/about';
$route['contact'] 				= 'Home/HomeController/contact';

/*
|--------------------------------------------------------------------------
| Route Login
|--------------------------------------------------------------------------
*/

$route['login']['GET'] 			= 'LoginController/index';
$route['login-user']['POST'] 	= 'LoginController/login';
$route['logout'] 				= 'LoginController/logout';


/*
|--------------------------------------------------------------------------
| Route Users
| Permission:list_user|add_user|edit_user|delete_user|user_role
|--------------------------------------------------------------------------
*/

$route['users']  				= 'UserController/index';
$route['users/list']['GET']  	= 'UserController/index';

$route['users/create']['GET']	= 'UserController/create';
$route['users/store']['POST']	= 'UserController/store';

$route['users/edit/(:num)'] 	= 'UserController/edit/$1';
$route['users/update/(:num)'] 	= 'UserController/update/$1';

$route['users/delete/(:num)'] 	= 'UserController/delete/$1';
$route['users/export'] 			= 'UserController/export';
$route['users/import'] 			= 'UserController/import';



// Route User has Role	
$route['user/role/(:num)'] 		= 'UserController/edit_role_user/$1';
$route['user/role/update'] 		= 'UserController/update_role_user';

$route['users/search']  		= 'UserController/search_user_by_time';


/*
|--------------------------------------------------------------------------
| Route Roles
| Permission:list_role|add_role|edit_role|delete_role|role_permissions
|--------------------------------------------------------------------------
*/

$route['roles']  				= 'RoleController/index';
$route['roles/list']['GET']  	= 'RoleController/index';

$route['roles/create']['GET']	= 'RoleController/create';
$route['roles/store']['POST']	= 'RoleController/store';

$route['roles/edit/(:num)'] 	= 'RoleController/edit/$1';
$route['roles/update/(:num)'] 	= 'RoleController/update/$1';

$route['roles/delete/(:num)'] 	= 'RoleController/delete/$1';

// Route Role has Permissions	
$route['role/permissions/(:num)'] 	= 'RoleController/edit_role_permissions/$1';
$route['role/permissions/update'] 	= 'RoleController/update_permissions_role';

$route['roles/search']  		= 'RoleController/search_role_by_time';


/*
|--------------------------------------------------------------------------
| Route Permissions
| Permission:list_permission|add_permission|edit_permission|delete_permission
|--------------------------------------------------------------------------
*/

$route['permissions']  					= 'PermissionController/index';
$route['permissions/list']['GET']  		= 'PermissionController/index';

$route['permissions/create']['GET']		= 'PermissionController/create';
$route['permissions/store']['POST']		= 'PermissionController/store';

$route['permissions/edit/(:num)'] 		= 'PermissionController/edit/$1';
$route['permissions/update/(:num)'] 	= 'PermissionController/update/$1';

$route['permissions/delete/(:num)'] 	= 'PermissionController/delete/$1';

$route['permissions/search']  		= 'PermissionController/search_permission_by_time';






