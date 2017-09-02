<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('visitor/include/header')
?>
        <!-- Page Content -->
    <div class="container">
        <br>
        <h1 class="my-4 text-center text-lg-left">Events</h1>

        <div class="row text-center text-lg-left">
        <?php foreach ($event as $value ){
            $name = glob(FCPATH . 'assets/uploads/event/' . $value['id'] . '_348X232.*');
            $link = ($name) ? basename($name[0]) : '';
            ?>
          <div class="col-lg-4 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#">
                <img src="<?= base_url('assets/uploads/event/' . $link ); ?>" alt="<?= $value['title']; ?>" />
            </a>
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

  <?php
  $this->load->view('visitor/include/footer');