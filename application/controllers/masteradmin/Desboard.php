<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desboard extends MY_Controller{


	public function index()
	{
		$data['title'] = 'Desboard';
		$data['tabmenu'] = 'desboard';
		$this->masteradmin('masteradmin/desboard',$data);
	}
}
