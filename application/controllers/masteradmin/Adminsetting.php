<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsetting extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/adminsetting_model');
              $this->CI = & get_instance();
$this->CI->load->library('session');
if(!isset($_SESSION['system_id'])){
exit;
 }

        }

	public function index()
	{
		$data['title'] = 'Admin Setting';
		$data['tabmenu'] = 'adminsetting';
		$this->masteradmin('masteradmin/adminsetting',$data);
	}




public function Getlist()
	{	
	echo $this->adminsetting_model->Getlist();
	}

	public function Getsystemlist()
	{	
	echo $this->adminsetting_model->Getsystemlist();
	}

	


	public function Add()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->adminsetting_model->Add($data);
	}

	public function Edit()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->adminsetting_model->Edit($data);
		
	}

	public function Delete()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->adminsetting_model->Delete($data);
		
	}



}
