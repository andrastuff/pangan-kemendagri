<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('captcha','date','text_helper'));
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('m_main');
		$data['meta']      = $this->m_main->meta();
		$this->load->view('meta',$data); 
		@session_start();
		
	}
	
	public function index()
	{
		$data['halaman']	= 'Maps';
			 
		$this->load->view('maps', $data);
	}
	

}

/* End of file login.php */
/* Location: ./application/modules/dashboard/controllers/login.php */