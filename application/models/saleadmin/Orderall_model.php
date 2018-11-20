<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderall_model extends MY_Controller{


public function Getorder()
	{
		$query = $this->db->query("SELECT *, from_unixtime(adddate,'%d-%m-%Y %H:%i:%s') as adddate2 FROM order_header WHERE status='0' ORDER BY ID DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Okthispayment($data)
	{



		$data['status'] = '1';
$this->db->where('order_number', $data['order_number']);
$this->db->update('order_header', $data);
		return true;
	}


public function Myorder($data)
	{
		$query = $this->db->query("SELECT * 
		 FROM order_detail as od 
		 LEFT JOIN campaign as c on c.campaign_id=od.campaign_id 
		 LEFT JOIN product_style as ps on ps.product_style_id=od.product_style_id
		 LEFT JOIN product_color as pc on pc.product_color_id=od.product_color_id
		 LEFT JOIN product_size as pz on pz.product_size_id=od.product_size_id
		 WHERE od.order_number='".$data['order_number']."' 
		 ORDER BY ID DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

public function Getorderdetail($data)
	{
		$query = $this->db->query("SELECT 
od.order_number as order_number,
od.campaign_id as campaign_id,
od.product_style_id as product_style_id,
od.product_color_id as product_color_id,
od.product_size_id as product_size_id,
od.qty as qty,
c.base_price as base_price,
c.sale_price as sale_price,
c.user_id as user_id
		 FROM order_detail as od 
LEFT JOIN campaign as c on c.campaign_id=od.campaign_id
			WHERE od.order_number='".$data['order_number']."'");
		return $query->result_array();
	}

	public function Orderdelstock($data2)
	{

$query = $this->db->query("
	UPDATE stock_all set product_num_all=product_num_all-".$data2['qty']."
WHERE product_style_id='".$data2['product_style_id']."' AND product_color_id='".$data2['product_color_id']."' AND product_size_id='".$data2['product_size_id']."'
	");

	}


public function Addsaleunitcampaign($data2)
	{

$query = $this->db->query("
	UPDATE campaign set how_many_sale=how_many_sale+".$data2['qty']."
WHERE campaign_id='".$data2['campaign_id']."'
	");

	}


	public function Addprofit($data3)
	{

$query = $this->db->query("
	UPDATE user set profit=profit+".$data3['profit']."
WHERE user_id='".$data3['user_id']."'
	");

$query2 = $this->db->query("
	UPDATE user set profit_all=profit_all+".$data3['profit']."
WHERE user_id='".$data3['user_id']."'
	");



	}


		public function Addsalenumall($data4)
	{

$query = $this->db->query("
	UPDATE user set salenum_all=salenum_all+".$data4['salenum_all']."
WHERE user_id='".$data4['user_id']."'
	");


	}







}