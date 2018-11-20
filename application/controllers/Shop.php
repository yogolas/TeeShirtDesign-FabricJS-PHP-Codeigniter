<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller{


public function __construct()
        {
                parent::__construct();

              $this->load->model('web/shop_model');
             $this->CI = & get_instance();
$this->CI->load->library('session');
        }


	public function index($url)
	{

$datacampaign = $this->shop_model->Getcampaign($url);


foreach ($datacampaign as $row) {
$data['front_data'] =	$row['front_data'];
$data['back_data'] =	$row['back_data'];	
$data['front_image'] =	$row['front_image'];
$data['back_image'] =	$row['back_image'];	
$data['product_style_id'] =	$row['product_style_id'];
$data['product_color_id'] =	$row['product_color_id'];
$data['campaign_id'] =	$row['campaign_id'];
$data['campaign_title'] =	$row['campaign_title'];
$data['campaign_description'] =	$row['campaign_description'];
$data['campaign_length'] =	$row['campaign_length'];
$data['show_back_first'] =	$row['show_back_first'];
$data['sale_price'] =	$row['sale_price'];
$data['adddate'] =	$row['adddate'];
$data['timeleft'] =	$row['timeleft'];
}


if(!isset($data)){
$data['title'] = 'NONE';
}else{
		$data['title'] = $data['campaign_title'];
	}
		$this->web('web/shop',$data);
	}


	public function Buy()
	{
	$data = json_decode(file_get_contents('php://input'), true);	

		$newdata = array(
        'listbuy'  => $data['listbuy']

);



$this->CI->session->set_userdata($newdata);


	}



public function Getproductsize()
	{
$data = json_decode(file_get_contents('php://input'), true);	
echo $this->shop_model->Getproductsize($data);

	}





}