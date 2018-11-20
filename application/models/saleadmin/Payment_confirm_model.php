<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_confirm_model extends MY_Controller{


public function Payment_confirm()
	{
		$query = $this->db->query("SELECT *, from_unixtime(adddate,'%d-%m-%Y %H:%i:%s') as adddate2 FROM payment_confirm WHERE status='0' ORDER BY ID DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Okthispayment_confirm($data)
	{
		$data['status'] = '1';
$this->db->where('ID', $data['ID']);
$this->db->update('payment_confirm', $data);
		return true;
	}


	public function Delthispayment_confirm($data)
	{
		$data['status'] = '1';
$this->db->where('ID', $data['ID']);
$this->db->delete('payment_confirm');
		return true;
	}



}