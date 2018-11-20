<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fontsetting_model extends MY_Controller{


// start color coding ------------------>

	public function Get()
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
			ORDER BY font_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Add($data)
	{
		$this->db->insert('font', $data);
		return true;
	}

	public function Edit($data)
	{
$this->db->where('font_id', $data['font_id']);
$this->db->update('font', $data);
		return true;
	}

	public function Delete($data)
	{
$this->db->where('font_id', $data['font_id']);
$this->db->delete('font');
		return true;
	}

	public function Updatestatus($data)
	{
$this->db->where('font_id', $data['font_id']);
$this->db->update('font', $data);
		return true;
	}

	// end color coding ---------->

}