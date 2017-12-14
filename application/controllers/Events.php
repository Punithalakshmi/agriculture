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
		
		$this->load->library('pagination');
		$limit = 3;	
		$config['base_url'] = base_url()."events/index/";
		$config['per_page'] = $limit;
		$start = $this->uri->segment(3)?$this->uri->segment(3):0;
		$config['total_rows'] = $this->db->get('events')->num_rows();

		$config['first_tag_open'] = '<li class="waves-effect">';
        $config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active green"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="waves-effect">';
        $config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$this->data['events'] = $this->events_model->get_events($limit,$start);
		$this->data['links'] = $this->pagination->create_links();
		$this->layout->view('frontend/events/events',$this->data);
	}
	public function details($id='')
	{	
		
		
		$this->data['events'] = $this->events_model->get_events_by_id($id);
		
		$this->layout->view('frontend/events/detail',$this->data);
	}

}
