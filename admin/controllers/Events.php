
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");

class Events extends Admin_controller
{
	
	function __construct()
	{
		parent::__construct();
		
		if(!is_logged_in())
		redirect("login");
		$this->load->model('events_model');
	}

  public function index()
  {
  	$this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');
    $this->simple_search_fields = array("title" =>"Title","location"=>"Location");
    $this->_narrow_search_conditions = array("start_date");
    $str ='<a href="'.site_url('events/add/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-edit edit"></i></a><a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding btn red" onclick="delete_record(\'events/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';    
    $this->listing->initialize(array('listing_action' => $str));
    $listing = $this->listing->get_listings('events_model', 'listing');
    $this->data['btn'] = "";
    $this->data['btn'] ="<a href=".site_url('events/add')." class='btn green'>Add New <i class='fa fa-plus'></i></a>";
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
    $this->layout->view("frontend/events/index");
  }
  

    public function add($edit_id='')
    {	
        $this->layout->add_javascripts(array('tinymce/tinymce.min'));
        $this->layout->add_javascripts(array('tinymce'));  
        
        if(isset($_FILES["event_image"]["name"])&& $_FILES["event_image"]["size"]>0)
        {
          $this->form_validation->set_rules('event_image','Events image','trim|callback_do_upload');
        }
  		try
  		{
  			
        $this->form_validation->set_rules('title','Title','trim|required');
  			$this->form_validation->set_rules('description','Description','trim|required|min_length[15]');
  			$this->form_validation->set_rules('location','Location','trim|required');
  			$this->form_validation->set_rules('from_date','From date','trim|required');
  			$this->form_validation->set_rules('to_date','To date','trim|required');
  			$this->form_validation->set_rules('status','Status','trim|required');

  			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
  			if($this->form_validation->run())
  			{  
  				$form= $this->input->post();

  				$ins_data["title"]    = $form["title"];
  				$ins_data["location"] = $form["location"];
  				$ins_data["from_date"]= $form["from_date"];
  				$ins_data["to_date"]  = $form["to_date"];
  				$ins_data["description"] = $form["description"];
  				$ins_data["status"] = $form["status"];
          
          $creater_id   = $this->session->userdata("user_data");
  	       
           if(!empty($_FILES["event_image"]["name"]))
           {;
            $filedata1 = $this->do_upload();
            $filename1 = $filedata1["file_name"]; 
            $ins_data['event_image'] = (!empty($filename1))?$filename1:"";
           }

  				if($edit_id)
  				{
            $ins_data['updated_id'] = $creater_id["id"];
            $ins_data['updated_date']   = date("Y-m-d H:i:s");
  					$this->events_model->update(array("id"=>$edit_id),$ins_data);

  					$msg = "Events updated successfully";
  				} 
  				else
  				{ 
            $ins_data['created_id'] = $creater_id["id"];
            $ins_data['created_date']   = date("Y-m-d H:i:s");  
  					$this->events_model->insert($ins_data,"events");
  					$msg = "Events inserted successfully";
  				}
  				$this->session->set_flashdata("success_msg",$msg,true);
  				redirect("events");
  			}

  		}
  		catch (Exception $e)
  		{
  			$this->data["status"] = "error";
  			$msg  = $e->getMessage();
  		}

  			if($edit_id)
  			{  
  				$this->data["editdata"] = $this->events_model->get_where(array("id"=> $edit_id))->row_array();
  			}
  			else
  			{ 
  				$this->data["editdata"] = array("title"=>"","location"=>"","from_date"=>"","to_date"=>"","description"=>"", "status"=>"","image"=>"");
  			}
  			$this->layout->view('frontend/events/add',$this->data);
    }

    function delete($del_id)
    {
      $access_data = $this->events_model->get_where(array("id"=>$del_id),'id')->row_array();     
      $output = array();
      if(count($access_data) > 0)
      {
        $this->events_model->delete(array("id"=>$del_id));
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
         
         $config['upload_path']   = '../assets/img/events/';
         $config['allowed_types'] = 'gif|png|jpg|jpeg';
         $config['max_size']      = 2056;
         $config['max_width']     = 1800;
         $config['max_height']    = 800;

          $this->upload->initialize($config);

         if (!$this->upload->do_upload('event_image'))
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
}

?>