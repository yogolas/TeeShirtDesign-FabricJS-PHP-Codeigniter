<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_model extends MY_Controller{


public function Getcampaign()
	{

		$query = $this->db->query("SELECT *, from_unixtime(c.adddate,'%d-%m-%Y %H:%i:%s') as adddate2 , from_unixtime(c.enddate,'%d-%m-%Y %H:%i:%s') as enddate2

		FROM order_detail as od 
		LEFT JOIN campaign as c on od.campaign_id=c.campaign_id 
		 WHERE c.campaign_status='0' 
		 GROUP BY od.campaign_id
		 ORDER BY c.adddate ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



public function Getfontall()
	{
		$query = $this->db->query("SELECT 
		f.font_id as font_id,
		f.font_name as font_name,
		f.font_family as font_family,
		f.font_file as font_file,
		f.font_example as font_example,
		f.font_status as font_status,
		f.country_id as country_id,
		c.country_name as country_name,
		c.country_code as country_code
			FROM font as f
			LEFT JOIN country as c on c.country_id=f.country_id
			ORDER BY f.font_id ASC");
		return $query->result_array();
	}

	

	public function Okthischeck($data)
	{
		$data['campaign_status'] = '1';
$this->db->where('campaign_id', $data['campaign_id']);
$this->db->update('campaign', $data);
		return true;
	}


}