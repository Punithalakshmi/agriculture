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
  }

  public function index()
  {


  	$this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');
    $this->simple_search_fields = array('title' => 'Title','image_name' =>'Image','description'=>'Description','status'=>'Status');
    $this->_narrow_search_conditions = array("start_date");

    $str ='<a href="'.site_url('services_product/add/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-edit edit"></i></a><a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding btn red" onclick="delete_record(\'services_product/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';    
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
         try
        {
           
           if($this->input->post('edit_id'))  
                     
             $edit_id = $this->input->post('edit_id');
            
           $this->form_validation->set_rules('title','Title','trim|required');
           
           $this->form_validation->set_rules('description','Description','trim|required');
           
           $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

           if($this->form_validation->run())
           {
             
               $ins_data = array();
               $ins_data['title']        = $this->input->post('title');
               $ins_data['description'] = $this->input->post('description');
               $ins_data['status']     = $this->input->post('status');

              if($edit_id)
              {
                
                $ins_data['modified_on']   = date("Y-m-d H:i:s");
                $update_id = $this->plans_model->update(array("id" => $edit_id),$ins_data);
                $this->session->set_flashdata("success_msg","Services updated successfully.",TRUE);              
              }
              else
              {  
                $ins_data['created_on']   = date("Y-m-d H:i:s");  
                $new_id = $this->plans_model->insert($ins_data,"plans");
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

          if($edit_id)
          {
             $this->data["editdata"] = $this->services_product_model->get_where(array("id" => $edit_id))->row_array();
          }  
          else
          {
              $this->data["editdata"] = array("title"=>"","description"=>"","status"=>"");
          }
      $this->layout->view('frontend/services_product/add',$this->data);
  }
 
    function delete($del_id)
   {

      $access_data = $this->plans_model->get_where(array("id"=>$del_id),'id')->row_array();     
      $output=array();
      if(count($access_data) > 0){
        $this->plans_model->delete(array("id"=>$del_id));
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