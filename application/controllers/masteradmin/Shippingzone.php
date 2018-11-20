<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shippingzone extends MY_Controller{

 public function __construct()
        {
                parent::__construct();
              $this->load->model('masteradmin/shippingzone_model');
                            $this->CI = & get_instance();
$this->CI->load->library('session');
              if(!isset($_SESSION['system_id'])){
exit;
 }
        }




public function Getlist()
	{	
	echo $this->shippingzone_model->Getlist();
	}

	

}
