<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends MY_Controller{

public function Getorders()
	{
		$query = $this->db->query("SELECT c.campaign_title as campaign_title,c.url as url, c.front_image as front_image, oh.status as hstatus, c.campaign_status as campaign_status,od.order_number as order_number, od.qty as qty, od.price as price ,from_unixtime(od.adddate,'%d-%m-%Y') as adddate2 FROM order_detail as od 
			LEFT JOIN campaign as c on c.campaign_id=od.campaign_id
			LEFT JOIN order_header as oh on oh.order_number=od.order_number
			WHERE od.user_id='".$_SESSION['user_id']."'
		 ORDER BY od.ID DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

}