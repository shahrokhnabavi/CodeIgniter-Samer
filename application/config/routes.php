<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['translate_uri_dashes'] = FALSE;

// ***********************
// Admin Panel by Shahrokh
$route['admin']           = 'users/login';
$route['admin/logout']    = 'users/logout';
$route['admin/dashboard'] = 'site/dashboard';
$route['admin/setting']   = 'site/setting';


$route['admin/user([0-9]*|[0-9]*/[0-9]*)'] = 'users/form/$1/$2';
$route['admin/delete-user/([0-9]*)']       = 'users/delete/$1';

$route['admin/blog([0-9]*|[0-9]*/[0-9]*)'] = 'blogs/form/$1/$2';
$route['admin/delete-blog/([0-9]*)']       = 'blogs/delete/$1';

$route['admin/gallery([0-9]*|[0-9]*/[0-9]*)'] = 'galleries/form/$1/$2';
$route['admin/delete-gallery/([0-9]*)']       = 'galleries/delete/$1';
$route['thumb-gallery/([0-9]*)']              = 'galleries/thumbImage/$1';


// *********************
// Admin Panel by Sheril
$route['admin/event([0-9]*|[0-9]*/[0-9]*)'] = 'events/form/$1/$2';
$route['admin/delete-event/([0-9]*)']       = 'events/delete/$1';

//$route['admin/content'] = 'post';
//$route['admin/delete-content/([0-9]*)'] = 'post/delete/$1';
//$route['admin/edit-content/(:num)']     = 'post/edit/$1';
//$route['admin/content_update']          = 'post/update';


//front end routes
$route['default_controller'] = 'site';
$route['gallery']   = 'site/gallery';
$route['events']    = 'site/events';
$route['contact']   = 'site/contact';
$route['contact_form'] = 'contactform';


// ************************
// Admin Panel by Shahriyar
$route['admin/emails']    = 'Subscribe/listOfAll/0';
$route['admin/emails(:num)']    = 'Subscribe/listOfAll/$1';
$route['admin/delete-emails/(:num)']    = 'Subscribe/delete_member/$1';
