<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkstock_model extends MY_Controller{





public function Getstocklist()
	{
		$query = $this->db->query("SELECT 
sa.product_num_all as product_num_all,
sa.product_style_id as product_style_id,
ps.product_style_name as product_style_name,
pc.product_color_name as product_color_name,
pc.product_color_code as product_color_code,
pz.product_size_name as product_size_name
FROM stock_all as sa
LEFT JOIN product_style as ps on ps.product_style_id=sa.product_style_id
LEFT JOIN product_color as pc on pc.product_color_id=sa.product_color_id
LEFT JOIN product_size as pz on pz.product_size_id=sa.product_size_id
ORDER BY sa.product_style_id ASC,sa.product_size_id ASC,sa.product_num_all DESC,sa.product_color_id ASC
			");
		return json_encode($query->result_array(), JSON_UNESCAPED_UNICODE );
	}








}
