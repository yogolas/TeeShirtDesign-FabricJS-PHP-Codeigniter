<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_confirm extends MY_Controller{


public function __construct()
        {
                parent::__construct();
               
             
        }


	public function index()
	{
  $this->load->model('web/shop_model');
		$data['banklist'] = $this->shop_model->Getbanklist();

		$data['title'] = 'Payment Confirm';
		$this->web('web/payment_confirm',$data);
	}

		public function Add()
	{
		 $this->load->model('web/payment_confirm_model');

		$data['order_number'] = $_POST['order_number'];
		$data['date_transfer'] = $_POST['date_transfer'];
		$data['time_transfer'] = $_POST['time_transfer'];
		$data['name'] = $_POST['name'];
		$data['what_bank'] = $_POST['what_bank'];
		$data['email'] = $_POST['email'];
		$data['tel'] = $_POST['tel'];
		$data['detail'] = $_POST['detail'];
		$data['amount'] = $_POST['amount'];
		$data['image'] = md5(time().$_FILES["image"]["name"]).'.png';
		$data['adddate'] = time();
		
		if($this->payment_confirm_model->Add($data)){

move_uploaded_file($_FILES["image"]["tmp_name"],"file/slip/".md5(time().$_FILES["image"]["name"]).'.png');

header( "location:".$this->base_url."/payment_confirm/success" );

		}

	}


			public function success()
	{

		$data['title'] = 'Payment Confirm Success';
		$this->web('web/payment_confirm_success',$data);
	}


		
	



}