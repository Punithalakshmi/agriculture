<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class  Subscription_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'subscription';
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
        case 'seller':
          $this->db->like($key, $value);
        break;
        case 'plan':
          $this->db->like($key, $value);
        break;
        case 'status':
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
     * This method handles to retrieve a subscription detail by subscription Id
     * */
    function get_subscription_by_id($id) {

        $table_name =  $this->_table;
        $return = [];

        $result = $this->db->get_where($table_name, array('id' => (int) $id));
        if (!empty($result)) {
         
            $return = $result->result_array();
        }

        return $return;
    }

}
?>