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


	public function pages( $page)
	{
		$this->userLoggedIn('admin', false);

		switch( $page ) {
			case 'dashboard':
				$pageData = array();
				$pageContent     = $this->load->view('admins/dashboard', $pageData, true);
				$currentPageName = 'Dashboard';
				$currentPageIcon = 'dashboard';
				break;

			case 'envelope':
				$pageData = array();
				$pageContent     = $this->load->view('admins/subscription', $pageData, true);
				$currentPageName = 'Subscription';
				$currentPageIcon = 'envelope';
				break;

			case 'content':
				$pageData = array();
				$pageContent     = $this->load->view('admins/content', $pageData, true);
				$currentPageName = 'Content';
				$currentPageIcon = 'envelope';
				break;

			case 'gallery':
				$pageData = array();
				$pageContent     = $this->load->view('admins/gallery', $pageData, true);
				$currentPageName = 'Gallery';
				$currentPageIcon = 'picture';
				break;

			case 'user':
				$pageData = array();
				$pageContent     = $this->load->view('admins/user', $pageData, true);
				$currentPageName = 'Users';
				$currentPageIcon = 'user';
				break;

			case 'setting':
				$pageData = array();
				$pageContent     = $this->load->view('admins/setting', $pageData, true);
				$currentPageName = 'Settings';
				$currentPageIcon = 'cog';
				break;

			case 'logout':
				$this->session->sess_destroy();
				redirect('admin');
				break;
			default:
				die('Access Denied!');
				break;
		}



		$data = array(
			'currentAdminName' => $this->getAdminName(),
			'pageContent'	   => $pageContent,
			'currentPageName'  => $currentPageName,
			'currentPageIcon'  => $currentPageIcon
		);

		$this->load->view('admins/main', $data);
	}

	public function users()
	{
		$this->userLoggedIn('admin', false);
		$this->load->view('admins/users');
	}





	public function getAdminName(){
		$id = $this->session->userdata('cUser');
		$record = $this->user->getUserById( $id );
		return $record['name'];
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
