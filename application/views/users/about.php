<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('users/include/header')
?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
    <br><br><br><br>
    <h3> EVENTS </h3>
    <br><br>

    <?php foreach ($recent_content as $value ){?>
      <div class="row">
        <div class="col-sm-12 my-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                <div class="card-footer">
                  <?php echo $value["title"]; ?>
                </div>
              </h4>
              <p class="card-text">
                <?php
                  echo $value["content"];  
                ?>
              </p>
            </div>

          </div>
        </div>
      </div>
      <br>
      <?php
      }
      ?>
      </div>

    </div>
      </div>
        </div>
    <!-- /.container -->

    <!-- 
         footer -->

  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('users/include/footer')
  ?>
   