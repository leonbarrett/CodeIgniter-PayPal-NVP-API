<?php

class Demo extends Controller {

	function Demo()
	{
		parent::Controller();
	}

/***************************************************************************************************************
	Signup form
*/
	
	function index()
	{
		if($this->paypal_api_lib->send_api_call('GetBalance')){
			echo($this->paypal_api_lib->nvp_data['L_AMT0']);
		}
	}
	
}

/* End of file demo.php */
/* Location: ./system/application/controllers/demo.php */