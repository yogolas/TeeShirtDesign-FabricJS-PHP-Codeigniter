<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('checkdesign/check_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['fontall'] = $this->check_model->Getfontall();
		$data['title'] = 'Check Design of Campaign End and have Order';
		$this->checkdesign('checkdesign/check',$data);
	}



	public function Getcampaign()
	{	
	echo $this->check_model->Getcampaign();
	}



public function Okthischeck()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->check_model->Okthischeck($data);
		
	}





	}




