<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderall_model extends MY_Controller{


public function Getcampaign()
	{
		$query = $this->db->query("SELECT *, from_unixtime(adddate,'%d-%m-%Y %H:%i:%s') as adddate2 FROM campaign WHERE campaign_status='3' ORDER BY adddate ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

	public function Getcampaignprocess()
	{
		$query = $this->db->query("SELECT *, from_unixtime(adddate,'%d-%m-%Y %H:%i:%s') as adddate2 FROM campaign WHERE campaign_status='4' ORDER BY adddate ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Okthisprocess($data)
	{
		$data['campaign_status'] = '4';
$this->db->where('campaign_id', $data['campaign_id']);
$this->db->update('campaign', $data);
		return true;
	}


		public function Okthisprocesssuccess($data)
	{
		$data['campaign_status'] = '5';
$this->db->where('campaign_id', $data['campaign_id']);
$this->db->update('campaign', $data);
		return true;
	}




	public function Openorder($data)
	{
		$query = $this->db->query("SELECT *,
oh.name as name,
oh.order_number as order_number,
od.status as odstatus,
od.campaign_id as campaign_id,
sum(od.qty) as qty
 FROM order_detail as od 
LEFT JOIN order_header as oh on oh.order_number=od.order_number
WHERE od.campaign_id='".$data['campaign_id']."' AND oh.status='1'
GROUP BY od.order_number ORDER BY od.ID ASC
			");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


public function Openodno($data)
	{
		$query = $this->db->query("SELECT 
ps.product_style_name as product_style_name,
pc.product_color_name as product_color_name,
pss.product_size_name as product_size_name,
sum(od.qty) as qty
 FROM order_detail as od 
 LEFT JOIN product_style as ps on ps.product_style_id=od.product_style_id
 LEFT JOIN product_color as pc on pc.product_color_id=od.product_color_id
 LEFT JOIN product_size as pss on pss.product_size_id=od.product_size_id
 WHERE od.order_number='".$data['order_number']."'
GROUP BY od.product_style_id,od.product_color_id,od.product_size_id

			");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


		public function Okthisdetailpackok($data)
	{
		$data['status'] = '1';
$this->db->where('order_number', $data['order_number']);
$this->db->update('order_detail', $data);
		return true;
	}





}