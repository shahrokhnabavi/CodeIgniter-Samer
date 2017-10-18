<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admins/include/header');
$rowNumber = $paginating['perPage'] * $paginating['cPageNumbr']
?>

<div class="col-md-12">

    <div class="row">
        <div class="col-md-12">
            <?php
            if( $msg = validation_errors() )
                echo '<div class="alert alert-danger">' . $msg . '</div>';
            if($msg = $this->session->flashdata('error') )
                foreach( $msg as $err )
                    echo '<div class="alert alert-danger">' . $err . '</div>';
            if($msg = $this->session->flashdata('msg-success') )
                echo '<div class="alert alert-success">' . $msg . '</div>';
            ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" enctype="multipart/form-data"  action="<?= base_url('admin/blog' . (isset($update['id']) ? '/' . $update['id'] : '') ); ?>" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                               value="<?= set_value('title', isset($update['title']) ? $update['title'] : ''); ?>">
                    </div>
                    <div class="form-group">
                        <div class="photo-input-file">
                            <?php
                            if( isset($update['id']) ) {
                                $name = glob(FCPATH . 'assets/uploads/blog/' . $update['id'] . '_thumb.*');
                                if( $name )
                                    echo '<img class="img-thumbnail" src="' . base_url('assets/uploads/blog/' . basename($name[0]) ) . '" />';
                            }
                            ?>
                        </div>
                        <div class="input-file">
                            <label for="file">Select An Image</label>
                            <input type="file" id="file" name="myFile" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea type="text" class="form-control" id="name" name="description"><?= set_value('description', isset($update['description']) ? $update['description'] : ''); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Content</label>
                        <textarea type="text" class="form-control" id="name" name="content"><?= set_value('content', isset($update['content']) ? $update['content'] : ''); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Slug</label>
                        <input type="text" class="form-control" id="name" name="slug"
                               value="<?= set_value('slug', isset($update['slug']) ? $update['slug'] : ''); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" value="Submit">Add/Update Blog</button>
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
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach($list as $posting) {
                    $name = glob(FCPATH . 'assets/uploads/blog/' . $posting['id'] . '_thumb.*');
                    $link = $name ? basename($name[0]) : '';
                    ?>
                    <tr>
                        <th scope="row"><?= ++$rowNumber; ?></th>
                        <td><?= $posting['title']; ?></td>
                        <td><img src="<?= base_url('assets/uploads/blog/' . $link ); ?>" width="80"></td>
                        <td>
                            <a class="btn btn-warning btn-xs" href="<?= base_url( 'admin/blog/' . $posting['id']); ?>">
                                <i class="glyphicon glyphicon-pencil"></i>Edit
                            </a>
                            <a class="btn btn-danger btn-xs" href="<?= base_url('admin/delete-blog/' . $posting['id']); ?>">
                                <i class="glyphicon glyphicon-trash"></i>Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php $this->load->view('admins/include/paginating', ['page' => 'admin/blog']); ?>
        </div>
    </div>

</div>

<?php
$this->load->view('admins/include/footer');
