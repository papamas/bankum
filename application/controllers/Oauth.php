<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oauth extends CI_Controller {

	function __construct()
    {
        parent::__construct();	
		$this->load->library('Auth');	
    }
	
	public function index()
	{
		$data['message']    = '<h2 class="text-center text-primary">Masuk Akun</h2>';
		$this->load->view('vLogin',$data);
	}
	
	public function login()
	{
		
		if($this->auth->loginUser())
		{
		    redirect('home');
		}
		else
		{
		    $data['message']    = '<h2 class="text-center text-danger">'.$this->auth->getMessage().'</h2>';
			$this->load->view('vlogin',$data);
		}
	}
	
	public function logout()
	{
		$this->auth->logoutUser();
		redirect('oauth','refresh');
	}
}

