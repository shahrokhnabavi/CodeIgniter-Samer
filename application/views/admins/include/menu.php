<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/28/2017
 * Time: 6:11 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-sm-3">
    <!-- Left column -->
    <a href="#"><strong><i class="glyphicon glyphicon-list"></i> Menu</strong></a>

    <hr>
    <ul class="nav nav-stacked collapse in" id="userMenu">
        <li class="active"> <a href="<?= base_url('admin/dashboard'); ?>"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
        <li><a href="<?= base_url('admin/emails'); ?>"><i class="glyphicon glyphicon-envelope"></i> Subscriptions <span class="badge badge-info hidden">4</span></a></li>
        <li><a href="<?= base_url('admin/content');  ?>"><i class="glyphicon glyphicon-tasks"></i> Events</a></li>
        <li><a href="<?= base_url('admin/blog');  ?>"><i class="glyphicon glyphicon-pushpin"></i> Blogs</a></li>
        <li><a href="<?= base_url('admin/gallery');  ?>"><i class="glyphicon glyphicon-picture"></i> Gallery</a></li>
        <li><a href="<?= base_url('admin/user');     ?>"><i class="glyphicon glyphicon-user"></i> Users</a></li>
        <li><a href="<?= base_url('admin/setting');  ?>"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
        <li><a href="<?= base_url('admin/logout');   ?>"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
    </ul>
    <hr>
</div>