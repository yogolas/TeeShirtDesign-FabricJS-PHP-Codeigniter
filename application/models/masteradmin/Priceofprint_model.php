<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Priceofprint_model extends MY_Controller{


public function Getlist()
	{
		$query = $this->db->query("SELECT * FROM price_print ORDER BY price_print_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

public function Add($data)
	{
		$this->db->insert('price_print', $data);
		return true;
	}

	public function Edit($data)
	{
$this->db->where('price_print_id', $data['price_print_id']);
$this->db->update('price_print', $data);
		return true;
	}

	public function Delete($data)
	{
$this->db->where('price_print_id', $data['price_print_id']);
$this->db->delete('price_print');
		return true;
	}

}