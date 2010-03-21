<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
// Ppal (Paypal IPN Class)
// ------------------------------------------------------------------------

//Location of IPN log file
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';


//Location of NVP (API) log file
$config['paypal_lib_nvp_log_file'] = BASEPATH . 'logs/paypal_nvp.log';

//Turn on logging. TRUE == ON
$config['paypal_lib_log'] = TRUE;

// What is the default currency?
$config['paypal_lib_currency_code'] = 'GBP';

//PayPal account email
$config['paypal_account'] = '';

$config['paypal_api_user'] = '';

$config['paypal_api_pwd'] = '';

$config['paypal_api_signature'] = '';

$config['paypal_api_version'] = '60.0';

?>
