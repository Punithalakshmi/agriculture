<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class  Photos_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'seller_image';
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
     * This method handles to retrieve a bio detail by seller Id
     * */
    function get_photos_by_id($seller_id) {


        $table_name =  $this->_table;

        $return = [];

        $result = $this->db->get_where($table_name, array('seller_id' => (int) $seller_id));

        if (!empty($result)) {

            $return = $result->result();
        }

        return $return;
    }
      

    /**
     * This method handles to update bio data by id
     * */
    function update_photos($seller_id, $data) {
        $table_name =  $this->_table;
        $this->db->where('seller_id', $seller_id);
        $result = $this->db->update($table_name, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

  
   /**
     * This method handles to retrieve a bio detail by seller Id
     * */
   /* function get_bio_by_id($seller_id) {

        $table_name =  $this->_table;
        $return = [];

        $result = $this->db->get_where($table_name, array('seller_id' => (int) $seller_id));
        
        if (!empty($result)) {
            $return = $result->row_array();
        }

        return $return;
    }*/

    /**
     * This method handles to update bio data by id
     * */
    /* function update_bio($seller_id, $data) {
        $table_name =  $this->_table;
        $this->db->where('seller_id', $seller_id);
        $result = $this->db->update($table_name, $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }*/

}
?>