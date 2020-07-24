<?php 

class MY_Public extends CI_Controller {
	
public $data = array();
	function __construct() {

		parent::__construct();
        $logged_in = $this->session->userdata('is_login');
		

        if(!$logged_in){
			
            header("location: ".base_url());
		
	}
	 
		$data['meta']      = "";
		$this->load->view('meta',$data); 
	}
	

}
 