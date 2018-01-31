<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class App_Controller extends CI_Controller
{
    public $logged_in                  = FALSE;
    public $error_message              =    '';
    public $data                       =    array();
    public $role                       =    0;
    public $init_scripts               = array();
    public $criteria                   = array(); 
    
   
    
    public function __construct()
    {
        parent::__construct(); 
    
    //print_r($this->session->userdata('user_data'));die;        

        //if($this->uri->segment(1,'')
        $this->load->library("form_validation");        
        
        $this->load->library("layout");

        
        $this->data['img_url']=$this->layout->get_img_dir();  

        $this->_init_layout();    

    }
    
    protected function _init_layout()
    {

       /*  $this->load->helper('cookie');
        $ip = "";
        $count=1;
        if(!is_logged_in()){

            $ip = $this->input->ip_address();
            $get_cookie = isset($_COOKIE['name'])?$_COOKIE['name']:"";
            if($get_cookie)
            {
                $decode = json_decode($get_cookie);
                if($decode->value == $ip)
                    $count= $decode->count+1;
            }
            
            $cookie = array(
            'count'=>$count,
            'name' => 'ip',
            'value' => $ip,
            'expire' => '86400'
         );
        //echo json_encode($cookie);exit;
        setcookie('name',json_encode($cookie));

        if($count>=50){ ?>

               <script type="text/javascript">
                    alert("Please login to get extra benefit for agriculture");
                </script>

        <?php } 
        
        } */
       
        
        $this->layout->initialize($this->config->item('default', 'layout'));
               
    }



    public function index()
    {
       
    }
    
    public function _ajax_output($data, $json_format = FALSE)
    {
        if(is_array($data) && $json_format)
            echo json_encode($data);
        else 
            echo $data;
        
        exit();
    }
    
    
  
}

?>
