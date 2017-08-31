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

	public function about()
	{
		// die('I am in about controller');
		$this->load->model('Content_model');
		$content = $this->Content_model->list_of_post();
		$content_home = array('recent_content' => $content);

		// var_dump($content_home);
		// die();

		$this->load->view('users/about' , $content_home);
	}

		public function contact()
	{
		
		$this->load->view('users/contact');
	}
}
