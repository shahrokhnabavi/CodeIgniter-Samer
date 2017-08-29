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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <div id="login-overlay" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Login to Administration Panel</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="well">
<<<<<<< HEAD
                            <form id="loginForm" method="POST" action="<?=base_url()?>" novalidate="novalidate">
                                <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
=======
                            <form id="loginForm" method="POST" action="<?= base_url('admin'); ?>" novalidate="novalidate">
                                <?php
                                if( $msg = validation_errors() )
                                    echo '<div id="loginErrorMsg" class="alert alert-error">' . $msg . '</div>';
                                if($msg = $this->session->flashdata('error') )
                                    echo '<div id="loginErrorMsg" class="alert alert-error">' . $msg . '</div>';
                                ?>
>>>>>>> gallery
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="example@gmail.com">
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" title="Please enter your password">
                                    <span class="help-block"></span>
                                </div>
                                <div class="checkbox hidden">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember"> Remember login
                                    </label>
                                    <p class="help-block">(if this is a private computer)</p>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                                <a href="/forgot/" class="btn btn-default btn-block hidden">Help to login</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="login-footer text-center">Copyright 2017. Build by <a href="http://www.nabavi.nl"><strong>Nabavi.nl</strong></a></div>
    <!-- script references -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>