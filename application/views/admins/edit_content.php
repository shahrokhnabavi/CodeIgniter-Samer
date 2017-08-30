<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admins/include/header');

$content_id = $content->id;
// die();
if($this->input->post('action', true) === 'add')
	{
	echo validation_errors();
	}

$administrator_id = $this->session->userdata('cUser');
echo $this->session->flashdata('msg-succes');
 ?>


<div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="<?php echo base_url('admin/content_update');?>" method="post">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="name" name="title"
                               value="<?=set_value('title');?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea type="text" class="form-control" id="name" name="description">
                        <?=set_value('description', $content->description);?>
                        </textarea>
                    </div>

                     <div class="form-group">
                        <label for="name">Content</label>
                        <textarea type="text" class="form-control" id="name" name="content">
                        <?=set_value('content', $content->content);?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Slug</label>
                        <input type="text" class="form-control" id="name" name="slug"
                               value="<?=set_value('slug');?>">
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


<!-- <form action="<?php echo base_url('admin/content_update');?>" method="POST">
Title<input type="text" name="title" placeholder="Title" value="<?=set_value('title',$content->title);?>">
<br><br>
Description
<br><br>
<textarea rows="10" cols="30" name="description" placeholder="Description"><?=set_value('description', $content->description);?>
</textarea>
<br><br>
Content
<br><br>
<textarea rows="20" cols="100" name="content" placeholder="Content"><?=set_value('content', $content->content);?></textarea>
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

</form> -->


<?php
$this->load->view('admins/include/footer');
