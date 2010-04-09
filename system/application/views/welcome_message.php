<html> 
<head>
<title>CodeIgniter PayPal NVP API</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 24px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

h2{
border-bottom:1px solid #D0D0D0;
color:#444444;
font-size:16px;
font-weight:bold;
margin:24px 0 2px;
padding:5px 0 6px;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>

<h1>User Guide</h1>

<p>This library has been provided by Leon Barrett (<a href="http://www.twitter.com/leonbarrett" target="_blank">@leonbarrett</a>) to provide a simple and clean way to interact with the PayPal NVP API. It builds upon concepts from the Code Igniter PayPal Library (v. 0.1) by <a href="http://aroussi.com/ci/paypal_lib" target="_blank">http://aroussi.com/ci/paypal_lib</a>.</p>

<p>This library assumes that you have some prior knowledge of the PayPal API. More information can be found on the <a href="https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/howto_api_reference" target="_blank">PayPal API reference pages</a>.</p>

<p>It should be noted that this library isn't the magic answer to your PayPal solution, you will need to be comfortable with PHP, CI and the PayPal API!</p>
<p>This package consists of the following files</p>

<ul>
	<li>Config > autoload.php - used to auto load the libraries and the helper | paypallib_config - used to hold your API credentails.</li>
	<li>Controllers > demo.php - used to demonstrate using the library to display the balance of the current PayPal account.</li>
	<li>Helpers > paypal_helper.php - used to display any errors returned from the API call.</li>
	<li>Libraries > paypal_api_lib.php - used to interact with the API, make a call and get a response | paypal_lib.php - used to receive IPN notifications from PayPal.</li>
</ul>

<p><strong>Please note the library requires <a href="http://codeigniter.com/" target="_blank">CI 1.7.2</a> and higher</strong></p>

<h2>Documentation</h2>

<p>Full documentation can be found online at the following location - <a href="http://www.leonbarrett.com/code/paypal/">http://www.leonbarrett.com/code/paypal/</a>.</p>

</body>
</html>