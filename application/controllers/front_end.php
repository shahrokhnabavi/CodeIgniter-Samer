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
		$this->load->model('gallery');
		$data = array(
			'listGallery' => $this->gallery->getAll()
		);
		$this->load->view('users/gallery', $data);
	}

	public function about()
	{
		
		$this->load->view('users/about');
	}

		public function contact()
	{
		
		$this->load->view('users/contact');
	}
}
