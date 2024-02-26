<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/index';


$route['admin/login'] = 'Admin/Login';
$route['admin/logout'] = 'Admin/Logout';


$route['admin/food'] = 'Admin/Food';
$route['admin/food/add'] = 'Admin/Food/Add';
$route['admin/food/(:any)/update'] = 'Admin/Food/Update/$1';
$route['admin/food/(:any)/delete'] = 'Admin/Food/Delete/$1';
$route['admin/food/(:any)/import'] = 'Admin/Food/Import/$1';
$route['admin/food/(:any)/history'] = 'Admin/Food/History/$1';


$route['admin/supplier'] = 'Admin/Supplier';
$route['admin/supplier/add'] = 'Admin/Supplier/Add';
$route['admin/supplier/(:any)/update'] = 'Admin/Supplier/Update/$1';
$route['admin/supplier/(:any)/delete'] = 'Admin/Supplier/Delete/$1';
$route['admin/supplier/(:any)/history'] = 'Admin/Supplier/History/$1';


$route['admin/category'] = 'Admin/Category';
$route['admin/category/add'] = 'Admin/Category/Add';
$route['admin/category/(:any)/update'] = 'Admin/Category/Update/$1';
$route['admin/category/(:any)/delete'] = 'Admin/Category/Delete/$1';


$route['admin/table'] = 'Admin/Table';


$route['admin/order'] = 'Admin/Order';


$route['admin/setting'] = 'Admin/Setting';


$route['admin/staff'] = 'Admin/Staff';
$route['admin/staff/add'] = 'Admin/Staff/Add';
$route['admin/staff/(:any)/update'] = 'Admin/Staff/Update/$1';
$route['admin/staff/(:any)/delete'] = 'Admin/Staff/Delete/$1';


