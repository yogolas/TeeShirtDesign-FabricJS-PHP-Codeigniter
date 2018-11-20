
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artworksetting_model extends MY_Controller{



public function Getcategorylist()
	{
		$query = $this->db->query("SELECT * FROM artwork_category ORDER BY artwork_category_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

public function Addcategory($data)
	{
		$this->db->insert('artwork_category', $data);
		return true;
	}






	public function Addimage($data)
	{
		$this->db->insert('artwork', $data);
		return true;
	}


public function Getimageall()
	{
		$query = $this->db->query("SELECT 
		a.artwork_id as artwork_id,
			a.artwork_category_id as artwork_category_id,
			a.artwork_name as artwork_name,
			a.artwork_filename as artwork_filename,
			ac.artwork_category_name as artwork_category_name
		 FROM artwork  as a 
		 LEFT JOIN artwork_category as ac on a.artwork_category_id=ac.artwork_category_id 
			ORDER BY a.artwork_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Getimage($data)
	{
		$query = $this->db->query("SELECT 
			a.artwork_id as artwork_id,
			a.artwork_category_id as artwork_category_id,
			a.artwork_name as artwork_name,
			a.artwork_filename as artwork_filename,
			ac.artwork_category_name as artwork_category_name
		 FROM artwork  as a 
		 LEFT JOIN artwork_category as ac on a.artwork_category_id=ac.artwork_category_id
WHERE a.artwork_category_id='".$data['category_id']."'
			ORDER BY artwork_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

	



}
