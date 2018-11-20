<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colorofprint_model extends MY_Controller{


// start color coding ------------------>

	public function Getcolorlist()
	{
		$query = $this->db->query("SELECT * FROM color_print ORDER BY color_print_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Addcolor($data)
	{
		$this->db->insert('color_print', $data);
		return true;
	}

	public function Editcolor($data)
	{
$this->db->where('color_print_id', $data['color_print_id']);
$this->db->update('color_print', $data);
		return true;
	}

	public function Deletecolor($data)
	{
$this->db->where('color_print_id', $data['color_print_id']);
$this->db->delete('color_print');
		return true;
	}

	public function Updatecolorstatus($data)
	{
$this->db->where('color_print_id', $data['color_print_id']);
$this->db->update('color_print', $data);
		return true;
	}

	// end color coding ---------->

}