<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class  Services_product_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'services';
    //$this->_table = 'category';
  }
  
  function listing()
  {  
    $admin_data = get_user_type();
    //print_r($admin_data["id"]); exit;
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
    //echo "<pre>"; print_r($result); exit;
   return $result;

   }

   public function filter_search($limit='',$start='',$filter)
   {
   if($filter["category"]!='') 
   $this->db->where('category_id',$filter["category"]);
    if($filter["location"]!='' && $filter["category"]=='')
    { //echo "one"; exit;
        $this->db->like("b.city",$filter['location']);
           $this->db->or_like("b.state_id",$filter['location']);
           $this->db->or_like("b.country_id",$filter['location']);
           $this->db->or_like("b.zip",$filter['location']);
    }
      if($filter['location']!='' && $filter["category"]!='')
      {
        
         $this->db->where('category_id',$filter["category"]);
         $this->db->like("b.city",$filter['location']);
         $this->db->or_like("b.zip",$filter['location']);
 
      }
        if($filter['keyword']!='' && $filter['location']=='' && $filter["category"]=='')
        {     
          $this->db->like("a.title",$filter['keyword']);
          $this->db->or_like("a.description",$filter['keyword']);
        }
           $this->db->select('a.*,b.id as seller,b.phone');
           $this->db->limit($limit, $start);
           $this->db->from('services a');
           $this->db->join("seller b","a.seller_id=b.id");

           $result = $this->db->get()->result_array();
          //print_r($this->db->last_query()); exit;
           return $result;
   }

}
?>