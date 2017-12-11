<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class  Services_product_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'services';
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
   
   public function get_services()
  {
      $this->db->select("*"); 
      $this->db->from("services");
    return $this->db->get()->result_array();
  }

   public function unique($id='')
   {
    $this->db->select('*');
    $this->db->from('services');
    $this->db->where('id',$id);
    $result = $this->db->get()->row_array();
   return $result;

   }

   public function filter_search($limit='',$start='',$filter)
   {

    $this->db->select('SQL_CALC_FOUND_ROWS a.*,b.id as seller,b.phone',FALSE); 
    $this->db->from('services a');
    $this->db->join("seller b","a.seller_id=b.id");   

    if($filter["category"]!='') 
     $this->db->where('category_id',$filter["category"]);

    $like = false;
    
    if($filter['keyword']!=''){        
      $this->db->like("a.title",$filter['keyword']);
      $like = true;
     } 
    

    if($filter["location"]!='')
    { 
        $this->db->join("state s","s.id=b.state_id");  

        if($like)
          $this->db->or_like("b.city",$filter['location']);
        else
          $this->db->like("b.city",$filter['location']);

        $this->db->or_like("s.name",$filter['location']);
        $this->db->or_like("b.zip",$filter['location']);
    }
          
   $this->db->limit($limit, $start);
   $data = $this->db->get()->result_array();

   $count = $this->db->query("select FOUND_ROWS() as count")->row()->count;

   return array('data'=>$data,'count'=>$count);
   }

}
?>