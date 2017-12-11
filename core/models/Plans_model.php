<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Plans_model extends App_model
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

  /**
    * This method handles to retrive all plans
    **/
    function get_plans_all(){
        $table_name =  $this->_table;
        $this->db->select('*')
                    ->from($table_name);
        $data = $this->db->get();
        if(!empty($data)){
            $return = $data->result_array();
            return $return;
        }else{
            return $return;
        }
    }


}
?>