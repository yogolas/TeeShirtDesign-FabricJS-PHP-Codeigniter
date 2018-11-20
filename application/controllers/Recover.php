<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recover extends MY_Controller{

public function __construct()
        {
                parent::__construct();
              $this->load->model('web/Login_model');
$this->CI = & get_instance();
$this->CI->load->library('session');
        }


	public function index()
	{
		$data['title'] = 'Recover';
		$this->web('web/recover',$data);
	}


	public function check()
	{


$data = json_decode(file_get_contents('php://input'), true);

if(!$data){
	exit;
}



$clogin = $this->Login_model->Checkemail($data);

if($clogin=='1'){

$data['code'] = md5($data['email'].time());

$this->Login_model->Recovercode($data);


	$to = $data['email'];
	$subject = 'Password Reset Request';
	$dataemail = "
<b>Forgot your password? </b>
<br /><br />
Omerka received a request to reset the password for your Omerka account. 
<br /><br />
<a href='".$this->base_url."/recover/request/".$data['code']."' target='_blank'>Click here to reset your password </a>
<br /><br />
If you don't want to reset your password, please ignore this message. Your password will not be reset. If you have any concerns,
 <a href='".$this->base_url."/contact' target='_blank'>please contact our support team </a>
	";


$this->sendmailfunc($to,$subject,$dataemail);

}else{

}




	}



	public function request($code)
	{
		$data['code'] = $code;
		$data['title'] = 'Recover Request';
		$this->web('web/request',$data);
	}


	public function changepassword()
	{

$data = json_decode(file_get_contents('php://input'), true);
if(!$data){
	exit;
}

$clogin = $this->Login_model->Checkrecover_code($data);
if($clogin=='1'){

$this->Login_model->Resetpassword($data);

$emailuser = $this->Login_model->Getemailuser($data);

foreach ($emailuser as $value) {
	$email = $value['email'];
}

	$to = $email;
	$subject = 'Password Changed Notification';
	$dataemail = "

	<html>
<head>
<title>HTML email</title>
</head>
<body>

	<table width='100%'>
<tr><td width='33%'></td>

<td width='33%'>

<b>Password Updated</b>
<br /><br />
Omerka has received an updated password for your account. If you expected this notification, all is well!

</td>

<td width='33%'></td>
</tr>

</table>

<body>
<html>

	";


$this->sendmailfunc($to,$subject,$dataemail);


echo '1';

}else{
echo '0';
}




	}






}