<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productsetting extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/productsetting_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Product Setting';
		$data['tabmenu'] = 'productsetting';
		$this->masteradmin('masteradmin/productsetting',$data);
	}



// start color coding ------------------> 

	public function Getcolorlist()
	{	
	echo $this->productsetting_model->Getcolorlist();
	}


	public function Addcolor()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Addcolor($data);
	}

	public function Editcolor()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Editcolor($data);
		
	}

	public function Deletecolor()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Deletecolor($data);
		
	}

	public function Updatecolorstatus()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Updatecolorstatus($data);
		
	}

	// end color ------------------------------------->


// start style coding ------------------------------>

	public function Getstylelist()
	{	
	echo $this->productsetting_model->Getstylelist();
	}


	public function Addstyle()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Addstyle($data);
	}

	public function Editstyle()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Editstyle($data);
		
	}

	public function Deletestyle()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Deletestyle($data);
		
	}

	// end style coding ------------------------------>

	// multi style color
	public function Stylecolorlist()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->productsetting_model->Stylecolorlist($data);
		
	}


	public function Addstylecolor()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Addstylecolor($data);
	}


	public function Deletestylecolor()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Deletestylecolor($data);
		
	}





	// category -------------

public function Getcategorylist()
	{	
	echo $this->productsetting_model->Getcategorylist();
	}

	public function Addcategory()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Addcategory($data);
	}

	public function Editcategory()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Editcategory($data);
		
	}

	public function Deletecategory()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Deletecategory($data);
		
	}



	// size
	public function Getsizelist()
	{	
	echo $this->productsetting_model->Getsizelist();
	}





// style +  size ----------- 

public function Stylesizelist()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->productsetting_model->Stylesizelist($data);
		
	}


	public function Addstylesize()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Addstylesize($data);
	}


	public function Deletestylesize()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->productsetting_model->Deletestylesize($data);
		
	}



}
