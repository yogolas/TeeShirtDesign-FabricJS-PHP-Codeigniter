<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller{


 public function __construct()
        {
                parent::__construct();
              $this->load->model('user/orders_model');
              $this->CI = & get_instance();
$this->CI->load->library('session');
if(!isset($_SESSION['user_id'])){
exit;
 }
        }



	public function index()
	{
		$data['title'] = 'Orders';
		$data['tabmenu'] = 'orders';
		$this->user('user/orders',$data);
	}



		public function Getorders()
	{	
	echo $this->orders_model->Getorders();
	}


}