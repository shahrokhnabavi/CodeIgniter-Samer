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
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($list as $record) { ?>
                    <tr>
                        <th scope="row"><?= ++$rowNumber; ?></th>
                        <td><?= $record['email']; ?></td>
                        <td>
                            <a class="btn btn-danger btn-xs" href="<?= base_url('admin/delete-emails/' . $record['id']); ?>">
                                <i class="glyphicon glyphicon-trash"></i>Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php $this->load->view('admins/include/paginating', ['page' => 'admin/emails']); ?>
        </div>
    </div>

</div>
<?php
$this->load->view('admins/include/footer');