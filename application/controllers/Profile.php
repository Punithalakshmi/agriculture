<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");
class Profile extends Admin_Controller
{
  
	function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
    $this->load->model('seller_model');
    $this->load->model('Services_model');
    $this->load->model('Photos_model');
  }

  public function index()
  {
    
    $this->data['editdata'] = get_user_type();

    $this->data['servicedata'] = $this->Services_model->get_services_by_id($this->data['editdata']['id']);
    $this->data['photodata'] = $this->Photos_model->get_photos_by_id($this->data['editdata']['id']);
    
    $this->data['profile'] = $this->load->view("frontend/profile/profile",$this->data,true);
    $this->layout->view('frontend/profile/profile');
  }

  public function update($edit_id=''){

    /* $this->layout->add_javascripts(array('dropzone'));
    $this->layout->add_javascripts(array('jquery.fancybox.min'));
    $this->layout->add_stylesheets(array('dropzone'));
    $this->layout->add_stylesheets(array('jquery.fancybox.min'));*/
    
    $msg ="";

     try
        {
    
          $this->form_validation->set_rules('first_name','First Name','trim|required');
          $this->form_validation->set_rules('last_name','Last Name','trim|required');
          
          //$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[seller.email]');

         $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_email['.$edit_id.']');
          
          $this->form_validation->set_rules('address','Address','trim|required');
          
          $this->form_validation->set_rules('city','City','trim|required');
          $this->form_validation->set_rules('status','Status','trim|required');
          $this->form_validation->set_rules('zip', 'Zib','trim|max_length[8]|integer', ['integer'=>'Invalid ZIP']);
          $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]');   

          if(!$edit_id){
              $this->form_validation->set_rules('password','Password','trim|required');  
            }

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
              
              if($edit_id){
               
                $ins_data['modified_on'] = date('Y-m-d H:i:s');
                $msg                      = 'Profile updated successfully';
                $this->seller_model->update(array("id" => $edit_id),$ins_data);
                $status  = 'edit';
              }              
          }  
        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }

       if($edit_id){

          $edit_data = $this->seller_model->get_where(array("id" => $edit_id))->row_array();

        } 
        
        $this->data['editdata']              = $edit_data;

        if($this->input->is_ajax_request()){
          $output  = $this->load->view('frontend/profile/profile',$this->data,true);
          return $this->_ajax_output(array('status' => $status,'msg'=>$msg, 'output' => $output, 'edit_id' => $edit_id), TRUE);
        } 
        else
        { 
            $this->layout->view('frontend/profile/profile');  
        } 
     }
}

?>