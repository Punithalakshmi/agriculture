<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Product_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'plans';
  }
  
  function listing()
  {  
    
    $this->_fields = "*";
    $this->db->group_by('id');

    foreach ($this->criteria as $key => $value)
    {
      if( !is_array($value) && strcmp($value, '') === 0 )
        continue;
      switch ($key)
      {
        case 'name':
          $this->db->like($key, $value);
        break;
        case 'amount':
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