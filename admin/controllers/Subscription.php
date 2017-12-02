<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");
class Subscription extends Admin_Controller
{
  
  function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
      
    $this->load->model('services_product_model'); 
    $this->load->model('plans_model'); 
    $this->load->model('category_model'); 
    $this->load->model('seller_model');
    $this->load->model('subscription_model');
  }

  public function index()
  {


  	$this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');
    $this->simple_search_fields = array('seller' => 'Seller','plan' =>'Plan','payment_date'=>'Payment Date','status'=>'Status');
    $this->_narrow_search_conditions = array("start_date");

    $str = '<a href="'.site_url('subscription/view/{id}').'" class="btn btn-info"><i class="fa fa-eye"></i> View</a>';   
    $this->listing->initialize(array('listing_action' => $str));
    
    $listing = $this->listing->get_listings('subscription_model', 'listing');
    
    
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
    $this->layout->view("frontend/subscription/index");
  }

  public function view($id='')
  {
    if($id)
    {

     //$this->data['subscription'] = $this->subscription_model->get_subscription_by_id($id);

      //$this->data['seller']       = $this->seller_model->get_seller_by_id();
      //print_r($this->data['subscription']);exit;
      $this->layout->view('frontend/subscription/view');
    }
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