<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 9:45 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleries extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		$this->load->model('gallery');
	}


	public function form(  $page, $id  ){

		$this->userLoggedIn('admin', false);



//if( $this->input->post() ) {
//	$this->load->helper('string');
//	$rand = random_string('alnum', 8);
//
//	$config['upload_path'] = '../uploads/';
//	$config['allowed_types'] = 'gif|jpg|png|jpeg';
//	$config['file_name'] = '12-' . $rand;
//	$config['file_ext_tolower'] = true;
//
//	$this->load->library('upload', $config);
//
//	if (!$this->upload->do_upload('myFile')) {
//		$error = array('error' => $this->upload->display_errors());
//		var_dump($error);
//		die();
//	} else {
//		$data = array('upload_data' => $this->upload->data());
//		var_dump($data);
//			die();
//	}
//}



		$id = (int) $id;
		$pg = array(
			'cPageNumbr' => (int) $page,
			'count'		 => $this->gallery->count(),
			'perPage'	 => 10
		);

		$data = array(
			'currentPageName'  => 'Gallery',
			'currentPageIcon'  => 'picture',
			'list'   	 => $this->gallery->getAll( $pg['perPage'], $pg['cPageNumbr'] ),
			'update' 	 => $this->gallery->getByField('id', (int) $id ),
			'paginating' => $pg
		);

		$this->load->view('admins/gallery', $data);
return;



















		$validation = array(
			array(
				'field' => 'email',
				'label' => 'E-Mail Address',
				'rules' => 'trim|required|valid_email|is_unique[admins.email]'
			),
			array(
				'field' => 'name',
				'label' => 'User Name',
				'rules' => 'trim|required|regex_match[/^[a-zA-Z ]+$/]'
			)
		);
		$this->form_validation->set_rules($validation);


		if( $this->form_validation->run() === true ) {

			$sqlData = array(
				'name'      => $this->input->post('name',true),
				'email'     => $this->input->post('email',true)
			);

			if( $id )
			{
				if( !is_numeric($id) )
					show_error('[Admins]: The type of parameter is not valid. Error is on line ' . __LINE__ );

				$sqlData['updated_at'] = date("Y-m-d H:i:s");
				$msg = $this->gallery->edit($sqlData, ['id' => $id], 'Your user is <b>UPDATED</b> successfuly.');
			}
			else
			{
				$sqlData['password'] = $this->password($this->input->post('passwd', true));
				$msg = $this->gallery->add($sqlData, 'Your user is <b>ADDED</b> successfuly.');
			}

			$this->session->set_flashdata('reg-success',  $msg);
			redirect('admin/gallery');
		}



		$id = (int) $id;
		$pg = array(
			'cPageNumbr' => (int) $page,
			'count'		 => $this->gallery->count(),
			'perPage'	 => 10
		);

		$data = array(
			'currentPageName'  => 'Gallery',
			'currentPageIcon'  => 'picture',
			'list'   	 => $this->gallery->getAll( $pg['perPage'], $pg['cPageNumbr'] ),
			'update' 	 => $this->gallery->getByField('id', (int) $id ),
			'paginating' => $pg
		);

		$this->load->view('admins/gallery', $data);
	}

	/**
	 * Type: Page
	 * Desc: delete a record
	 *
	 * @param $id
	 */
	public function delete( $id ){
		$this->userLoggedIn('login', false);

		if( !is_numeric($id) )
			show_error('[' . __CLASS__ . ']: The type of parameter is not valid. Error is on line ' . __LINE__ );

		if( (int) $id <= 1 )
			show_error('[' . __CLASS__ . ']: This is a reserved ID and you can deleted it. Error is on line ' . __LINE__ );

		$this->gallery->delete($id );
		redirect('admin/gallery');
	}





	/**
	 * Type: Action
	 * Desc: Check user if logged in or not
	 *
	 * @param null $url
	 * @param bool $isLoggedin
	 * @return mixed
	 */
	public function userLoggedIn( $url = null , $isLoggedin = true ){
		if( $url === null )
			return $this->session->userdata('cUser');

		if( $isLoggedin && $this->session->userdata('cUser') )
			redirect( $url );

		if( !$isLoggedin && !$this->session->userdata('cUser') )
			redirect( $url );
	}


	/**
	 * Type: Action
	 * Desc: encrypting password
	 *
	 * @param $password
	 * @return string
	 */
	public function password( $password ){
		return md5( $password .$this->config->item('encryption_key') ) ;
	}
}
