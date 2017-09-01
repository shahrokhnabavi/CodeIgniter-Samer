<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller{

	//Added by SHAHROKH
	public function listOfAll( $page ){
		$this->load->model('subscribes');

		$pg = array(
			'cPageNumbr' => (int) $page,
			'count'		 => $this->subscribes->count(),
			'perPage'	 => 10
		);

		$data = array(
			'currentPageName'  => 'Subscriptions',
			'currentPageIcon'  => 'envelope',
			'list'   	 => $this->subscribes->getAll( $pg['perPage'], $pg['cPageNumbr'] ),
			'paginating' => $pg
		);

		$this->load->view('admins/subscribe', $data);
	}
	//End of SHAHROKH

	// ADD SUBSCRIBER TO DATABASE
	public function add_member()
	{
		$sub = $this->input->post('sub', TRUE);
		//Validation Statement.
		$this->form_validation->set_rules('sub', 'E-Mail', 'trim|required|valid_email|is_unique[subscription.email]');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->model('Content_model');
			$content = $this->Content_model->content_home();
			$content_home = array('recent_content' => $content);
			$this->load->view('users/home',$content_home);
		}
		else
		{
			$values = array(
				'email' => $this->input->post('sub', TRUE)
			);
			$this->load->model('subscribes');
			$email = $this->subscribes->add_subscriber( $values );
			$this->session->set_flashdata('successMsg', '<p>Thanks for your subscription.</p>');
			redirect('/');
		}
	}


	public function delete_member( $id )
	{
		$this->load->model('subscribes');
		$this->subscribes->delete_subscriber($id);
		redirect('admin/emails');
	}
}