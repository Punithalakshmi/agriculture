<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");


class Home extends Admin_Controller {

	function __construct()
	{
		 parent::__construct();
   		$this->load->model('services_product_model');
	}

	public function index()
	{
		$this->data["editdata"] =$this->services_product_model->get_services();
		$this->layout->view('frontend/home/index',$this->data);
	}
	public function contact()
	{ 	
			$this->form_validation->set_rules('contact_name','Contact Name','trim|required');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('phone','Phone Number','trim|required');
			$this->form_validation->set_rules('message','Message','trim|required');

			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

			if($this->form_validation->run())
  			{  
				$form = $this->input->post();
				 $to = "mahendran@izaaptech.in";
              $from = $form['email'];
              $from_name = $form['contact_name'];
              $subject = "Contact information";
              $message = "<html>
                            <body>
                              <table width=100% border=1>
                                <thead>
                                  <th><b>Contact Details</b><th>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><b>Name</b></td>
                                    <td>".$from_name."</td>
                                  </tr>
                                  <tr>
                                    <td><b>Email</b></td>
                                    <td>".$to."</td>
                                  </tr>
                                  <tr>
                                    <td><b>Phone</b></td>
                                    <td>".$form['phone']."</td>
                                  </tr>
                                  <tr>
                                    <td><b>Message</b></td>
                                    <td>".$form['message']."</td>
                                  </tr>
                                </tbody>
                            </body>
                          </html>";
              send_email($to,$from,$from_name,'',$subject,$message);
              $this->session->set_flashdata("success_msg","Contact has been sent successfully.");
              redirect('home/contact/');
			}

		$this->layout->view('frontend/home/contact');
	}

	public function about()
	{
		$this->layout->view('frontend/home/about');
	}
	
	

}
