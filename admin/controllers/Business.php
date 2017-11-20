<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");
class Business extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
      
    $this->load->model('business_model');  
  }

  public function index()
  {
  	$this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');
    $this->simple_search_fields = array('customer_name' => 'Customer Name',"title" =>"Title");
    $this->_narrow_search_conditions = array("start_date");
    $str ='<a href="'.site_url('business/add/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-edit edit"></i></a><a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding btn red" onclick="delete_record(\'business/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';    
    $this->listing->initialize(array('listing_action' => $str));
    $listing = $this->listing->get_listings('business_model', 'listing');
    $this->data['btn'] = "";
    $this->data['btn'] ="<a href=".site_url('business/add')." class='btn green'>Add New <i class='fa fa-plus'></i></a>";
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
    $this->layout->view("frontend/business/index");
  }
  
  public function add($edit_id = '')
  {
        $this->layout->add_stylesheets(array('custom'));
        $this->layout->add_javascripts(array('function'));
   
         try
        {
           if(isset($_FILES["ads_image"]["name"]) && $_FILES["ads_image"]["size"]>0)
           {
             $this->form_validation->set_rules('ads_image',  'Ads Image','trim|callback_imgratio');
           }
           if($this->input->post('edit_id'))            
             $edit_id = $this->input->post('edit_id');
            
           $this->form_validation->set_rules('customer_name','Customer Name','trim|required');
           $this->form_validation->set_rules('title','Last Name','trim|required');
           $this->form_validation->set_rules('description','Description','trim|required');
           $this->form_validation->set_rules('status','Status','trim|required');
           $this->form_validation->set_rules('url','Weblink','trim|required');
           
           $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
           if($this->form_validation->run())
           {
             
               $ins_data = array();
               $form = $this->input->post();
               $ins_data['customer_name'] = $form["customer_name"];
               $ins_data['title']         = $form["title"];
               $ins_data['description']   = $form["description"];
               $ins_data['url']            = $form["url"];
               $ins_data['status']         = $form["status"];
               $added_files1               = $form['added_files1'];
               $file_path                  = $form['file_path'];

               $creater_id   = $this->session->userdata("user_data");

               if(isset($_FILES["ads_image"]["name"]) && $_FILES["ads_image"]["size"]>0)
               {
                 $filedata1 = $this->do_upload1();
                 $filename1  = $filedata1['file_name'];
               }
                else
               {
                 $filepath  = $file_path;
                 $filename1  = $added_files1;
               } 
 
               $ins_data['filepath'] = base_path()."assets/img/business/";
               $ins_data['ads_image'] = (!empty($filename1))?$filename1:"";
               $ins_data['ads_image'] = (!empty($filename1))?$filename1:"";
               
                if($edit_id)
                {
                  $ins_data['updated_id'] = $creater_id["id"];
                  $ins_data['updated_date']   = date("Y-m-d H:i:s");
                  
                  $this->business_model->update(array("id" => $edit_id),$ins_data);
                  $this->session->set_flashdata("success_msg","Business updated successfully.",TRUE);              
                }
                else
                {
                  $ins_data['created_id'] = $creater_id["id"];
                  $ins_data['created_date']   = date("Y-m-d H:i:s");  
                  $new_id = $this->business_model->insert($ins_data,"business_ads");
                  $this->session->set_flashdata("success_msg","Business inserted successfully.",TRUE);         
                }
                 redirect("business");
            }

        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }

       if($edit_id)
       {
          $this->data["editdata"] = $this->business_model->get_where(array("id" => $edit_id))->row_array();
       }  
        else
        {
           $this->data["editdata"] = array("customer_name"=>"","title"=>"","ads_image"=>"","description"=>"","url"=>"","status"=>"");
        }
      $this->layout->view('frontend/business/add',$this->data);
  }
 
    
    function delete($del_id)
    {
      $access_data = $this->business_model->get_where(array("id"=>$del_id),'id')->row_array();     
      $output = array();
      if(count($access_data) > 0)
      {
        $this->business_model->delete(array("id"=>$del_id));
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

    public function do_upload1()
    {
        $this->load->library('upload');
        
             
              $config = array(
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 1024 * 10,
                'overwrite'     => FALSE,
                'upload_path'   => '../assets/img/business/'
              );

              $this->upload->initialize($config);

              if(!$this->upload->do_upload('ads_image'))
              {
               
                $final_file_data = array('error' => $this->upload->display_errors());
        
              }
              else
              {
                $final_file_data = $this->upload->data();

             }
          return $final_file_data;
        }

    function imgratio($str)
      {  
        $str = getimagesize($_FILES['ads_image']['tmp_name']);
        if($str[0]>="1600" && $str[1]>="650")
          return true;
        else
        {
          $this->form_validation->set_message('imgratio',"The Ads image should be 1600x650 ratio");
          return false;
        }
      }

}
?>