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
      $this->db->group_by('id');
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
   

}
?>