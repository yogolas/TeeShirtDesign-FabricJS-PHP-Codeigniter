<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_confirm extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('saleadmin/payment_confirm_model');
               $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'รายการแจ้งโอนเงิน';
		$this->saleadmin('saleadmin/payment_confirm',$data);
	}




	public function Payment_confirm()
	{	
	echo $this->payment_confirm_model->Payment_confirm();
	}



public function Okthispayment_confirm()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->payment_confirm_model->Okthispayment_confirm($data);
		
	}


	public function Delthispayment_confirm()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->payment_confirm_model->Delthispayment_confirm($data);
		
	}







	}




