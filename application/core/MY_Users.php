<?php 

class MY_Users extends CI_Controller {

public $data = array();
	function __construct() {

		parent::__construct();
		 
        $auth_key   = $this->session->userdata('auth_key');
		$id 		= $this->session->userdata('id');
		$email  	= $this->session->userdata('email');
		 
		if((!$auth_key) OR (!$id)){
			redirect("");
		}
		$this->load->model('m_main');
		$data['meta']      = $this->m_main->meta();
		$this->load->view('meta',$data);		
	}
	
}
 