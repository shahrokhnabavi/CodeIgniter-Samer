<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {


	public function __construct(){

		parent::__construct();
        $this->load->helper(array('form', 'url'));
	}

	public function index()
	{

		$this->load->view('image_view', array('error' => '' ));

	}


	public function upload()
	{	
		$config = [
			'upload_path' => './upload/',
			'allowed_types'=> 'jpg|jpeg|png|bmp|gif'
		];
		
		$this->load->library('upload', $config); //Load the upload CI library


		
	if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }


}

}
?>