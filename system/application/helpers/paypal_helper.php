<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/***********************************************************************************************************************
Display PayPal error messages
*/

	function paypal_errors(){
	
		$CI =& get_instance();
		
		$CI->paypal_api_lib->display_nvp_errors();
		
		return;
	}

	
?>