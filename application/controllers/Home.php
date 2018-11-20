<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller{

public function __construct()
        {
                parent::__construct();
              $this->load->model('web/campaigns_model');
        }


	public function index()
	{

	$data['campaignending'] = $this->campaigns_model->Getcampaignending();
	$data['campaignmostfunded'] = $this->campaigns_model->Getcampaignmostfunded();
	$data['campaignlastest'] = $this->campaigns_model->Getcampaignlastest();

		$data['title'] = 'C2MTee | Buy, Create & Sell T-shirts to turn your ideas into reality';
		$this->web('web/home',$data);
	}
}
