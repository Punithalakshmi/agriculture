<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");
class Seller extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
      
    //$this->load->model('hapterc_model');  
  }

  
  public function index()
  {
  	$this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');

    $this->simple_search_fields = array('first_name' => 'First Name','last_name'=>'Last Name','email'=>'Email','status'=>'Status');
    $this->_narrow_search_conditions = array("start_date");
    $str = '<a href="'.site_url('seller/add/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-add add"></i> Add</a><a href="'.site_url('seller/add/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-edit edit"></i> Edit</a><a href="'.site_url('seller/delete/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-remove remove"></i> Remove</a><a href="'.site_url('seller/delete/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa  details"></i> Details</a>';    
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
    
     try
        {
          if($this->input->post('edit_id'))            
            $edit_id = $this->input->post('edit_id');
           
          $this->form_validation->set_rules('first_name','First Name','trim|required');
          $this->form_validation->set_rules('last_name','Last Name','trim|required');
          $this->form_validation->set_rules('seller_image','Seller Image','trim|required');
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
              $ins_data['seller_image']               = $this->input->post('seller_image');
              $ins_data['address']           = $this->input->post('address');  
              $ins_data['email']        = $this->input->post('email');
              $ins_data['address2']               = $this->input->post('address2');
              $ins_data['city']          = $this->input->post('city');
              $ins_data['zip']                     = $this->input->post('zip');
              $ins_data['phone']      = $this->input->post('phone');
              
              
              if($edit_id){
                $msg                      = 'Chapter updated successfully';
                $this->chapter_model->update(array("id" => $edit_id),$ins_data);
               // log_history($edit_id,'inventory',"Product <b>".$ins_data['name']."</b> has been updated."); 
              }
              else
              {    


                $new_id                   = $this->seller_model->insert($ins_data);         
                $msg                      = 'Chapter added successfully';
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
            $edit_data['last_name']                = '';
            $edit_data['seller_image']               = '';
            $edit_data['email']           = '';  
            $edit_data['address2']               = '';
            $edit_data['address']          = '';
            $edit_data['city']                     = '';
            $edit_data['zip']      = '';
            $edit_data['phone']                     = '';
           
            $status = 'error';
          }
        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }

       /* if($edit_id){
          $edit_data = $this->seller_model->get_where(array("id" => $edit_id))->row_array();
        }  */
         
        $this->data['editdata']              = $edit_data;
        
        if($this->input->is_ajax_request()){
          $output  = $this->load->view('frontend/seller/',$this->data,true);
          return $this->_ajax_output(array('status' => $status, 'output' => $output, 'edit_id' => $edit_id), TRUE);
        } 
        else
        {

            $this->layout->view('frontend/seller/add',$this->data);
        }  
  }
  
}
?>