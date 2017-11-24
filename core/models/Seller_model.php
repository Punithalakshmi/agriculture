<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Seller_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'seller';
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

  /**
    * This method handles to retrive all seller
    **/
    function get_all($field='name', $order_by='ASC'){
        $table_name =  $this->_table;
        $this->db->select('*')
                    ->from($table_name)
                   ->order_by('first_name','ASC');
        $data = $this->db->get();
        if(!empty($data)){
            $return = $data->result();
            return $return;
        }else{
            return $return;
        }
    }

}
?>