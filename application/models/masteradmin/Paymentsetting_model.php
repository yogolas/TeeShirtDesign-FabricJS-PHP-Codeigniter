
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentsetting_model extends MY_Controller{



public function Getbanklist()
	{
		$query = $this->db->query("SELECT * FROM payment_bank ORDER BY payment_bank_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

public function Addbank($data)
	{
		$this->db->insert('payment_bank', $data);
		return true;
	}

	public function Editbank($data)
	{
$this->db->where('payment_bank_id', $data['payment_bank_id']);
$this->db->update('payment_bank', $data);
		return true;
	}

	public function Deletebank($data)
	{
$this->db->where('payment_bank_id', $data['payment_bank_id']);
$this->db->delete('payment_bank');
		return true;
	}






public function Getapilist()
	{
		$query = $this->db->query("SELECT * FROM payment_api ORDER BY payment_api_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

	public function Editapi($data)
	{
$this->db->where('payment_api_id', $data['payment_api_id']);
$this->db->update('payment_api', $data);
		return true;
	}






}
