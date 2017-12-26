<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");


class News extends Admin_Controller {

	function __construct()
	{
		 parent::__construct();
   		$this->load->model('news_model');
	}
	public function details($id='')
	{	
		
	$this->data['newsdata'] = $this->news_model->get_news_by_id($id);
	
    $this->layout->view('frontend/news/detail',$this->data);

	}
	public function view(){

	 $this->data['newsdata'] = $this->news_model->get_news();

	 $this->layout->view('frontend/news/all_detail',$this->data);

	 
	}

}
