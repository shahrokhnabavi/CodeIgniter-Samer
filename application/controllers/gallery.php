<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	var $data =  array();

	public function index()
	{
		$config = array('upload_path' => 'upload/',
						'allowed_types' =>'jpg|jpeg|png|bmp',
						'max_size' => 0,
						'filename'=>url_title($this->input->post('file'));



				   );

		$this->load->view('image_view', $this->data);
	}


}

