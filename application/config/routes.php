<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error';
$route['translate_uri_dashes'] = FALSE;
$route['server']='server/dashboard';
$route['profile']='server/settings/users';
// front view
$route['product/(:any)']='products/single/$1';
$route['category-(:num)']='products/category/$1';

$route['login']='account/login';
$route['register']='account/register';
$route['logout']='account/logout';

$route['checkout']='cart/checkout';
$route['complete']='cart/complete';
