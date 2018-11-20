<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderall extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('ordershipping/orderall_model');
               $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Campaign Shipping';
		$this->ordershipping('ordershipping/orderall',$data);
	}



	public function Getcampaign()
	{	
	echo $this->orderall_model->Getcampaign();
	}


	public function Getcampaignprocess()
	{	
	echo $this->orderall_model->Getcampaignprocess();
	}


public function Okthisprocess()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->orderall_model->Okthisprocess($data);
		
	}


public function Okthisprocesssuccess()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->orderall_model->Okthisprocesssuccess($data);



		$email = $this->orderall_model->Getordershiping($data);

foreach ($email as $value) {
	
$emails = $value['email'];
$data2['order_number'] = $value['order_number'];



$getorder = $this->orderall_model->Getordershiping2($data2);

$txt = "";
foreach ($getorder as $value2) {
	
$txt .= "<tr><td width='33%'><img src='".$this->base_url."/tmp/".$value2['front_image']."' width='80px'></td>";
$txt .= '<td width="33%"><b>'.$value2['qty'].' '.$value2['sizename'].' '.$value2['campaign_title'].'</b></td>';
$txt .= "<td width='33%' align='right'>".number_format($value2['qty'] * $value2['price'])."</td></tr>";

}



	$to = $emails;
	$subject = 'Your Omerka order has been shipped!';
	$dataemail = "
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
Your Products Have Shipped!
</h1>
<h1>Order Number: <a href='".$this->base_url."/track/order/".$value['order_number']."' target='_blank'>".$value['order_number']."</h1>
</center>



<div style='background-color:#4dfef6;'>

<table width='100%'>
<tr>
<td width='5%'></td>
<td width='90%'>
<b>Shipping Address</b>
<br />
".$value['name']." <br />
".$value['address']." <br />
".$value['province']."  ".$value['zipcode']." <br />
 ".$value['country_name']."
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
<td align='right'>".$value['shipping']."</td>
</tr>

<tr>
<td colspan='2'><b>Total</b></td>
<td align='right'>".number_format($value['price_all'] + $value['shipping'])."</td>
</tr>

</table>

</td>
<td width='33%'></td>
</tr>

</table>

<body>
<html>
	";

$this->sendmailfunc($to,$subject,$dataemail);
		
	}


}




public function Openorder()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->orderall_model->Openorder($data);
		
	}


public function Openodno()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->orderall_model->Openodno($data);
		
	}



public function Okthisdetailpackok()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		echo $this->orderall_model->Okthisdetailpackok($data);
		
	}






	}




