<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {


	public function resizeImage($dir, $ext, $name, $w, $h){
		$this->image_lib->clear();
		$info = getimagesize($dir . $ext);
		$config['source_image']   = $dir . $ext;
		$config['new_image']      = $dir . '_' . $name . $ext;
		$config['maintain_ratio'] = true;
		$config['create_thumb']   = false;
		if($info[0]/$info[1] > $w / $h)
			$config['height'] = $h;
		else
			$config['width']  = $w;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();

		$this->image_lib->clear();
		$info = getimagesize($dir . '_' . $name . $ext);
		$config['source_image']   = $dir . '_' . $name . $ext;
		$config['create_thumb']   = false;
		$config['maintain_ratio'] = false;
		$config['width']          = $w;
		$config['height']         = $h;
		if($info[0]>$info[1])
			$config['x_axis'] = floor(($info[0] - $w)/2);
		else
			$config['y_axis'] = floor(($info[1] - $h)/2);
		$this->image_lib->initialize($config);
		$this->image_lib->crop();
	}

	private function upload( $sqlData, $id = null, $fileData = null ){
		if ( $id === null ) {
			$config['upload_path'] = '../public/assets/uploads/blog';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = 'temp';
			$config['file_ext_tolower'] = true;
			$config['max_size'] = '2048';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('myFile')) {
				$this->session->set_flashdata('error', array('error' => $this->upload->display_errors()));
				return false;
			}
			return $this->upload->data();
		}
		else
		{
			$dir = dirname($fileData['full_path']) . '/' . $id . '_';
			rename($fileData['full_path'], $dir . $fileData['file_ext']);

			$this->load->library('image_lib');

			$this->resizeImage( $dir, $fileData['file_ext'], 'thumb', 80, 80);
		}
	}


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