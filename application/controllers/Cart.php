<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller{


public function __construct()
        {
                parent::__construct();

               $this->load->model('web/shop_model');
             $this->CI = & get_instance();
$this->CI->load->library('session');
        }


	public function index()
	{

		$data['title'] = 'Cart';
		$this->web('web/cart',$data);
	}


	public function payment()
	{

		if(!isset($_SESSION['listbuy'])){
			header('Location: '.$this->base_url.'/cart');
		}

		$data['banklist'] = $this->shop_model->Getbanklist();

		$data['title'] = 'PAYMENT';
		$this->web('web/payment',$data);
	}



	public function Paymentsubmit()
	{
$data = json_decode(file_get_contents('php://input'), true);

if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
}else{
	$user_id = '0';
}


$order_number = uniqid();
$time = time();

$dataheader['email'] 		= $data['email'];
$dataheader['name'] 		= $data['name'];
$dataheader['address'] 		= $data['address'];
$dataheader['province']		= $data['province'];
$dataheader['country_name'] = $data['country_name'];
$dataheader['zipcode']		= $data['zipcode'];
$dataheader['tel'] 			= $data['tel'];
$dataheader['shipping'] 	= $data['shipping'];
$dataheader['order_numall'] = $data['order_numall'];
$dataheader['price_all'] 	= $data['price_all'];
$dataheader['paymentcheck'] = $data['paymentcheck'];
$dataheader['adddate'] 		= $time;
$dataheader['user_id'] 		= $user_id;
$dataheader['order_number'] = $order_number;

$datadetail['order_number'] = $order_number;
$datadetail['adddate'] 		= $time;
$datadetail['user_id'] 		= $user_id;






for($i=1;$i<=count($data['listbuy']);$i++){


if($i==1){
	$dataheader['campaign_id'] = $data['listbuy'][$i-1]['campaign_id'];
	$this->shop_model->Paymentsubmitheader($dataheader);
}

$datadetail['campaign_id'] = $data['listbuy'][$i-1]['campaign_id'];
$datadetail['product_style_id'] = $data['listbuy'][$i-1]['product_style_id'];
$datadetail['product_color_id'] = $data['listbuy'][$i-1]['product_color_id'];
$datadetail['product_size_id'] = $data['listbuy'][$i-1]['product_size_id'];
$datadetail['qty'] = $data['listbuy'][$i-1]['qty'];
$datadetail['price'] = $data['listbuy'][$i-1]['price'];


$this->shop_model->Paymentsubmitdetail($datadetail);
}


$txt = "";
for($i=1;$i<=count($data['listbuy']);$i++){

$txt .= "<tr><td width='33%'><img src='".$data['listbuy'][$i-1]['front_image']."' width='80px'></td>";
$txt .= '<td width="33%"><b>'.$data['listbuy'][$i-1]['qty'].' '.$data['listbuy'][$i-1]['sizename'].' '.$data['listbuy'][$i-1]['campaign_title'].'</b></td>';
$txt .= "<td width='33%' align='right'>".number_format($data['listbuy'][$i-1]['qty'] * $data['listbuy'][$i-1]['price'])."</td></tr>";
}


$to = $data['email'];
	$subject = 'Your Omerka Order';
	$data = "
<html>
<head>
<title>HTML email</title>
</head>
<body>

	<table width='100%'>
<tr><td width='33%'></td>

<td width='33%'>
<center>	
<h1>
Thank You For Your Purchase!
</h1>
<h1>Order Number: <a href='".$this->base_url."/track/order/".$order_number."' target='_blank'>".$order_number."</h1>
</center>



<div style='background-color:#4dfef6;'>

<table width='100%'>
<tr>
<td width='5%'></td>
<td width='90%'>
<b>Shipping Address</b>
<br />
".$data['name']." <br />
".$data['address']." <br />
".$data['province']."  ".$data['zipcode']." <br />
 ".$data['country_name']."
</td>
<td width='5%'></td>
</tr>
</table>



</div>





</td>

<td width='33%'></td>


</tr>


<tr>
<td width='33%'></td>
<td width='33%'>

<table width='100%'>
".$txt."
<tr>
<td colspan='2'>Shipping</td>
<td align='right'>".$data['shipping']."</td>
</tr>

<tr>
<td colspan='2'><b>Total</b></td>
<td align='right'>".number_format($data['price_all'] + $data['shipping'])."</td>
</tr>

</table>

</td>
<td width='33%'></td>
</tr>

</table>

<body>
<html>
	";

$this->sendmailfunc($to,$subject,$data);




unset($_SESSION['listbuy']);
	}



public function Ordersuccess()
	{

		$data['title'] = 'Order Success';
		$this->web('web/ordersuccess',$data);
	}







}