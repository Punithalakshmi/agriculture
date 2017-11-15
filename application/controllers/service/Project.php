<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

require_once(COREPATH."libraries/REST_Controller.php");

class Project extends REST_Controller {
	
	
    function __construct()
    {
    	parent::__construct();
        $this->load->model('api_model');
        
    }

    public function list_get()
	{

		try
		{
			$user_data = array();

			$contid = $this->get('id');
			$type   = $this->get('type');

			if( strcmp('', trim($contid) ) === 0)
				throw new Exception("Required fields are missing in your request");
				
			$user_data['data'] = $this->api_model->contractor_projects($contid,$type);

			$user_data['status'] = 'SUCCESS';
		}
		catch( Exception $e)
		{
			$user_data['message'] = $e->getMessage();
			$user_data['status'] = 'ERROR';
		}

		$this->response( $user_data, 200);

	}


	public function project_milestones_get()
	{

		try
		{
			$user_data = array();

			$contid 	= $this->get('id');
			$project_id = $this->get('project_id');	
			$type 		= $this->get('type');	

			if( strcmp('', trim($contid) ) === 0 || strcmp('', trim($project_id) ) === 0)
				throw new Exception("Required fields are missing in your request");
				
			$user_data['data'] = $this->api_model->contractor_milestones($contid,$project_id,$type);

			$user_data['status'] = 'SUCCESS';
		}
		catch( Exception $e)
		{
			$user_data['message'] = $e->getMessage();
			$user_data['status'] = 'ERROR';
		}

		$this->response( $user_data, 200);

	}

	public function work_items_get()
	{
		try
		{
			$user_data = array();	

			$project_id = $this->get('project_id');		

			if(strcmp('', trim($project_id) ) === 0)
				throw new Exception("Required fields are missing in your request");
				
			$user_data['work_items'] = $this->api_model->get_where(array(),'*','work_items')->result_array();

			$user_data['rooms'] = $this->api_model->get_where(array('project_id'=>$project_id),'id,room_name,room_no','rooms')->result_array();

			$user_data['status'] = 'SUCCESS';
		}
		catch( Exception $e)
		{
			$user_data['message'] = $e->getMessage();
			$user_data['status'] = 'ERROR';
		}

		$this->response( $user_data, 200);

	}

	public function milestone_update_post(){

		try
		{
			$user_data = array();

			$form = $this->post();
			$milestone_id = $form['id'];

			$timestamp = strtotime("now");

			$images = array();
            if(isset($form['photos']) && is_array($form['photos'])){

                foreach($form['photos'] as $key=>$value)
                {
                    if(empty($form['photos'][$key]))
                        continue;

                    $data = $value;
                    $file_name = $milestone_id."-".$key.$form['work_item']."-".$timestamp.".jpg";
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);

                    file_put_contents("./milestone_status/".$file_name, $data);

                    $images[] = $file_name;
                }    
            }

            $images = (!empty($images)) ? implode(",",$images) : '';

            $ins_data=array();
			$ins_data['milestone_id'] = $milestone_id;
			$ins_data['work_item']  = $form['work_item'];
			$ins_data['room_no']  	= $form['room'];
			$ins_data['status']  	= $form['status'];
			$ins_data['description']= $form['description'];
			$ins_data['photos']		= $images;
			$ins_data['created_date']= date('Y-m-d H:i:s');
			
			$this->api_model->insert($ins_data,'milestone_status');

			$this->api_model->update(array('id'=>$milestone_id),array('status'=>$form['status']),'project_milestones');
			

			$user_data['status'] = 'SUCCESS';
		}
		catch( Exception $e)
		{
			$user_data['message'] = $e->getMessage();
			$user_data['status'] = 'ERROR';
		}

		$this->response( $user_data, 200);
	}

	public function milestone_status_get()
	{
		try
		{
			$user_data = array();	

			$milestone_id = $this->get('id');		

			if(strcmp('', trim($milestone_id) ) === 0)
				throw new Exception("Required fields are missing in your request");
				
			$data= $this->api_model->getmilestone_history($milestone_id);

			$myval = array();
			foreach($data as $row){
				$row['photos'] = (!empty($row['photos'])) ? explode(",",$row['photos']) : '';
				$myval[] = $row;
			}

			$user_data['data']= $myval;

			$user_data['imgpath']= 'http://162.144.41.156/~izaapinn/construction/milestone_status/';

			$user_data['status'] = 'SUCCESS';
		}
		catch( Exception $e)
		{
			$user_data['message'] = $e->getMessage();
			$user_data['status'] = 'ERROR';
		}

		$this->response( $user_data, 200);

	}
	
}
?>
