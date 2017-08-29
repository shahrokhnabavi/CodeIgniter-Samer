<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
</head>
<body>

<?php 
if($this->input->post('action', true) === 'submit')
	{
	echo validation_errors();
	}

$administrator_id = $this->session->set_userdata('cUser');
 ?>
<form action="<?php echo base_url('post/insert_post');?>" method="POST">
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
<br><br>
<input type="hidden" name="action" value="submit">
<br><br>
<input type="submit" value="Submit">

</form>



</body>
</html>



