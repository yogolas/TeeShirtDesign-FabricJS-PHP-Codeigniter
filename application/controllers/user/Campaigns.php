<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaigns extends MY_Controller{


 public function __construct()
        {
                parent::__construct();
              $this->load->model('user/campaigns_model');
$this->CI = & get_instance();
$this->CI->load->library('session');

if(!isset($_SESSION['user_id'])){
exit;
 }
 

        }



	public function index()
	{

$profit = $this->campaigns_model->Getprofituser();
foreach ($profit as $value) {
	$data['profit'] = $value['profit'];
	$data['profit_all'] = $value['profit_all'];
	$data['salenum_all'] = $value['salenum_all'];
}

		$data['title'] = 'Campaigns';
		$data['tabmenu'] = 'campaigns';
		$this->user('user/campaigns',$data);
	}


public function Getcampaign()
	{	
	echo $this->campaigns_model->Getcampaign();
	}


}



