<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketplace_model extends MY_Controller{


public function Getcategory()
	{
		$query = $this->db->query("SELECT * FROM campaign_category ORDER BY campaign_category_id ASC");
		return $query->result_array();
	}

public function Getsubcategory($cat)
	{
		$query = $this->db->query("SELECT * FROM campaign_subcategory WHERE campaign_category_id='".$cat."' ORDER BY campaign_subcategory_id ASC");
		return $query->result_array();
	}

	public function Getcampaign($cat,$subcat,$search)
	{

$time = time();

if($search != '0'){
$query = $this->db->query("SELECT *, round((enddate - ".$time.")/86400) as dayleft , round((enddate - ".$time.")/3600) as hoursleft FROM campaign WHERE campaign_title LIKE '%".$search."%'  and round((enddate - ".$time.")/3600) > '0' 
ORDER BY hoursleft  ASC");
}else if($subcat != '0'){
$query = $this->db->query("SELECT *, round((enddate - ".$time.")/86400) as dayleft , round((enddate - ".$time.")/3600) as hoursleft FROM campaign WHERE subcategory_id='".$subcat."' and round((enddate - ".$time.")/3600) > '0' 
ORDER BY hoursleft  ASC");
}else if($cat != '0'){

		$query = $this->db->query("SELECT *, round((enddate - ".$time.")/86400) as dayleft , round((enddate - ".$time.")/3600) as hoursleft FROM campaign WHERE campaign_category_id='".$cat."' and round((enddate - ".$time.")/3600) > '0' 
ORDER BY hoursleft  ASC");
		}else{

		$query = $this->db->query("SELECT *, round((enddate - ".$time.")/86400) as dayleft , round((enddate - ".$time.")/3600) as hoursleft FROM campaign WHERE round((enddate - ".$time.")/3600) > '0' 
ORDER BY hoursleft  ASC");
		}

		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}




}