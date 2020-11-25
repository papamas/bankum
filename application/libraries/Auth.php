<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Auth Class
 *
 * Authentication library for Code Igniter.
 * @author		Nur Muhamad Holik -2016
 * @version		1.0.0
 */
 
class Auth {
   var $_auth_message;
   
   
    function __construct()
    {
        $this->ci =& get_instance();
		$this->ci->lang->load('auth');
    }
   
   public function loginUser()
   {
        $this->ci->load->model('Auth_model','mauth');
		
		$result = FALSE;
		
		if($query  = $this->ci->mauth->getUser() AND $query->num_rows()  == 1 )
        {
             $row 	      = $query->row();			 
			 $password 	  = $this->_encode();
		     $stored_hash = $row->password;
			 
			if($password === $stored_hash)
			{			   
				// Set message
				$this->_auth_message = $this->ci->lang->line('auth_login_correct_username_password');
				// set session
				$this->_set_session($row);
				$result = TRUE;
			}
			else
			{
			    // Set message
				$this->_auth_message = $this->ci->lang->line('auth_login_incorrect_password');
			}
        }
        else
        {
            // Set message
			$this->_auth_message = $this->ci->lang->line('auth_login_incorrect_username');
        }

        return $result;		
   
   }
   
    public function logoutUser()
    {
	  $this->ci->session->sess_destroy();
    }
   
    public function getMessage()
    {
      return $this->_auth_message;
    }   
  
   
    public function isLoggedin()
    {
		return $this->ci->session->userdata('logged_in');
    }
	
    function _encode()
    {
       return SHA1($this->ci->input->post('password'));
    }
   
   function _set_session($data)
	{
		// Set session data array
		$user = array(						
			'user_id'						=> $data->user_id,
			'nama'						    => $data->nama,
			'username'					    => $data->username,			
			'role'					        => $data->role,	
			'logged_in'					    => TRUE
		);
		
		$this->ci->session->set_userdata($user);
	}	
	
	public function getUserId()
    {
		return $this->ci->session->userdata('user_id') ;
    }	
	
	
	public function getNama()
    {
		return $this->ci->session->userdata('nama');
    }
	
	public function getUsername()
    {
		return $this->ci->session->userdata('username');
    }
	
	public function getRole()
    {
		return $this->ci->session->userdata('role');
    }
	
	
}


	
	
 
