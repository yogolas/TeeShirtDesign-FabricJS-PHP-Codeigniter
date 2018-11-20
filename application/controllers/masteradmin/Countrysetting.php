<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countrysetting extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/countrysetting_model');
              $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Country';
		$data['tabmenu'] = 'countrysetting';
		$this->masteradmin('masteradmin/countrysetting',$data);
	}



	public function Get()
	{	
	echo $this->countrysetting_model->Get();
	}


	public function Add()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->countrysetting_model->Add($data);
	}

	public function Edit()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->countrysetting_model->Edit($data);
		
	}

	public function Delete()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->countrysetting_model->Delete($data);
		
	}



}
