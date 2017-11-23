<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/***
* File Name 		: Country_manager.php
* Description           : 
* Author 		:  athish <sats1140@gmail.com>
**/
class Country_state extends Admin_Controller {
	/**
	* constructor
	**/
	function __construct(){
		parent::__construct();
		$this->load->model('country_model');
    $this->load->model('state_model');
	}

    /*
    * This method loads states based on the country
    */
    public function get_state($id){   
        $states = get_state_by_country($id);
        foreach($states as $index=>$state):
            echo '<option value="'.$index.'">'.$state.'</option>';
        endforeach;
        exit;
    }
  
}

