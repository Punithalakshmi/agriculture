<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* File Name         : Login.php
* Description       : 
* Author            : Saravanan, Sathish <sats1140@gmail.com>,
**/
require_once(COREPATH."controllers/Admin_controller.php");

class Login extends Admin_Controller {
	/**
	 * Index Page for this controller.
	 */
	function __construct(){
		parent::__construct();
        $this->load->model('seller_model');
        $this->load->model('login_model');
	}
  public function index()
  {

       $this->form_validation->set_rules('email','Email','trim|required'); 
       $this->form_validation->set_rules('password','Password','trim|required'); 

       $this->form_validation->set_error_delimiters('', '');

       if($this->form_validation->run())
        {
            $form = $this->input->post();
            $chk = $this->login_model->login1($form['email'], $form['password']);
            if($chk)
            {   
                 redirect("profile"); 
            }
            else
            {

              $this->session->set_flashdata("error_msg","Invalid Username or Password");
            }
            
        }

       $this->layout->view('frontend/login/login');
        
    } 

}
