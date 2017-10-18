<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('users/include/header')
?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <p>
            <br>
            <?= $this->sitesetting->getValue('contact_text'); ?>
        </p>
        </div>
      </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <?php $attributes = array("class" => "form-horizontal", "name" => "contactform");
            echo form_open("contact_form", $attributes);?>
            <fieldset>
            <legend>Contact Form</legend>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="name" class="control-label">Name</label>

                </div>
                <div class="col-md-6">
                    <input class="form-control" name="name" placeholder="Your Full Name" type="text" value="<?php echo set_value('name'); ?>" />
                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>

                <!-- GoogleMAP -->
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="email" class="control-label">Your Email Address</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" name="email" placeholder="Your Email ID" type="text" value="<?php echo set_value('email'); ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <label for="message" class="control-label">Message</label>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="4" placeholder="Your Message"><?php echo set_value('message'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('message'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <input name="submit" type="submit" class="btn btn-primary" value="Send" />
                </div>
            </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>

          </div>

          <div class="col-md-6 col-md-offset-3 well">
          <div id="map"></div>
        </div>
    </div>
    </div>

    <!-- /.container -->

<?php
$this->load->view('users/include/footer')
?>
