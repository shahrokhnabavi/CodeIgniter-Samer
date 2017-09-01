<?php
/**
 * Created Shahrokh Nabavi.
 * Date: 8/29/2017
 * Time: 9:45 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		$this->load->model('sitesetting');
	}

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

		if( $this->input->post() ){
			$isError = false;

			$config['upload_path'] = './';
			$config['allowed_types'] = 'gif|ico|png';
			$config['overwrite'] = true;
			$config['file_name'] = 'icon';
			$config['file_ext_tolower'] = true;
			$config['max_size'] = '100';

			$this->load->library('upload', $config);
			if (!empty($_FILES['icon']['name']) ) {
				if (!$this->upload->do_upload('icon')) {
					$this->session->set_flashdata('error', array('error' => $this->upload->display_errors()));
					$isError = true;
				} else {
					$this->sitesetting->setValue('site_icon', $this->upload->data('file_name'));
				}
			}

			$config['allowed_types'] = 'gif|png|jpg|jpeg';
			$config['file_name'] = 'logo';

			$this->upload->initialize($config);
			if (!empty($_FILES['logo']['name']) ) {
				if( !$this->upload->do_upload('logo')) {
					$this->session->set_flashdata('error', array('error' => $this->upload->display_errors()));
					$isError = true;
				} else {
					$this->sitesetting->setValue('site_logo', $this->upload->data('file_name'));
				}
			}

			if( !$isError ){
				foreach($this->input->post() as $key => $value ){
					$this->sitesetting->setValue($key, trim($value));
				}
				$this->session->set_flashdata('reg-success', 'The settings are <b>UPDATED</b>');
				redirect('admin/setting');
			}
		}

		$data = array(
			'currentPageName'  => 'Settings',
			'currentPageIcon'  => 'cog',
		);

		$this->load->view('admins/setting', $data);
	}
}
