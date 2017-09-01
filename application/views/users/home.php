<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('users/include/header')
?>

    <!-- Header with Background Image -->

<!--Video Section-->
    <div class ="section">
        <div class="header-unit">
            <div id="video-container">
              <div class='col-sm-12 text-right hidden-xs'>
  <ul class='hidden-xs socials'>
    <li>
      <a target="_blank" href="https://www.linkedin.com/"><i class='fa fa-linkedin-square'></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://www.facebook.com/"><i class='fa fa-facebook-square'></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://twitter.com/"><i class='fa fa-twitter-square'></i>
      </a>
    </li>
  </ul>
</div>
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

                <?php
                foreach($recent_blog as $blog) {
                    $name = glob(FCPATH . 'assets/uploads/blog/' . $blog['id'] . '__thumb.*');
                    if(!$name) continue;
                    $link = basename($name[0]);
                    ?>
                    <div class="well">
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img src="<?= base_url('assets/uploads/blog/' . $link ); ?>" alt="<?= $blog['title']; ?>" width="80px" />
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?= $blog['title']; ?></h4>
                                <p><?= $blog['description']; ?></p>
                                <ul class="list-inline list-unstyled">
                                    <li><span><i class="icon-calendar"></i> <?= $blog['created_at']; ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
                                <input class="form-control" type="text" name="sub" placeholder="Enter Your E-mail">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

<br><br>
        <h3>Active Events</h3>

        <div class="row">
            <?php foreach ($recent_content as $value ){?>
          <div class="col-lg-4 col-md-4 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://refugee-action.org.uk/wp-content/uploads/2016/11/Let-Refugees-Learn2.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <h4 class="card-title"><?php echo $value["title"]; ?></h4>
                  <p class="card-text">
                    <?php
                      echo $value["content"];
                    ?>
              </div>
            </div>
          </div>
            <?php } ?>
    </div> <!-- CONTAINER -->
    </div> <!-- CONTAINER -->

  <?php
  $this->load->view('users/include/footer')
  ?>
