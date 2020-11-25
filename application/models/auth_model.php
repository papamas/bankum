<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth_model extends CI_Model {

	function __construct()
    {
        parent::__construct();		
    }
		
	public function getUser()
	{
	     $username = $this->input->post('username');
		 $password = $this->input->post('password');	 
		
		 $this->db->select('*');
		 $this->db->where('username',$username);		 
		 $query = $this->db->get('user');
		 return $query;
		 
	}
	
		
	
	
	
	
}