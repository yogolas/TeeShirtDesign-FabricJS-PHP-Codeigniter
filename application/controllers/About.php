<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller{





	public function index()
	{
		$data['title'] = 'About';
		$this->web('web/about',$data);
	}





}