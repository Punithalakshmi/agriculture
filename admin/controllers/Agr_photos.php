<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


require_once(COREPATH."controllers/Admin_controller.php");

class Agr_photos extends Admin_Controller

{


  function __construct()

  {

    parent::__construct();

    
    if(!is_logged_in())

      redirect('login');

    $this->load->model('agr_photos_model');

  }


  public function index()

  {



    $this->layout->add_javascripts(array('listing'));

    $this->load->library('listing');

    $this->simple_search_fields = array('title' => 'Title','image_name' =>'Image','status'=>'Status');

    $this->_narrow_search_conditions = array("start_date");



    $str ='<a href="'.site_url('agr_photos/add/{id}').'" class="btn btn btn-padding"><i class="fa fa-edit edit"></i></a><a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding" onclick="delete_record(\'agr_photos/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';    

    $this->listing->initialize(array('listing_action' => $str));

    

    $listing = $this->listing->get_listings('agr_photos_model', 'listing');

    

    $this->data['btn'] = "";

    $this->data['btn'] ="<a href=".site_url('agr_photos/add')." class='btn green'>Add New <i class='fa fa-plus'></i></a>";



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

    $this->layout->view("frontend/agr_photos/index");

  }

  

  public function add($edit_id = '')

  {

        $this->layout->add_javascripts(array('tinymce/tinymce.min'));

        $this->layout->add_javascripts(array('tinymce')); 

       if(isset($_FILES["image_name"]["name"]) && $_FILES["image_name"]["size"]>0)

        {

            $this->form_validation->set_rules('image_name',  'Upload Image','trim|callback_do_upload');

        }

       try
        {

           if($this->input->post('edit_id'))  

            $edit_id = $this->input->post('edit_id');
            
           $this->form_validation->set_rules('title','Title','trim|required');

           $this->form_validation->set_rules('status','Status','trim|required');

           $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

           if($this->form_validation->run())
           {

               $ins_data = array();

               $ins_data['title']        = $this->input->post('title');

               $ins_data['status']     = $this->input->post('status');

              if(isset($_FILES["image_name"]["name"]) && $_FILES["image_name"]["size"]>0)
               {

                 $filedata = $this->do_upload();

                 $filename  = $_FILES["image_name"]["name"];

                 $ins_data['image_name'] = (!empty($filename))?$filename:"";

               }
              if($edit_id)
              {

                $ins_data['modified_on']   = date("Y-m-d H:i:s");

                $update_id = $this->agr_photos_model->update(array("id" => $edit_id),$ins_data);

                $this->session->set_flashdata("success_msg","Photos updated successfully.",TRUE);              
              }
              else
              {  
                
                $new_id = $this->agr_photos_model->insert($ins_data);

                $this->session->set_flashdata("success_msg","Photos inserted successfully.",TRUE);
              }
            
                 redirect("agr_photos");
            }

        }
        catch (Exception $e)
        {

            $this->data['status']   = 'error';

            $msg  = $e->getMessage();
        }
        if($edit_id)
        {

             $this->data["editdata"] = $this->agr_photos_model->get_where(array("id" => $edit_id))->row_array();

          }  
          else
          {

              $this->data["editdata"] = array("title"=>"","status"=>"",'image_name'=>'',);
          }

      $this->layout->view('frontend/agr_photos/add',$this->data);

  }
  public function do_upload()
  {

         $this->load->library('upload');

          $config['upload_path']   = '../admin/uploads/agr_photos/';

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

          $final_file_data = array("success"=>$this->upload->data());

          return true;
        }

  } 
  
  function delete($del_id)
   {
      $access_data = $this->agr_photos_model->get_where(array("id"=>$del_id),'id')->row_array();  
       
      $output=array();

      if(count($access_data) > 0){

          $image_data = $this->agr_photos_model->get_image_by_id($del_id);

          $path = getcwd() . '/uploads/agr_photos/';

          delete_file($path, $image_data[0]->image_name);

          $this->agr_photos_model->delete(array("id"=>$del_id));

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