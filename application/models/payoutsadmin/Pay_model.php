<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay_model extends MY_Controller{


public function Getpayoutslist()
	{
		$query = $this->db->query("SELECT 
			p.payouts_id as payouts_id,
			p.user_id as user_id, 
			p.amount as amount, 
			u.email as email,
			u.salenum_all as salenum_all,
			u.profit_all as profit_all,
			p.email_paypal as email_paypal,
			p.status as status , 
			from_unixtime(p.adddate,'%d-%m-%Y %H:%i:%s') as adddate2 FROM payouts as p
			LEFT JOIN user as u on u.user_id=p.user_id
		 WHERE p.status='0' ORDER BY p.payouts_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}




	public function Paynow($data)
	{
		$data['status'] = '1';
$this->db->where('payouts_id', $data['payouts_id']);
$this->db->update('payouts', $data);
		return true;
	}

	public function Payoutsrecord($data)
	{
		$this->db->insert('payouts_record', $data);
		return true;
	}







}