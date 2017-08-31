<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'site';
$route['translate_uri_dashes'] = FALSE;


// Admin Panel by Shahrokh
$route['admin']           = 'admins/login';
$route['admin/dashboard'] = 'site/dashboard';
$route['admin/setting']   = 'site/setting';
$route['admin/logout']    = 'admins/logout';


$route['admin/user([0-9]*|[0-9]*/[0-9]*)'] = 'admins/form/$1/$2';
$route['admin/delete-user/([0-9]*)']       = 'admins/delete/$1';

$route['admin/gallery([0-9]*|[0-9]*/[0-9]*)'] = 'galleries/form/$1/$2';
$route['admin/delete-gallery/([0-9]*)']       = 'galleries/delete/$1';
$route['thumb-gallery/([0-9]*)']  = 'galleries/thumbImage/$1';


// Admin Panel by Sheril
$route['admin/content']    = 'post';
$route['admin/delete-content/([0-9]*)']  = 'post/delete/$1';


// Admin Panel by Shahriyar
$route['contact']    = 'contactform';
$route['admin/emails']    = 'Subscribe/listOfAll/0';
$route['admin/emails(:num)']    = 'Subscribe/listOfAll/$1';
$route['admin/delete-emails/(:num)']    = 'Subscribe/delete_member/$1';