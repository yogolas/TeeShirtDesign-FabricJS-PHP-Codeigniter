<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stockpage_model extends MY_Controller{


public function Getstockheader($data )
	{


		$query = $this->db->query("SELECT *, FROM_UNIXTIME(adddate,'%d-%m-%Y %h:%i:%s') as adddate
			FROM stock_header
			ORDER BY ID DESC LIMIT 50");

		 $list = json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );


		 echo $list;
	}

public function Getstylelist()
	{
		$query = $this->db->query("SELECT *
			FROM product_style
			ORDER BY product_style_id DESC");

		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Stylecolorlist($data)
	{
		$query = $this->db->query("SELECT ps.product_style_id as product_style_id, pc.product_color_id as product_color_id, pc.product_color_name as product_color_name, pc.product_color_code as product_color_code
			FROM product_style_color as psc
			LEFT JOIN product_style as ps on psc.product_style_id=ps.product_style_id
			LEFT JOIN product_color as pc on psc.product_color_id=pc.product_color_id
			WHERE psc.product_style_id='".$data['product_style_id']."'
			ORDER BY psc.ID DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



	public function Stylesizelist($data)
	{
		$query = $this->db->query("SELECT 
			ps.product_style_id as product_style_id, 
			pc.product_size_id as product_size_id, 
			pc.product_size_name as product_size_name, 
			psc.product_style_size_price as product_style_size_price,
			psc.product_style_size_weight as product_style_size_weight,
			psc.product_style_size_dil as product_style_size_dil,
			psc.product_style_size_diw as product_style_size_diw,
			psc.product_style_size_dih as product_style_size_dih
			FROM product_style_size as psc
			LEFT JOIN product_style as ps on psc.product_style_id=ps.product_style_id
			LEFT JOIN product_size as pc on psc.product_size_id=pc.product_size_id
			WHERE psc.product_style_id='".$data['product_style_id']."'
			ORDER BY psc.ID DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Savestockdetail($data)
	{
		$this->db->insert('stock_detail', $data);
		return true;
	}


	public function Savestockheader($data)
	{
		$this->db->insert('stock_header', $data);
		return true;
	}


	public function Addstockall($data)
	{
		$this->db->insert('stock_all', $data);
		return true;
	}


public function Checkstockall($data)
	{
		$query = $this->db->query("SELECT * FROM stock_all 
			WHERE product_style_id='".$data['product_style_id']."' AND product_color_id='".$data['product_color_id']."' AND product_size_id='".$data['product_size_id']."'");
		return $query->num_rows();
	}

	public function Updatestockall($data)
	{
$this->db->query("UPDATE  stock_all 
	SET product_num_all=product_num_all+'".$data['product_num']."'
	WHERE product_style_id='".$data['product_style_id']."' AND product_color_id='".$data['product_color_id']."' AND product_size_id='".$data['product_size_id']."' ");
		return true;
	}

	public function Updatedeletestockall($data)
	{
$this->db->query("UPDATE  stock_all 
	SET product_num_all=product_num_all-'".$data['product_num']."'
	WHERE product_style_id='".$data['product_style_id']."' AND product_color_id='".$data['product_color_id']."' AND product_size_id='".$data['product_size_id']."' ");
		return true;
	}


public function Deletestockheader($data)
	{
$this->db->where('runno', $data['runno']);
$this->db->delete('stock_header');

		return true;
	}
	public function Deletestockdetail($data)
	{
$this->db->where('runno', $data['runno']);
$this->db->delete('stock_detail');

		return true;
	}

	public function Getstockdetailrunno($data)
	{
		$query = $this->db->query("SELECT * FROM stock_detail
			WHERE runno='".$data['runno']."'");
		return $query->result();
	}



public function Openrunnolist($data)
	{
		$query = $this->db->query("SELECT *
			FROM stock_detail WHERE runno='".$data['runno']."'
			ORDER BY ID ASC");

		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}




}