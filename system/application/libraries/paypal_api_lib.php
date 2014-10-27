<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

error_reporting(0);

class Paypal_Api_Lib {

	var $nvps = array();
	
	var $nvp_data = array();
	
	var $CI;
	
	function Paypal_Api_Lib()
	{
		
		$this->CI =& get_instance();
		
		$this->nvp_log_file = $this->CI->config->item('paypal_lib_nvp_log_file');
		$this->do_log = $this->CI->config->item('paypal_lib_log');
		
		
		
		$this->add_nvp('USER', $this->CI->config->item('paypal_api_user'));
		$this->add_nvp('PWD', $this->CI->config->item('paypal_api_pwd'));
		$this->add_nvp('SIGNATURE', $this->CI->config->item('paypal_api_signature'));
		$this->add_nvp('VERSION', $this->CI->config->item('paypal_api_version'));
		
		
		
		$this->add_nvp('CURRENCYCODE',$this->CI->config->item('paypal_lib_currency_code'));
	
	}
	
	function add_nvp($field, $value){
	
		$this->nvps[$field] = urlencode($value);
		
	}
	
	function send_api_call($method){
	
		$qstr = 'METHOD='.$method.'&';
		$nvp_string = '';
		
		foreach ($this->nvps as $name => $value)
			$qstr .= $name."=".$value."&";
			
		$qstr = substr_replace($qstr ,"",-1);
				
		$fp = fsockopen('ssl://api-3t.sandbox.paypal.com', 443, $errno, $errstr, 30);
		
		if (! $fp)
		{
		
		$this->log_nvp_results(false);
		
		show_error('Failed to connect to the payment gateway. Please try again in a moment.');
		}
		else
		{
		
		$content_length = strval(strlen($qstr) + 2);
		
		$buf = "POST /nvp HTTP/1.1\r\n";
		$buf .= "Host: api-3t.sandbox.paypal.com\r\n";
		$buf .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$buf .= "Content-Length: " . $content_length . "\r\n";
		$buf .= "Connection: Close\r\n\r\n";
		$buf .= $qstr . "\r\n";
		
		fwrite($fp, $buf);
		
		while(! feof($fp))
		{
			
			$nvp_string .= fgets($fp, 128);
		
		}
		
		$nvp_string = str_replace("\r\n", ",", $nvp_string);
		
		$nvp_string = strrchr($nvp_string, ','); 
		
		$nvp_string = str_replace(",", "", $nvp_string);
		
		$nvp_data_temp = explode('&',$nvp_string);
		
		
		
		foreach ($nvp_data_temp as $nvp_data_temp_val)
            {      
				$nvp_data_temp_array = explode('=',$nvp_data_temp_val);
				
				$this->nvp_data[$nvp_data_temp_array[0]] = urldecode($nvp_data_temp_array[1]);
				
            }
		
		fclose($fp);
		
		}

		$ack = strtoupper($this->nvp_data["ACK"]);

   		if($ack!="SUCCESS"){
		
			$this->log_nvp_results(false);
			
			return false;
			
		}else{
		
			$this->log_nvp_results(true, $method);
		
			return true;
			
		}
	}
	
	function display_nvp_errors(){
	
		$count=0;
		
		while (isset($this->nvp_data["L_SHORTMESSAGE".$count])) {
			echo '<p>'.$this->nvp_data["L_LONGMESSAGE".$count].'</p>'; 
			$count=$count+1; 
		}
	
	}
	
	
	function return_nvp_errors(){
	
		$count=0;
		
		$error_string = '';
		
		while (isset($this->nvp_data["L_SHORTMESSAGE".$count])) {
			$error_string .= $this->nvp_data["L_LONGMESSAGE".$count].'\n'; 
			$count=$count+1; 
		}
		
		return $error_string;
	
	}
	
	
    	function log_nvp_results($success, $method) 
   	 {
	        if (!$this->do_log) return;
	
	        $text = '['.date('m/d/Y H:i:s TO').'] - '; 
	
	        if ($success) $text .= "SUCCESS!\n";
	        else $text .= "FAIL: SEE LOGS\n";
	
	        $text .= "PayPal NVP API request:\n";
	        $text .= "METHOD=$method\n";
	        foreach ($this->nvps as $key=>$value)
	        
	            $text .= "$key=$value\n";
	            
	        $text .= "\nPayPal NVP API response:\n";
	        foreach ($this->nvp_data as $key=>$value)
	            $text .= "$key=$value\n";
	
	        $fp=fopen($this->nvp_log_file,'a');
	        fwrite($fp, $text . "\n\n\n"); 
	
	        fclose($fp);
   	 }
	
	
	
}

?>