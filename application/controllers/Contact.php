<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller{



	public function index()
	{
		$data['title'] = 'Contact';
		$this->web('web/contact',$data);
	}




}