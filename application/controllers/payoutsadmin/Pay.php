<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('payoutsadmin/pay_model');
               $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Payouts Admin';
		$this->payoutsadmin('payoutsadmin/pay',$data);
	}



	public function Getpayoutslist()
	{	
	echo $this->pay_model->Getpayoutslist();
	}


	public function Paynow()
	{	

	$data = json_decode(file_get_contents('php://input'), true);

$data1['payouts_id'] = $data['payouts_id'];

$data2['payouts_id'] = $data['payouts_id'];
$data2['amount'] = $data['amount'];
$data2['user_id'] = $data['user_id'];
$data2['email_paypal'] = $data['email_paypal'];
$data2['adddate'] = time();

	$this->pay_model->Paynow($data1);
	$this->pay_model->Payoutsrecord($data2);
	}






	}




