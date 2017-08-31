<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admins/include/header');

$administrator_id = $this->session->userdata('cUser');
$rowNumber = 0;

 ?>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <?php
                if( $msg = validation_errors() )
                    echo '<div class="alert alert-danger">' . $msg . '</div>';
                if($msg = $this->session->flashdata('msg-succes') )
                    echo '<div class="alert alert-success">' . $msg . '</div>';
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="<?php echo base_url('admin/content');?>" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                               value="<?=set_value('title');?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea type="text" class="form-control" id="name" name="description"><?=set_value('description');?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Content</label>
                        <textarea type="text" class="form-control" id="name" name="content"><?=set_value('content');?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Slug</label>
                        <input type="text" class="form-control" id="name" name="slug"
                               value="<?=set_value('slug');?>">
                    </div>

                    <input type="hidden" name="action_id" value="<?= $administrator_id; ?>">
                    <input type="hidden" name="action" value="add">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($all_posts_in_db as $posting) { ?>
                    <tr>
                        <th scope="row"><?= ++$rowNumber; ?></th>
                        <td><?= $posting['title']; ?></td>
                        <td><?= $posting['description']; ?></td>
                        <td>
                            <a class="btn btn-warning btn-xs" href="<?= base_url( 'admin/edit-content/' . $posting['id']); ?>">
                                <i class="glyphicon glyphicon-pencil"></i>Edit
                            </a>
                            <a class="btn btn-danger btn-xs" href="<?= base_url('admin/delete-content/' . $posting['id']); ?>">
                                <i class="glyphicon glyphicon-trash"></i>Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
           
        </div>
    </div>




<?php
$this->load->view('admins/include/footer');
