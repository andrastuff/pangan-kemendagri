<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Root extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		@session_start();
		
	}
	
	public $redirect = 'root';
	
	public function index()
	{
		 
			if($this->session->userdata('auth_key')){
				redirect("member_area");
			};
			
			$data['meta']	= array("judul" => "login", 
									"deskripsi" => "login",
									"logo" => "login",
									"footer" => "login",);
			 
			$this->load->view('login', $data);
	
	}
	
	public function auth_login()
	{
		$client     = new GuzzleHttp\Client();
		$headers = [     
			'Accept'        => 'application/json',
		];
		$url        = 'http://service-ketahananpangan.kemendagri.go.id/site/login';
		
		$data = ['email' => $this->input->post("email"),'password' => $this->input->post("password")];
		try {
			 
			$response = $client->request( 'POST', $url, [ 'form_params' => $data]);
			#guzzle repose for future use
		

			
			if($response->getStatusCode() == 200){
				$data 		= array();
				$response = $response->getBody()->getContents();
				$response = json_decode($response);
				
				$user 	= $response->user;
				foreach($user as $key=>$val){
					$data[$key] = $val;
				}
				$instansi 	= $response->instansi;
				foreach($instansi as $key=>$val){
					$data[$key] = $val;
				}
				$this->session->set_userdata($data);
				redirect("member_area");
				 
			}
		  } catch (GuzzleHttp\Exception\BadResponseException $e) {
			#guzzle repose for future use
			$response = $e->getResponse();
			$responseBodyAsString = $response->getBody()->getContents();
			 
			$this->session->set_flashdata('error', $responseBodyAsString);
			redirect($this->redirect);
		  }
	}
	
	public function signout()
	{

			$this->session->sess_destroy();
			echo json_encode(['message' => 'success signout'], 200);
	
	}
	
}

/* End of file login.php */
/* Location: ./application/modules/dashboard/controllers/login.php */