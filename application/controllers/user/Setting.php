<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller{


 public function __construct()
        {
                parent::__construct();
              $this->load->model('user/setting_model');
              $this->CI = & get_instance();
$this->CI->load->library('session');
if(!isset($_SESSION['user_id'])){
exit;
 }
        }



	public function index()
	{
		$data['title'] = 'Setting';
		$data['tabmenu'] = 'setting';
		$this->user('user/setting',$data);
	}


public function Getuserinfo()
	{	
	echo $this->setting_model->Getuserinfo();
	}


public function Getcountry()
	{	
	echo $this->setting_model->Getcountry();
	}


public function Updateinfo()
	{
		$data = json_decode(file_get_contents('php://input'), true);

		$this->setting_model->Updateinfo($data);
		
	}


	public function Updatepass()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->setting_model->Updatepass($data);
		
	}




}