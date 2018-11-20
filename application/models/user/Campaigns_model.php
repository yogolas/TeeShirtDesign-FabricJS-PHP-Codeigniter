<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaigns_model extends MY_Controller{

	public function Getcampaign()
	{
				$this->CI = & get_instance();
$this->CI->load->library('session');

		$query = $this->db->query("SELECT *,from_unixtime(enddate,'%d-%m-%Y') as enddate2 FROM campaign WHERE user_id='".$_SESSION['user_id']."' ORDER BY campaign_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Getprofituser()
	{
		$query = $this->db->query("SELECT profit,profit_all,salenum_all FROM user WHERE user_id='".$_SESSION['user_id']."' ");
		return $query->result_array();
	}

}