<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shippingsetting_model extends MY_Controller{


// start color coding ------------------>

	public function Get()
	{

		$query = $this->db->query("SELECT 
			s.shipping_rate_id as shipping_rate_id,
			s.shipping_rate_shippingby as shipping_rate_shippingby,
			s.shipping_rate_minweight as shipping_rate_minweight,
			s.shipping_rate_maxweight as shipping_rate_maxweight,
			s.shipping_rate_costbase as shipping_rate_costbase,
			s.shipping_rate_costperunit as shipping_rate_costperunit,
			s.shipping_zone_id as shipping_zone_id,
			s.shipping_rate_status as shipping_rate_status,
			sz.shipping_zone_name as shipping_zone_name
			FROM shipping_rate as s
			LEFT JOIN shipping_zone as sz on sz.shipping_zone_id=s.shipping_zone_id
			ORDER BY shipping_rate_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Add($data)
	{
		$this->db->insert('shipping_rate', $data);
		return true;
	}

	public function Edit($data)
	{
$this->db->where('shipping_rate_id', $data['shipping_rate_id']);
$this->db->update('shipping_rate', $data);
		return true;
	}

	public function Delete($data)
	{
$this->db->where('shipping_rate_id', $data['shipping_rate_id']);
$this->db->delete('shipping_rate');
		return true;
	}

	public function Updatestatus($data)
	{
$this->db->where('shipping_rate_id', $data['shipping_rate_id']);
$this->db->update('shipping_rate', $data);
		return true;
	}

	// end color coding ---------->

}