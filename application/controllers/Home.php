<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");


class Home extends Admin_Controller {

	function __construct()
	{
		 parent::__construct();
   		$this->load->model('services_product_model');
	}

	public function index()
	{
		$this->data["editdata"] =$this->services_product_model->get_services();
		$this->layout->view('frontend/home/index',$this->data);
	}

	public function services()
	{	
		$this->data["editdata"] =$this->services_product_model->get_services();
		$this->layout->view('frontend/home/services',$this->data);
	}
	
	public function details($id='')
	{
		$this->data["service_row"] = $this->services_product_model->unique($id);
		$this->layout->view('frontend/home/detail',$this->data);
	}

	public function login()
	{
		$this->layout->view('frontend/home/login');
	}

	public function register()
	{
		$this->layout->view('frontend/home/signup');
	}

	public function contact()
	{
		$this->layout->view('frontend/home/contact');
	}

	public function events()
	{
		$this->layout->view('frontend/home/events');
	}
	public function about()
	{
		$this->layout->view('frontend/home/about');
	}
	
	

}
