<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Category_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'category';
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
        case 'active':
          $this->db->like($key, $value);
        break;
      }
    }
    return parent::listing();
  }

  /**
    * This method handles to retrive all category
    **/
    function get_all($field='name', $order_by='ASC'){
        $table_name =  $this->_table;
        $this->db->select('*')
                    ->from($table_name)
                   ->order_by('name','ASC');
        $data = $this->db->get();
        if(!empty($data)){
            $return = $data->result();
            return $return;
        }else{
            return $return;
        }
    }

    function get_category()
    {
      $this->db->select('*');
      $this->db->from('category');
      $result = $this->db->get()->result_array();
      return $result;
    }

     /*function get_category_name($id)
    {

      $this->db->select('*');
      $this->db->from('category');
      $this->db->where('id',$id);
      
      $result = $this->db->get()->row_array();
      //print_r($result); exit;
      return $result['name'];
    }*/

}
?>