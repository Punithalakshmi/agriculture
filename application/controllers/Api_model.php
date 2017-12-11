<?php

require_once(COREPATH."libraries/models/App_model.php");
class Api_model extends App_Model {
    
    
    function __construct()
    {
        parent::__construct();
       
    }
   
	function login($name = "",$password = "")
	{
		$where=array('username'=>$name,'password'=>md5($password));
		
		$this->db->select("id,CONCAT(first_name,' ',last_name) as name,company_name,active,office_phone,cell_phone,email1,address1,city,state,zip",FALSE);
		$this->db->from('contractor');
		$this->db->where($where);

		$user = $this->db->get()->row_array();

		return $user;
		
	}

	function contractor_projects($id,$type='pending')
	{
		
		$this->db->select("p.id,p.project_name,IF(p.blueprint='','',CONCAT('".base_url()."',p.blueprint))as blueprint ,p.status,CONCAT(project_address1,' ',project_address2,',',project_city,',',project_state,',',project_zip_code) as project_address,CONCAT(c.first_name,' ',c.last_name,',',c.address,',',c.city,',',c.state,'-',c.zip,', ph-',c.phone) as client_address",FALSE);
		$this->db->from('project p');
		$this->db->join('project_contractors pc','p.id=pc.project_id');
		$this->db->join('client_contacts c','c.id=p.client_contact1');
		$this->db->join('project_milestones pm','p.id=pm.project_id AND pm.contractor_id='.$id);
		$this->db->where("FIND_IN_SET('$id',pc.contractor_id) !=",0);

		if($type == 'pending')
			$this->db->where_in('pm.status',array('PENDING','PROCESSING','HOLD'));
		
		if($type == 'complete')
			$this->db->where('pm.status','COMPLETED');

		$this->db->group_by("p.id");

		$user = $this->db->get()->result_array();

		return $user;
		
	}

	function contractor_milestones($contid,$project_id,$type)
	{
		
		$this->db->select("m.id,m.project_id,m.name,m.description,m.start_date,m.end_date,m.status,(SELECT GROUP_CONCAT(work_name) as work_items from work_items WHERE id IN(m.work_items)) as work_items,IF(ms.id is NOT NULL,'1','0') as review ",FALSE);
		$this->db->from("project_milestones m");
		$this->db->join('milestone_status ms','m.id=ms.milestone_id','left');
		$this->db->where('m.project_id',$project_id);
		$this->db->where('m.contractor_id',$contid);

		if($type == 'pending')
			$this->db->where_in('m.status',array('PENDING','PROCESSING','HOLD'));

		if($type == 'complete')
			$this->db->where('m.status','COMPLETED');

		$this->db->group_by("m.id");


		//$query = "SELECT m.id,m.project_id,m.name,m.description,m.start_date,m.end_date,m.status,(SELECT GROUP_CONCAT(work_name) as work_items from work_items WHERE id IN(m.work_items)) as work_items FROM project_milestones m WHERE m.project_id =".$project_id." AND m.contractor_id=".$contid." AND ".$where;

		$res = $this->db->get()->result_array();

		return $res;
		
	}

	function getmilestone_history($milestone_id){

		$this->db->select("w.work_name,CONCAT(r.room_name,'(',r.room_no,')') as room, m.status,m.description,m.photos,m.created_date",FALSE);
		$this->db->from('milestone_status m');
		$this->db->join('work_items w','w.id=m.work_item');
		$this->db->join('rooms r','r.id=m.room_no');
		$this->db->where('m.milestone_id',$milestone_id);
		$this->db->group_by("m.id");

		return $this->db->get()->result_array();

	}
	
    
}
?>
