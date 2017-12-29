<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");
class Services_product extends Admin_Controller
{
  
  function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
      
    $this->load->model('services_product_model');  
    $this->load->model('category_model'); 
    $this->load->model('seller_model');
    
  }

  public function index()
  {


    $this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');
    $this->simple_search_fields = array('title' => 'Title','image_name' =>'Image','description'=>'Description','status'=>'Status');
    $this->_narrow_search_conditions = array("start_date");

    $str ='<a href="'.site_url('services_product/add/{id}').'" class="btn btn btn-padding"><i class="fa fa-edit edit"></i></a><a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding" onclick="delete_record(\'services_product/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';    
    $this->listing->initialize(array('listing_action' => $str));
    
    $listing = $this->listing->get_listings('services_product_model', 'listing');
    
    $this->data['btn'] = "";
    $this->data['btn'] ="<a href=".site_url('services_product/add')." class='btn green'>Add New <i class='fa fa-plus'></i></a>";

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
    $this->layout->view("frontend/services_product/index");
  }
  
  public function add($edit_id = '')
  {

      $admin_data = get_user_type();
      
        $s_id ='';
        $seller_id = '';
        $seller_name ='';

        $this->layout->add_javascripts(array('tinymce/tinymce.min'));
        $this->layout->add_javascripts(array('tinymce')); 

       if(isset($_FILES["image_name"]["name"]) && $_FILES["image_name"]["size"]>0)
        {
            $this->form_validation->set_rules('image_name',  'Upload Image','trim|callback_do_upload');
        }

       try
        {
           
          if($admin_data["role"]==1)
          {
             $s_id = $admin_data["id"];

          }else{

             $seller_id = $admin_data["id"];
             $seller_name = $admin_data["first_name"];
          } 

           if($this->input->post('edit_id'))  

             $edit_id = $this->input->post('edit_id');
            
           $this->form_validation->set_rules('title','Title','trim|required');
           
           $this->form_validation->set_rules('description','Description','trim|required');
           
           $this->form_validation->set_rules('category_id','Category','trim|required');

           $this->form_validation->set_rules('seller_id','Seller','trim|required');

           $this->form_validation->set_rules('price','Price','trim|required');

           $this->form_validation->set_rules('status','Status','trim|required');
           
           
            
           $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

           
           if($this->form_validation->run())
           {

               $ins_data = array();
               
               $ins_data['category_id'] = $this->input->post('category_id');
               $ins_data['seller_id'] = $this->input->post('seller_id');
               $ins_data['title']        = $this->input->post('title');
               $ins_data['description'] = $this->input->post('description');
               $ins_data['price'] = $this->input->post('price');
               //$ins_data['image_name'] =  $fileName;
               $ins_data['address'] = $this->input->post('address');
               $ins_data['contact_details'] = $this->input->post('contact_details');
               $ins_data['status']     = $this->input->post('status');
                $ins_data['event_id']     = $this->input->post('event_id');
              if(isset($_FILES["image_name"]["name"]) && $_FILES["image_name"]["size"]>0)
               {

                 $filedata = $this->do_upload();
                 $filename  = $filedata['file_name'];
                 $ins_data['image_name'] = (!empty($filename))?$filename:"";
               }
              
              if($edit_id)
              {
                
                $ins_data['modified_on']   = date("Y-m-d H:i:s");

                $update_id = $this->services_product_model->update(array("id" => $edit_id),$ins_data);
                $this->session->set_flashdata("success_msg","Services updated successfully.",TRUE);              
              }
              else
              {  
                $ins_data['created_on']   = date("Y-m-d H:i:s");  
                $new_id = $this->services_product_model->insert($ins_data);
                $this->session->set_flashdata("success_msg","Services inserted successfully.",TRUE);         
              }
              
                 redirect("services_product");
            }
            

        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }

        $category = $this->category_model->get_all();


        
        $category_data[null] = 'Select Category';

        if($category){

           foreach ($category as $key => $value) {

            $category_data[$value->id] = $value->name;

            }
          } 

          $seller = $this->seller_model->get_all();

          $seller_data[null] = 'Select Seller';

          if($seller){

             foreach ($seller as $key => $value) {

              $seller_data[$value->id] = $value->first_name;
              
              }
            }
           
          $this->data['category']            = $category_data;
          $this->data['seller']              = $seller_data;
          $this->data['seller_name']         = $seller_name;
          $this->data['sell_id']             = $seller_id;
          $this->data['s_id']   = $s_id;

          if($edit_id)
          {
             $this->data["editdata"] = $this->services_product_model->get_where(array("id" => $edit_id))->row_array();

          }  
          else
          {
              $this->data["editdata"] = array("title"=>"","description"=>"","price"=>"","status"=>"",'image_name'=>'','address' => '','contact_details' =>'','category_id' =>'','seller_id' =>'','event_id' =>'');

          }

      $this->layout->view('frontend/services_product/add',$this->data);
  }
  
    public function do_upload()
    {
        $this->load->library('upload');
      
                $config['upload_path']   = '../admin/uploads/services/';
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $config['max_size']    = 2056;
                $config['max_width']   = 1700;
                $config['max_height']  = 800;

              $this->upload->initialize($config);
              if(!$this->upload->do_upload('image_name'))
              { 
                $this->form_validation->set_message('do_upload', $this->upload->display_errors());
                return false;
              }
              else
              {
                $final_file_data = $this->upload->data();
              }
              return $final_file_data;
        } 
  function delete($del_id)
   {

      $access_data = $this->services_product_model->get_where(array("id"=>$del_id),'id')->row_array();     
      $output=array();
      if(count($access_data) > 0){
        $this->services_product_model->delete(array("id"=>$del_id));
        $output['message'] ="Record deleted successfuly.";
        $output['status']  = "success";
      }
      else
      {
        $output['message'] ="This record not matched by work item.";
        $output['status']  = "error";
      }      
      $this->_ajax_output($output, TRUE);            
    }
}
?>