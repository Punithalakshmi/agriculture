<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");
class Admin extends Admin_Controller
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

  public function add($edit_id = '')
  {
   $admin_data = $this->session->userdata('user_data');
    $this->layout->add_javascripts(array('dropzone'));
    $this->layout->add_javascripts(array('jquery.fancybox.min'));
    $this->layout->add_stylesheets(array('dropzone'));
    $this->layout->add_stylesheets(array('jquery.fancybox.min'));
    
    //print_r($this->input->post());exit;
     try
        {


           $edit_id = $admin_data["id"];
          $seller_id = $this->input->post('seller_id');
           
          $this->form_validation->set_rules('first_name','First Name','trim|required');
          $this->form_validation->set_rules('last_name','Last Name','trim|required');
          $this->form_validation->set_rules('password','Password','trim|required');

          if(empty($edit_id)){

          $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[seller.email]');

           }
          //$this->form_validation->set_rules('country_id','Country','trim|required');
          //$this->form_validation->set_rules('state_id','State','trim|required');
          $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|max_length[232]|matches[password]', ['matches'=>'Password does not match']);
          $this->form_validation->set_rules('address','Address','trim|required');
          //$this->form_validation->set_rules('email','Email','trim|required');
          $this->form_validation->set_rules('city','City','trim|required');
          $this->form_validation->set_rules('status','Status','trim|required');
          $this->form_validation->set_rules('zip', 'Zib','trim|max_length[8]|integer', ['integer'=>'Invalid ZIP']);
          $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]');           
          $this->form_validation->set_error_delimiters('', '');

          if(count($_POST) > 1 && $this->form_validation->run()){
             
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
              $ins_data['status']      = $this->input->post('status');
            
              if($edit_id){
                
                $ins_data['modified_on'] = date('Y-m-d H:i:s');
                $msg                      = 'Seller updated successfully';
                $this->seller_model->update(array("id" => $edit_id),$ins_data);
                
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
            $edit_data['state_id']                     = '';
            $edit_data['country_id']                     = '';
            $edit_data['city']                     = '';
            $edit_data['zip']      = '';
            $edit_data['phone']                     = '';
            $edit_data['status']                     = '';
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
        
        $country = $this->country_model->get_all('231');

        $country_data[null] = 'Select Country';

        if($country){

           foreach ($country as $key => $value) {

            $country_data[$value->id] = $value->name;

            }
          }
        //print_r($country_data);exit;
        $state =  $this->state_model->get_state_by_country_id(231);

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
            $this->layout->view('frontend/seller/add');  
        }  
  }

  public function add_service($edit_id = '')
  {
    
      
     try
        {
          
          if($this->input->post('seller_id'))

            $edit_id = $this->input->post('seller_id');
            
        $this->form_validation->set_rules('company_name','Company Name','trim|required');

          //$this->form_validation->set_rules('website', 'URL', 'trim|max_length[548]|prep_url|callback_form_validation_validate_url');

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
            $targetPath = getcwd() . '/uploads/seller/';
            $ins_data['seller_id'] = $seller_id;
            $ins_data['image_name'] = $fileName;
            $ins_data['created_on'] = date('Y-m-d H:i:s'); 
            //$ins_data['seller_image_id']  = $this->input->post('seller_id');
            $targetFile = $targetPath . $fileName ;

            move_uploaded_file($tempFile, $targetFile);
              
              if($edit_id){
                
               $this->photos_model->insert($ins_data); 
               redirect("seller");

              }
              else
              {   
                $new_id                   = $this->photos_model->insert($ins_data);         
                $msg                      = 'Photos added successfully';
                //$edit_id                  =  $new_id;
                redirect("seller");
                
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
  
  /**
  *This method handles to validate url
  **/
  function form_validation_validate_url($str){
        $valid_url  = validate_url($str);
        if(!empty($str)){
          if (!$valid_url){
              $this->form_validation->set_message('form_validation_validate_url', 'Invalid URL');
              return FALSE;
          }
        }
        
        return TRUE;
    }

    public function deleteimage() {
        $deleteid = $this->input->post('image_id');

        if($deleteid ){

          $image_data = $this->photos_model->get_image_by_id($deleteid);
        
           $path = getcwd() . '/uploads/';

          $delete_file_result = delete_file($path, $image_data[0]->image_name);

        }

        $this->db->delete('seller_image', array('id' => $deleteid));

        $verify = $this->db->affected_rows();

      
        echo $verify;
    }
  
}
?>