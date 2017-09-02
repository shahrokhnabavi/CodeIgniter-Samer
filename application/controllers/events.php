<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		$this->load->model('event');
	}

	public function resizeImage($dir, $ext, $name, $w, $h){
		$this->image_lib->clear();
		$info = getimagesize($dir . $ext);
		$config['source_image']   = $dir . $ext;
		$config['new_image']      = $dir . $name . $ext;
		$config['maintain_ratio'] = true;
		$config['create_thumb']   = false;
		if($info[0]/$info[1] > $w / $h)
			$config['height'] = $h;
		else
			$config['width']  = $w;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();

		$this->image_lib->clear();
		$info = getimagesize($dir . $name . $ext);
		$config['source_image']   = $dir . $name . $ext;
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
			$config['upload_path'] = './assets/uploads/event';
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
			$this->resizeImage( $dir, $fileData['file_ext'], '348X232', 348, 232);
		}
	}


	/**
	 * @param $page
	 * @param $id
	 */
	public function form(  $page, $id  ){

		$this->user->loggedIn('admin', false);

		$validation = array(
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'trim|required|min_length[6]|max_length[255]|regex_match[/^[a-zA-Z ]+$/]'
			),
			array(
				'field' => 'content',
				'label' => 'Content',
				'rules' => 'trim|required|min_length[50]'
			),
			array(
				'field' => 'start',
				'label' => 'Start Date',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'end',
				'label' => 'End Date',
				'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($validation);


		if( $this->form_validation->run() === true ) {

			$sqlData = array(
				'title'     => $this->input->post('title', TRUE),
				'content'   => $this->input->post('content', TRUE),
				'startdate' => $this->input->post('start', TRUE),
				'enddate'   => $this->input->post('end', TRUE),
				'admin_id'  => $this->user->cUser('id')
			);

			if( $id )
			{
				if( !is_numeric($id) )
					show_error('[' . __CLASS__ . ']: The type of parameter is not valid. Error is on line ' . __LINE__ );

				$isEdit = true;
				$sqlData['updated_at'] = date("Y-m-d H:i:s");

				if (!empty($_FILES['myFile']['name']) ) {
					if ($fileData = $this->upload($sqlData) and $fileData === false) {
						$isEdit = false;
					}
				}

				if( $isEdit ) {
					if( $fileData ) {
						$this->deleteFiles($id);
						$this->upload($sqlData, $id, $fileData);
					}

					$this->event->edit($sqlData, ['id' => $id]);

					$this->session->set_flashdata('msg-success', 'Your blog post is <b>UPDATED</b> successfuly.');
					redirect('admin/event');
				}
			}
			else
			{
				if( $fileData = $this->upload( $sqlData ) and $fileData !== false ) {
					$id = $this->event->add($sqlData);

					$this->upload($sqlData, $id, $fileData);

					$this->session->set_flashdata('msg-success', 'Your blog post is <b>ADDED</b> successfuly.');
					redirect('admin/event');
				}
			}
		}

		$id = (int) $id;
		$pg = array(
			'cPageNumbr' => (int) $page,
			'count'		 => $this->event->count(),
			'perPage'	 => 10
		);

		$data = array(
			'currentPageName'  => 'Events',
			'currentPageIcon'  => 'tasks',
			'list'   	 => $this->event->getAll( $pg['perPage'], $pg['cPageNumbr'] ),
			'update' 	 => $this->event->getByField('id', (int) $id ),
			'paginating' => $pg
		);
		$this->load->view('admins/event', $data);
	}


	/**
	 * Type: Page
	 * Desc: delete a record
	 *
	 * @param $id
	 */
	public function delete( $id ){
		$this->user->loggedIn('admin', false);

		if( !is_numeric($id) )
			show_error('[' . __CLASS__ . ']: The type of parameter is not valid. Error is on line ' . __LINE__ );

		$this->deleteFiles( $id );

		$this->event->delete($id );
		redirect('admin/event');
	}

	private function deleteFiles( $id ){
		$files = realpath(FCPATH . 'assets/uploads/event') . '/' . $id . '_*';
		foreach( glob($files) as $file ){
			unlink($file);
		}
	}
}