<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model
{
   
   function __construct()
   {
     parent::__construct();
   }
   
   public function login($email, $password)
   {

     $pass = md5($password);
     
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);

        $user = $this->db->get()->row_array();
     
      if(count($user)>0)
      {      
        $this->session->set_userdata('user_data', $user);
        
        return TRUE;
      }
      
      return FALSE;
   }
   
   public function login1($email, $password)
   {

     $pass = md5($password);
     
        $this->db->select("*");
        $this->db->from('seller');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);

        $seller_user = $this->db->get()->row_array();
     
      if(count($seller_user)>0)
      {      
        $this->session->set_userdata('user_data', $seller_user);
        
        return TRUE;
      }
      
      return FALSE;
   }
   
   public function logout()
   {
        $this->session->sess_destroy();
   }

   /**
     * This method checks email exist
     * */
    function get_customer_email($data) {

        $result = '';
        $this->db->select('*')
                 ->from('seller')
                ->where('email', $data);
        $result = $this->db->get()->result();

        return $result;
    }

    /**
     * This method handles to retrieve a user detail by email
     * */
    function get_user_details_by_email($email) {

        $table_name = $this->customer_temp_table_name;
        $return = [];

        $result = $this->db->get_where($table_name, array('email' => $email));
        if (!empty($result)) {
            $return = $result->result();
        }

        return $return;
    }

    public function update_password_by_email($password, $email) {
        $data = array('password' => $password);
        $this->db->where('email', $email);
        $result = $this->db->update('seller', $data);
        return $result;
    }
    
}

?>