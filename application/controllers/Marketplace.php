<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketplace extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('market/marketplace_model');
        }


	public function index()
	{
		$data['title'] = 'Marketplace';

$data['menuleft'] = $this->marketplace_model->Getcategory();


if(isset($_GET['cat'])){
	$data['menutop'] = $this->marketplace_model->Getsubcategory($_GET['cat']);
}

		$this->market('market/marketplace',$data);
	}



	public function Getcampaign()
	{	
		if(isset($_GET['cat'])){
			$cat = $_GET['cat'];
		}else{
$cat = '0';
		}

		if(isset($_GET['subcat'])){
			$subcat = $_GET['subcat'];
		}else{
$subcat = '0';
		}

		if(isset($_GET['search'])){
			$search = $_GET['search'];
		}else{
$search = '0';
		}




	echo $this->marketplace_model->Getcampaign($cat,$subcat,$search);
	}


}