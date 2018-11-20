<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payouts extends MY_Controller{


 public function __construct()
        {
                parent::__construct();
              $this->load->model('user/payouts_model');
              $this->CI = & get_instance();
$this->CI->load->library('session');
if(!isset($_SESSION['user_id'])){
exit;
 }
        }



	public function index()
	{

		$data['profit'] =  $this->payouts_model->Getprofit();

		$data['title'] = 'Payouts';
		$data['tabmenu'] = 'payouts';
		$this->user('user/payouts',$data);
	}

	public function Getpayoutslist()
	{

		echo $this->payouts_model->Getpayoutslist();

	}


	public function Confirmpayme()
	{
		$profit = $this->payouts_model->Getprofit2();

		$data = json_decode(file_get_contents('php://input'), true);
$data['user_id'] = $_SESSION['user_id'];
$data['adddate'] = time();

		foreach ($profit as  $value) {
			if($value['profit'] > 0){	
$data['amount'] = $value['profit'];	
$data2['email_paypal'] = $data['email_paypal'];			
	$this->payouts_model->Confirmpayme($data);
	$this->payouts_model->Resetprofit($data2);
}

		}
		
		
	}




}