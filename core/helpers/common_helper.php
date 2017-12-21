<?php

function is_logged_in()
{
    $CI = get_instance();
    
    $user_data = get_user_data();
    
    if( is_array($user_data) && $user_data )
        return TRUE;

    return FALSE;

}


function get_current_user_id()
{
    $CI = & get_instance();
    
    $current_user = get_user_data();
    
    if(!empty($current_user)) {
        return $current_user['id'];
    }

    return FALSE;
}
function get_user_data()
{
    $CI = get_instance();
    
        
    if($CI->session->userdata('user_data'))
    {
        return $CI->session->userdata('user_data');
    }
    else
    {
        return FALSE;
    }
}

function get_user_role( $user_id = 0 )
{
    $CI= & get_instance();
    
    if(!$user_id) 
    {
        $user_data = get_user_data();
        return $user_data['role'];
    }   
    
    $CI->load->model('user_model');
    $row = $CI->user_model->get_where(array('id' => $user_id))->row_array;

    if( !$row )
        return FALSE;

    return $row['role'];
}

function get_roles()
{
    $CI = & get_instance();
    $CI->load->model('role_model');
    $records = $CI->role_model->get_roles();

    $roles = array();
    foreach ($records as $id => $val) 
    {
        $roles[$id] = $val;
    }

    return $roles;
}

function display_flashmsg($flash){

    if(!$flash)
        return FALSE;

    $status = $msg = '';

    if(isset($flash['success_msg'])){
        $status = 'success';
        $msg = $flash['success_msg'];
    }

    if(isset($flash['error_msg'])){
        $status = 'danger';
        $msg = $flash['error_msg'];
    }

    if($status && $msg){
        $str = '<div id="div_service_message" class="Metronic-alerts alert alert-'.$status.' fade in">';
        $str.= '<button class="close" aria-hidden="true" data-dismiss="alert" type="button"><i class="fa-lg fa fa-warning"></i></button>';
        
        if($status == 'danger')
            $status = 'error';
        $str.='<strong>'.ucfirst($status).':&nbsp;</strong> '. strip_tags($msg) .' </div>';

        echo $str;
    }

}


function displayData($data = null, $type = 'string', $row = array(), $wrap_tag_open = '', $wrap_tag_close = '')
{
     $CI = & get_instance();
     
    if(is_null($data) || is_array($data) || (strcmp($data, '') === 0 && !count($row)) )
        return $data;
    
    switch ($type)
    {
        case 'string':
            break;
        case 'humanize':
        $CI->load->helper("inflector");
            $data = humanize($data);
            break;
        case 'date':
            str2USDate($data);
            break;
        case 'status':
           $labels_array = array('COMPLETED' => 'label-success','PROCESSING' => 'label-success','CANCELLED' => 'label-danger','HOLD' => 'label-danger','PENDING'=>'label-warning','Active' => 'label-success','Inactive' => 'label-danger');
           $data = "<span class='label {$labels_array[$data]}'>{$data}</span>";
          break;
        case "status_change":
            $labels_array = array('COMPLETED' => 'label-success','PROCESSING' => 'label-success','CANCELLED' => 'label-danger','HOLD' => 'label-danger','PENDING'=>'label-warning');
            $data = "<span class='label status_label label-".$row['id']." {$labels_array[$data]}'>{$data}</span><br><br>";
            $data .= "<a href='javascript:;' class='label-".$row['id']."' onclick='change_status(".$row['id'].",0)'>Change Status</a>";
            $data .= form_dropdown('status',array('PENDING'=>"PENDING",'PROCESSING'=>"PROCESSING","HOLD"=>"HOLD","COMPLETED"=>"COMPLETED"),'',"class='form-control hide select-status-".$row['id']."'");
            $data .="<br><a href='javascript:;' class='select-status-".$row['id']." hide btn btn-danger' onclick='change_status(".$row['id'].",1)'>Save</a>";
        break;
        case 'datetime':
            $data = str2USDate($data);
            break;
        case 'money':
            $data = '$'.number_format((float)$data, 2);
            break;    
    }
    
    return $wrap_tag_open.$data.$wrap_tag_close;
}

function str2USDate($str)
{
    $intTime = strtotime($str);
    if ($intTime === false)
         return NULL;
    return date("m/d/Y H:i:s", $intTime);
}

function str2USDT($str)
{
    $intTime = strtotime($str);
    if ($intTime === false)
         return NULL;
    return date("m/d/Y", $intTime);
}

    // no logic for server time to local time.
