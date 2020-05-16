<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$config['fb_config'] = array (
    'app_id'  => '2330959610518037',
    'app_secret' => 'b0442e827e5f4a491156d61fe9b00a88',
    'default_graph_version' => 'v2.5',
    'persistent_data_handler'=>'session',
	'enableSessionCheck'=>false,
	'permisosData'=>'/me?fields=id,first_name,last_name,name,email,verified,picture,age_range,location{location{PER}}'
);