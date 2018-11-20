<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MY_Controller{



	public function index()
	{
		$data['title'] = 'Jobs';
		$this->web('web/jobs',$data);
	}




}