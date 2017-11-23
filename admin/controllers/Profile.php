<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Seller_controller.php");
class Profile extends Seller_controller
{
 
	function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
    $this->load->model('seller_model');
  }

  
  public function index()
  {
    
    //$this->layout->add_stylesheets('profile');
    //$this->data['editdata'] = get_user_info();
    //$this->data['profile'] = $this->load->view("frontend/profile/profile",$this->data,true);
    $this->layout->view('frontend/profile');
  }
}
?>