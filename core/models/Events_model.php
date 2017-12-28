<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Events_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'events';
  }
  
  function listing()
  {  

    $admin_data = get_user_type();

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
        case 'title':
          $this->db->like($key, $value);
        break;
        case 'location':
          $this->db->like($key, $value);
        break;
          //case 'active':
          // $this->db->like($key, $value);
          //break;
      }
    }
    return parent::listing();
  }

  /**
    * This method handles to get all events
    **/
  function get_events($limit='',$start='')
    {

      $this->db->select('*');
      $this->db->from('events');
      $this->db->where('status=', 'Active');
      $this->db->order_by('id', 'DESC');
      $this->db->limit($limit, $start);
      
      $result = $this->db->get()->result();
      
      return $result;
    }
    /**
     * This method handles to retrieve a events detail by Id
     * */
    function get_events_by_id($id) {

        $table_name =  $this->_table;
        $return = [];

        $result = $this->db->get_where($table_name, array('id' => (int) $id));
        
        if (!empty($result)) {
            $return = $result->row_array();
        }

        return $return;
    }

     /**
     * This method handles to retrieve all events
     * */
   function get_all_events($field='id', $order_by='DESC'){
       $table_name =  $this->_table;
        $this->db->select('*')
                    ->from($table_name)
                    ->where('status=', "Active")
                    ->order_by($field, $order_by);
        $data = $this->db->get();
        if(!empty($data)){
            $return = $data->result_array();
            return $return;
        }else{
            return $return;
        }
    }


     /**
     * This method handles to retrieve limited evets
     * */
   function get_events_list($field='id', $order_by='DESC'){
       $table_name =  $this->_table;
        $this->db->select('*')
                    ->from($table_name)
                    ->where('status=', "Active")
                    ->limit(3)
                    ->order_by($field, $order_by);
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