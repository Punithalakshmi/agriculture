<?php
//
// Layout config for the site admin 
//
$config['layout']['default']['template'] = 'layouts/frontend';
$config['layout']['default']['title']    = 'myAGrow - Admin';
$config['layout']['default']['js_dir']   = "assets/js/admin";
$config['layout']['default']['css_dir']  = "assets/css/admin";
$config['layout']['default']['img_dir']  = "assets/img";
$config['layout']['default']['javascripts'] = array('function','jquery.min','bootstrap.min','metronic','layout','bootstrap-datepicker.min');
$config['layout']['default']['stylesheets'] = array('bootstrap.min','font-awesome.min','components','layout','darkblue','login','bootstrap-datepicker3.min','custom');
$config['layout']['default']['description'] = '';
$config['layout']['default']['keywords']    = '';
$config['layout']['default']['http_metas'] = array(
	'X-UA-Compatible' => 'IE=edge',
  'Content-Type' => 'text/html; charset=utf-8',
	'viewport'     => 'width=device-width, initial-scale=1.0',
  'author' => 'myAGrow - Admin');
?>