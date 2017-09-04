<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		$this->load->model('subscribes');
	}

	//Added by SHAHROKH
	public function listOfAll( $page ){

		$pg = array(
			'cPageNumbr' => (int) $page,
			'count'		 => $this->subscribes->count(),
			'perPage'	 => 10
		);

		$data = array(
			'currentPageName'  => 'Subscriptions',
			'currentPageIcon'  => 'envelope',
			'list'   	 => $this->subscribes->getAll( $pg['perPage'], $pg['cPageNumbr'] ),
			'paginating' => $pg
		);

		$this->load->view('admins/subscribe', $data);
	}
	//End of SHAHROKH

	public function delete_member( $id )
	{
		$this->user->loggedIn('admin', false);

		$this->subscribes->delete_subscriber($id);
		redirect('admin/emails');
	}
}