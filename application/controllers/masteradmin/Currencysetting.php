<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currencysetting extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/currencysetting_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Currency Rate';
		$data['tabmenu'] = 'currencysetting';
		$this->masteradmin('masteradmin/currencysetting',$data);
	}



// start color coding ------------------> 

	public function Get()
	{	
	echo $this->currencysetting_model->Get();
	}


	public function Add()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->currencysetting_model->Add($data);
	}

	public function Edit()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->currencysetting_model->Edit($data);
		
	}

	public function Delete()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->currencysetting_model->Delete($data);
		
	}

	public function Updatestatus()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->currencysetting_model->Updatestatus($data);
		
	}

	// end color ------------------------------------->


}