function str2DBDT($str=null)
{
    $intTime = (!empty($str))?strtotime($str):time();
    if ($intTime === false)
         return NULL;
    return date("Y-m-d H:i:s", $intTime);
}

function str2DBDate($str)
{
    $intTime = strtotime($str);
    if ($intTime === false)
        return NULL;
    return date("Y-m-d",$intTime);
}

function addDayswithdate($date,$days){

    $date = strtotime("+".$days." days", strtotime($date));
    return  date("m/d/Y", $date);

}

function day_to_text($date) {
    
    $day_no = date("N",strtotime($date));
    
    $day_array = array(1 => "Monday" , 2 => "Tuesday" , 3 => "Wednesday" , 4 => "Thursday" , 5 => "Friday" , 6 => "Saturday" , 7 => "Sunday"  );
    
    return $day_array[$day_no];
}


function date_ranges($case = '')
{
    $dt = date('Y-m-d');
    if(empty($case)){
        return false;
    }

    switch($case)
    {
        case 'today':
            $highdateval = $dt;
            $lowdateval = $dt;
        break;
        case 'thisweek':
            $highdateval = date('Y-m-d', strtotime('saturday this week'));
            $lowdateval  = date('Y-m-d', strtotime('sunday last week'));
        break;
        case 'thisweektodate':
            $highdateval = date('Y-m-d', strtotime($dt));
            $lowdateval  = date('Y-m-d', strtotime('sunday last week'));
        break;
        case 'thismonth':
            $highdateval = date('Y-m-d', strtotime('last day of this month'));
            $lowdateval  = date('Y-m-d', strtotime('first day of this month'));
        break;
        case 'thismonthtodate':
            $highdateval = date('Y-m-d', strtotime($dt));
            $lowdateval  = date('Y-m-d', strtotime('first day of this month'));
        break;
        case 'thisyear':
            $highdateval = date('Y-m-d', strtotime('1/1 next year -1 day'));
            $lowdateval  = date('Y-m-d ', strtotime('1/1 this year'));
        break;
        case 'thisyeartodate':
            $highdateval = date('Y-m-d', strtotime($dt));
            $lowdateval  = date('Y-m-d', strtotime('1/1 this year'));
        break;
        case 'thisquarter':
        $quarters = array();
        $first_day_year = date('Y-m-d', strtotime('1/1 this year'));
        $quarters[01] = $quarters[02] = $quarters[03] = array('start_date' => $first_day_year,'end_date' => date('Y-m-d', strtotime('4/1 this year - 1 day')));
        $quarters[04] = $quarters[05] = $quarters[06] = array('start_date' => date('Y-m-d', strtotime('4/1 this year')),'end_date' => date('Y-m-d', strtotime('7/1 this year - 1 day')));
        $quarters[07] = $quarters[08] = $quarters[09] = array('start_date' => date('Y-m-d', strtotime('7/1 this year')),'end_date' => date('Y-m-d', strtotime('10/1 this year - 1 day')));
        $quarters[10] = $quarters[11] = $quarters[12] = array('start_date' => date('Y-m-d', strtotime('10/1 this year')),'end_date' =>  date('Y-m-d', strtotime('1/1 next year -1 day')));
        $cur_month = (int) date("m",strtotime($dt));
       
        
        $date_range = $quarters[$cur_month];
        $highdateval = $date_range['end_date'];
        $lowdateval  = $date_range['start_date'];
        break;
        case 'yesterday':
            $highdateval = date('Y-m-d', strtotime('yesterday'));
            $lowdateval  = date('Y-m-d', strtotime('yesterday'));
        break;
        case 'recent':
            $highdateval =  date('Y-m-d', strtotime($dt));
            $lowdateval = date('Y-m-d',mktime(0,0,0,date("m"),date("d")-4,date("Y")));
        break;
        case 'lastweek':
            $highdateval = date('Y-m-d', strtotime('saturday last week'));
            $lowdateval  = date( 'Y-m-d', strtotime( 'last Sunday', strtotime( 'last Sunday' ) ) );
        break;
        case 'lastweektodate':
            if(date('l')=="Sunday")
            {
                $highdateval  = date( 'Y-m-d', strtotime( 'last Sunday', strtotime( 'last Sunday' ) ) );
            }
            else
            {
                //$lastweek = date('l').' last week';
                $highdateval = date('Y-m-d');
            }
            
            $lowdateval  = date( 'Y-m-d', strtotime( 'last Sunday', strtotime( 'last Sunday' ) ) );
        break;
        case 'lastmonth':
            $lowdateval  = date('Y-m-d', strtotime('first day of last month'));
            $highdateval = date('Y-m-d', strtotime('last day of last month'));
        break;
        case 'lastmonthtodate';
            $lowdateval  = date('Y-m-d', strtotime('first day of last month'));
            $highdateval = date('Y-m-d', strtotime('last month'));
        break;
        case 'lastquater':
            $quarters = array();
            $first_day_year = date('Y-m-d', strtotime('1/1 this year'));
            $quarters[01] = $quarters[02] = $quarters[03] =  array('start_date' => date('Y-m-d', strtotime('10/1 last year')),'end_date' =>  date('Y-m-d', strtotime('1/1 this year -1 day')));
            $quarters[04] = $quarters[05] = $quarters[06] = array('start_date' => $first_day_year,'end_date' => date('Y-m-d', strtotime('4/1 this year - 1 day')));
            $quarters[07] = $quarters[08] = $quarters[09] = array('start_date' => date('Y-m-d', strtotime('4/1 this year')),'end_date' => date('Y-m-d', strtotime('7/1 this year - 1 day')));
            $quarters[10] = $quarters[11] = $quarters[12] = array('start_date' => date('Y-m-d', strtotime('7/1 this year')),'end_date' => date('Y-m-d', strtotime('4/1 this year - 1 day')));
            
            $cur_month = (int) date("m",strtotime($dt));
       
        
            $date_range = $quarters[$cur_month];
            $highdateval = $date_range['end_date'];
            $lowdateval  = $date_range['start_date'];
            break;
        case 'lastquatertodate':
            $quarters = array();
            $todaydate = date('d',strtotime($dt));
            $first_day_year = date('Y-m-d', strtotime('1/1 this year'));
            $quarters[01] = $quarters[02] = $quarters[03] =  array('start_date' => date('Y-m-d', strtotime('10/1 last year')),'end_date' =>  date('Y-m-d', strtotime('10/'.$todaydate.' last year')));
            $quarters[04] = $quarters[05] = $quarters[06] = array('start_date' => $first_day_year,'end_date' => date('Y-m-d', strtotime('1/'.$todaydate.' this year')));
            $quarters[07] = $quarters[08] = $quarters[09] = array('start_date' => date('Y-m-d', strtotime('4/1 this year')),'end_date' => date('Y-m-d', strtotime('4/'.$todaydate.' this year')));
            $quarters[10] = $quarters[11] = $quarters[12] = array('start_date' => date('Y-m-d', strtotime('7/1 this year')),'end_date' => date('Y-m-d', strtotime('7/'.$todaydate.' this year')));
            
            $cur_month = (int) date("m",strtotime($dt));
       
        
            $date_range = $quarters[$cur_month];
            $highdateval = $date_range['end_date'];
            $lowdateval  = $date_range['start_date'];
        break;
        case 'lastyear':
            $lowdateval  = date('Y-m-d', strtotime('1/1 last year'));
            $highdateval = date('Y-m-d', strtotime('1/1 this year -1 day'));
        break;
        case 'lastyeartodate':
            $lowdateval  = date('Y-m-d', strtotime('1/1 last year'));
            $highdateval = date('Y-m-d');
        break;
        case 'since30days':
            $highdateval =  date('Y-m-d', strtotime($dt));
            $lowdateval = date('Y-m-d',mktime(0,0,0,date("m"),date("d")-31,date("Y")));
        break;
        case 'since60days':
            $highdateval =  date('Y-m-d', strtotime($dt));
            $lowdateval = date('Y-m-d',mktime(0,0,0,date("m"),date("d")-61,date("Y")));
        break;
        case 'since90days':
            $highdateval =  date('Y-m-d', strtotime($dt));
            $lowdateval = date('Y-m-d',mktime(0,0,0,date("m"),date("d")-91,date("Y")));
        break;
        case 'since350days':
            $highdateval =  date('Y-m-d', strtotime($dt));
            $lowdateval = date('Y-m-d',mktime(0,0,0,date("m"),date("d")-351,date("Y")));
        break;
        case 'nextweek':
            $lowdateval  = date('Y-m-d', strtotime('this sunday'));
            $highdateval = date('Y-m-d', strtotime('next week saturday'));
        break;
        case 'nextfourweeks':
            $lowdateval  = date('Y-m-d', strtotime('this sunday'));
            $highdateval = date('Y-m-d', strtotime('+4 weeks Saturday'));
        break;
        case 'nextmonth':
            $lowdateval  = date('Y-m-d', strtotime('first day of next month'));
            $highdateval = date('Y-m-d', strtotime('last day of next month'));
        break;
        case 'nextquater':
            $quarters = array();
            $first_day_year = date('Y-m-d', strtotime('1/1 next year'));
            //$quarters[01] = $quarters[02] = $quarters[03] = array('start_date' => $first_day_year,'end_date' => date('Y-m-d', strtotime('4/1 this year - 1 day')));
             $quarters[01] = $quarters[02] = $quarters[03]= array('start_date' => date('Y-m-d', strtotime('4/1 this year')),'end_date' => date('Y-m-d', strtotime('7/1 this year - 1 day')));
             $quarters[04] = $quarters[05] = $quarters[06] = array('start_date' => date('Y-m-d', strtotime('7/1 this year')),'end_date' => date('Y-m-d', strtotime('10/1 this year - 1 day')));
            $quarters[07] = $quarters[08] = $quarters[09]  = array('start_date' => date('Y-m-d', strtotime('10/1 this year')),'end_date' =>  date('Y-m-d', strtotime('1/1 next year -1 day')));
            $quarters[10] = $quarters[11] = $quarters[12] = array('start_date' => $first_day_year,'end_date' => date('Y-m-d', strtotime('4/1 next year - 1 day')));
            $cur_month = (int) date("m",strtotime($dt));
       
        
            $date_range = $quarters[$cur_month];
            $highdateval = $date_range['end_date'];
            $lowdateval  = $date_range['start_date'];
        break;
        case 'nextyear':
            $lowdateval  = date('Y-m-d', strtotime('1/1 next year'));
            $highdateval = date('Y-m-d', strtotime('12/31 next year'));
        break;
        }

        return array('highdateval' => $highdateval, 'lowdateval' => $lowdateval);
   }
   
   
