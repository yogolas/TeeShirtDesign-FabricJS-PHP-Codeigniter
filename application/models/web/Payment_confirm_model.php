<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_confirm_model extends MY_Controller{

public function Add($data)
	{
		$this->db->insert('payment_confirm', $data);
		return true;
	}

}