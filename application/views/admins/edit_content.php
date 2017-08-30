<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->view('admins/include/header');

$content_id = $content->id;
// die();
if($this->input->post('action', true) === 'add')
	{
	echo validation_errors();
	}

$administrator_id = $this->session->userdata('cUser');
echo $this->session->flashdata('msg-succes');


 ?>
<form action="<?php echo base_url('admin/content_update');?>" method="POST">
Title<input type="text" name="title" placeholder="Title" value="<?=set_value('title',$content->title);?>">
<br><br>
Description
<br><br>
<textarea rows="10" cols="30" name="description" placeholder="Description" value="<?=set_value('description', $content->description);?>">
</textarea>
<br><br>
Content
<br><br>
<textarea rows="20" cols="100" name="content" placeholder="Content" value="<?=set_value('content', $content->content);?>">
</textarea>
<br><br>
Slug
<br><br>
<input type="text" name="slug" placeholder="Slug" value="<?=set_value('slug', $content->slug);?>">
<br><br>
<input type="hidden" name="action_id" value="<?= $administrator_id; ?>">
<input type="hidden" name="content_id" value="<?= $content_id; ?>">
<input type="hidden" name="action" value="add">
<br><br>
<input type="submit" value="Submit">

</form>


<?php
$this->load->view('admins/include/footer');
