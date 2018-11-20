<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colorofprint extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/colorofprint_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Color of print';
		$data['tabmenu'] = 'colorofprint';
		$this->masteradmin('masteradmin/colorofprint',$data);
	}



// start color coding ------------------> 

	public function Getcolorlist()
	{	
	echo $this->colorofprint_model->Getcolorlist();
	}


	public function Addcolor()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->colorofprint_model->Addcolor($data);
	}

	public function Editcolor()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->colorofprint_model->Editcolor($data);
		
	}

	public function Deletecolor()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->colorofprint_model->Deletecolor($data);
		
	}

	public function Updatecolorstatus()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->colorofprint_model->Updatecolorstatus($data);
		
	}

	// end color ------------------------------------->


}