function update_usermeta($key = '',$value = '',$user_id = '') {
    
    if(!$key || !$user_id)
        return false;
        
    $CI = & get_instance();    
    $CI->load->model('user_model');
    
    $meta_row = $CI->user_model->get_where(array('meta_key' => $key, 'user_id' => $user_id),"*",'usermeta');
    
    $data = $return_data = array();
    $data['meta_value'] = $value;
    $data['updated_id'] = getAdminUserId();
    $data['updated_time'] = date('Y-m-d', local_to_gmt());
    
    if($meta_row->num_rows() > 0){
        $meta_row_data = $meta_row->row_array();
        $return_data['prev_value'] = $meta_row_data['meta_value'];
        $CI->user_model->update(array('umeta_id' => $meta_row_data['umeta_id']),$data,'usermeta');
        $return_data['id'] = $meta_row_data['umeta_id'];
        $return_data['status'] =  "update";
        
    }
    else
    {
        $data['meta_key'] = $key;
        $data['user_id'] = $user_id;
        $data['created_id'] = getAdminUserId();
        $data['created_time'] = date('Y-m-d', local_to_gmt());
        $umeta_id = $CI->user_model->insert($data,'usermeta');
        $return_data['id'] = $umeta_id;
        $return_data['status'] =  "add";
    }
    
    return $return_data;
    
}


