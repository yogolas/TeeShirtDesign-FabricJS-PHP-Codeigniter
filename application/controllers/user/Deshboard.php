<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deshboard extends MY_Controller{


public function __construct()
        {
                parent::__construct();
               
              $this->load->model('user/deshboard_model');
              $this->CI = & get_instance();
$this->CI->load->library('session');
if(!isset($_SESSION['user_id'])){
exit;
 }
        }


	public function index()
	{
		$data['title'] = 'Deshboard';
		$this->user('user/deshboard',$data);
	}

}