<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countrysetting_model extends MY_Controller{


// start color coding ------------------>

	public function Get()
	{
		$query = $this->db->query("SELECT 
c.country_id as country_id,
c.country_name as country_name,
c.country_code as country_code,
c.country_status as country_status,
c.shipping_zone_id as shipping_zone_id,
sz.shipping_zone_name as shipping_zone_name
			FROM country as c
			LEFT JOIN shipping_zone as sz on c.shipping_zone_id=sz.shipping_zone_id
			ORDER BY country_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Add($data)
	{
		$this->db->insert('country', $data);
		return true;
	}

	public function Edit($data)
	{
$this->db->where('country_id', $data['country_id']);
$this->db->update('country', $data);
		return true;
	}

	public function Delete($data)
	{
$this->db->where('country_id', $data['country_id']);
$this->db->delete('country');
		return true;
	}

	public function Updatestatus($data)
	{
$this->db->where('country_id', $data['country_id']);
$this->db->update('country', $data);
		return true;
	}





}