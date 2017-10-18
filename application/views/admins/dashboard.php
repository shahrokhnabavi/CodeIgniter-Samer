<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 11:33 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admins/include/header');
?>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Welcome</h4></div>
            <div class="panel-body">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    You can put Some notification.
                </div>
                <p>Welcome to Admin panel of your web site.</p>
                <p>This is your dashboard so you can easily have quick overviews about the content of your website.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="well">Test Panel<span class="badge pull-right">3</span></div>
    </div>
<?php
$this->load->view('admins/include/footer');