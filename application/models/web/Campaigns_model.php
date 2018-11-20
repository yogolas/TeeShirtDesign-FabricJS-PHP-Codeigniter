<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaigns_model extends MY_Controller{


public function Getcat()
	{
		$query = $this->db->query("SELECT * FROM campaign_category ORDER BY campaign_category_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Getsubcat($data)
	{
		$query = $this->db->query("SELECT * FROM campaign_subcategory WHERE campaign_category_id='".$data['cat_id']."' ORDER BY campaign_subcategory_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}




	public function Getproductcategory()
	{
		$query = $this->db->query("SELECT * FROM product_category ORDER BY product_category_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Getproduct($data)
	{
		$query = $this->db->query("SELECT * FROM product_style WHERE product_category_id='".$data['product_category_id']."' ORDER BY product_style_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

	public function Getproductcolor($data)
	{
		$query = $this->db->query("SELECT 
		ps.product_style_id as product_style_id,
		pc.product_color_id as product_color_id,
		pc.product_color_name as product_color_name,
		pc.product_color_code as product_color_code 
			FROM product_style_color as ps
			LEFT JOIN product_color as pc on pc.product_color_id=ps.product_color_id
		 WHERE product_style_id='".$data['product_style_id']."' 
		 ORDER BY product_color_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


public function Getfontcountry()
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
			GROUP BY f.country_id ORDER BY c.country_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


public function Getfont($data)
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
			WHERE f.country_id='".$data['country_id']."'
			ORDER BY f.font_id ASC");
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




	public function Getcolorprint()
	{
		$query = $this->db->query("SELECT * FROM color_print ORDER BY color_print_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


public function Getartworkcategorylist()
	{
		$query = $this->db->query("SELECT * FROM artwork_category ORDER BY artwork_category_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Getartwork($data)
	{

		if($data['artwork_category_id']=='0'){
		$query = $this->db->query("SELECT 
		a.artwork_id as artwork_id,
			a.artwork_category_id as artwork_category_id,
			a.artwork_name as artwork_name,
			a.artwork_filename as artwork_filename,
			ac.artwork_category_name as artwork_category_name
		 FROM artwork  as a 
		 LEFT JOIN artwork_category as ac on a.artwork_category_id=ac.artwork_category_id 
			WHERE a.artwork_name LIKE '%".$data['searchartwork']."%' ORDER BY a.artwork_id DESC");
	}else{
		$query = $this->db->query("SELECT 
		a.artwork_id as artwork_id,
			a.artwork_category_id as artwork_category_id,
			a.artwork_name as artwork_name,
			a.artwork_filename as artwork_filename,
			ac.artwork_category_name as artwork_category_name
		 FROM artwork  as a 
		 LEFT JOIN artwork_category as ac on a.artwork_category_id=ac.artwork_category_id 
			WHERE a.artwork_category_id='".$data['artwork_category_id']."' ORDER BY a.artwork_id DESC");
	}

		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


public function Getbasecostwithsizes($data)
	{
		$query = $this->db->query("SELECT * FROM product_style_size 
			WHERE product_style_id='".$data['product_style_id']."'
			AND product_size_id='13'");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


public function Launch($data)
	{
		$this->db->insert('campaign', $data);
		return true;
	}



public function Checkurl($data)
	{
		$querynum = $this->db->query("SELECT * FROM campaign 
			WHERE url='".$data['url']."'");
		return $querynum->num_rows();
	}



	public function Getcampaignending()
	{
$time = time();
$query = $this->db->query("SELECT *, round((enddate - ".$time.")/86400) as dayleft , round((enddate - ".$time.")/3600) as hoursleft FROM campaign 
WHERE round((enddate - ".$time.")/3600) > '0' 
ORDER BY hoursleft  ASC LIMIT 4");
return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Getcampaignmostfunded()
	{
$time = time();
$query = $this->db->query("SELECT *, round((enddate - ".$time.")/86400) as dayleft , round((enddate - ".$time.")/3600) as hoursleft FROM campaign 
WHERE round((enddate - ".$time.")/3600) > '0' 
ORDER BY how_many_sale  DESC LIMIT 4");
return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Getcampaignlastest()
	{
$time = time();
$query = $this->db->query("SELECT *, round((enddate - ".$time.")/86400) as dayleft , round((enddate - ".$time.")/3600) as hoursleft FROM campaign 
WHERE round((enddate - ".$time.")/3600) > '0' 
ORDER BY campaign_id DESC LIMIT 4");
return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}




}