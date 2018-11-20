<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkstock extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('stock/checkstock_model');
               $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Check Stock';
		$this->stock('stock/checkstock',$data);
	}

public function Getstocklist()
	{	
		$data = json_decode(file_get_contents('php://input'), true);
	echo $this->checkstock_model->Getstocklist($data );
	}


public function Getstocksizeone()
	{	
		$data = json_decode(file_get_contents('php://input'), true);
	echo $this->checkstock_model->Getstocksizeone($data );
	}



}