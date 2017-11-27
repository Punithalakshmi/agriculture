<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");
class Category extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
      
    $this->load->model('category_model');  
  }

  public function index()
  {
  	$this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');
    $this->simple_search_fields = array('name' => 'Category Name',"status" =>"Active");
    $this->_narrow_search_conditions = array("start_date");
    $str ='<a href="'.site_url('category/add/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-edit edit"></i></a><a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding btn red" onclick="delete_record(\'category/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';    
    $this->listing->initialize(array('listing_action' => $str));
    $listing = $this->listing->get_listings('category_model', 'listing');
    $this->data['btn'] = "";
    $this->data['btn'] ="<a href=".site_url('category/add')." class='btn green'>Add New <i class='fa fa-plus'></i></a>";
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
    $this->layout->view("frontend/category/index");
  }
  
  public function add($edit_id = '')
  {
        if(isset($_FILES["category_image"]["name"]) && $_FILES["category_image"]["size"]>0)
        {
            $this->form_validation->set_rules('category_image',  'category Image','trim|callback_do_upload');
        }

     
   
         try
        {
         
           if($this->input->post('edit_id'))            
             $edit_id = $this->input->post('edit_id');
            
           $this->form_validation->set_rules('name','Category Name','trim|required');
           $this->form_validation->set_rules('description','Description','trim|required');
           $this->form_validation->set_rules('status','Status','trim|required');

           $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
           if($this->form_validation->run())
           {
             
               $ins_data = array();
               $form = $this->input->post();
               $ins_data['name'] = $form["name"];
               $ins_data['description']   = $form["description"];
               $ins_data['status']         = $form["status"];
  
               $creater_id   = $this->session->userdata("user_data");

               if(isset($_FILES["category_image"]["name"]) && $_FILES["category_image"]["size"]>0)
               {
                 $filedata1 = $this->do_upload();
                 $filename1  = $filedata1['file_name'];
                 $ins_data['category_img'] = (!empty($filename1))?$filename1:"";
               }
               
                if($edit_id)
                {
                  $ins_data['updated_id'] = $creater_id["id"];
                  $ins_data['updated_date']   = date("Y-m-d H:i:s");
                  
                  $this->category_model->update(array("id" => $edit_id),$ins_data);
                  $this->session->set_flashdata("success_msg","Category updated successfully.",TRUE);              
                }
                else
                {
                
                  $ins_data['created_id'] = $creater_id["id"];
                  $ins_data['created_date']   = date("Y-m-d H:i:s");  
                  $new_id = $this->category_model->insert($ins_data,"category");
                  $this->session->set_flashdata("success_msg","Category inserted successfully.",TRUE);         
                }
                 redirect("category");
            }

        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }

        if($edit_id)
        {
           $this->data["editdata"] = $this->category_model->get_where(array("id" => $edit_id))->row_array();
        }  
        else
        {
           $this->data["editdata"] = array("name"=>"","category_img"=>"","description"=>"","status"=>"");
        }
      $this->layout->view('frontend/category/add',$this->data);
  }
 
    
    function delete($del_id)
    {
      $access_data = $this->category_model->get_where(array("id"=>$del_id),'id')->row_array();     
      $output = array();
      if(count($access_data) > 0)
      {
        $this->category_model->delete(array("id"=>$del_id));
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

    public function do_upload()
    {
        $this->load->library('upload');

                $config['upload_path']   = '../assets/img/category/';
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $config['max_size']      = 5000;
                $config['max_width']     = 1024;
                $config['max_height']    = 768;
            

              $this->upload->initialize($config);

              if(!$this->upload->do_upload('category_image'))
              {
               
                $this->form_validation->set_message('do_upload' , $this->upload->display_errors());
                return FALSE;
              }
              else
              {
                $final_file_data = $this->upload->data();

             }
          return $final_file_data;
        }

}
?>