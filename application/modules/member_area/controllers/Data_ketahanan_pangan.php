<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ketahanan_pangan extends MY_Users {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['halaman'] 			= 'Input Data Ketahanan Pangan';
		
		 
		$this->load->view('content/data_ketahanan_pangan', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/modules/dashboard/controllers/admin.php */