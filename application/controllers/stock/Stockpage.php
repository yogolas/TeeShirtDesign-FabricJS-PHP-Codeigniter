<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stockpage extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('stock/stockpage_model');
               $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Stock Page';
		$this->stock('stock/stockpage',$data);
	}


public function Getstockheader()
	{	
		$data = json_decode(file_get_contents('php://input'), true);
	$this->stockpage_model->Getstockheader($data );
	}

	public function Getstylelist()
	{	
	echo $this->stockpage_model->Getstylelist();
	}



public function Stylecolorlist()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->stockpage_model->Stylecolorlist($data);
		
	}


	public function Stylesizelist()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->stockpage_model->Stylesizelist($data);
		
	}


		public function Savestock()
	{
$data = json_decode(file_get_contents('php://input'), true);	
$runno = time();
		foreach($data['listadd'] as $row)
{

	if($row['product_style_id']!='0' && $row['product_size_id']!='0' && $row['product_color_id']!='0')

	{
        $row['runno'] = $runno;
        $row['adddate'] = $runno;
        $this->stockpage_model->Savestockdetail($row);

$datastockall =  $this->stockpage_model->Checkstockall($row);

echo $datastockall;

$row2['product_style_id'] = $row['product_style_id'];
$row2['product_size_id'] = $row['product_size_id'];
$row2['product_color_id'] = $row['product_color_id'];
$row2['product_num_all'] = $row['product_num'];

$row3['product_style_id'] = $row['product_style_id'];
$row3['product_size_id'] = $row['product_size_id'];
$row3['product_color_id'] = $row['product_color_id'];
$row3['product_num'] = $row['product_num'];

if($datastockall == '0'){

	$this->stockpage_model->Addstockall($row2);
}else if($datastockall == '1'){
	$this->stockpage_model->Updatestockall($row3);
}else{
	echo '';
}


}





}


if($data['product_num_all']!='0'){
$data2['product_num_all'] = $data['product_num_all'];
$data2['runno'] = $runno;
$data2['remark'] = $data['remark'];
$data2['adddate'] = $runno;
$this->stockpage_model->Savestockheader($data2);
}

		
	}





	public function Deletestockheader()
	{
		$data = json_decode(file_get_contents('php://input'), true);

$list = $this->stockpage_model->Getstockdetailrunno($data);

foreach($list as $row){

$datalist['product_style_id'] = $row->product_style_id;
$datalist['product_color_id'] = $row->product_color_id;
$datalist['product_size_id'] = $row->product_size_id;
$datalist['product_num'] = $row->product_num;
$this->stockpage_model->Updatedeletestockall($datalist);

}



		$this->stockpage_model->Deletestockheader($data);
		$this->stockpage_model->Deletestockdetail($data);
		
	}



public function Openrunnolist()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->stockpage_model->Openrunnolist($data);
		
	}




}