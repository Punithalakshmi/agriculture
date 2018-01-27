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

	public function index()
	{	$this->layout->add_javascripts(array('jquery.min'));
		if ( $this->session->userdata('var_search_term'))
		{
             $search_term=$this->session->userdata('var_search_term'); 
        }
        else
        {
              $search_term ='';
        }
		$this->load->library('pagination');
		$limit = 5;
		$start = $this->uri->segment(3)?$this->uri->segment(3):0;
		$retdata= $this->services_product_model->filter_search($limit,$start,$search_term);
		
		$config['base_url'] = base_url()."services/index/";
		$config['per_page'] = $limit;
		$config['total_rows'] = $retdata['count'];
		$config['first_tag_open'] = '<li class="waves-effect">';
        $config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active green"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="waves-effect">';
        $config['next_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
	   	$this->data['editdata'] = $retdata['data'];
		$this->data['links'] = $this->pagination->create_links();
		$this->data["category"] = $this->category_model->get_category();
		$this->layout->view('frontend/home/services',$this->data);
	}

	function show_search($id='')
	{ 	
		$search_term = array();
       if (empty($_POST))
       {
         $search_term['category'] = $id;
       }
       else
       {  
           	$search_term['category'] = $this->input->post('category');
   			$search_term['location'] = $this->input->post('location');
			$search_term['keyword']  =  $this->input->post('keyword');

       }
       $this->session->set_userdata('var_search_term', $search_term);
       redirect('services/index');
	}
	
	public function details($id='')
	{	
		$data= $this->services_product_model->get_product_service($id);

		$this->data["service_row"] = $data['service']; 

		$this->data["related_product"] = $data['related'];

		$this->layout->view('frontend/home/detail',$this->data);
	}

	 public function clear_records()
	{
		$this->session->unset_userdata('var_search_term');
		redirect('services');
	}
     
     function weather()
     {  
     			$city = $this->input->post('city');
     			$country = $this->input->post('country_name');
     			// print_r($country); exit;
				$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&APPID=da7f37c0af468057b3501d021fbd6c0f";

                $json=file_get_contents($url); 

                //$manage = (array) json_decode($json);

                //json_encode($manage['weather'][0]->main);
                //print_r($manage['weather'][0]->main);exit;
                 echo $json;
    			 exit;
     }         
                          
}
