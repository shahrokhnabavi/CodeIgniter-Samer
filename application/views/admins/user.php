<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 11:33 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="col-md-12">

    <div class="alert alert-success alert-dismissible" role="alert">asdad</div>
    <div class="alert alert-danger" role="alert">asdasd</div>

    <form class="form-horizontal" action="<?= base_url('admin/user'); ?>" method="post">
        <div class="form-group">
            <label for="name">Admin Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
        </div>
        <div class="form-group">
            <label for="passwd">Password</label>
            <input type="password" class="form-control" id="passwd" name="passwd">
        </div>
        <div class="form-group">
            <label for="confirm">Password Confirm</label>
            <input type="password" class="form-control" id="confirm" name="confirm">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add/Update User</button>
        </div>
    </form>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        </tbody>
    </table>

    <nav>
        <ul class="pager">
            <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
            <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
        </ul>
    </nav>

</div>