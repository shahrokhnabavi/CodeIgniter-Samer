<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('visitor/include/header');
?>

    <!-- Page Content -->
    <div class="container">
        <br>
      <h1 class="my-4 text-center text-lg-left">Gallery</h1>

      <div class="row text-center text-lg-left">
<?php
foreach( $listGallery as $img ) {
    $name = glob(FCPATH . 'assets/uploads/' . $img['id'] . '-' . $img['file_name'] . '_255X193.*');
    if(!$name) continue;
    $name = basename($name[0]);
    $link = str_replace('_255X193', '', $name);
    ?>
        <div class="col-lg-3 col-md-4 col-xs-6">
          <a href="<?= base_url('/assets/uploads/' . $link); ?>" target="_blank" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="<?= base_url('/assets/uploads/' . $name); ?>" alt="<?= $img['name']; ?>">
          </a>
        </div>
<?php } ?>
      </div>
    </div>
<?php
$this->load->view('visitor/include/footer');