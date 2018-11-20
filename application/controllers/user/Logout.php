<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller{


public function __construct()
        {
parent::__construct();
$this->CI = & get_instance();
$this->CI->load->library('session');
if(!isset($_SESSION['user_id'])){
exit;
 }
        }


	public function index()
	{
	$this->CI->session->sess_destroy();
	header('Location: '.$this->base_url.'/');

	}





    }