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
        $this->data['plans'] = array();
        $this->data['plans'] = '';
		
	}

    public function index()
    {
          
          $this->data['plans'] = get_plans_all();

          $this->layout->view('frontend/registration/signup',$this->data);
    }

    /**
    * To handeles the new account registration
    */
    public function createnew_account(){

          
          $this->form_validation->set_rules('first_name','First Name','trim|required');
          $this->form_validation->set_rules('last_name','Last Name','trim|required');
          
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[seller.email]');
         
          $this->form_validation->set_rules('address','Address','trim|required');
          
          $this->form_validation->set_rules('city','City','trim|required');

          $this->form_validation->set_rules('zip', 'Zib','trim|max_length[8]|integer', ['integer'=>'Invalid ZIP']);
          $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]');   
          
          $this->form_validation->set_rules('password','Password','trim|required');  
            
          $this->form_validation->set_error_delimiters('', '');

          if($this->form_validation->run()){

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
             

              $this->session->set_flashdata('success_msg', 'Registration completed successfully');

              redirect('login'); 
          }

          $this->data['plans'] = get_plans_all();
          
          $this->layout->view('frontend/registration/signup',$this->data);

         }
        
       
    
}
