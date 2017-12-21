<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* File Name         : Registration.php
* Description       : 
* Author            : Saravanan, Sathish <sats1140@gmail.com>,
**/
require_once(COREPATH."controllers/Admin_controller.php");

class Registration extends Admin_Controller {

	/**
	 * Index Page for this controller.
	 */
	function __construct(){
		parent::__construct();
        $this->load->model('seller_model');
        $this->load->model('country_model');
        $this->load->model('state_model');
        $this->load->model('services_model');
        $this->data['plans'] = array();
        $this->data['plans'] = '';
		
	}

    public function index()
    {

          
          $this->layout->add_javascripts(array('jquery.validate'));

          $this->layout->add_javascripts(array('materialize-stepper.min'));
          
          $this->layout->add_stylesheets(array('materialize-stepper.min'));
          //$this->layout->add_stylesheets(array('materialize-stepper.min));
          
          $this->data['plans'] = get_plans_all();

          $this->layout->view('frontend/registration/signup',$this->data);
    }

    /**
    * To handeles the new account registration
    */
    public function createnew_account(){

            
            if($this->input->post('plans')){

              $ins_data = array();
              $ins_data['first_name']              = $this->input->post('first_name');
              $ins_data['last_name']                = $this->input->post('last_name');
             
              $password                      =  $this->input->post('password');
            if($password){
               $ins_data['password']     = md5($password);
              }
              $ins_data['address']           = $this->input->post('address');  
              $ins_data['email']        = $this->input->post('email');
              $ins_data['address2']               = $this->input->post('address2');
              $ins_data['city']          = $this->input->post('city');
              $ins_data['country_id']          = $this->input->post('country_id');
              $ins_data['state_id']          = $this->input->post('state_id');
              $ins_data['zip']                     = $this->input->post('zip');
              $ins_data['phone']      = $this->input->post('phone');
              $ins_data['plan_id']    = $this->input->post('plans');
              $ins_data['created_on'] = date('Y-m-d H:i:s');
              
              $new_id                   = $this->seller_model->insert($ins_data); 
             }

             if($this->input->post('company_name')){

              $seller_id = $new_id;

              $ins_data = array();
              $ins_data['company_name']          = $this->input->post('company_name');
              $ins_data['website']               = $this->input->post('website');
              $ins_data['description']           = $this->input->post('description'); 
              $ins_data['experience_type']         = $this->input->post('experience_type');
              $ins_data['experience_id']         = $this->input->post('experience_id');
              $ins_data['primary_service_category']           = $this->input->post('primary_service_category');
              $ins_data['other_related_category']           = $this->input->post('other_related_category');
              $ins_data['qualification_id']           = $this->input->post('qualification_id'); 
              $ins_data['seller_id']             = $seller_id;

              

               $ins_data['created_on'] = date('Y-m-d H:i:s');
               $new_id                   = $this->services_model->insert($ins_data);

               $this->session->set_flashdata('success_msg', 'Registration completed successfully');
               redirect('login');  
            }

          $this->layout->view('frontend/registration/signup');

         }
        
       
    
}
