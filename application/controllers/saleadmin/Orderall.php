<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderall extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('saleadmin/orderall_model');
$this->load->library('email');
 $this->CI = & get_instance();
$this->CI->load->library('session');
if(!isset($_SESSION['system_id'])){
exit;
 }

        }


	public function index()
	{
		$data['title'] = 'รายการสั่งซื้อ';
		$this->saleadmin('saleadmin/orderall',$data);
	}



	
	public function Getorder()
	{	
	echo $this->orderall_model->Getorder();
	}



public function Okthispayment()
	{
		$data = json_decode(file_get_contents('php://input'), true);
$this->orderall_model->Okthispayment($data);

$detail = $this->orderall_model->Getorderdetail($data);

foreach ($detail as $value) {

$data2['product_style_id'] = $value['product_style_id'];
$data2['product_color_id'] = $value['product_color_id'];
$data2['product_size_id'] = $value['product_size_id'];
$data2['qty'] = $value['qty'];
$data2['campaign_id'] = $value['campaign_id'];

$data3['user_id'] = $value['user_id'];
$data3['profit'] =  $value['qty'] * ($value['sale_price'] - $value['base_price']);

$data4['user_id'] = $value['user_id'];
$data4['salenum_all'] = $value['qty'];

$this->orderall_model->Orderdelstock($data2);

$this->orderall_model->Addsaleunitcampaign($data2);

$this->orderall_model->Addprofit($data3);
$this->orderall_model->Addsalenumall($data4);


}


		
	}

	public function Myorder()
	{	
		$data = json_decode(file_get_contents('php://input'), true);
	echo $this->orderall_model->Myorder($data);
	}



	public function Sendmail()
	{	


$to = 'rr@gg.com';
	$subject = 'Welcome To Tee?';
	$data = "

	<table width='100%'>
<tr><td></td width='33%'>

<td width='33%' style='font-size:20px;'>
<center>	
<h1>
Welcome to Teespring!
</h1>
</center>
Teespring is a platform that allows you to create and sell custom apparel with no cost, risk, or hassle. All you need is a great idea, and we'll handle the rest - from production and manufacturing, to supply chain logistics, and customer service.
Who uses Teespring?
Everyone! People use Teespring to do extraordinary things like power their apparel business, raise money for causes, and more. Here's a quick video 

</td>

<td width='33%'></td>
</tr>

</table>
	";

$this->sendmailfunc($to,$subject,$data);


	}




}

