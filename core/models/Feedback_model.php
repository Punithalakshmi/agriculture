<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class  Feedback_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'feedback';
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
        case 'address':
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
     * This method handles to retrieve all feedbacks
     * */
   function get_feedbacks($field='id', $order_by='DESC'){
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

    /**
     * This method handles to retrieve a feedback detail by Id
     * */
    function get_feedback_by_id($id) {

        $table_name =  $this->_table;
        $return = [];

        $result = $this->db->get_where($table_name, array('id' => (int) $id));
        
        if (!empty($result)) {
            $return = $result->row_array();
        }

        return $return;
    }
}

 /**
     * This method handles to retrieve image by Id
     * */
    function get_image_by_id($id) {

        $table_name =  $this->_table;

        $return = [];

        $result = $this->db->get_where($table_name, array('id' => (int) $id));

        if (!empty($result)) {

            $return = $result->result();
            
        }

        return $return;
    }
?>