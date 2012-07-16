<?php

if ( !isset($config) ) $config = array();

$config['app_salt'] = 'sdfghjketyu#$%^&';
$config['lang'] = 'en';
$config['app_title'] = 'Recruitment';
$config['app_dir'] = $_SERVER['DOCUMENT_ROOT'] . '/recruitment/';
$config['admins'] = array('admin'=>'admin123');

$config['upload_dir'] = $config['app_dir']  . 'global/uploads/original/';
$config['thumbs_dir'] = $config['app_dir']  . 'global/uploads/thumbs/';
$config['icons_dir'] = $config['app_dir']  . 'global/uploads/icons/';

?>