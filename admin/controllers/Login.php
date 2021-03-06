<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");

class Login extends Admin_Controller 
{
    protected $_login_validation_rules =    array (
                                                    array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email'),
                                                    array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required')
                                                  );
    function __construct()
    {
        parent::__construct();  
        
        $this->load->model('login_model');
       
    }  
    public function index()
    {
       
       $this->form_validation->set_rules($this->_login_validation_rules);
       
        if($this->form_validation->run())
        {
            $form = $this->input->post();
            $chk = $this->login_model->login($form['email'], $form['password']);
            if($chk)
            {   
                 redirect("seller");   
            }
            else if($this->login_model->login1($form['email'], $form['password']))
            {
                redirect("seller/add");
            }
            else
            {

                $this->session->set_flashdata("login_fail1","Invalid Username or Password",TRUE);
            }
            
        }

        if(is_logged_in()) 
        {
            $admin_data = get_user_type();
            if($admin_data["role"]==1)
            {
                redirect("seller");                
            }
            elseif($admin_data["role"]==2)
            {
                redirect("seller/add");
            }
         
        } 
        
        $this->layout->view("login/index");
        
    }
    
    public function logout()
	{
	   
		$this->session->sess_destroy();
	
		  $this->session->set_flashdata('logout_success','logged out successfully');
	
		redirect('login');
	}
    
}
?>