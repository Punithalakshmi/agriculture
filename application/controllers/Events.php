<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");


class Events extends Admin_Controller {

	function __construct()
	{
		 parent::__construct();
   		$this->load->model('events_model');
	}

	public function index()
	{
		//$this->data["editdata"] =$this->services_product_model->get_services();
		$this->layout->view('frontend/home/events',$this->data);
	}
	

}
