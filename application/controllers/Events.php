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

		$filter = $this->input->post('filter_by');
		
		$this->load->library('pagination');
		$limit = 20;	
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

		if($filter =="today" || $filter =="tomorrow" || $filter =="thisweek" || $filter =="nextweek"|| $filter =="thismonth" || $filter =="thisyear"){

			 $search_data = $this->events_model->get_search_events($filter,$limit,$start);
		     $this->data['events'] = $search_data;

		}elseif($filter=="allevents"){

			$this->data['events'] = $this->events_model->get_events($limit,$start);
			
		}else{

			$this->data['events'] = $this->events_model->get_events($limit,$start);
		}
		$this->data['links'] = $this->pagination->create_links();
		$this->layout->view('frontend/events/events',$this->data);
	}
	public function details($id='')
	{	
		
	$this->data['events'] = $this->events_model->get_events_by_id($id);
		
	$address = $this->data['events']['location']; // Google HQ


	$location = get_google_map_address($address);

	

	/* $this->data['lati']= $location['lati'];

	$this->data['longi']= $location['longi']; 

	$this->data['formatted_address'] = $location['formatted_address'];*/

    $address = urlencode($address);
    
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 	
    if($resp['status']=='OK'){

    // get the important data
    $this->data['lati'] = $resp['results'][0]['geometry']['location']['lat'];

    $this->data['longi'] = $resp['results'][0]['geometry']['location']['lng'];

    $this->data['formatted_address'] = $resp['results'][0]['formatted_address'];

    } 


    $this->layout->view('frontend/events/detail',$this->data);

	}

	public function view(){


	    $this->load->library('pagination');
		$limit = 5;	
		$config['base_url'] = base_url()."events/view/";
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
		$this->data['eventsdata'] = $this->events_model->get_events($limit,$start);

		$this->data['links'] = $this->pagination->create_links();

	    $this->layout->view('frontend/events/all_detail',$this->data);

	 
	}

	/* public function delete_cookies(){

		$this->load->helper('cookie');

		unset($_COOKIE['name']);
        //empty value and expiration one hour before
        $res = setcookie('name', '', time() - 3600);
       
		//unset($_COOKIE['name']);
		
	} */

}
