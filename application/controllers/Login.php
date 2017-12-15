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
  public function logout()
  {
     
    $this->session->sess_destroy();
  
      $this->session->set_flashdata('logout_success','logged out successfully');
  
    redirect('login');
  }

  public function forgot_password(){

    //$this->load->helper('mail');

    $this->form_validation->set_rules('email','Email','trim|required'); 

    if($this->form_validation->run())
      {
            $email = $this->input->post('email');

            $chk = email_is_exist($email);
            if($chk)
            {   

              $data = $this->login_model->get_customer_email($email);

              $mail_data['from'] = "sats1140@gmail.com";
              
              $mail_data['from_name'] = "Sathish";

              $mail_data['to'] = $data[0]->email;

              $mail_data['to_name'] = $data[0]->first_name . ' ' . $data[0]->last_name;

              $data['from_name'] = $data[0]->first_name . ' ' . $data[0]->last_name;

              $url = base_url().'/login/reset_password/'. encrypt_data($email,'ADS908732K69908UJMaads6869ADSF-8*AJO');
             

              $mail_data['subject'] = "Password reset request";
              // Get content from common mail helper library
              $mail_data['content'] = content_forgot_password($url);
              // Send  an Email to user
              $mail_result = send_mail($mail_data);

             if ($mail_result) {

                    $this->session->set_flashdata('success', 'Password reset mail has been sent to your mail. Please follow the steps mentioned in the mail.');
                      
              } else {
                    $this->session->set_flashdata('error_msg', 'Password reset mail could not be sent to your mail. Please try again.');   
              } 
            }
            else
            {

              $this->session->set_flashdata("error_msg","Email not exist");
            }
            
        }

    $this->layout->view('frontend/login/forgot_password');
  }


  public function reset_password($email){

      $encrypted_email = $email;
        // Encrypt user email id
      $form_data['encrypted_email'] = $encrypted_email;

      $email = decrypt_data($email, 'ADS908732K69908UJMaads6869ADSF-8*AJO');
      
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

     if ($this->form_validation->run()) {

      $password = m5($this->input->post('password'));

      $result = $this->login_model->update_password_by_email($password, $email);
      if ($result) {

            $this->session->set_flashdata('success', 'Password has been changed successfully');
      } else {

          $this->session->set_flashdata('error', 'Password could not be changed.');
      }
      }

      $this->layout->view('frontend/login/reset_password',$form_data);
   }

}
