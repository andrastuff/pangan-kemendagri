<?php 

class MY_Admin extends CI_Controller {

public $data = array();
	function __construct() {

		parent::__construct();
		
        $token  	= $this->input->cookie('access_token', TRUE);
		
		if(($token == "null") OR ($token != NULL)){
		   
		  header("location: ".base_url("member_area"));
		}else{
            header("location: ".base_url()); 
		} 
		  
	}
	
	
}
 