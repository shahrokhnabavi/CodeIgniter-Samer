<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function login()
	{
		$this->userLoggedIn('admin/dashboard');
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
			return $this->mCi->session->userdata('cUser');

		if( $isLoggedin && $this->mCi->session->userdata('cUser') )
			redirect( $url );

		if( !$isLoggedin && !$this->mCi->session->userdata('cUser') )
			redirect( $url );
	}
}
