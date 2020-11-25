<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Myencrypt {

    var $password   = 'KQYsG4Hi201ajyEzOSGzr4MVfw';
	var $key        =  '';
	var $method     = 'BF-ECB';

    
    public function encode($data) {
		if (!$data) {
		   return false;
		}
		$this->key   = $this->password;
		
	    $ivSize      = openssl_cipher_iv_length($this->method);
		$iv          = openssl_random_pseudo_bytes($ivSize);

		$encrypted   = openssl_encrypt($data, $this->method, $this->key, OPENSSL_RAW_DATA, $iv);
    
		$encrypted   = $this->urlsafe_b64encode($iv . $encrypted);

		return $encrypted;
    }

    public function decode($data) {
		if (!$data) {
		   return false;
		}
		$data 		  = $this->urlsafe_b64decode($data);
		$this->key    = $this->password;
		$ivSize 	  = openssl_cipher_iv_length($this->method);
		$iv 		  = substr($data, 0, $ivSize);
		$data         = openssl_decrypt(substr($data, $ivSize), $this->method, $this->key, OPENSSL_RAW_DATA, $iv);

		return $data;
    }

	
	function urlsafe_b64encode($string) {
		$data = base64_encode($string);
		$data = str_replace(array('+','/','='),array('-','_',''),$data);
		return $data;
	}

	function urlsafe_b64decode($string) {
		$data = str_replace(array('-','_'),array('+','/'),$string);
		$mod4 = strlen($data) % 4;
		if ($mod4) {
			$data .= substr('====', $mod4);
		}
		return base64_decode($data);
	}

}

/* End of file MY_Encryption.php */
/* Location: ./application/libraries/MY_Encryption.php */