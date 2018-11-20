<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends MY_Controller{


 public function __construct()
        {
                parent::__construct();
              $this->load->model('user/stores_model');
              $this->CI = & get_instance();
$this->CI->load->library('session');
if(!isset($_SESSION['user_id'])){
exit;
 }
        }



	public function index()
	{
		$data['title'] = 'Stores';
		$data['tabmenu'] = 'stores';
		$this->user('user/stores',$data);
	}

public function Addtitle()
	{
		
		$data = json_decode(file_get_contents('php://input'), true);
		$data['user_id'] = $_SESSION['user_id'];
		$this->stores_model->Addtitle($data);
		
	}

public function Editstore()
	{
		
		$data = json_decode(file_get_contents('php://input'), true);
		$this->stores_model->Editstore($data);
		
	}


	public function Getstores()
	{	
	echo $this->stores_model->Getstores();
	}


		public function Getstorescampaign()
	{	
	echo $this->stores_model->Getstorescampaign();
	}



public function Getmycampaign()
	{	
	echo $this->stores_model->Getmycampaign();
	}

public function Addcampaign()
	{
		
		$data = json_decode(file_get_contents('php://input'), true);
		$data2['user_id'] = $_SESSION['user_id'];
		$data2['stores_id'] = $data['stores_id'];

$this->stores_model->Deletecampaign($data2);

for($i=1;$i<=count($data['mycampaignlist']);$i++){
	if($data['mycampaignlist'][$i-1]['campaign_select']=='1'){
		$data2['campaign_id'] = $data['mycampaignlist'][$i-1]['campaign_id'];
		$this->stores_model->Addcampaign($data2);
	}
	}

		
	}



}