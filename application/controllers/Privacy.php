<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends MY_Controller{


	public function index()
	{
		$data['title'] = 'Privacy';
		$this->web('web/privacy',$data);
	}



}