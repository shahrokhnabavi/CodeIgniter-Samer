<?php
/**
 * Created Shahrokh Nabavi
 * Date: 8/30/2017
 * Time: 12:52 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Samer Abdelnour</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css');  ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/business-frontpage.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Buenard:700' rel='stylesheet' type='text/css'>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.html">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="logo" href="#"><img id="logo-navbar-middle" src="<?= base_url('assets/img/logo-thing.png'); ?>" width="100" alt="Logo Thing main logo"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header with Background Image -->



    <!--Video Section-->
    <div class ="section">
        <div class="header-unit">
            <div id="video-container">
                <video autoplay loop muted class="fillWidth">
                    <source src="<?= base_url('assets/img/vid.mp4'); ?>" type="video/mp4">
                    <source src="<?= base_url('assets/img/vid.webm'); ?>" type="video/webm">
                    <source src="<?= base_url('assets/vid/bg.ogg'); ?>" type="video/ogg"/>
                </video>
            </div><!-- end container -->
        </div><!-- end .header-unit -->

    </div>

    <!-- Page Content -->

    <div class="container">
