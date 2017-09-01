<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admins/include/header');
$content_id = $content->id;
$administrator_id = $this->session->userdata('cUser');
?>


    <div class="container">
        <div class="row">


            <div class="row">
                <div class="col-md-12">
                    <?php
                    if( $msg = validation_errors() )
                        echo '<div class="alert alert-danger">' . $msg . '</div>';
                    ?>
                </div>
            </div>

            <div class="col-md-12">
                <form class="form-horizontal" action="<?php echo base_url('admin/content_update');?>" method="post">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="name" name="title"
                               value="<?=set_value('title',$content->title);?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea type="text" class="form-control" id="name" name="description"><?=set_value('description', $content->description);?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Content</label>
                        <textarea type="text" class="form-control" id="name" name="content"><?=set_value('content', $content->content);?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Slug</label>
                        <input type="text" class="form-control" id="name" name="slug"
                               value="<?=set_value('slug',$content->slug);?>">
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
<?php
$this->load->view('admins/include/footer');