function get_usermeta($key = '',$user_id = '') {
    
    if(!$key || !$user_id)
        return false;
        
    $CI = & get_instance();    
    $CI->load->model('user_model');
    $meta_row = $CI->user_model->get_where(array('meta_key' => $key, 'user_id' => $user_id),"*",'usermeta');
      
    if($meta_row->num_rows() > 0){
        $meta_row_data = $meta_row->row_array();
    
        return $meta_row_data['meta_value'];
    }
    else
    {
        return false;
    }
}



function xml_obj_to_array($xml_obj) {
        
            $json = json_encode($xml_obj,TRUE);
            $arr = json_decode($json,TRUE);
        
        return $arr;                     
}



function site_traffic()
{
    $CI = & get_instance();
    
    
}


function actionLogAdd($type,$id = NULL, $action)
{
    $CI = & get_instance();
    $CI->load->model('log_model');
    $CI->log_model->add($type,$id,$action);
}

function is_valid_product($product_id = 0)
{
    $CI->db->load->model('product_model');

    $result = $CI->db->product_model->get_where(array('id' => $product_id));

    return $result->num_rows()?TRUE:FALSE;
}

function is_valid_user($user_id = 0)
{
    $CI->db->load->model('user_model');

    $result = $CI->db->user_model->get_where(array('id' => $user_id));

    return $result->num_rows()?TRUE:FALSE;
}

