<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('users/include/header')
?>

    <!-- Header with Background Image -->

<!--Video Section-->
       <div class ="section">
          <div class="header-unit">
<div id="video-container">
<<<<<<< HEAD
<h3 class="title_vid"> <?= $this->sitesetting->getValue('site_name'); ?> </h3><br>
<p class="title_vid2"> <?= $this->sitesetting->getValue('site_subtitle'); ?></p>
=======
<h3 class="title_vid"> Samer Abdolnour </h3><br>
<p class="title_vid2"> This place some text can take place.</p>
>>>>>>> 06c096d0d8a49e81aef55730edb3f0cf5c6753a2
<video autoplay loop muted class="fillWidth">
<source src="<?php echo base_url('assets/img/vid.mp4');?>" type="video/mp4">
     <source src="<?php echo base_url('assets/img/vid.webm');?>" type="video/webm">
<source src="vid/bg.ogg" type="video/ogg"/>
</video>
</div><!-- end container -->
</div><!-- end .header-unit -->

<<<<<<< HEAD
        </div>
=======
        </section>
>>>>>>> 06c096d0d8a49e81aef55730edb3f0cf5c6753a2

    <!-- Page Content -->

    <div class="container">
     <div class="row">
      <div class="col-sm-12 first_row">
        <hr class="style">
<<<<<<< HEAD
          <?= $this->sitesetting->getValue('welcome_msg'); ?>
=======
        Welcome to Samer Abdelnouer cultural website.<br>
        Here some info text...<br>
        Here some info text...<br>
>>>>>>> 06c096d0d8a49e81aef55730edb3f0cf5c6753a2
        <hr class="style"><br><br>
      </div>

     </div>
    <!-- /.row -->
      

      <div class="row">
        <div class="col-sm-12 my-12">
          <div class="card">
            <div class="card-body">
              <?php foreach ($recent_content as $value ){?>
              <h4 class="card-title"><?php echo $value["title"]; ?></h4>
              <p class="card-text">
                <?php
                  echo $value["content"]; 
                  } 
                ?>
              </p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary btn-sm">Find Out More!</a>
            </div>
          </div>
        </div>
      </div>
      </div> <!-- CONTAINER -->

      <!-- /.row -->   


      <p><?php
        if( $this->input->post('sub', TRUE)) {
        // echo validation_errors() . '</p><p>';
          $temp = $this->session->flashdata('errorMssg');
          if( $temp ){
          echo $temp;
        }

        }

        $temp = $this->session->flashdata('successMsg');
        if( $temp ){
        echo $temp;
        }
      ?>
      </p>

      <div class="container-fluid">
       <div class="col-sm-12 my-12">
          <div class="card-body1 text-center">
             <p class="card-title">Subscribe</p>
             <form action="<?php echo base_url('subscribe');?>" method="POST">
             <input type="hidden" name="subscribe" value="subscribe">
             <input class="subfield" type="text" name="sub" placeholder="Enter Your E-Email">
             <input class="btn btn-primary btn-sm" type="submit" value="Register">
             </form>
           </div>
         </div>
         </div>
<!-- 
         footer -->

  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('users/include/footer')
  ?>
   






