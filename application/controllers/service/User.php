<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

require_once(COREPATH."libraries/REST_Controller.php");

class User extends REST_Controller {
	
	
    function __construct()
    {
    	parent::__construct();
        $this->load->model('api_model');
        
    }

    public function login_post()
	{

		try
		{
			$user_data = array();

			$name 		= $this->post('username');
			$password 	= $this->post('password');

			if( strcmp('', trim($name) ) === 0 || strcmp('', trim($password) ) === 0 )
				throw new Exception("Required fields are missing in your request");
				

			$user_data['data'] = $this->api_model->login( $name, $password );

			if( !is_array($user_data['data']) || !count($user_data['data']) )
			 throw new Exception("The Username or Password is invalid .");
			
			if( $user_data['data']['active'] == 'N' )
			 throw new Exception("The user account has been blocked or Inactive. Please try after some time or contact administrator to resolve.");


			$user_data['message'] = "Login Successfully";
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
