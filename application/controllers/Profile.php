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

    $this->user_id = get_current_user_id();

  }

  public function index()
  {
    $this->data['editdata'] = $this->seller_model->get_where(array('id'=>$this->user_id),"*","seller")->row_array();

    $this->data['plans'] = get_plans_all();
    
    $this->layout->view('frontend/profile/profile');
  }

  public function update_contact(){

     try
        {
          $edit_id =  $this->user_id;
          $msg ="";
          $status = '';

          $this->data['editdata'] = $this->seller_model->get_where(array("id" => $edit_id),"*","seller")->row_array();

          
          $this->data['plans'] = get_plan_by_id($this->data['editdata']['plan_id']);

          
          $this->form_validation->set_rules('first_name','First Name','trim|required');
          $this->form_validation->set_rules('last_name','Last Name','trim|required');
          $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_email['.$edit_id.']');
          
          $this->form_validation->set_rules('address','Address','trim|required');
          
          $this->form_validation->set_rules('city','City','trim|required');
          
          $this->form_validation->set_rules('zip', 'Zib','trim|max_length[8]|integer', ['integer'=>'Invalid ZIP']);
          $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]');   

          $this->form_validation->set_rules('password','Password','trim');           

          $this->form_validation->set_error_delimiters('', '');

          if(count($_POST) > 1 && $this->form_validation->run()){             

              $ins_data = array();
              $ins_data['first_name']       = $this->input->post('first_name');
              $ins_data['last_name']        = $this->input->post('last_name');             
              $password                     =  $this->input->post('password');

              if($password)
               $ins_data['password']     = md5($password);
              
              $ins_data['address']      = $this->input->post('address');  
              $ins_data['email']        = $this->input->post('email');
              $ins_data['address2']     = $this->input->post('address2');
              $ins_data['city']         = $this->input->post('city');
              $ins_data['country_id']   = $this->input->post('country_id');
              $ins_data['state_id']     = $this->input->post('state_id');
              $ins_data['zip']          = $this->input->post('zip');
              $ins_data['phone']        = $this->input->post('phone');             
               
              $ins_data['modified_on'] = date('Y-m-d H:i:s');
              $this->seller_model->update(array("id" => $edit_id),$ins_data);

              $msg = 'Record updated successfully';
              $status  = 'Success';                 

          }


        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }  

          
        if($this->input->is_ajax_request()){
          $output  = $this->load->view('frontend/profile/contact',$this->data,true);
          return $this->_ajax_output(array('status' => $status,'msg'=>$msg, 'output' => $output, 'edit_id' => $edit_id), TRUE);
        } 
        
      
         
     }

  public function service_update()
  {
     try
        {
          
       $edit_id =  $this->user_id;
       $msg ="";
       $status = '';

        $this->data['servicedata']  = $this->services_model->get_services_by_id($edit_id);

        $this->form_validation->set_rules('company_name','Business Name','trim|required');

        $this->form_validation->set_rules('experience_id','Work Experience','trim|required');

        $this->form_validation->set_rules('primary_service_category','Primary service category','trim|required');

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

              $ins_data['experience_type']          = $this->input->post('experience_type');
              $ins_data['experience_id']            = $this->input->post('experience_id');
              $ins_data['primary_service_category'] = $this->input->post('primary_service_category');
              $ins_data['other_related_category']   = $this->input->post('other_related_category');
              $ins_data['qualification_id']         = $this->input->post('qualification_id');
              $ins_data['seller_id']                = $edit_id;


              $checkServiceExist  = $this->services_model->get_where(array('seller_id'=>$edit_id),"id","bio_seller")->num_rows(); 

              if($checkServiceExist){

                  $ins_data['modified_on'] = date('Y-m-d H:i:s');
                  $this->services_model->update(array('seller_id'=>$edit_id),$ins_data,"bio_seller");
                  $msg = 'Additional info updated successfully';

              }else{

                 $ins_data['created_on'] = date('Y-m-d H:i:s');
                 $this->services_model->insert($ins_data);         
                 $msg = 'Additional info added successfully';
               
              }
           }

        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }
        
        if($this->input->is_ajax_request()){
          $output  = $this->load->view('frontend/profile/service',$this->data,true);
          return $this->_ajax_output(array('status' => $status,'msg'=>$msg, 'output' => $output, 'edit_id' => $edit_id), TRUE);
        } 
        
           
    }

  public function update_photos()
  {

     try
        {
          $status = "";
          $msg ="";

           $this->data['editdata'] = $this->photos_model->get_photos_by_id($this->user_id);

           $status = 'error';
           $seller_id = $this->user_id;
           
          if (!empty($_FILES['file']['name'])) {
            
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];

            $targetPath = base_url().'admin/uploads/seller/';

            $ins_data['seller_id'] = $seller_id;
            $ins_data['image_name'] = $fileName;
            $ins_data['created_on'] = date('Y-m-d H:i:s'); 
           
            $targetFile = $targetPath . $fileName;
            
            move_uploaded_file($tempFile, $targetFile);              
                
            $this->photos_model->insert($ins_data);
              
            $status  = 'success';
          }
        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }

        
        if($this->input->is_ajax_request()){
          $output  = $this->load->view('frontend/profile/photo',$this->data,true);
          return $this->_ajax_output(array('status' => $status, 'output' => $output, 'edit_id' => $this->user_id), TRUE);
        } 
        
  }

    function check_email($mail,$id)
    {
      
        $where = '';
        
        if(!empty($id)){
            $where = " and id !='".$id."'";
        }
        $query = $this->db->query("select * from seller where email='".$mail."' and id!='".$id."'")->row_array();
        if(count($query)) {
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