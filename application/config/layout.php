<?php

//
// Layout config for the site admin 
//
                                        
$config['layout']['default']['template'] = 'layouts/frontend';
$config['layout']['default']['title']    = 'myAGrow';
$config['layout']['default']['js_dir']    = "assets/js/frontend";
$config['layout']['default']['css_dir']   = "assets/css/frontend";
$config['layout']['default']['img_dir']   = "assets/images";

$config['layout']['default']['javascripts'] = array('lib/3.2.1/jquery-3.2.1.min','bootstrap.min','jquery.matchHeight','dropzone','common','materialize.min','slick.min','init');
 
$config['layout']['default']['stylesheets'] = array('materialize','slick','dropzone','slick-theme','_theme');

$config['layout']['default']['description'] = '';
$config['layout']['default']['keywords']    = '';

$config['layout']['default']['http_metas'] = array(
    'Content-Type' => 'text/html; charset=utf-8',
	'viewport'     => 'width=device-width, initial-scale=1.0',
    'author' => 'Order Processing',
);

?>
