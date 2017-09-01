<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('users/include/header')
?>

    <!-- Header with Background Image -->

<!--Video Section-->
    <div class ="section">
        <div class="header-unit">
            <div id="video-container">
                <div>
                    <h3 class="title_vid"> <?= $this->sitesetting->getValue('site_name'); ?> </h3><br>
                    <p class="title_vid2"> <?= $this->sitesetting->getValue('site_subtitle'); ?></p>
                </div>
                <video autoplay loop muted class="fillWidth">
                <source src="<?php echo base_url('assets/img/vid.mp4');?>" type="video/mp4">
                     <source src="<?php echo base_url('assets/img/vid.webm');?>" type="video/webm">
                <source src="vid/bg.ogg" type="video/ogg"/>
                </video>
            </div><!-- end container -->
        </div><!-- end .header-unit -->
    </div>

    <!-- Page Content -->
    <div class="container">
        <div class="row weclome-msg">
            <div class="col-sm-12 first_row">
                <hr class="style">
                  <?= $this->sitesetting->getValue('welcome_msg'); ?>
                <hr class="style"><br><br>
            </div>
        </div>
        <!-- /.row -->


        <div class="row news-section">
            <div class="col-sm-8">
                <div class="well">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img src="<?= base_url('/assets/img/news.png'); ?>" alt="" width="80px" />
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Receta 1</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                                Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.</p>
                            <ul class="list-inline list-unstyled">
                                <li><span><i class="icon-calendar"></i> 12-08-2017 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="well">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img src="<?= base_url('/assets/img/news.png'); ?>" alt="" width="80px" />
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Receta 1</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                                Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.</p>
                            <ul class="list-inline list-unstyled">
                                <li><span><i class="icon-calendar"></i> 12-08-2017 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="panel panel-default newsletter">
                    <div class="panel-heading">
                        <h3 class="panel-title">Subscribe to Newsletter</h3>
                    </div>
                    <div class="panel-body">
                        <p>Sign up and receive the latest news, reviews and trends on your favorite technology topics.</p>
                        <p class="nw-title"><b>Get our Daily News Newsletter:</b></p>
                        <hr>

                        <?php
                        echo validation_errors();
                        $temp = $this->session->flashdata('successMsg');
                        if( $temp ){
                            echo $temp;
                        }
                        ?>
                        <form action="<?php echo base_url('subscribe');?>" method="POST" class="form-inline">
                            <input type="hidden" name="subscribe" value="subscribe">
                            <div class="form-group">
                                <input class="form-control" type="text" name="sub" placeholder="Enter Your E-Email">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->


        <h3>Active Events</h3>
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

  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('users/include/footer')
  ?>