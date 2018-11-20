<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends MY_Controller{


public function __construct()
        {
                parent::__construct();
              $this->load->model('web/stores_model');
        }


	public function index($id)
	{

$data['storedata'] =  $this->stores_model->Getstorescampaign($id);


foreach ($this->stores_model->Getstorestitle($id) as $row)
{
       $data['storetitle'] = $row['stores_title'];
       $data['title'] = $row['stores_title'];

}

		
		$this->web('web/stores',$data);
	}


}