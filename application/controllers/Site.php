<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 9:45 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{
	public $currentRoute;

	public function __construct(){
		parent::__construct();

		$this->load->model('sitesetting');
		$this->currentRoute = $this->uri->segment(1);

		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
	}

	public function index()
	{
		$this->form_validation->set_rules('sub', 'E-Mail', 'trim|required|valid_email|is_unique[subscription.email]');
		if ($this->form_validation->run() === TRUE)
		{
			$values = array(
				'email' => $this->input->post('sub', TRUE)
			);
			$this->load->model('subscribes');
			$this->subscribes->add_subscriber( $values );
			$this->session->set_flashdata('successMsg', '<p>Thanks for your subscription.</p>');
			redirect();
		}

		$this->load->model('blog');
		$this->load->model('event');
		$content_home = array(
			'event' => $this->event->getAll(3),
			'blog'  => $this->blog->getAll(2)
		);
		$this->load->view('visitor/home',$content_home);
	}

	public function gallery()
	{
		$this->load->model('gallery');
		$data = array(
			'listGallery' => $this->gallery->getAll()
		);
		$this->load->view('visitor/gallery', $data);
	}

	public function events()
	{
		$this->load->model('event');
		$content_home = array(
			'event' => $this->event->getAll()
		);
		$this->load->view('visitor/events',$content_home);
	}

	public function contact()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_space_only');
		$this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		//run validation on form input
		if ($this->form_validation->run() == True)

		{
			//get the form data
			$name = $this->input->post('name');
			$from_email = $this->input->post('email');
			$message = $this->input->post('message');

			//Receive it in this email
			$to_email = $this->sitesetting->getValue('contact_email');

			//configure email settings I Chose GMAIL
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			//set validation rules
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'fromwebsite.contact@gmail.com';
			$config['smtp_pass'] = 'Samer1234';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";
			//$this->load->library('email', $config);
			$this->email->initialize($config);

			//send mail
			$this->email->from($from_email, $name);
			$this->email->to($to_email);
			$this->email->message($message);
			if ($this->email->send())
			{
				// mail sent
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
			}
			else
			{
				//error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');
			}
		}


		$this->load->view('visitor/contact');
	}

	public function dashboard()
	{
		$this->user->loggedIn('admin/', false);


		$data = array(
			'currentPageName'  => 'Dashboard',
			'currentPageIcon'  => 'dashboard',
		);

		$this->load->view('admins/dashboard', $data);
	}

	public function setting()
	{
		$this->user->loggedIn('admin/', false);

		if( $this->input->post() ){
			$isError = false;

			$config['upload_path'] = './';
			$config['allowed_types'] = 'gif|ico|png';
			$config['overwrite'] = true;
			$config['file_name'] = 'icon';
			$config['file_ext_tolower'] = true;
			$config['max_size'] = '100';

			$this->load->library('upload', $config);
			if (!empty($_FILES['icon']['name']) ) {
				if (!$this->upload->do_upload('icon')) {
					$this->session->set_flashdata('error', array('error' => $this->upload->display_errors()));
					$isError = true;
				} else {
					$this->sitesetting->setValue('site_icon', $this->upload->data('file_name'));
				}
			}

			$config['allowed_types'] = 'gif|png|jpg|jpeg';
			$config['file_name'] = 'logo';

			$this->upload->initialize($config);
			if (!empty($_FILES['logo']['name']) ) {
				if( !$this->upload->do_upload('logo')) {
					$this->session->set_flashdata('error', array('error' => $this->upload->display_errors()));
					$isError = true;
				} else {
					$this->sitesetting->setValue('site_logo', $this->upload->data('file_name'));
				}
			}

			if( !$isError ){
				foreach($this->input->post() as $key => $value ){
					$this->sitesetting->setValue($key, trim($value));
				}
				$this->session->set_flashdata('reg-success', 'The settings are <b>UPDATED</b>');
				redirect('admin/setting');
			}
		}

		$data = array(
			'currentPageName'  => 'Settings',
			'currentPageIcon'  => 'cog',
		);

		$this->load->view('admins/setting', $data);
	}

	//custom validation function to accept only alphabets and space input
	public function alpha_space_only($str)
	{
		if (!preg_match("/^[a-zA-Z ]+$/",$str))
		{
			$this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
