<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 11:33 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admins/include/header');
?>

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <?php
                if( $msg = validation_errors() )
                    echo '<div class="alert alert-danger">' . $msg . '</div>';
                if($msg = $this->session->flashdata('reg-success') )
                    echo '<div class="alert alert-success">' . $msg . '</div>';
                ?>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="<?= base_url('admin/setting'); ?>" method="post">
                        <div class="form-group <?php if(isset($update['id'])) echo 'hidden'; ?>">
                            <label for="confirm">Site Name</label>
                            <input type="password" class="form-control" id="confirm" name="confirm">
                        </div>
                        <div class="form-group">
                            <label for="welcome">Welcome Message</label>
                            <input type="text" class="form-control" id="welcome" name="welcome"
                                   value="<?= set_value('welcome', isset($update['welcome']) ? $update['welcome'] : ''); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Site Icon</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?= set_value('email', isset($update['email']) ? $update['email'] : ''); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Site Logo</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?= set_value('email', isset($update['email']) ? $update['email'] : ''); ?>">
                        </div>
                        <div class="form-group <?php if(isset($update['id'])) echo 'hidden'; ?>">
                            <label for="passwd">Keywords</label>
                            <input type="password" class="form-control" id="passwd" name="passwd">
                        </div>
                        <div class="form-group <?php if(isset($update['id'])) echo 'hidden'; ?>">
                            <label for="passwd">Description</label>
                            <input type="password" class="form-control" id="passwd" name="passwd">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Setting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php
$this->load->view('admins/include/footer');