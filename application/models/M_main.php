<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_main extends CI_Model{
	public function __construct() 
    {
        parent::__construct();
    }
	
	
	function Meta()
	{
		$data	= array("judul" => "Ketahanan Pangan", 
						"deskripsi" => "Ketahanan Pangan",
						"logo" => "logo.png",
						"footer" => "Ketahanan Pangan",);
		return $data;	
	}
	

}