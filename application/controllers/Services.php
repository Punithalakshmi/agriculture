<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");


class Services extends Admin_Controller {

	function __construct()
	{
		 parent::__construct();
   		$this->load->model('services_product_model');
   		$this->load->model('category_model');
	}

	public function index($id='')
	{	
		$this->load->library('pagination');
		$limit = 5;
		$config['base_url'] = base_url()."services/index/";
		$config['per_page'] = $limit;
		$start = $this->uri->segment(3)?$this->uri->segment(3):0;
		$config['total_rows'] = $this->db->get('services')->num_rows();
		$config['first_tag_open'] = '<li class="waves-effect">';
        $config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active green"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="waves-effect">';
        $config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$this->data['editdata'] = $this->services_product_model->get_services($limit,$start);
		$this->data['links'] = $this->pagination->create_links();
		$this->data["category"] = $this->category_model->get_category();
		$this->layout->view('frontend/home/services',$this->data);
	}
	
	public function details($id='')
	{	
		$this->data["service_row"] = $this->services_product_model->unique($id);
		$category_id = $this->data["service_row"]["category_id"];
		$this->data["related_product"] = $this->services_product_model->get_related($category_id);
		$this->layout->view('frontend/home/detail',$this->data);
	}

}
