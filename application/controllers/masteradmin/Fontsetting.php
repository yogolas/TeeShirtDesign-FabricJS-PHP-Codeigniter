<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fontsetting extends MY_Controller{


 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/fontsetting_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }



	public function index()
	{
		$data['title'] = 'Font Setting';
		$data['tabmenu'] = 'fontsetting';
		$this->masteradmin('masteradmin/fontsetting',$data);
	}



	public function Get()
	{	
	echo $this->fontsetting_model->Get();
	}


	public function Add()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->fontsetting_model->Add($data);
	}

	public function Edit()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->fontsetting_model->Edit($data);
		
	}

	public function Delete()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->fontsetting_model->Delete($data);
		
	}

	public function Updatestatus()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->fontsetting_model->Updatestatus($data);
		
	}

}
