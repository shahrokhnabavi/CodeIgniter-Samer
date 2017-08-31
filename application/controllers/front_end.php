<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_end extends CI_Controller {



	public function index()
	{
		$this->load->model('Content_model');
		$content = $this->Content_model->content_home();
		$content_home = array('recent_content' => $content);
		$this->load->view('users/home',$content_home);
	}

	public function gallery()
	{
		$this->load->view('users/gallery');
	}

}
