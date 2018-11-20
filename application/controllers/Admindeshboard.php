<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindeshboard extends MY_Controller{

public function __construct()
        {
                parent::__construct();
              $this->load->model('web/Login_model');
$this->CI = & get_instance();
$this->CI->load->library('session');
        }


	public function index()
	{
		$data['title'] = 'Admin Desboard';
		$this->admindeshboard('web/admindeshboard',$data);
	}




public function adminlogin()
	{

		if(!isset($_POST['user'])){
			header('Location: '.$this->base_url.'/admindeshboard');
		}else{


$data['user']	= $_POST['user'];
$data['pass']	= $_POST['pass'];
$clogin = $this->Login_model->AdminChecklogin($data);
if($clogin=='1'){
$login = $this->Login_model->AdminLogin($data);

foreach($login as $value) {
	$adminname = $value->name;
	$system_id = $value->system_id;
}

$newdata = array(
        'adminname'  => $adminname,
        'system_id'     => $system_id
);
$this->CI->session->set_userdata($newdata);
header('Location: '.$this->base_url.'/admindeshboard');

}else{
header('Location: '.$this->base_url.'/admindeshboard');
}	

}

	}


}
