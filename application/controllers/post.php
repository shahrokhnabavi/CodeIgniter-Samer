<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {



	public function index()
	{


		switch($this->input->post('action', TRUE))

			{
				case 'add':

				$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[6]|max_length[50]');
				$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[20]|max_length[100]');
				$this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[50]|max_length[1000]');
				$this->form_validation->set_rules('slug', 'Slug', 'trim|required|min_length[2]|max_length[20]');

				
				if ($this->form_validation->run() == FALSE)
						{

						}

				else
				{

						// $current_admin = $this->session->userdata('cUser');
    			$values = array(
            			'title' => $this->input->post('title', TRUE),
            			'content' => $this->input->post('content', TRUE),
            			'slug' => $this->input->post('slug', TRUE),
            			'description' => $this->input->post('description', TRUE),
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
			'currentPageName'  => 'Content',
			'currentPageIcon'  => 'tasks',
			'all_posts_in_db' => $result
		);
		$this->load->view('admins/content', $data);


	}




	public function insert_post()
	{

		switch($this->input->post('action', TRUE))

			{
				case 'add':

			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[6]|max_length[50]');
			$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[20]|max_length[100]');
			$this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[50]|max_length[1000]');
			$this->form_validation->set_rules('slug', 'Slug', 'trim|required|min_length[2]|max_length[20]');

			
			if ($this->form_validation->run() == FALSE)
					{
    					$this->load->view('post_view');

					}

			else
					{

						// $current_admin = $this->session->userdata('cUser');
    					$values = array(
            			'title' => $this->input->post('title', TRUE),
            			'content' => $this->input->post('content', TRUE),
            			'slug' => $this->input->post('slug', TRUE),
            			'description' => $this->input->post('description', TRUE),
            			'created_at' => date("Y-m-d H:i:s"),
            			'updated_at' => date("Y-m-d H:i:s"),
            			'admin_id' => $this->input->post('action_id', TRUE),

        			);

            		echo '<br>';

            		// var_dump($values);
            		// die();
            		$this->load->model('Content_model');
					$user = $this->Content_model->add_content($values);

					redirect('post/display_posts');

    				}


		break;

		default:
					echo "Sorry";
		break;

			}

	}


	public function delete( $id ){
		$this->user->loggedIn('admin', false);
		
		$this->load->model('Content_model');
		$this->Content_model->delete($id );
		redirect('admin/content');
	}


	public function edit( $id ){
		$this->user->loggedIn('admin', false);
		$this->load->model('Content_model');
		$content = $this->Content_model->find_content($id );

		// echo '<pre>';
		// var_dump($content);
		// die();

		$this->load->view('admins/edit_content', ['content' => $content]);

		
	}

	public function update(){

		

		$values = array(
            			'title' => $this->input->post('title', TRUE),
            			'content' => $this->input->post('content', TRUE),
            			'slug' => $this->input->post('slug', TRUE),
            			'description' => $this->input->post('description', TRUE),
            			'created_at' => date("Y-m-d H:i:s"),
            			'updated_at' => date("Y-m-d H:i:s"),
            			'admin_id' => $this->input->post('action_id', TRUE),

        			);
		$content_id = $this->input->post('content_id', TRUE);

		// var_dump($values);
		$this->load->model('Content_model');
		$user = $this->Content_model->update_content($values, $content_id);

		// die('edited in database');


		$this->session->set_flashdata('msg-succes','Your record is edited');
		redirect('admin/content');
	}



}
