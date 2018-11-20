<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shippingsetting extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/shippingsetting_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Shipping Rate';
		$data['tabmenu'] = 'shippingsetting';
		$this->masteradmin('masteradmin/shippingsetting',$data);
	}



// start color coding ------------------> 

	public function Get()
	{	
	echo $this->shippingsetting_model->Get();
	}


	public function Add()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->shippingsetting_model->Add($data);
	}

	public function Edit()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->shippingsetting_model->Edit($data);
		
	}

	public function Delete()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->shippingsetting_model->Delete($data);
		
	}

	public function Updatestatus()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->shippingsetting_model->Updatestatus($data);
		
	}

	// end color ------------------------------------->


}
