<?php

//
// Layout config for the site admin 
//
                                        
$config['layout']['default']['template'] = 'layouts/frontend';
$config['layout']['default']['title']    = 'Customer Support Services';
$config['layout']['default']['js_dir']    = "assets/js/frontend";
$config['layout']['default']['css_dir']   = "assets/css/frontend";
$config['layout']['default']['img_dir']   = "assets/images";

$config['layout']['default']['javascripts'] = array('jquery.matchHeight','common','dropzone','materialize.min','slick.min','init');
 
$config['layout']['default']['stylesheets'] = array('materialize','slick','dropzone','slick-theme','_theme');

$config['layout']['default']['description'] = '';
$config['layout']['default']['keywords']    = '';

$config['layout']['default']['http_metas'] = array(
    'Content-Type' => 'text/html; charset=utf-8',
	'viewport'     => 'width=device-width, initial-scale=1.0',
    'author' => 'Order Processing',
);

?>
