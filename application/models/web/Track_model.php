<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Track_model extends MY_Controller{


public function Getorderstatus($number)
	{
		$query = $this->db->query("SELECT oh.status as hstatus,c.campaign_status as cstatus,oh.order_number as order_number FROM order_detail as od
LEFT JOIN campaign as c on c.campaign_id=od.campaign_id
LEFT JOIN order_header as oh on oh.order_number=od.order_number

WHERE oh.order_number='".$number."' ");
		return $query->result_array();
	}

}