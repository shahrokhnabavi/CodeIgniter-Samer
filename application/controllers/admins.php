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

		$this->load->model('user');
	}

	public function login()
	{
		$this->userLoggedIn('admin/dashboard');

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
		);
		$this->form_validation->set_rules($validation);

		if( $this->form_validation->run() === true )
		{
			$result = $this->user->getUserByEmail( $this->input->post('email',true) );
			if( $result )
			{
				$passwd = $this->password( $this->input->post('passwd') );
				if( $passwd === $result['passwd'] )
				{
					$this->session->set_userdata('cUser', $result['id']);
					redirect('user-profile');
				}
				else
					$this->session->set_flashdata( 'login-error', 'The password does not match.' );

			} else
				$this->session->set_flashdata(
					'login-error',
					'This E-mail address does not exist. Please <a href="' . base_url('registration') . '">register</a>!'
				);

			redirect('admins/login');
		}



		$this->load->view('admins/login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function dashboard()
	{
		$this->userLoggedIn('admin', false);
		$this->load->view('admins/dashboard');
	}

	public function users()
	{
		$this->userLoggedIn('admin', false);
		$this->load->view('admins/users');
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
	 * Type: DB
	 * Desc: user email check if exist return false else true
	 *
	 * @param $email
	 * @return bool
	 */
	public function userExist( $email ){
		$result = $this->user->getUserByEmail($email);
		return empty($result);
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
