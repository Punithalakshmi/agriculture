<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");
class Seller extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
      
    $this->load->model('chapter_model');  
  }

  
  public function index()
  {
    $this->layout->view('frontend/dashboard');
  }
  
  public function index()
  {
  	$this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');
    $this->simple_search_fields = array('first_name' => 'First Name','last_name'=>'Last Name','email'=>'Email','phone'=>'Phone',"status"=>"Status");
    $this->_narrow_search_conditions = array("start_date");
    $str = '<a href="#" class="btn btn btn-padding yellow table-action"><i class="fa fa-edit edit"></i> Details</a';    
    $this->listing->initialize(array('listing_action' => $str));
    $listing = $this->listing->get_listings('york_model', 'listing');
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
  	$this->layout->view('frontend/york/index');
  }
  
  public function add($edit_id = '')
  {
    
    $this->layout->add_javascripts(array('bootstrap-datepicker.min'));  
    $this->layout->add_stylesheets(array('bootstrap-datepicker3.min'));
    
     try
        {
          if($this->input->post('edit_id'))            
            $edit_id = $this->input->post('edit_id');
           
          $this->form_validation->set_rules('chapter_name','Chapter Name','trim|required');
          $this->form_validation->set_rules('chapter_no','Chapter No','trim|required');
          $this->form_validation->set_rules('district_no','District No','trim|required');
          $this->form_validation->set_rules('top_line_signer','Top Line Signer','trim|required');
          $this->form_validation->set_rules('most_high_priest','Most High Priest','trim|required');
          $this->form_validation->set_rules('district_high_priest','District High Priest','trim|required');
          
          $this->form_validation->set_error_delimiters('', '');
          if($this->form_validation->run()){
            
              $ins_data = array();
              $ins_data['chapter_name']              = $this->input->post('chapter_name');
              $ins_data['chapter_no']                = $this->input->post('chapter_no');
              $ins_data['district_no']               = $this->input->post('district_no');
              $ins_data['top_line_signer']           = $this->input->post('top_line_signer');  
              $ins_data['second_line_signer']        = $this->input->post('second_line_signer');
              $ins_data['date_joined']               = $this->input->post('date_joined_chapter');
              $ins_data['most_high_priest']          = $this->input->post('most_high_priest');
              $ins_data['year1']                     = $this->input->post('year1');
              $ins_data['district_high_priest']      = $this->input->post('district_high_priest');
              $ins_data['year2']                     = $this->input->post('year2');
              $ins_data['hight_priest']              = $this->input->post('hight_priest');
              $ins_data['year3']                     = $this->input->post('year3');
              $ins_data['king']                      = $this->input->post('king');
              $ins_data['scribe']                    = $this->input->post('scribe');
              $ins_data['secretary']                 = $this->input->post('secretary');
              $ins_data['treasurer']                 = $this->input->post('treasurer');
              $ins_data['capt_host']                 = $this->input->post('capt_host');
              $ins_data['principal_sojourner']       = $this->input->post('principal_sojourner');
              $ins_data['ra_captain']                = $this->input->post('ra_captain');
              $ins_data['master_vef_1']              = $this->input->post('master_vef_1');
              $ins_data['master_vef_2']              = $this->input->post('master_vef_2');
              $ins_data['master_vef_3']              = $this->input->post('master_vef_3');
              $ins_data['chaptain']                  = $this->input->post('chaptain');
              $ins_data['sentinel']                  = $this->input->post('sentinel');
              
              if($edit_id){
                $msg                      = 'Chapter updated successfully';
                $this->chapter_model->update(array("id" => $edit_id),$ins_data);
               // log_history($edit_id,'inventory',"Product <b>".$ins_data['name']."</b> has been updated."); 
              }
              else
              {    
                $new_id                   = $this->chapter_model->insert($ins_data);         
                $msg                      = 'Chapter added successfully';
                $edit_id                  =  $new_id;
               // log_history($new_id,'inventory',"Product <b>".$ins_data['name']."</b> has been inserted."); 
              }
              $this->session->set_flashdata('success_msg',$msg,TRUE);
              $status  = 'success';
          }    
          else
          {
            $edit_data = array();
            $edit_data['chapter_name']              = '';
            $edit_data['chapter_no']                = '';
            $edit_data['district_no']               = '';
            $edit_data['top_line_signer']           = '';  
            $edit_data['date_joined']               = '';
            $edit_data['most_high_priest']          = '';
            $edit_data['year1']                     = '';
            $edit_data['district_high_priest']      = '';
            $edit_data['year2']                     = '';
            $edit_data['hight_priest']              = '';
            $edit_data['year3']                     = '';
            $edit_data['king']                      = '';
            $edit_data['scribe']                    = '';
            $edit_data['secretary']                 = '';
            $edit_data['treasurer']                 = '';
            $edit_data['capt_host']                 = '';
            $edit_data['principal_sojourner']       = '';
            $edit_data['ra_captain']                = '';
            $edit_data['master_vef_1']              = '';
            $edit_data['master_vef_2']              = '';
            $edit_data['master_vef_3']              = '';
            $edit_data['chaptain']                  = '';
            $edit_data['sentinel']                  = '';
            $status = 'error';
          }
        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $msg  = $e->getMessage();
        }

        if($edit_id){
          $edit_data = $this->chapter_model->get_where(array("id" => $edit_id))->row_array();
        }   
         
        $this->data['editdata']              = $edit_data;
        
        if($this->input->is_ajax_request()){
          $output  = $this->load->view('frontend/yorksite/chapter',$this->data,true);
          return $this->_ajax_output(array('status' => $status, 'output' => $output, 'edit_id' => $edit_id), TRUE);
        } 
        else
        {
            $this->layout->view('frontend/yorksite/chapter',$this->data);
        }  
  }
  
}
?>