<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores_model extends MY_Controller{


public function Getstorespage($id)
	{
		$query = $this->db->query("SELECT * FROM stores WHERE stores_id='".$id."'");
		return $query->result_array();
	}

public function Getstorescampaign($id)
	{
		$query = $this->db->query("SELECT sc.stores_id as stores_id,
c.show_back_first as show_back_first,
c.campaign_title as campaign_title,
c.back_image as back_image,
c.front_image as front_image,
c.sale_price as sale_price,
c.url as url
		  FROM stores_campaign as sc 
			LEFT JOIN campaign as c on c.campaign_id=sc.campaign_id
			WHERE sc.stores_id='".$id."'
		 ORDER BY sc.stores_campaign_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

	public function Getstorestitle($id)
	{
		$query = $this->db->query("SELECT * FROM stores WHERE stores_id='".$id."'");
		return $query->result_array();
	}


}