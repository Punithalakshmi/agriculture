<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class  News_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'news';
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
        case 'title':
          $this->db->like($key, $value);
        break;
        case 'description':
          $this->db->like($key, $value);
        break;
        case 'author':
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

    /**
     * This method handles to retrieve all news
     * */
  public function get_news()
   {
       $this->db->select("*"); 
       $this->db->from("news");
       $this->db->limit(3);
       $this->db->order_by("id","desc");
     return $this->db->get()->result_array();
   }

   /**
     * This method handles to retrieve a news detail by Id
     * */
    function get_news_by_id($id) {

        $table_name =  $this->_table;
        $return = [];

        $result = $this->db->get_where($table_name, array('id' => (int) $id));
        
        if (!empty($result)) {
            $return = $result->row_array();
        }

        return $return;
    }


}
?>