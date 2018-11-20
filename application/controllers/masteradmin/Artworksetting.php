<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artworksetting extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/artworksetting_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Art Work Setting';
		$data['tabmenu'] = 'artworksetting';
		$this->masteradmin('masteradmin/artworksetting',$data);
	}


	public function Getcategorylist()
	{	
	echo $this->artworksetting_model->Getcategorylist();
	}

	public function Addcategory()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$this->artworksetting_model->Addcategory($data);
	}


	public function Addimage()
	{

		
for ($i = 0; $i < count($_FILES['artwork_file']['name']); $i++) {


$Str_file = explode(".",$_FILES['artwork_file']['name'][$i]);

if(move_uploaded_file($_FILES["artwork_file"]["tmp_name"][$i],"file/artwork/".$_FILES["artwork_file"]["name"][$i]))
{


$data['artwork_category_id'] = $_POST['category_id'];
$data['artwork_name'] = $Str_file[0];
$data['artwork_filename'] = $_FILES["artwork_file"]["name"][$i];
$this->artworksetting_model->Addimage($data);


}


}


	}




	public function Getimageall()
	{	
	echo $this->artworksetting_model->Getimageall();
	}



	public function Getimage()
	{	
		$data = json_decode(file_get_contents('php://input'), true);
	echo $this->artworksetting_model->Getimage($data);
	}



}
