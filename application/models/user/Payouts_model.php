<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payouts_model extends MY_Controller{


public function Getprofit()
	{
		$query = $this->db->query("SELECT profit,email_paypal FROM user WHERE user_id='".$_SESSION['user_id']."' ");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

public function Getprofit2()
	{
		$query = $this->db->query("SELECT profit FROM user WHERE user_id='".$_SESSION['user_id']."' ");
		return $query->result_array();
	}


	public function Getpayoutslist()
	{
		$query = $this->db->query("SELECT *,from_unixtime(adddate,'%d-%m-%Y') as adddate2 FROM payouts WHERE user_id='".$_SESSION['user_id']."' ORDER BY payouts_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

public function Confirmpayme($data)
	{
$this->db->insert('payouts', $data);

		return true;
	}


	public function Resetprofit($data2)
	{
		$data2['profit'] = '0';
$this->db->where('user_id', $_SESSION['user_id']);
$this->db->update('user', $data2);
		return true;
	}





}