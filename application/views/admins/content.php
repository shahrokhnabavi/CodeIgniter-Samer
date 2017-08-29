<?php
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
                    <?php






if($this->input->post('action', true) === 'add')
	{
	echo validation_errors();
	}

$administrator_id = $this->session->userdata('cUser');
echo $this->session->flashdata('msg-succes');

 ?>
<form action="<?php echo base_url('admin/content');?>" method="POST">
Title<input type="text" name="title" placeholder="Title" value="<?=set_value('title');?>">
<br><br>
Description
<br><br>
<textarea rows="10" cols="30" name="description" placeholder="Description" value="<?=set_value('description');?>">
</textarea>
<br><br>
Content
<br><br>
<textarea rows="20" cols="100" name="content" placeholder="Content" value="<?=set_value('content');?>">
</textarea>
<br><br>
Slug
<br><br>
<input type="text" name="slug" placeholder="Slug" value="<?=set_value('slug');?>">
<br><br>
<input type="hidden" name="action_id" value="<?= $administrator_id; ?>">
<input type="hidden" name="action" value="add">
<br><br>
<input type="submit" value="Submit">

</form>

<?php
// var_dump($all_posts_in_db);

foreach ($all_posts_in_db as $posting) {
?>

<div>
Title : <?php echo $posting['title'] ?> 
Content:<?php echo $posting['content'] ?>
Description:<?php echo $posting['description'] ?>
</div>
<br>
<hr>
<?php
}









                    ?>
                </div>

            </div>
            <!--/col-span-9-->
        </div>
    </div>
    <!-- /Main -->

<?php
$this->load->view('admins/include/footer');