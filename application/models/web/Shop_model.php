<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends MY_Controller{



public function Getcampaign($url)
	{
		$time = time();
		$query = $this->db->query("SELECT *, (enddate - ".$time.") as timeleft FROM campaign WHERE url='".$url."'");
		return $query->result_array();
	}


public function Getproductsize($data)
	{
		$query = $this->db->query("SELECT 
		pss.product_style_id as product_style_id,
		ps.product_size_id as product_size_id,
		ps.product_size_name as product_size_name
			FROM product_style_size as pss
			LEFT JOIN product_size as ps on ps.product_size_id=pss.product_size_id
		 WHERE product_style_id='".$data['product_style_id']."' 
		 ORDER BY product_size_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}




	public function Getbanklist()
	{
		$query = $this->db->query("SELECT * FROM payment_bank ORDER BY payment_bank_id DESC");
		return $query->result_array();
	}


public function Paymentsubmitheader($data)
	{
		$this->db->insert('order_header', $data);
		return true;
	}


	public function Paymentsubmitdetail($data)
	{
		$this->db->insert('order_detail', $data);
		return true;
	}



}