function send_email($to='',$from='',$from_name='',$cc='',$subject='',$message='')
{
  $CI = & get_instance();
  $CI->load->library('email');
  $CI->email->set_mailtype("html");        
  $CI->email->from($from, $from_name);      
  $CI->email->to($to);      
  $CI->email->cc($cc);      
  $CI->email->subject($subject);      
  $CI->email->message($message);      
  if($CI->email->send())
    return true;
  else
    return false;
}

/**
* This method handles to delete a file
**/
function delete_file($path, $file_name){


    $path = $path.$file_name;
        
    if($file_name){

        if(file_exists($path)){ 

            if(unlink($path)){

                return true;

            }else{

                return false;

            }

        }else{ 

            return false;

        }

    }else{ 

        return false;

    }  
}

/**

* This method handles to get all country 

**/
function get_country_all(){

     $CI =& get_instance();

     $CI->load->model('Country_model');

     $data   = $CI->Country_model->get_country_all();

     $countries = ($data) ? $data['data'] : '';

    $country_data[null] = 'Select Country';

    if($countries){

        foreach ($countries as $key => $value) {

            $country_data[$value->id] = $value->name;

        }

    }

    $country_data = $country_data;

    return $country_data;

}

/**

* This method handles to get all plans 

**/
function get_plans_all(){

     $CI =& get_instance();

     $CI->load->model('Plans_model');

     $plans   = $CI->Plans_model->get_plans_all();

     
    return $plans;
    

}

/**

* This method handles to get states based on the country selected

**/
function get_state_by_country($id){

                $CI =& get_instance();

                $CI->load->model('State_model');

                $data   = $CI->State_model->get_state_by_country_id($id);


                $states = ($data) ? $data['data'] : '';

                $state_data[null] = 'Select State';

                if($states){

                        foreach ($states as $key => $value) {

                                $state_data[$value->id] = $value->name;  
                        }

                }

                $result = $state_data;

                return $result;                       
}

/**

* This method handles to get all states as an array for dropdown

**/

function get_state_all($country_id=false){

    $CI =& get_instance();

    $CI->load->model('State_model');

    $data   = $CI->State_model->get_state_all('', '', $country_id);

    $states = ($data) ? $data['data'] : '';

    $state_data[null] = 'Select State';

    if($states){

        foreach ($states as $key => $value) {

            $state_data[$value->id] = $value->name;
        }
    }

    $state_data = $state_data;
    
    return $state_data;

}

function get_user_type()
{
    $CI = @ get_instance();
    $CI->load->model('login_model');
    
    $result =  $CI->session->userdata("user_data");

   return $result;
}

function categories($id='')
{
    $CI = & get_instance();
    // $CI->db->where("status","Active");
    if($id)
        $CI->db->where('id',$id);
    $result = $CI->db->get('category')->result_array();
    
    $types = array();
    foreach ($result as $row) 
    {
        $types[$row['id']] = $row['name'];
    }
    return $types;
}
function get_events($id='')
{
    $CI = & get_instance();
    // $CI->db->where("status","Active");
    if($id)
        $CI->db->where('id',$id);
    $result = $CI->db->get('events')->result_array();
    
    $types = array();
    foreach ($result as $row) 
    {
        $types[$row['id']] = $row['title'];
    }
    return $types;
}

function categories1($id='')
{
    $CI = & get_instance();
    if($id)
        $CI->db->where('id',$id);
    $result = $CI->db->get('category')->result_array();
    return $result;
}

function related_category($id)
{
    $CI = & get_instance();
    $CI->db->where("category_id",$id);
    $CI->db->limit(6);
    $CI->db->order_by("id","desc");
  $q = $CI->db->get("services");
  return $q->result_array();
}

function get_seller($id='')
{
    $CI = & get_instance();
    // $CI->db->where("status","Active");
    if($id)
        $CI->db->where('id',$id);
    $result = $CI->db->get('seller')->result_array();
    
    $types = array();
    foreach ($result as $row) 
    {
        $types[$row['id']] = $row['first_name'];
    }
    return $types;
}

function email_is_exist($data){

    $CI =& get_instance();
    $CI->load->model('login_model');
    $data   = $CI->login_model->get_customer_email($data);

    if($data){
        return true;
    }else{
        return false;
    }
}

