<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('users/include/header')
?>

    <!-- Page Content -->
    <div class="container">
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
        </div>
    </div>
    <!-- /.container -->

    <!--
         footer -->

  <?php
  $this->load->view('users/include/footer')
  ?>
