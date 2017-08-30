<?php

class Subscribe extends CI_Controller{
	
	public function index()
	{
		$this->load->view('index.php');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

	}

		// ADD SUBSCRIBER TO DATABASE
	public function add_member()
	{
			$sub = $this->input->post('sub', TRUE);
		//Validation Statement.
		$this->form_validation->set_rules('sub', 'E-Mail', 'trim|required|valid_email|is_unique[subscription.email]');

		if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('index');
			} 
		else 
			{
				$values = array(
				'email' => $this->input->post('sub', TRUE)
				);
				$this->load->model('subscribes');
				$email = $this->subscribes->add_subscriber( $values );
				$this->session->set_flashdata('successMsg', 'Thanks for your subscription.');
				redirect('/');
				}
	}
	
		// SHOW SUBSCRIBERS
	public function show_members()
	{
				$this->load->model('subscribes');
				$result = $this->subscribes->show_subscribers();
				$data = array(
				'all_emails' => $result,
				);
				$this->load->view('show_subscribers', $data);

	}

	public function delete_member()
	{
		$this->load->model('subscribes');
		$this->subscribes->delete_subscriber($id); 
	}

}