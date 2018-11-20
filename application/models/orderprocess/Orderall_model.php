<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderall_model extends MY_Controller{


public function Getcampaign()
	{
		$query = $this->db->query("SELECT *, from_unixtime(adddate,'%d-%m-%Y %H:%i:%s') as adddate2 FROM campaign WHERE campaign_status='1' ORDER BY adddate ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

	public function Getcampaignprocess()
	{
		$query = $this->db->query("SELECT *, from_unixtime(adddate,'%d-%m-%Y %H:%i:%s') as adddate2 FROM campaign WHERE campaign_status='2' ORDER BY adddate ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Okthisprocess($data)
	{
		$data['campaign_status'] = '2';
$this->db->where('campaign_id', $data['campaign_id']);
$this->db->update('campaign', $data);
		return true;
	}


		public function Okthisprocesssuccess($data)
	{
		$data['campaign_status'] = '3';
$this->db->where('campaign_id', $data['campaign_id']);
$this->db->update('campaign', $data);
		return true;
	}


public function Getorderprinting($data)
	{
		$query = $this->db->query("SELECT * FROM order_header
			WHERE campaign_id='".$data['campaign_id']."' AND status='1' ");
		return $query->result_array();
	}

	public function Getorderprinting2($data)
	{
		$query = $this->db->query("SELECT 
			c.campaign_id as campaign_id,
			c.campaign_title as campaign_title,
			c.front_image as front_image,
			ps.product_size_name as sizename,
			od.qty as qty,
			od.price as price

			FROM order_detail as od
			LEFT JOIN campaign as c on c.campaign_id=od.campaign_id
			LEFT JOIN product_size as ps on ps.product_size_id=od.product_size_id
			WHERE order_number='".$data['order_number']."'");
		return $query->result_array();
	}


	public function Openorder($data)
	{
		$query = $this->db->query("SELECT 
sum(od.qty) as qty,
ps.product_style_name as product_style_name,
pc.product_color_name as product_color_name,
pss.product_size_name as product_size_name,
(SELECT sum(product_num_all) FROM stock_all WHERE product_style_id=od.product_style_id AND product_color_id=od.product_color_id AND product_size_id=od.product_size_id) as instock
			FROM order_detail as od
			LEFT JOIN product_style as ps on ps.product_style_id=od.product_style_id
			LEFT JOIN product_color as pc on pc.product_color_id=od.product_color_id
			LEFT JOIN product_size as pss on pss.product_size_id=od.product_size_id
			WHERE od.campaign_id='".$data['campaign_id']."'
			GROUP BY od.product_style_id,od.product_color_id,od.product_size_id
			ORDER BY od.product_style_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}




}