<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");

class Home extends Admin_Controller {

	public function index()
	{
		//echo base_path();
		$this->layout->view('frontend/home/index');
	}
	public function login()
	{
		$this->layout->view('frontend/home/login');
	}
}
