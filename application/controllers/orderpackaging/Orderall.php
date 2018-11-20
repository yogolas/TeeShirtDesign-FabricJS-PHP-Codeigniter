<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderall extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('orderpackaging/orderall_model');
               $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }

        }


	public function index()
	{
		$data['title'] = 'Campaign packaging';
		$this->orderpackaging('orderpackaging/orderall',$data);
	}



	public function Getcampaign()
	{	
	echo $this->orderall_model->Getcampaign();
	}


	public function Getcampaignprocess()
	{	
	echo $this->orderall_model->Getcampaignprocess();
	}


public function Okthisprocess()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->orderall_model->Okthisprocess($data);
		
	}


public function Okthisprocesssuccess()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->orderall_model->Okthisprocesssuccess($data);
		
	}



public function Openorder()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->orderall_model->Openorder($data);
		
	}


public function Openodno()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->orderall_model->Openodno($data);
		
	}



public function Okthisdetailpackok()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->orderall_model->Okthisdetailpackok($data);
		
	}






	}