function encrypt_data($string_data, $enc_key) {
    $encrypted_data = strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,
                            md5($enc_key), serialize($string_data),
                            MCRYPT_MODE_CBC, md5(md5($enc_key)))), '+/=', '-_,');
    return $encrypted_data;
}

function decrypt_data($string_data, $enc_key) {
    $decrypted_data = unserialize(rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,
                            md5($enc_key),
                            base64_decode(strtr($string_data, '-_,', '+/=')),
                            MCRYPT_MODE_CBC, md5(md5($enc_key))), "\0"));
    return $decrypted_data;
}

function content_forgot_password($url) {
    $content = 'Your password reset request has been acknowledged by us.
                Please follow the below link to reset your password.<br>
                 <strong style="font-weight:bold;"><a href="' . $url . '" title="Reset Password" >Reset Password</a></strong>';
    return $content;
}

function send_mail($data) {
    $CI = & get_instance();
    $CI->load->library('email');
    $CI->email->set_mailtype("html"); 
    $from_email = (isset($data['from'])) ? $data['from'] : 'sathishm@izaaptech.in';
    $from_name = (isset($data['from_name'])) ? $data['from_name'] : 'sathishm@izaaptech.in';
    $to_email = (isset($data['to'])) ? $data['to'] : 'sathishm@izaaptech.in';
    $to_name = (isset($data['to_name'])) ? $data['to_name'] : 'satz';
    $subject = (isset($data['subject'])) ? $data['subject'] : '';
    $content = (isset($data['content'])) ? $data['content'] : '';
    $attachment = (isset($data['attachment'])) ? $data['attachment'] : '';
    // Email configuration details
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "ssl://smtp.gmail.com";
    $config['smtp_port'] = "465";
    /*$config['smtp_user'] = "mail.php@boscoits.com";
    $config['smtp_pass'] = "php!#nets15";*/
    $config['smtp_user'] = "support@ifensys.com";
    $config['smtp_pass'] = "ifs$062016$";
    //$config['mailpath']   = '/usr/sbin/sendmail';
    $config['charset'] = "utf-8";
    $config['mailtype'] = 'html';
    $config['newline'] = "\r\n";
    $config['validate'] = TRUE;
    $config['wordwrap'] = TRUE;
    

    // Email initialize
    $CI->email->initialize($config);
    $CI->email->from($from_email, $from_name);
    $CI->email->to($to_email, $to_name);
    //$this->email->bcc('edsitt@gmail.com');

    $CI->email->subject($subject);
    $CI->email->message($content);
    
    if($attachment){
    $CI->email->attach($attachment);
        
    }
    
    // Send an Email
    $send = $CI->email->send();

    //$this->email->print_debugger();
    if ($send) {
        $CI->email->clear(TRUE);
        return true;
    } else {
        return false;
    }
}
/**

* This method handles to get all experience 

**/
function get_experience_all(){

     $CI =& get_instance();

     $CI->load->model('Services_model');

     $data   = $CI->Services_model->get_experience_all();

     $experience = ($data) ? $data['data'] : '';

    $experience_data[null] = 'Select Experience';

    if($experience){

        foreach ($experience as $key => $value) {

            $experience_data[$value->id] = $value->name;

        }

    }

    $experience_data = $experience_data;

    return $experience_data;

}

/**

* This method handles to get all Qualification 

**/
function get_qualification_all(){

     $CI =& get_instance();

     $CI->load->model('Services_model');

     $data   = $CI->Services_model->get_qualification_all();

     $qualification = ($data) ? $data['data'] : '';

     $qualification_data[null] = 'Select Qualification';

    if($qualification){

        foreach ($qualification as $key => $value) {

            $qualification_data[$value->id] = $value->name;

        }

    }

    $qualification_data = $qualification_data;

    return $qualification_data;

}

/**
* This method handles to get lat and lng
**/
function get_google_map_address($address){

    $address = urlencode($address);
    
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
    
    if($resp['status']=='OK'){

    // get the important data
    $data['lati'] = $resp['results'][0]['geometry']['location']['lat'];

    $data['longi'] = $resp['results'][0]['geometry']['location']['lng'];

    $data['formatted_address'] = $resp['results'][0]['formatted_address'];

    return $data;

    }

}

function get_business()
{
    $CI = & get_instance();
    $CI->db->limit(2);
    $result = $CI->db->get('business_ads')->result_array();
    //echo "<pre>"; print_r($result); exit;
    return $result;
}


?>