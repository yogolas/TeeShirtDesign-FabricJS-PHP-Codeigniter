<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Priceofprint extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/priceofprint_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Price of print';
		$data['tabmenu'] = 'priceofprint';
		$this->masteradmin('masteradmin/priceofprint',$data);
	}



public function Getlist()
	{	
	echo $this->priceofprint_model->Getlist();
	}

	public function Add()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->priceofprint_model->Add($data);
	}

	public function Edit()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->priceofprint_model->Edit($data);
		
	}

	public function Delete()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->priceofprint_model->Delete($data);
		
	}


}
