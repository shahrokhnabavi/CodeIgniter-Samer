<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 9:45 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}


	public function login()
	{
		$this->user->loggedIn('admin/dashboard');

		$validation = array(
			array(
				'field' => 'email',
				'label' => 'E-Mail Address',
				'rules' => 'trim|required|valid_email'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required|min_length[6]|max_length[16]'
			)
		);//shah@email.com
		$this->form_validation->set_rules($validation);

		if( $this->form_validation->run() === true )
		{
			$result = $this->user->getUserByEmail( $this->input->post('email',true) );
			if( $result )
			{
				$passwd = $this->password( $this->input->post('password') );

				if( $passwd === $result['password'] )
				{
					$this->session->set_userdata('cUser', $result['id']);
					redirect('admin/dashboard');
				}
				else
					$this->session->set_flashdata( 'error', 'The password does not match.' );

			} else
				$this->session->set_flashdata('error', 'This E-mail address does not exist!');

			redirect('admin');
		}

		$this->load->view('admins/login');
	}


	public function checkEmail( $value, $id )
	{
		$data = array(
			'email' => $value,
			'id <>'	=> $id
		);
		$result = $this->user->getByField( $data );

		if ($result)
		{
			$this->form_validation->set_message('checkEmail', 'This {field} is already exist.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function form(  $page, $id = 0 ){

		$this->user->loggedIn('admin', false);
		$id = (int) $id;

		$validation = array(
			array(
				'field' => 'email',
				'label' => 'E-Mail Address',
				'rules' => "trim|required|valid_email|callback_checkEmail[{$id}]"
			),
			array(
				'field' => 'name',
				'label' => 'User Name',
				'rules' => 'trim|required|regex_match[/^[a-zA-Z ]+$/]'
			)
		);
		if( !$id ){
			$validation[0]['rules'] = 'trim|required|valid_email|is_unique[admins.email]';
			$validation[] = array(
				'field' => 'passwd',
				'label' => 'Password',
				'rules' => 'trim|required|min_length[6]|max_length[16]'
			);
			$validation[] = array(
				'field' => 'confirm',
				'label' => 'Confirm Password',
				'rules' => 'trim|required|matches[passwd]'
			);
		}
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
				$msg = $this->user->edit($sqlData, ['id' => $id], 'Your user is <b>UPDATED</b> successfuly.');
			}
			else
			{
				$sqlData['password'] = $this->password($this->input->post('passwd', true));
				$msg = $this->user->add($sqlData, 'Your user is <b>ADDED</b> successfuly.');
			}

			$this->session->set_flashdata('reg-success',  $msg);
			redirect('admin/user');
		}

		$pg = array(
			'cPageNumbr' => (int) $page,
			'count'		 => $this->user->count(),
			'perPage'	 => 10
		);

		$data = array(
			'currentPageName'  => 'Users',
			'currentPageIcon'  => 'user',
			'list'   	 => $this->user->getAll( $pg['perPage'], $pg['cPageNumbr'] ),
			'update' 	 => $this->user->getByField('id', (int) $id ),
			'paginating' => $pg
		);

		$this->load->view('admins/user', $data);
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

		if( (int) $id <= 1 )
			show_error('[' . __CLASS__ . ']: This is a reserved ID and you can deleted it. Error is on line ' . __LINE__ );

		$this->user->delete($id );
		redirect('admin/user');
	}


	/**
	 * Type: Page
	 * Desc: Logout opration
	 */
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/');
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
