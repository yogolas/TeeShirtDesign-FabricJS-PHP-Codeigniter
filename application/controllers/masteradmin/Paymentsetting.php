<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentsetting extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/paymentsetting_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }

	public function index()
	{
		$data['title'] = 'Payment Setting';
		$data['tabmenu'] = 'paymentsetting';
		$this->masteradmin('masteradmin/paymentsetting',$data);
	}




public function Getbanklist()
	{	
	echo $this->paymentsetting_model->Getbanklist();
	}

	public function Addbank()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->paymentsetting_model->Addbank($data);
	}

	public function Editbank()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->paymentsetting_model->Editbank($data);
		
	}

	public function Deletebank()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->paymentsetting_model->Deletebank($data);
		
	}







public function Getapilist()
	{	
	echo $this->paymentsetting_model->Getapilist();
	}

public function Editapi()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->paymentsetting_model->Editapi($data);
		
	}




}
