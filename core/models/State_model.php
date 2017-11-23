<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class State_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'states';
  }
  
 /**
    * This method handles to retrive all state
    **/
    function get_all($field='name', $order_by='ASC'){
        $table_name =  $this->_table;
        $this->db->select('*')
                    ->from($table_name)
                    
                    //->order_by($field, $order_by);
                 ->order_by('name','ASC');
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