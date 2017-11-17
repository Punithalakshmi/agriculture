<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Country_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'country';
  }
  
    /**
    * This method handles to retrive all country
    **/
    function get_all($field='name', $order_by='ASC'){
        $table_name =  $this->_table;
        $this->db->select('name')
                    ->from($table_name)
                    ->where('status=', 'Active')
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