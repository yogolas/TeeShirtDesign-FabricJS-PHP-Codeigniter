<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currencysetting_model extends MY_Controller{


// start color coding ------------------>

	public function Get()
	{
		$query = $this->db->query("SELECT * FROM currency_rate ORDER BY currency_rate_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Add($data)
	{
		$this->db->insert('currency_rate', $data);
		return true;
	}

	public function Edit($data)
	{
$this->db->where('currency_rate_id', $data['currency_rate_id']);
$this->db->update('currency_rate', $data);
		return true;
	}

	public function Delete($data)
	{
$this->db->where('currency_rate_id', $data['currency_rate_id']);
$this->db->delete('currency_rate');
		return true;
	}

	public function Updatestatus($data)
	{
$this->db->where('currency_rate_id', $data['currency_rate_id']);
$this->db->update('currency_rate', $data);
		return true;
	}

	// end color coding ---------->

}