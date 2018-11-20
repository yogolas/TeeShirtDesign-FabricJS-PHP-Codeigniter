<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productsetting_model extends MY_Controller{



// start color coding ------------------>

	public function Getcolorlist()
	{
		$query = $this->db->query("SELECT * FROM product_color ORDER BY product_color_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Addcolor($data)
	{
		$this->db->insert('product_color', $data);
		return true;
	}

	public function Editcolor($data)
	{
$this->db->where('product_color_id', $data['product_color_id']);
$this->db->update('product_color', $data);
		return true;
	}

	public function Deletecolor($data)
	{
$this->db->where('product_color_id', $data['product_color_id']);
$this->db->delete('product_color');
		return true;
	}

	public function Updatecolorstatus($data)
	{
$this->db->where('product_color_id', $data['product_color_id']);
$this->db->update('product_color', $data);
		return true;
	}

	// end color coding ---------->

	// start style coding -------------------->

public function Getstylelist()
	{
		$query = $this->db->query("SELECT 
			(SELECT COUNT(*) FROM product_style_color as psc WHERE psc.product_style_id=ps.product_style_id) as colorcount,
			(SELECT COUNT(*) FROM product_style_size as psc WHERE psc.product_style_id=ps.product_style_id) as sizecount, 
			ps.product_style_id as product_style_id,
			ps.product_style_name as product_style_name,
			ps.product_style_front as product_style_front,
			ps.product_style_back as product_style_back,
			ps.product_category_id as product_category_id,
			pc.product_category_name as product_category_name 
			FROM product_style as ps
			LEFT JOIN product_category as pc on pc.product_category_id=ps.product_category_id
			ORDER BY ps.product_style_id DESC");

		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}


	public function Addstyle($data)
	{
		$this->db->insert('product_style', $data);
		return true;
	}

	public function Editstyle($data)
	{
$this->db->where('product_style_id', $data['product_style_id']);
$this->db->update('product_style', $data);
		return true;
	}

	public function Deletestyle($data)
	{
$this->db->where('product_style_id', $data['product_style_id']);
$this->db->delete('product_style');
		return true;
	}

	// end style coding -------------------->

// style multi color --------------->
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


	public function Addstylecolor($data)
	{
		$this->db->insert('product_style_color', $data);
		return true;
	}

	

	public function Deletestylecolor($data)
	{
$this->db->where('product_style_id', $data['product_style_id']);
$this->db->where('product_color_id', $data['product_color_id']);
$this->db->delete('product_style_color');
		return true;
	}



// category -------------
	public function Getcategorylist()
	{
		$query = $this->db->query("SELECT * FROM product_category ORDER BY product_category_id DESC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}

public function Addcategory($data)
	{
		$this->db->insert('product_category', $data);
		return true;
	}

	public function Editcategory($data)
	{
$this->db->where('product_category_id', $data['product_category_id']);
$this->db->update('product_category', $data);
		return true;
	}

	public function Deletecategory($data)
	{
$this->db->where('product_category_id', $data['product_category_id']);
$this->db->delete('product_category');
		return true;
	}


// size -------

	public function Getsizelist()
	{
		$query = $this->db->query("SELECT * FROM product_size ORDER BY product_size_id ASC");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}



// style + size ------------

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


	public function Addstylesize($data)
	{
		$this->db->insert('product_style_size', $data);
		return true;
	}

	

	public function Deletestylesize($data)
	{
$this->db->where('product_style_id', $data['product_style_id']);
$this->db->where('product_size_id', $data['product_size_id']);
$this->db->delete('product_style_size');
		return true;
	}



}
