<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class  Services_product_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'services';
  }
  
  function listing()
  {  
    $admin_data = get_user_type();
    //print_r($admin_data["id"]); exit;
    $this->_fields = "*";
    $this->db->group_by('id');
    
    if($admin_data["role"]==2)
    {
      $this->db->where('seller_id',$admin_data["id"]);
    }

    foreach ($this->criteria as $key => $value)
    {
      if( !is_array($value) && strcmp($value, '') === 0 )
        continue;
      switch ($key)
      {
        case 'first_name':
          $this->db->like($key, $value);
        break;
        case 'last_name':
          $this->db->like($key, $value);
        break;
        case 'email':
          $this->db->like($key, $value);
        break;
        // case 'active':
        //   $this->db->like($key, $value);
        // break;
      }
    }
    return parent::listing();
  }
   
   public function get_services($limit='',$start='')
  {
      $this->db->select("*");
    if($limit!='')
      $this->db->limit($limit, $start);
      $this->db->from("services");
    return $this->db->get()->result_array();
  }
   public function unique($id='')
   {
    $this->db->select('*');
    $this->db->from('services');
    $this->db->where('id',$id);
    $result = $this->db->get()->row_array();
    //echo "<pre>"; print_r($result); exit;
   return $result;

   }

   public function get_related($id='')
   {
      $this->db->select('*');
    $this->db->from('services');
    $this->db->where('seller_id',$id);
    $result = $this->db->get()->row_array();
    //echo "<pre>"; print_r($result); exit;
   return $result;
   }

}
?>