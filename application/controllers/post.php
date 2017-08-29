<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {



	public function index()
	{

		$this->load->view('post_view');

	}

	public function insert_post()
	{

		switch($this->input->post('action', TRUE))

			{
				case 'submit':

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
            			'description' => $this->input->post('description', TRUE),
            			'content' => $this->input->post('content', TRUE),
            			'slug' => $this->input->post('slug', TRUE),
            			'created_at' => date("Y-m-d H:i:s"),
            			'updated_at' => date("Y-m-d H:i:s"),
            			'admin_id' => $this->input->post('action_id', TRUE),

        			);

            		echo '<br>';

            		// var_dump($values);
            		// die();
            		$this->load->model('Content_model');
					$user = $this->Content_model->add_content($values);

    				}


		break;

		default:
					echo "Sorry";
				

		break;

			}

	}

}
