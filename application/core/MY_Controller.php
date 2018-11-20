<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


    public function __construct()
        {
                parent::__construct();
                $this->load->database();
               $this->base_url = 'http://cus2mer.co/tee';

        }




	public function web($view,$data)
	{
		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/web/header',$data);
		$this->load->view('layout/web/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/web/right',$data);
		$this->load->view('layout/web/footer',$data);
	}


	public function market($view,$data)
	{
		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/web/header',$data);
		$this->load->view('layout/market/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/market/right',$data);
		$this->load->view('layout/web/footer',$data);
	}


	public function user($view,$data)
	{
		$this->CI = & get_instance();
$this->CI->load->library('session');

if(!isset($_SESSION['user_id'])){
	header('Location: '.$this->base_url.'/');
}

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/user/header',$data);
		$this->load->view('layout/user/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/user/right',$data);
		$this->load->view('layout/user/footer',$data);
	}


	public function saleadmin($view,$data)
	{

if(isset($_SESSION['system_id']) && $_SESSION['system_id']=='3'){

		$this->CI = & get_instance();
$this->CI->load->library('session');


		$data['base_url'] = $this->base_url;
		$this->load->view('layout/saleadmin/header',$data);
		$this->load->view('layout/saleadmin/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/saleadmin/right',$data);
		$this->load->view('layout/saleadmin/footer',$data);
	}else{
			header('Location: '.$this->base_url.'/');
}



	}


	public function checkdesign($view,$data)
	{
		if(isset($_SESSION['system_id']) && $_SESSION['system_id']=='4'){

		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/checkdesign/header',$data);
		$this->load->view('layout/checkdesign/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/checkdesign/right',$data);
		$this->load->view('layout/checkdesign/footer',$data);

		}else{
			header('Location: '.$this->base_url.'/');
}


	}

	public function orderprocess($view,$data)
	{

		if(isset($_SESSION['system_id']) && $_SESSION['system_id']=='5'){

		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/orderprocess/header',$data);
		$this->load->view('layout/orderprocess/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/orderprocess/right',$data);
		$this->load->view('layout/orderprocess/footer',$data);

		}else{
			header('Location: '.$this->base_url.'/');
}


	}


		public function orderpackaging($view,$data)
	{

		if(isset($_SESSION['system_id']) && $_SESSION['system_id']=='6'){

		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/orderpackaging/header',$data);
		$this->load->view('layout/orderpackaging/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/orderpackaging/right',$data);
		$this->load->view('layout/orderpackaging/footer',$data);

		}else{
			header('Location: '.$this->base_url.'/');
}


	}


		public function ordershipping($view,$data)
	{

		if(isset($_SESSION['system_id']) && $_SESSION['system_id']=='7'){

		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/ordershipping/header',$data);
		$this->load->view('layout/ordershipping/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/ordershipping/right',$data);
		$this->load->view('layout/ordershipping/footer',$data);

		}else{
			header('Location: '.$this->base_url.'/');
}


	}


		public function ordershipped($view,$data)
	{

		if(isset($_SESSION['system_id']) && $_SESSION['system_id']=='7'){

		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/ordershipped/header',$data);
		$this->load->view('layout/ordershipped/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/ordershipped/right',$data);
		$this->load->view('layout/ordershipped/footer',$data);

		}else{
			header('Location: '.$this->base_url.'/');
}


	}








	public function masteradmin($view,$data)
	{

if(isset($_SESSION['system_id']) && $_SESSION['system_id']=='1'){

		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/masteradmin/header',$data);
		$this->load->view('layout/masteradmin/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/masteradmin/right',$data);
		$this->load->view('layout/masteradmin/footer',$data);

		}else{
			header('Location: '.$this->base_url.'/');
}


	}

	public function stock($view,$data)
	{

if(isset($_SESSION['system_id']) && $_SESSION['system_id']=='2'){

		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/stock/header',$data);
		$this->load->view('layout/stock/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/stock/right',$data);
		$this->load->view('layout/stock/footer',$data);

		}else{
			header('Location: '.$this->base_url.'/');
}


	}




	public function payoutsadmin($view,$data)
	{

		if(isset($_SESSION['system_id']) && $_SESSION['system_id']=='100'){

		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/payoutsadmin/header',$data);
		$this->load->view('layout/payoutsadmin/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/payoutsadmin/right',$data);
		$this->load->view('layout/payoutsadmin/footer',$data);

		}else{
			header('Location: '.$this->base_url.'/');
}


	}


public function admindeshboard($view,$data)
	{


		$this->CI = & get_instance();
$this->CI->load->library('session');

		$data['base_url'] = $this->base_url;
		$this->load->view('layout/admindeshboard/header',$data);
		$this->load->view('layout/admindeshboard/left',$data);
		$this->load->view($view,$data);
		$this->load->view('layout/admindeshboard/right',$data);
		$this->load->view('layout/admindeshboard/footer',$data);




	}





	public function sendmailfunc($to,$subject,$data)
	{	
ob_start();

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: noreply@omerka.com\r\n"; 
	$Send = mail($to,$subject,$data,$headers);  // @ = No Show Error //
	if($Send)
	{

	}
	else
	{

	}
	


	}







}
