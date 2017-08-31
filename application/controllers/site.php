<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 9:45 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{
	public function index(){
		$this->load->view('visitor/index');
	}

	public function dashboard()
	{
		$this->user->loggedIn('admin/', false);


		$data = array(
			'currentPageName'  => 'Dashboard',
			'currentPageIcon'  => 'dashboard',
		);

		$this->load->view('admins/dashboard', $data);
	}

	public function setting()
	{
		$this->user->loggedIn('admin/', false);


		$data = array(
			'currentPageName'  => 'Settings',
			'currentPageIcon'  => 'cog',
		);

		$this->load->view('admins/setting', $data);
	}
}
