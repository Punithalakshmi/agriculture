<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");
class Seller extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
      
  $this->load->model('seller_model');  
  $this->load->model('country_model');
  $this->load->model('state_model');
  $this->load->helper(array('url','html','form'));

  }

  
  public function index()
  {
  	$this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');

    $this->simple_search_fields = array('first_name' => 'First Name','last_name'=>'Last Name','email'=>'Email','status'=>'Status');
    $this->_narrow_search_conditions = array("start_date");
    $str = '<a href="'.site_url('seller/add/{id}').'" class="btn btn btn-padding"><i class="fa fa-edit"></i></a><a href="'.site_url('seller/delete/{id}').'" class="btn btn btn-padding"><i class="fa fa-remove remove"></i></a>';    
    $this->listing->initialize(array('listing_action' => $str));
    $listing = $this->listing->get_listings('seller_model', 'listing');

    $this->data['btn'] = "";
    if($this->input->is_ajax_request())
      $this->_ajax_output(array('listing' => $listing), TRUE);
    $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
    $this->data['simple_search_fields'] = $this->simple_search_fields;
    $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
    $this->data['per_page'] = $this->listing->_get_per_page();
    $this->data['per_page_options'] = array_combine($this->listing->_get_per_page_options(), $this->listing->_get_per_page_options());
    $this->data['search_bar'] = $this->load->view('listing/search_bar', $this->data, TRUE);
    $this->data['listing'] = $listing;
    $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);

  	$this->layout->view('frontend/seller/index');
  }
  
  public function add($edit_id = '')
  {
    
    $this->layout->add_javascripts(array('bootstrap-datepicker.min'));  
    $this->layout->add_stylesheets(array('bootstrap-datepicker3.min'));
    $this->layout->add_stylesheets(array('dropzone'));
    $this->layout->add_javascripts(array('dropzone'));

     try
        {
          if($this->input->post('edit_id'))            
            $edit_id = $this->input->post('edit_id');
           
          $this->form_validation->set_rules('first_name','First Name','trim|required');
          $this->form_validation->set_rules('last_name','Last Name','trim|required');
          $this->form_validation->set_rules('password','Password','trim|required');
          $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|max_length[232]|matches[password]', ['matches'=>'Password does not match']);
          $this->form_validation->set_rules('address','Address','trim|required');
          $this->form_validation->set_rules('email','Email','trim|required');
          $this->form_validation->set_rules('address2','Address2','trim|required');
          $this->form_validation->set_rules('city','City','trim|required');
          $this->form_validation->set_rules('zip','Zib','trim|required');
          $this->form_validation->set_rules('phone','Phone','trim|required');
          
          
          $this->form_validation->set_error_delimiters('', '');

          if($this->form_validation->run()){
             
              $ins_data = array();
              $ins_data['first_name']              = $this->input->post('first_name');
              $ins_data['last_name']                = $this->input->post('last_name');
              $ins_data['password']           = $this->input->post('password'); 
              $ins_data['address']           = $this->input->post('address');  
              $ins_data['email']        = $this->input->post('email');
              $ins_data['address2']               = $this->input->post('address2');
              $ins_data['city']          = $this->input->post('city');
              $ins_data['country_id']          = $this->input->post('country_id');
              $ins_data['state_id']          = $this->input->post('state_id');
              $ins_data['zip']                     = $this->input->post('zip');
              $ins_data['phone']      = $this->input->post('phone');
              $ins_data['company_name'] = $this->input->post('company_name');
              $ins_data['description'] = $this->input->post('description');
              $ins_data['website']  = $this->input->post('website');
            
              if($edit_id){
                $msg                      = 'Seller updated successfully';
                $this->seller_model->update(array("id" => $edit_id),$ins_data);
               // log_history($edit_id,'inventory',"Product <b>".$ins_data['name']."</b> has been updated."); 
              }
              else
              {    

                $new_id                   = $this->seller_model->insert($ins_data);         
                $msg                      = 'Seller added successfully';
                $edit_id                  =  $new_id;
               // log_history($new_id,'inventory',"Product <b>".$ins_data['name']."</b> has been inserted."); 
              }
              $this->session->set_flashdata('success_msg',$msg,TRUE);
              $status  = 'success';
          }  

          else
          {
            $edit_data = array();
            $edit_data['first_name']              = '';
            $edit_data['password']                = '';
            $edit_data['last_name']                = '';
            $edit_data['email']           = '';  
            $edit_data['address2']               = '';
            $edit_data['address']          = '';
            $edit_data['city']                     = '';
            $edit_data['zip']      = '';
            $edit_data['phone']                     = '';
            $edit_data['company_name'] = '';
            $edit_data['website']  = '';
            $edit_data['description'] = '';
          
           
            $status = 'error';
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
        
        $country = $this->country_model->get_all();

        $state =  $this->state_model->get_all();

        $country_id = $country[0]->name;

        $state_id = $state[0]->name;

        $this->data['editdata']              = $edit_data;

        $this->data['country']              = $country_id;
      
        $this->data['state']                = $state_id;

        if($this->input->is_ajax_request()){
          $output  = $this->load->view('frontend/seller/',$this->data,true);
          return $this->_ajax_output(array('status' => $status, 'output' => $output, 'edit_id' => $edit_id), TRUE);
        } 
        else
        {

            $this->layout->view('frontend/seller/add',$this->data);
        }  
  }

  function delete($del_id)
    {
      $access_data = $this->seller_model->get_where(array("id"=>$del_id),'id')->row_array();
      $output=array();
      if(count($access_data) > 0)
      {
        $this->seller_model->delete(array("id"=>$del_id));
        $output['message'] ="Record deleted successfuly.";
        $output['status']  = "success";
        redirect("seller");
      }
      else
      {
        $output['message'] ="This record not matched by Contractor.";
        $output['status']  = "error";
        redirect("seller");
      }
      $this->_ajax_output($output, TRUE);
    }

    public function upload() {
      die('test');
        if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $targetPath = getcwd() . '/uploads/';
        $targetFile = $targetPath . $fileName ;
        move_uploaded_file($tempFile, $targetFile);
        // if you want to save in db,where here
        // with out model just for example
        // $this->load->database(); // load database
        // $this->db->insert('file_table',array('file_name' => $fileName));
        }
    }
  
}
?>