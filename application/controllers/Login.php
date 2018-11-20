<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('web/Login_model');
$this->CI = & get_instance();
$this->CI->load->library('session');
        }


	public function index()
	{
		$data['title'] = 'Login';
		$this->web('web/login',$data);
	}


	public function loginsubmit()
	{

		if($_POST['email']==''){
header('Location: '.$this->base_url.'/login');
		}else{


$data['email']	= $_POST['email'];
$data['password']	= md5(md5($_POST['password']));
$clogin = $this->Login_model->Checklogin($data);
if($clogin=='1'){
$login = $this->Login_model->Login($data);

foreach($login as $value) {
	$user_id = $value->user_id;
	$email = $value->email;
	$profit_all = $value->profit_all;
	$salenum_all = $value->salenum_all;
}

$newdata = array(
        'user_id'  => $user_id,
        'email'     => $email,
        'profit_all'     => $profit_all,
        'salenum_all'     => $salenum_all,
        'logged_in' => TRUE
);
$this->CI->session->set_userdata($newdata);
header('Location: '.$this->base_url.'/');

}else{
header('Location: '.$this->base_url.'/login?l=n');
}	

}

	}
	

	public function register()
	{


		if($_POST['email']==''){
header('Location: '.$this->base_url.'/login?r=404');
		}else{

$data['email']	= $_POST['email'];
$data['password']	= md5(md5($_POST['password']));	
$data['adddate'] = time();

 $check = $this->Login_model->Checkregister($data);

if($check=='1'){
	header('Location: '.$this->base_url.'/login?r=1');
}else{
	$regis = $this->Login_model->Register($data);
	if($regis){
header('Location: '.$this->base_url.'/login?l=ok');


	$to = $_POST['email'];
	$subject = 'Welcome To C2MTee';
	$data = "
<html>
<head>
<title>HTML email</title>
</head>
<body>

	<table width='100%'>
<tr><td width='33%'></td>

<td width='33%'>
<center>	
<h1>
Welcome to C2MTee!
</h1>
</center>
C2MTee is a platform that allows you to create and sell custom apparel with no cost, risk, or hassle. All you need is a great idea, and we'll handle the rest - from production and manufacturing, to supply chain logistics, and customer service.
Who uses C2MTee?
Everyone! People use C2MTee to do extraordinary things like power their apparel business, raise money for causes, and more. Here's a quick video 

</td>

<td width='33%'></td>
</tr>

</table>

<body>
<html>
	";

//$this->sendmailfunc($to,$subject,$data);



		
	}
}

}




	}






}