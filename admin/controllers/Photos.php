<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");
class Photos extends Admin_Controller
{
	function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
      
    $this->load->model('services_model');  
    $this->load->model('seller_model');
    $this->load->model('photos_model');
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

    //$this->layout->view('frontend/dashboard');
  }
  
  public function add($edit_id = '')
  {
    
    $this->layout->add_javascripts(array('bootstrap-datepicker.min'));  
    $this->layout->add_stylesheets(array('bootstrap-datepicker3.min'));
    //print_r($this->input->post());exit;
     try
        {
          if($this->input->post('edit_id'))            
            $edit_id = $this->input->post('edit_id');
           
           $edit_data =array();
           $editdata ='';
           $status = 'error';
           $seller_id = ($_POST['seller_id'])?$_POST['seller_id']:"";
           
        if (!empty($_FILES['file']['name'])) {
            
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/uploads/';
            $ins_data['seller_id'] = $seller_id;
            $ins_data['image_name'] = $fileName;
            $ins_data['created_on'] = date('Y-m-d H:i:s'); 
            //$ins_data['seller_image_id']  = $this->input->post('seller_id');
            $targetFile = $targetPath . $fileName ;

            move_uploaded_file($tempFile, $targetFile);
              
              if($edit_id){
                $msg                      = 'Photos updated successfully';
                $ins_data['modified_on'] = date('Y-m-d H:i:s');
                $this->photos_model->update(array("id" => $edit_id),$ins_data);

              }
              else
              {   
                
                $new_id                   = $this->photos_model->insert($ins_data);         
                $msg                      = 'Photos added successfully';
                $edit_id                  =  $new_id;
               // log_history($new_id,'inventory',"Product <b>".$ins_data['name']."</b> has been inserted."); 
              }
              $this->session->set_flashdata('success_msg',$msg,TRUE);
              $status  = 'success';
          }
         }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }

        if($edit_id){
          $edit_data = $this->photos_model->get_where(array("id" => $edit_id))->row_array();
        } 
        
        $this->data['editdata']              = $edit_data;
        
        if($this->input->is_ajax_request()){
         $output  = $this->load->view('frontend/photos/add',$this->data,true);
          return $this->_ajax_output(array('status' => $status, 'output' => $output, 'edit_id' => $edit_id), TRUE);
        } 
        else
        {
            $this->layout->view('frontend/photos/add',$this->data);
        } 

  }
  
}
?>