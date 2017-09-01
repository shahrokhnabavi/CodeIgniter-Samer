<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	public function index()
	{

		// die('In post');
		switch($this->input->post('action', TRUE))
		{
			case 'add':
				$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|max_length[255]');
				$this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[50]');
				$this->form_validation->set_rules('start','Date','trim|required');
				$this->form_validation->set_rules('end','Date','trim|required');

				if ($this->form_validation->run() == FALSE)
				{

				}
				else
				{
					// $current_admin = $this->session->userdata('cUser');
					$values = array(
						'title' => $this->input->post('title', TRUE),
						'content' => $this->input->post('content', TRUE),
						'start' => $this->input->post('start', TRUE),
						'end' => $this->input->post('end', TRUE),
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
						'admin_id' => $this->input->post('action_id', TRUE),
					);
					echo '<br>';
					// var_dump($values);
					// die();
					$this->load->model('Content_model');
					$user = $this->Content_model->add_content($values);
					$this->session->set_flashdata('msg-succes','You record is added.');
					redirect('admin/content');
				}
				break;
		}
		$this->load->model('Content_model');
		$result = $this->Content_model->list_of_post();
		$data = array(
			'currentPageName'  => 'Events',
			'currentPageIcon'  => 'tasks',
			'all_posts_in_db' => $result
		);
		$this->load->view('admins/content', $data);
	}

	
	public function delete( $id ){
		$this->user->loggedIn('admin', false);

		$this->load->model('Content_model');
		$this->Content_model->delete($id );
		redirect('admin/content');
	}


	public function edit( $id )
	{
		$this->user->loggedIn('admin', false);
		$this->load->model('Content_model');
		$content = $this->Content_model->find_content($id);
		$data = array(
			'currentPageName' => 'Events',
			'currentPageIcon' => 'tasks',
			'content' => $content
		);

		$this->load->view('admins/edit_content', $data);
	}


	public function update( )
		{

		switch($this->input->post('action', TRUE))
		{
			case 'add':
				$this->form_validation->set_value('title');
				$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|max_length[255]');
				$this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[50]');
				$this->form_validation->set_rules('start','Date','trim|required');
				$this->form_validation->set_rules('end','Date','trim|required');

				if ($this->form_validation->run() == FALSE)
				{

					$this->user->loggedIn('admin', false);
					$this->load->model('Content_model');
					$content = $this->Content_model->find_content($this->input->post('content_id'));
					$data = array(
								'currentPageName' => 'Events',
								'currentPageIcon' => 'tasks',
								'content' => $content
								);

					$this->load->view('admins/edit_content', $data);
				}
				else
				{
					// $current_admin = $this->session->userdata('cUser');
						$values = array(
            			'title' => $this->input->post('title', TRUE),
						'content' => $this->input->post('content', TRUE),
						'startdate' => $this->input->post('start', TRUE),
						'enddate' => $this->input->post('end', TRUE),
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
						'admin_id' => $this->input->post('action_id', TRUE)

        			);
					echo '<br>';
					// var_dump($values);
					// die();
					$content_id = $this->input->post('content_id', TRUE);
					$this->load->model('Content_model');
					$user = $this->Content_model->update_content($values, $content_id);



					$this->session->set_flashdata('msg-succes','Your record is edited');
					redirect('admin/content');
				}
				break;
		}
	}

}