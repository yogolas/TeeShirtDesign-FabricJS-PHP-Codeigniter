<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaigns extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('web/campaigns_model');
              $this->CI = & get_instance();
$this->CI->load->library('session');
        }


	public function index()
	{
		$data['title'] = 'Online Your Own T-shirt';
		$this->web('web/campaigns',$data);
	}


/*public function pricing()
	{
		$data['title'] = 'campaigns pricing';

		$data['fontall'] = $this->campaigns_model->Getfontall();

		$this->web('web/pricing',$data);
	}*/


public function details()
	{
		if(!isset($_SESSION['alljson'])){
			header('Location: '.$this->base_url.'/campaigns');
		}

		$data['title'] = 'Campaigns Details';
		$data['fontall'] = $this->campaigns_model->Getfontall();
		$this->web('web/details',$data);
	}



public function Getcat()
	{	
	echo $this->campaigns_model->Getcat();
	}


public function Getsubcat()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->campaigns_model->Getsubcat($data);
		
	}





public function Getproductcategory()
	{	
	echo $this->campaigns_model->Getproductcategory();
	}


public function Getproduct()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->campaigns_model->Getproduct($data);
		
	}

	public function Getproductcolor()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->campaigns_model->Getproductcolor($data);
		
	}


 public function Getfontcountry()
	{		
	echo $this->campaigns_model->Getfontcountry();
	}


	public function Getfont()
	{
	$data = json_decode(file_get_contents('php://input'), true);	
	echo $this->campaigns_model->Getfont($data);
	}

	public function Getfontall()
	{
	//$data = json_decode(file_get_contents('php://input'), true);	
	echo $this->campaigns_model->Getfontall();
	}


	public function Getcolorprint()
	{	
	echo $this->campaigns_model->Getcolorprint();
	}


public function Getartworkcategorylist()
	{	
	echo $this->campaigns_model->Getartworkcategorylist();
	}


	public function Getartwork()
	{	
		$data = json_decode(file_get_contents('php://input'), true);
	echo $this->campaigns_model->Getartwork($data);
	}

public function Getbasecostwithsizes()
	{
	$data = json_decode(file_get_contents('php://input'), true);	
	echo $this->campaigns_model->Getbasecostwithsizes($data);
	}





	public function Alljson()
	{
	$data = json_decode(file_get_contents('php://input'), true);	
	
	$newdata = array(
        'alljson'  => $data['alljson'],
        'alljson2'  => $data['alljson2'],
        'alljsonfront'  => $data['alljsonfront'],
        'alljsonback'  => $data['alljsonback'],
        'product_style_id'  => $data['product_style_id'],
        'product_color_id'  => $data['product_color_id'],
        'basecost'  => $data['basecost']
);
$this->CI->session->set_userdata($newdata);


	}





	public function Uploadimage()
	{


$Str_file = explode(".",$_FILES['imagefile']['name']);

if(move_uploaded_file($_FILES["imagefile"]["tmp_name"],"file/image/".time().md5($_FILES["imagefile"]["name"]).'.png'))
{


session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));

header('Content-type: application/json');



$arr = array('imageurl' => time().md5($_FILES["imagefile"]["name"]).'.png');

echo json_encode($arr);



}


	}



	public function Uploadcanvas()
	{

		//file_put_contents('tmp/'. time().'.png', base64_decode($_REQUEST['imgBase64']));

		// requires php5
	define('UPLOAD_DIR', 'tmp/');
	$img = $_POST['imgBase64'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR . uniqid() . '.png';
	$success = file_put_contents($file, $data);
	print $success ? $file : 'Unable to save the file.';


	}



public function Launch()
	{
if(!isset($_SESSION['user_id'])){
header('Location: '.$this->base_url.'/login');
}else{

ini_set('memory_limit', '2048M');

		if(!isset($_SESSION['alljson'])){
			header('Location: '.$this->base_url.'/campaigns');
		}

			define('UPLOAD_DIR', 'tmp/');
			define('UPLOAD_DIR_design', 'file/design/');

$uniqidall = uniqid();

	$img = $_POST['front_image'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data1 = base64_decode($img);
	$file = UPLOAD_DIR . $uniqidall . '_front.png';
	


$img2 = $_POST['back_image'];
	$img2 = str_replace('data:image/png;base64,', '', $img2);
	$img2 = str_replace(' ', '+', $img2);
	$data2 = base64_decode($img2);
	$file2 = UPLOAD_DIR . $uniqidall . '_back.png';
	


	$img3 = $_POST['front_design_image'];
	$img3 = str_replace('data:image/png;base64,', '', $img3);
	$img3 = str_replace(' ', '+', $img3);
	$data3 = base64_decode($img3);
	$file3 = UPLOAD_DIR_design . $uniqidall . '_front3.png';
	


	$img4 = $_POST['back_design_image'];
	$img4 = str_replace('data:image/png;base64,', '', $img4);
	$img4 = str_replace(' ', '+', $img4);
	$data4 = base64_decode($img4);
	$file4 = UPLOAD_DIR_design . $uniqidall . '_back3.png';
	




if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
}else{
	$user_id = '0';
}

$time = time();

	$data = json_decode(file_get_contents('php://input'), true);	
$data['user_id'] = $user_id;
$data['product_style_id'] = $_SESSION['product_style_id'];
$data['product_color_id'] = $_SESSION['product_color_id'];

$data['front_data'] = json_encode($_SESSION['alljson'], JSON_UNESCAPED_UNICODE );
$data['back_data'] = json_encode($_SESSION['alljson2'], JSON_UNESCAPED_UNICODE );

$data['front_design'] = '{"objects":'.json_encode($_SESSION['alljsonfront'], JSON_UNESCAPED_UNICODE ).'}';
$data['back_design'] = '{"objects":'.json_encode($_SESSION['alljsonback'], JSON_UNESCAPED_UNICODE ).'}';

$data['base_price'] = $_POST['base_price'];
$data['salegole_unit'] = $_POST['salegole_unit'];
$data['sale_price'] = $_POST['sale_price'];



$data['campaign_title'] = $_POST['campaign_title'];
$data['campaign_description'] = $_POST['campaign_description'];
$data['campaign_category_id'] = $_POST['campaign_category_id'];
$data['subcategory_id'] = $_POST['subcategory_id'];
$data['campaign_length'] = $_POST['campaign_length'];
$data['show_back_first'] = $_POST['show_back_first'];
$data['url'] = $_POST['url'];

$data['front_image'] = $uniqidall . '_front.png';
$data['back_image'] = $uniqidall . '_back.png';

$data['front_design_image'] = $uniqidall . '_front3.png';
$data['back_design_image'] = $uniqidall . '_back3.png';

$data['adddate'] = $time;

$data['enddate'] = strtotime('+'.$data['campaign_length'].' days', $time);


	if($this->campaigns_model->Checkurl($data) != 1){
$this->campaigns_model->Launch($data);

$success = file_put_contents($file, $data1);
$success2 = file_put_contents($file2, $data2);
$success3 = file_put_contents($file3, $data3);
$success4 = file_put_contents($file4, $data4);


unset($_SESSION['alljson']);
unset($_SESSION['alljson2']);
unset($_SESSION['alljsonfront']);
unset($_SESSION['alljsonback']);

	}else{
		echo '1';
	}


}

	}





}
