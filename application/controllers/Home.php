<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");


class Home extends Admin_Controller {

	function __construct()
	{
		 parent::__construct();
   		$this->load->model('services_product_model');
      $this->load->model('news_model');
      $this->load->model('feedback_model');
      $this->load->model('events_model');
      $this->load->model('plans_model');
      $this->load->model('site_model');
	}

	public function index()
	{

      /* $site_visit = $this->site_model->get_site_visit_all();

      foreach($site_visit as $sites){

        $ip[] = $sites['ip'];
        
       } */

    
		$this->data["editdata"] =$this->services_product_model->get_services();
    $this->data['newsdata'] =  $this->news_model->get_news();
    $this->data['feedback'] = $this->feedback_model->get_feedbacks();
    $this->data['eventdata'] = $this->events_model->get_events_list();
    $this->data['plandata']  = $this->plans_model->get_plans_all();
    //echo '<<pre></pre>>';print_r($this->data['plandata']);exit;
		$this->layout->view('frontend/home/index',$this->data);
	}
	public function contact()
	{ 	
		try
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
              $this->session->set_flashdata("success_msg","Contact has been sent successfully.",TRUE);
              redirect('home/contact/');
      }

    }
    catch (Exception $e)
    {
       $this->data['status']   = 'success';
       $this->data['message']  = $e->getMessage();                
    }
		$this->layout->view('frontend/home/contact');
	}

	public function about()
	{
		$this->layout->view('frontend/home/about');
	}

  public function feedback(){

       
    
      $this->form_validation->set_rules('name','Name','trim|required');
      $this->form_validation->set_rules('address','Address','trim|required');
      $this->form_validation->set_rules('comments','Comments','trim|required');
      
      
      $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
     
      if($this->form_validation->run())
        {


              $ins_data['name']                   = $this->input->post('name');
              $ins_data['address']                = $this->input->post('address');
              $ins_data['comments']                = $this->input->post('comments');
              $ins_data['status']                  = "Inactive";


              $result = $this->feedback_model->insert($ins_data);

              if($result){

                 $this->session->set_flashdata('success_msg', 'Feedback sent successfully');

                redirect('home/feedback/');

              }else{

                 $this->session->set_flashdata('error_msg', 'Could not sent feedback');
                 rediect('home/feedback/');
              } 
        }

        $this->layout->view('frontend/home/feedback');
  }

  

}
