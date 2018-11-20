
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaignsetting_model extends MY_Controller{



public function Getcategorylist()
	{
		$query = $this->db->query("SELECT * FROM campaign_category ORDER BY campaign_category_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

public function Addcategory($data)
	{
		$this->db->insert('campaign_category', $data);
		return true;
	}

	public function Editcategory($data)
	{
$this->db->where('campaign_category_id', $data['campaign_category_id']);
$this->db->update('campaign_category', $data);
		return true;
	}

	public function Deletecategory($data)
	{
$this->db->where('campaign_category_id', $data['campaign_category_id']);
$this->db->delete('campaign_category');
		return true;
	}










public function Getsubcategorylist()
	{
		$query = $this->db->query("SELECT cs.campaign_subcategory_name as campaign_subcategory_name, cs.campaign_subcategory_id as campaign_subcategory_id, cc.campaign_category_id as campaign_category_id, cc.campaign_category_name as campaign_category_name 
			FROM campaign_subcategory  as cs
			LEFT JOIN campaign_category as cc on cc.campaign_category_id=cs.campaign_category_id
			ORDER BY campaign_subcategory_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}
	
public function Addsubcategory($data)
	{
		$this->db->insert('campaign_subcategory', $data);
		return true;
	}

	public function Editsubcategory($data)
	{
$this->db->where('campaign_subcategory_id', $data['campaign_subcategory_id']);
$this->db->update('campaign_subcategory', $data);
		return true;
	}

	public function Deletesubcategory($data)
	{
$this->db->where('campaign_subcategory_id', $data['campaign_subcategory_id']);
$this->db->delete('campaign_subcategory');
		return true;
	}





public function Getlimitday()
	{
		$query = $this->db->query("SELECT * FROM campaign_limitday WHERE ID='1'");
		return json_encode($query->row(), JSON_UNESCAPED_UNICODE );
	}


public function Savelimitday($data)
	{
		$this->db->where('ID', '1');
		$this->db->update('campaign_limitday', $data);
		return true;
	}




}
