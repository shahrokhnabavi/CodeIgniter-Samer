<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 11:33 AM
 */
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
            if($msg = $this->session->flashdata('reg-success') )
                echo '<div class="alert alert-success">' . $msg . '</div>';
            ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="<?= base_url('admin/user' . (isset($update['id']) ? '/' . $update['id'] : '') ); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Admin Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?= set_value('name', isset($update['name']) ? $update['name'] : ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email"
                               value="<?= set_value('email', isset($update['email']) ? $update['email'] : ''); ?>">
                    </div>
                    <div class="form-group <?php if(isset($update['id'])) echo 'hidden'; ?>">
                        <label for="passwd">Password</label>
                        <input type="password" class="form-control" id="passwd" name="passwd">
                    </div>
                    <div class="form-group <?php if(isset($update['id'])) echo 'hidden'; ?>">
                        <label for="confirm">Password Confirm</label>
                        <input type="password" class="form-control" id="confirm" name="confirm">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add/Update User</button>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($list as $record) { ?>
                    <tr>
                        <th scope="row"><?= ++$rowNumber; ?></th>
                        <td><?= $record['name']; ?></td>
                        <td><?= $record['email']; ?></td>
                        <td>
                            <?php if( $record['id'] > 1 ) { ?>
                            <a class="btn btn-warning btn-xs" href="<?= base_url( 'admin/user/' . $record['id']); ?>">
                                <i class="glyphicon glyphicon-pencil"></i>Edit
                            </a>
                            <a class="btn btn-danger btn-xs" href="<?= base_url('admin/delete-user/' . $record['id']); ?>">
                                <i class="glyphicon glyphicon-trash"></i>Delete
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php $this->load->view('admins/include/paginating', ['page' => 'admin/user']); ?>
        </div>
    </div>

</div>
<?php
$this->load->view('admins/include/footer');