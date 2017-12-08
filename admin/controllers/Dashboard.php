<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");

class Dashboard extends Admin_Controller 
{
    
    function __construct()
    {
        parent::__construct();  
        
        $this->load->model('login_model');
       
    }  
    public function index()
    {
       
       
        redirect('seller');
        
    }
    
    public function logout()
	{
	   
		$this->session->sess_destroy();
	
		  $this->session->set_flashdata('logout_success','logged out successfully');
	
		redirect('login');
	}
    
}
?>