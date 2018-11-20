<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller{


 public function __construct()
        {
                parent::__construct();
              $this->load->model('user/message_model');
              $this->CI = & get_instance();
$this->CI->load->library('session');
if(!isset($_SESSION['user_id'])){
exit;
 }
        }



	public function index()
	{
		$data['title'] = 'Message';
		$data['tabmenu'] = 'message';
		$this->user('user/message',$data);
	}


}