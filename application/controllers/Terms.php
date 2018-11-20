<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends MY_Controller{



	public function index()
	{
		$data['title'] = 'Terms';
		$this->web('web/terms',$data);
	}




}