<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Track extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('web/track_model');
        }


	public function index()
	{
		$data['title'] = 'Tracking';
		$this->web('web/track',$data);
	}


		public function order($number)
	{

$query =  $this->track_model->Getorderstatus($number);


foreach ($query as $value) {
	$data['hstatus'] = $value['hstatus'];
	$data['cstatus'] = $value['cstatus'];
	$data['order_number'] = $value['order_number'];
} 



		$data['title'] = 'Tracking Order Number';
		$this->web('web/trackorder',$data);
	}


}