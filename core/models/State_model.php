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
    /**
    * This method handles to retrive all states based on a country Id
    **/
    function get_state_by_country_id($id){
        $table_name =  $this->_table;
        $this->db->select('*')
                    ->from($table_name)
                    ->where('country_id',$id)
                    ->order_by('name ASC');
        $data = $this->db->get();
        if(!empty($data)){
            $return = $data->result();
            return $return;
        }else{
            return $return;
        }
        
    }
    /**
    * This method handles to retrive all states
    **/
    function get_state_all($field='name', $order_by='ASC', $country_id=false){
        $table_name =  $this->_table;
        $this->db->select('*')
                    ->from($table_name)
                    ->order_by($field, $order_by);
        if($country_id){
            $this->db->where('country_id =', $country_id);
        }
        $data = $this->db->get();
        if(!empty($data)){
            $return['data'] = $data->result();
            return $return;
        }else{
            return $return;
        }
    }



}
?>