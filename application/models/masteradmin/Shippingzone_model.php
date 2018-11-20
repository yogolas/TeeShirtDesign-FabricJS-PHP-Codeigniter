<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shippingzone_model extends MY_Controller{




	public function Getlist()
	{
		$query = $this->db->query("SELECT * FROM shipping_zone ORDER BY shipping_zone_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



}