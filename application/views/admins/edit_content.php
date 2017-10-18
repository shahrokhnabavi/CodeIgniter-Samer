<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admins/include/header');
$content_id = $content->id;

$administrator_id = $this->session->userdata('cUser');
?>

<div class="col-md-12">

    <div class="row">
        <div class="col-md-12">
            <?php
            if( $msg = validation_errors() )
                echo '<div class="alert alert-danger">' . $msg . '</div>';
            ?>
        </div>
    </div>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="<?php echo base_url('admin/content_update/');?>" method="post">
                    <div class="form-group">
                        <label for="title">Event</label>
                        <input type="text" class="form-control" id="title" name="title"
                               value="<?=set_value('title', $content->title);?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Content</label>
                        <textarea type="text" class="form-control" id="name" name="content">
                        <?php echo set_value('content', $content->content);?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Start Date</label>
                        <input type="date" name="start" class="form-control" value="<?=set_value('title', $content->startdate);?>">
                        
                    </div>

                    <div class="form-group">
                        <label for="name">End Date</label>
                        <input type="date" name="end" class="form-control" value="<?=set_value('title', $content->startdate);?>">
                    </div>

                    <input type="hidden" name="action_id" value="<?= $administrator_id; ?>">
                    <input type="hidden" name="action" value="add">
                    <input type="hidden" name="content_id" value="<?= $content_id; ?>">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   

</div>
<?php
$this->load->view('admins/include/footer');