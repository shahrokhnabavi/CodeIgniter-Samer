<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/28/2017
 * Time: 6:11 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admins/include/header');
?>


    <!-- Main -->
    <div class="container-fluid">
        <div class="row">

            <?php $this->load->view('admins/include/menu'); ?>

            <!-- /col-3 -->
            <div class="col-sm-9">

                <a href="#"><strong><i class="glyphicon glyphicon-<?= $currentPageIcon; ?>"></i> <?= $currentPageName; ?></strong></a>
                <hr>

                <div class="row">
                    <?= $pageContent; ?>
                </div>

            </div>
            <!--/col-span-9-->
        </div>
    </div>
    <!-- /Main -->

<?php
$this->load->view('admins/include/footer');