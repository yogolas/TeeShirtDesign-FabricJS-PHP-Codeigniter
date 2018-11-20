<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends MY_Controller{

public function __construct()
        {
parent::__construct();
$this->CI = & get_instance();
$this->CI->load->library('session');
        }



public function Getuserinfo()
	{
		$query = $this->db->query("SELECT 
name,address,country_id,province,zipcode,phone
			FROM user where user_id='".$_SESSION['user_id']."' ");
		return json_encode($query->row(), JSON_UNESCAPED_UNICODE );
	}


public function Getcountry()
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


public function Updateinfo($data)
	{
$this->db->where('user_id', $_SESSION['user_id']);
$this->db->update('user', $data);
		return true;
	}

	public function Updatepass($data)
	{
		$data2['password'] = md5(md5($data['user_newpassword']));
$this->db->where('user_id', $_SESSION['user_id']);
$this->db->update('user', $data2);
		return true;
	}



}