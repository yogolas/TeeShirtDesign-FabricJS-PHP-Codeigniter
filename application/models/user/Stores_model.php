<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores_model extends MY_Controller{

public function __construct()
        {
parent::__construct();
$this->CI = & get_instance();
$this->CI->load->library('session');
        }



public function Addtitle($data)
	{
$this->db->insert('stores', $data);
		return true;
	}


public function Editstore($data)
	{
$this->db->where('stores_id', $data['stores_id']);
$this->db->update('stores', $data);
		return true;
	}



	public function Getstores()
	{
		$query = $this->db->query("SELECT * FROM stores
			WHERE user_id='".$_SESSION['user_id']."'
		 ORDER BY stores_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


public function Getstorescampaign()
	{
		$query = $this->db->query("SELECT sc.stores_id as stores_id,
c.show_back_first as show_back_first,
c.back_image as back_image,
		 c.front_image as front_image

		  FROM stores_campaign as sc 
			LEFT JOIN campaign as c on c.campaign_id=sc.campaign_id
			WHERE sc.user_id='".$_SESSION['user_id']."'
		 ORDER BY sc.stores_campaign_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Getmycampaign()
	{
		$query = $this->db->query("SELECT 
c.campaign_title as campaign_title,
c.campaign_id as campaign_id,
c.salegole_unit as salegole_unit,
c.front_image as front_image,
c.back_image as back_image,
c.show_back_first as show_back_first,
ps.product_style_name as  product_style_name

		 FROM campaign as c LEFT JOIN product_style as ps on ps.product_style_id=c.product_style_id

		 WHERE c.user_id='".$_SESSION['user_id']."' ORDER BY c.campaign_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Addcampaign($data)
	{
$this->db->insert('stores_campaign', $data);
		return true;
	}

	public function Deletecampaign($data)
	{
$this->db->where('stores_id', $data['stores_id']);
$this->db->where('user_id', $data['user_id']);
$this->db->delete('stores_campaign');
		return true;
	}




}