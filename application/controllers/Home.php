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
	}

	public function index()
	{
		$this->data["editdata"] =$this->services_product_model->get_services();
    $this->data['newsdata'] =  $this->news_model->get_news();
    $this->data['feedback'] = $this->feedback_model->get_feedbacks();
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

  public function feedback(){

       
    if(isset($_FILES["image_name"]["name"]) && $_FILES["image_name"]["size"]>0)
      {
          $this->form_validation->set_rules('image_name',  'Upload Image','trim|callback_do_upload');
      }

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

              if(isset($_FILES["image_name"]["name"]) && $_FILES["image_name"]["size"]>0)
               {

                 $filedata = $this->do_upload();
                 $filename  = $_FILES["image_name"]["name"];
                 $ins_data['image_name'] = (!empty($filename))?$filename:"";
               }

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

 public function do_upload()
  {
          $config['upload_path']          = './uploads/feedback';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 2056;
          $config['max_width']            = 1700;
          $config['max_height']           = 800;

          $this->load->library('upload', $config);

          if (! $this->upload->do_upload('image_name'))
          {
                 $this->form_validation->set_message('do_upload', $this->upload->display_errors());
                return false;
          }
          else
          {
                 $final_file_data = array("success"=>$this->upload->data());

                 return true;
          }
  }


  
	

}
