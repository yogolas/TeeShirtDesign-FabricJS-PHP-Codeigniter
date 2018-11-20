<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsetting_model extends MY_Controller{




	public function Getlist()
	{
		$query = $this->db->query("SELECT * FROM admin as a
LEFT JOIN admin_system as at on at.system_id=a.system_id
		 ORDER BY a.ID DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Getsystemlist()
	{
		$query = $this->db->query("SELECT * FROM admin_system
		 ORDER BY system_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



public function Add($data)
	{
		$this->db->insert('admin', $data);
		return true;
	}

	public function Edit($data)
	{
$this->db->where('ID', $data['ID']);
$this->db->update('admin', $data);
		return true;
	}

	public function Delete($data)
	{
$this->db->where('ID', $data['ID']);
$this->db->delete('admin');
		return true;
	}





}