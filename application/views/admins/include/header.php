<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/28/2017
 * Time: 6:11 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">

	<title>Admin</title>

	<meta name="generator" content="Bootply" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="<?= base_url('assets/css/styles.css'); ?>" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Admin Panel</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
						<i class="glyphicon glyphicon-user"></i> <?= $currentAdminName; ?> <span class="caret hidden"></span>
					</a>
					<ul id="g-account-menu" class="dropdown-menu hidden" role="menu">
						<li><a href="#">My Profile</a></li>
					</ul>
				</li>
				<li><a href="<?= base_url('admin/logout'); ?>"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
			</ul>
		</div>
	</div>
	<!-- /container -->
</div>
<!-- /Header -->