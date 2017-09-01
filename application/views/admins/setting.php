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
                if( $msg = $this->session->flashdata('error') ) {
                    echo '<div class="alert alert-danger">';
                    foreach ($msg as $error)
                        echo $error;
                    echo '</div>';
                }
                if( $msg = $this->session->flashdata('reg-success') )
                    echo '<div class="alert alert-success">' . $msg . '</div>';
                ?>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="<?= base_url('admin/setting'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="site_name">Site Name</label>
                            <input type="text" class="form-control" id="site_name" name="site_name"
                                   value="<?= $this->sitesetting->getValue('site_name'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="site_subtitle">Site Subtitle</label>
                            <input type="text" class="form-control" id="site_subtitle" name="site_subtitle"
                                   value="<?= $this->sitesetting->getValue('site_subtitle'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="welcome_msg">Welcome Message</label>
                            <textarea class="form-control" id="welcome_msg" name="welcome_msg"><?= $this->sitesetting->getValue('welcome_msg'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="contact_email">Contact Email</label>
                            <input type="text" class="form-control" id="contact_email" name="contact_email"
                                   value="<?= $this->sitesetting->getValue('contact_email'); ?>">
                            <p class="help-block">
                                Here you can define an email address which you want send an email if user submit contact form
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="icon">Site Icon</label>
                            <input type="file" name="icon" id="icon" />
                            <p class="help-block"><?= $this->sitesetting->getValue('site_icon'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="logo">Site Logo</label>
                            <input type="file" name="logo" id="logo" />
                            <p class="help-block"><?= $this->sitesetting->getValue('site_logo'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="meta_key">Keywords</label>
                            <input type="text" class="form-control" id="meta_key" name="meta_key"
                                   value="<?= $this->sitesetting->getValue('meta_key'); ?>">
                            <p class="help-block">This is a list of keywords for Google Search Engine</p>
                        </div>
                        <div class="form-group">
                            <label for="meta_desc">Description</label>
                            <textarea class="form-control" id="meta_desc" name="meta_desc"><?= $this->sitesetting->getValue('meta_desc'); ?></textarea>
                            <p class="help-block">This is a short description about your website for Google Search Engine</p>
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