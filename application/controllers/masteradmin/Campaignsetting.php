<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaignsetting extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/campaignsetting_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Campaign Setting';
		$data['tabmenu'] = 'campaignsetting';
		$this->masteradmin('masteradmin/campaignsetting',$data);
	}


public function Getcategorylist()
	{	
	echo $this->campaignsetting_model->Getcategorylist();
	}

	public function Addcategory()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->campaignsetting_model->Addcategory($data);
	}

	public function Editcategory()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->campaignsetting_model->Editcategory($data);
		
	}

	public function Deletecategory()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->campaignsetting_model->Deletecategory($data);
		
	}




public function Getsubcategorylist()
	{	
	echo $this->campaignsetting_model->Getsubcategorylist();
	}

	public function Addsubcategory()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->campaignsetting_model->Addsubcategory($data);
	}

	public function Editsubcategory()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->campaignsetting_model->Editsubcategory($data);
		
	}

	public function Deletesubcategory()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->campaignsetting_model->Deletesubcategory($data);
		
	}



	public function Getlimitday()
	{	
	echo $this->campaignsetting_model->Getlimitday();
	}

	public function Savelimitday()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if($this->campaignsetting_model->Savelimitday($data)==true){ 
	echo '{"status":"success"}';
		}else{
			echo 'nosuccess';
		}
	}



}
