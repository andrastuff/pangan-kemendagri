<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_area extends MY_Users {

	function __construct()
	{
		parent::__construct();
		@session_start();
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Dashboard';
		 
		$data['alert'] 			= $this->session->flashdata('alert'); 
		$this->load->view('content/home', $data);
	}

}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */