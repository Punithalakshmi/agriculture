<?php
/*
 * view - the path to the listing view that you want to display the data in
 * 
 * base_url - the url on which that pagination occurs. This may have to be modified in the 
 * 			controller if the url is like /product/edit/12
 * 
 * per_page - results per page
 * 
 * order_fields - These are the fields by which you want to allow sorting on. They must match
 * 				the field names in the table exactly. Can prefix with table name if needed
 * 				(EX: products.id)
 * 
 * OPTIONAL
 * 
 * default_order - One of the order fields above
 * 
 * uri_segment - this will have to be increased if you are paginating on a page like 
 * 				/product/edit/12
 * 				otherwise the pagingation will start on page 12 in this case 
 * 
 * 
 */
 
$config['seller_index'] = array(

	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/seller/filter',
	"base_url"	=> 	'/seller/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'first_name'=>array('name'=>'First Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'last_name'=>array('name'=>'Last Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'email'=>array('name'=>'Email', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1)
						),
	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['project_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/project/filter',
	"base_url"	=> 	'/project/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'id'=>array('name'=>'Porject ID#', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'project_name'=>array('name'=>'Project Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'start_date'=>array('name'=>'Start Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1),
						'complete_date'=>array('name'=>'Completion Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'status', 'sortable' => FALSE, 'default_view'=>1),
						'created_date'=>array('name'=>'Submited Date', 'data_type' => 'datetime', 'sortable' => FALSE, 'default_view'=>1)),

	"default_order"	=> "id",
	"default_direction" => "DESC"
);



$config['works_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/works/filter',
	"base_url"	=> 	'/works/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'work_name'=>array('name'=>'Work Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1)),

	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['milestone_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/milestone/filter',
	"base_url"	=> 	'/milestone/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'p_name'=>array('name'=>'Project Name', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'name'=>array('name'=>'Milestone Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						// 'description'=>array('name'=>'Description', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'start_date'=>array('name'=>'Start Date', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'end_date'=>array('name'=>'End Date', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'c_name'=>array('name'=>'Contractor Name', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'status_change', 'sortable' => FALSE, 'default_view'=>1)),

	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['business_index'] = array(

	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/business/filter',
	"base_url"	=> 	'/business/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'customer_name'=>array('name'=>'Customer Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'title'=>array('name'=>'Title', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'description'=>array('name'=>'Description', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'status', 'sortable' => true, 'default_view'=>1)),
	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['plans_index'] = array(

	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/plans/filter',
	"base_url"	=> 	'/plans/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'name'=>array('name'=>' Name', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'amount'=>array('name'=>'Amount', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'description'=>array('name'=>'Description', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1)
						,),
	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['events_index'] = array(

	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/events/filter',
	"base_url"	=> 	'/events/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'title'=>array('name'=>'Title Name', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'location'=>array('name'=>'Location', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'description'=>array('name'=>'Description', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Satus', 'data_type' => 'status', 'sortable' => true, 'default_view'=>1)
						,),
	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['category_index'] = array(

	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/category/filter',
	"base_url"	=> 	'/category/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'name'=>array('name'=>'Name', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'description'=>array('name'=>'Description', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Satus', 'data_type' => 'status', 'sortable' => true, 'default_view'=>1)
						),
	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['services_product_index'] = array(

	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/services_product/filter',
	"base_url"	=> 	'/services_product/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'title'=>array('name'=>'Title', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'description'=>array('name'=>'Description', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1)
						),
	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['subscription_index'] = array(

	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/subscription/filter',
	"base_url"	=> 	'/subscription/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'seller'=>array('name'=>'Seller', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'plan'=>array('name'=>'Plan', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'payment_date'=>array('name'=>'Payment Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1)
						),
	"default_order"	=> "id",
	"default_direction" => "DESC"
);


?>