<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 9:45 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{
	public function admin()
	{
		$this->user->loggedIn('admin/', false);


		$data = array(
			'currentPageName'  => 'Dashboard',
			'currentPageIcon'  => 'dashboard',
		);

		$this->load->view('admins/dashboard', $data);
	}
}
