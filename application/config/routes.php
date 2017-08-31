<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['translate_uri_dashes'] = FALSE;

// ***********************
// Admin Panel by Shahrokh
$route['admin']           = 'admins/login';
$route['admin/dashboard'] = 'site/admin';
$route['admin/logout']    = 'admins/logout';


$route['admin/user([0-9]*|[0-9]*/[0-9]*)']  = 'admins/form/$1/$2';
$route['admin/delete-user/([0-9]*)']  = 'admins/delete/$1';

$route['admin/gallery([0-9]*|[0-9]*/[0-9]*)']  = 'galleries/form/$1/$2';
$route['admin/delete-gallery/([0-9]*)']  = 'galleries/delete/$1';


// *********************
// Admin Panel by Sheril
$route['admin/content']    = 'post';
$route['admin/delete-content/([0-9]*)']  = 'post/delete/$1';
$route['admin/edit-content/(:num)']  = 'post/edit/$1';
$route['admin/content_update']    = 'post/update';


//front end routes
$route['default_controller'] = 'front_end';
$route['home'] = 'front_end';
$route['gallery'] = 'front_end/gallery';
$route['about'] = 'front_end/about';
$route['subscribe'] = 'subscribe/add_member';
$route['contact'] = 'front_end/contact';
$route['contact_form'] = 'contactform';

// ************************
// Admin Panel by Shahriyar
$route['contact']    = 'contactform';
$route['admin/emails']    = 'Subscribe/listOfAll/0';
$route['admin/emails(:num)']    = 'Subscribe/listOfAll/$1';
$route['admin/delete-emails/(:num)']    = 'Subscribe/delete_member/$1';
