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
    $this->load->model('services_model');
    $this->load->model('photos_model');

    $edit_data = array();

    $edit_data ='';

    $this->data['editdata'] = get_user_type();

    $this->data['servicedata'] = $this->services_model->get_services_by_id($this->data['editdata']['id']);
    $this->data['photodata'] = $this->photos_model->get_photos_by_id($this->data['editdata']['id']);
  }

  public function index()
  {
    
    $this->data['editdata'] = get_user_type();

    $this->data['servicedata'] = $this->services_model->get_services_by_id($this->data['editdata']['id']);
    $this->data['photodata'] = $this->photos_model->get_photos_by_id($this->data['editdata']['id']);
    $this->data['plans'] = array();
    $this->data['plans'] = '';
    $this->data['plans'] = get_plans_all();
    
    $this->data['profile'] = $this->load->view("frontend/profile/profile",$this->data,true);
    $this->layout->view('frontend/profile/profile');
  }

  public function update($edit_id=''){

    /* $this->layout->add_javascripts(array('dropzone'));
    $this->layout->add_javascripts(array('jquery.fancybox.min'));
    $this->layout->add_stylesheets(array('dropzone'));
    $this->layout->add_stylesheets(array('jquery.fancybox.min'));*/
   
    $msg ="";
    $status = '';

     try
        {
          
          $this->form_validation->set_rules('first_name','First Name','trim|required');
          $this->form_validation->set_rules('last_name','Last Name','trim|required');
          
          //$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[seller.email]');

         $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_email['.$edit_id.']');
          
          $this->form_validation->set_rules('address','Address','trim|required');
          
          $this->form_validation->set_rules('city','City','trim|required');
          
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
                $this->seller_model->update(array("id" => $edit_id),$ins_data);
                $this->session->set_flashdata("success_msg","Profile updated successfully.",TRUE);
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

        // $this->data['servicedata'] = $this->services_model->get_services_by_id($this->data['editdata']['id']);

       // $this->data['photodata'] = $this->photos_model->get_photos_by_id($this->data['editdata']['id']);

       $this->layout->view('frontend/profile/profile',$this->data);  
         
     }

  public function service_update($edit_id = '')
  {
    
      $msg ="";

     try
        {
          
        $edit_id = $this->input->post('seller_id');

        $this->form_validation->set_rules('company_name','Company Name','trim|required');

        $this->form_validation->set_rules('website','Website','trim|required');
          
        $this->form_validation->set_rules('description','Description','trim|required');

        $this->form_validation->set_error_delimiters('', '');

        if($this->form_validation->run())
        {

              $ins_data = array();
              $ins_data['company_name']          = $this->input->post('company_name');
              $ins_data['website']               = $this->input->post('website');
              $ins_data['description']           = $this->input->post('description'); 
              $ins_data['seller_id']             = $this->input->post('seller_id');

              if($edit_id){

                 $checkServiceExist      = $this->services_model->checkServiceExist($ins_data); 

                if($checkServiceExist){

                    $ins_data['modified_on'] = date('Y-m-d H:i:s');
                    $this->services_model->update_services($edit_id,$ins_data);
                    $this->session->set_flashdata("success_msg","Service updated successfully.",TRUE);
                }else{

                   $ins_data['created_on'] = date('Y-m-d H:i:s');
                   $new_id                   = $this->services_model->insert($ins_data);         
                  $this->session->set_flashdata("success_msg","Service added successfully.",TRUE);
                 
                }
              } 
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
  
      $this->data['servicedata']              = $edit_data;

      $this->layout->view('frontend/profile/profile',$this->data);      
    }

  public function update_photos($edit_id = '')
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
            $targetPath = getcwd() . 'admin/uploads/seller/';
            $ins_data['seller_id'] = $seller_id;
            $ins_data['image_name'] = $fileName;
            $ins_data['created_on'] = date('Y-m-d H:i:s'); 
            //$ins_data['seller_image_id']  = $this->input->post('seller_id');
            $targetFile = $targetPath . $fileName ;

            move_uploaded_file($tempFile, $targetFile);
              
              if($edit_id){
                
               $this->photos_model->insert($ins_data); 
               redirect("profile");

              }
              else
              {   
                $new_id                   = $this->photos_model->insert($ins_data);         
                $msg                      = 'Photos added successfully';
                //$edit_id                  =  $new_id;
                redirect("profile");
                
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
        
        
      $this->layout->view('frontend/photos/profile',$this->data);
         
  }

    function check_email($mail,$id)
    {
        $where = array();

        if($id)
            $where['id !='] = $id;

        $where['email'] = $mail;

        $result = $this->seller_model->get_where( $where)->num_rows();

        if ($result) {
            $this->form_validation->set_message('check_email', 'Given email already exists!');
            return FALSE;
        }
        return TRUE;
    }

     public function deleteimage() {
        $deleteid = $this->input->post('image_id');

        if($deleteid ){

          $image_data = $this->photos_model->get_image_by_id($deleteid);
        
           $path = getcwd() . 'admin/uploads/';

          $delete_file_result = delete_file($path, $image_data[0]->image_name);

        }

        $this->db->delete('seller_image', array('id' => $deleteid));

        $verify = $this->db->affected_rows();

      
        echo $verify;
    }
}

?>