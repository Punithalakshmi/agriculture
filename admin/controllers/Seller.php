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
  $this->load->model('services_model');
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
  }
  
  public function add($edit_id = '')
  {
   
    // $this->layout->add_javascripts(array('bootstrap-datepicker.min'));  
    // $this->layout->add_stylesheets(array('bootstrap-datepicker3.min'));
    // $this->layout->add_stylesheets(array('dropzone'));
    // $this->layout->add_javascripts(array('dropzone'));
    // print_r($this->input->post());exit;
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
          $this->form_validation->set_rules('city','City','trim|required');
           $this->form_validation->set_rules('zip', 'Zib','trim|max_length[8]|integer', ['integer'=>'Invalid ZIP']);
         $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]');           
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
              $ins_data['country_id']          = $this->input->post('country_id_');
              $ins_data['state_id']          = $this->input->post('state_id_');
              $ins_data['zip']                     = $this->input->post('zip');
              $ins_data['phone']      = $this->input->post('phone');
              
            
              if($edit_id){

                $ins_data['modified_on'] = date('Y-m-d H:i:s');
                $msg                      = 'Seller updated successfully';
                $this->seller_model->update(array("id" => $edit_id),$ins_data);
               // log_history($edit_id,'inventory',"Product <b>".$ins_data['name']."</b> has been updated."); 
              }
              else
              {    

                $ins_data['created_on'] = date('Y-m-d H:i:s');
                $new_id                   = $this->seller_model->insert($ins_data); 
                
                $msg                      = 'Seller added successfully';
                $edit_id                  =  $new_id;
              
              }

              $this->session->set_flashdata('success_msg',$msg,TRUE);
              $status  = 'success';
          }  
          else
          {
            $edit_data = array();

            $edit_bio = array();

            $edit_data['first_name']              = '';
            $edit_data['password']                = '';
            $edit_data['last_name']                = '';
            $edit_data['email']           = '';  
            $edit_data['address2']               = '';
            $edit_data['address']          = '';
            $edit_data['city']                     = '';
            $edit_data['zip']      = '';
            $edit_data['phone']                     = '';
            $edit_data['id'] =      '';
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

        $country_data[null] = 'Select Country';

        if($country){

           foreach ($country as $key => $value) {

            $country_data[$value->id] = $value->name;

            }
          }
        //print_r($country_data);exit;
        $state =  $this->state_model->get_all();

        $state_data[null] = 'Select State';
         if($state){

           foreach ($state as $key => $value) {

            $state_data[$value->id] = $value->name;

            }
          }
        

        $this->data['editdata']              = $edit_data;

        $this->data['country']              = $country_data;
        
        $this->data['state']                = $state_data;

        if($this->input->is_ajax_request()){
          $output  = $this->load->view('frontend/seller/contact',$this->data,true);
          return $this->_ajax_output(array('status' => $status, 'output' => $output, 'edit_id' => $edit_id), TRUE);
        } 
        else
        {

            $this->layout->view('frontend/seller/add',$this->data);
        }  
  }

  public function add_service($edit_id = '')
  {
    
      
     try
        {
          
          if($this->input->post('seller_id'))

            $edit_id = $this->input->post('seller_id');
            
          $this->form_validation->set_rules('company_name','Company Name','trim|required');
          $this->form_validation->set_rules('website','Website','trim|required');
          $this->form_validation->set_rules('description','Description','trim|required');

        $this->form_validation->set_error_delimiters('', '');

        if(count($_POST) > 1 && $this->form_validation->run())
        {

              $ins_data = array();
              $ins_data['company_name']          = $this->input->post('company_name');
              $ins_data['website']               = $this->input->post('website');
              $ins_data['description']           = $this->input->post('description'); 
              $ins_data['seller_id']             = $this->input->post('seller_id');



              if($edit_id){

                 $checkServiceExist      = $this->services_model->checkServiceExist($ins_data); 

                //$checkServiceExist = $this->service_model->checkServiceExist($ins_data);

                if($checkServiceExist){

                    $ins_data['modified_on'] = date('Y-m-d H:i:s');
                    $this->services_model->update_services($edit_id,$ins_data);
                    $msg                      = 'Service updated successfully';
                 
                }else{

                   $ins_data['created_on'] = date('Y-m-d H:i:s');
                   $new_id                   = $this->services_model->insert($ins_data);         
                   $msg                      = 'Services added successfully';
                 
                }

              $this->session->set_flashdata('success_msg',$msg,TRUE);
              $status  = 'success';
                
              }
             
              
           }
          
          else
          {
              $edit_data = array();
              $edit_data['company_name'] = '';
              $edit_data['description'] = '';
              $edit_data['website']  = '';
              $edit_data['seller_id']  = '';
              $status = 'error'; 
          }

        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }

        if($edit_id){

          $edit_data = $this->services_model->get_services_by_id($edit_id);
        } 

          
        $this->data['editdata']              = $edit_data;
        
        if($this->input->is_ajax_request()){
         
         $output  = $this->load->view('frontend/services/add',$this->data,true);
          return $this->_ajax_output(array('status' => $status, 'output' => $output, 'edit_id' => $edit_id), TRUE);
        } 
        else
        {

            $this->layout->view('frontend/services/add',$this->data);
        }  
  }

  public function add_photos($edit_id = '')
  {
    
    $this->layout->add_javascripts(array('bootstrap-datepicker.min'));  
    $this->layout->add_stylesheets(array('bootstrap-datepicker3.min'));
    
     try
        {
          if($this->input->post('seller_id'))            
            $edit_id = $this->input->post('seller_id');
           
           $edit_data =array();
           $edit_data ='';
           $editdata['seller_id'] ='';
           $editdata['image_name'] =''; 
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
                
               $this->photos_model->insert($ins_data); 

              }
              else
              {   
                $new_id                   = $this->photos_model->insert($ins_data);         
                $msg                      = 'Photos added successfully';
                //$edit_id                  =  $new_id;
                
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
           $edit_data = $this->photos_model->get_photos_by_id($edit_id);

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

  /**
  * This method handles to validate phone
  **/
  function form_validation_validate_phone($str){
        $valid_url  = validate_phone($str);
        if(!empty($str)){
          if (!$valid_url){
              $this->form_validation->set_message('form_validation_validate_phone', sprintf($this->lang->line('invalid'), 'Phone'));
              return FALSE;
          }
        }
        
        return TRUE;
    }

    public function deleteimage() {
        $deleteid = $this->input->post('image_id');

        $this->db->delete('seller_image', array('id' => $deleteid));

        $verify = $this->db->affected_rows();

        echo $verify;
    }

  
  
}
?>