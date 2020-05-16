<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$config["nombreSistema"]="Doctor Teach | Aprende a Programar Agilmente.";
$config["codigoSistema"]="Dr-Teach";
$config["versionSistema"]="1.1";
$config["fecha_servidor"]=date("d-m-Y, G:i:s");
$config["anio"]=date("Y");
$config["email"]="dr.teach.peru@gmail.com";
$config["usuarioEmail"]="Administrador Doctor Teach Peru";
$config["mensaje404"]="Usted subestima el poder del lado oscuro";
date_default_timezone_set("America/Lima");

/*	DEVELOP 	*/
//$urlBase="http://".$_SERVER['HTTP_HOST']."/dr-teach";/* LOCAL */
/*	PRODUCTION 	*/
$urlBase="https://dr-teach.herokuapp.com/"; /* HEROKU */

$config["base_url"]=$urlBase;
$config['index_page']='index.php';
$config['uri_protocol']='AUTO';
$config['url_suffix']='';

$config['language'] = 'spanish';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd'; // experimental not currently in use

$config['log_threshold']=array(3);
$config['log_path']=APPPATH."/logs/";
$config['log_file_permissions']=0775;
$config['log_file_extension']=".log";
$config['log_date_format']="Y-m-d H:i:s";

$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = '6f;~d5df;.s.d.fwe';

$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'dr-teach_session';
$config['sess_expiration'] = 1800;
$config['sess_expire_on_close'] = TRUE;
$config['sess_save_path'] = APPPATH."/cache/sessions/";
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = TRUE;

$config['cookie_prefix'] = "";
$config['cookie_domain'] = "";
$config['cookie_path'] = "/";
$config['cookie_secure'] = FALSE;

$config['global_xss_filtering'] = TRUE;
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_value';
$config['csrf_cookie_name'] = 'csrf_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = FALSE;
$config['csrf_exclude_uris'] = array();
$config['compress_output'] = FALSE;

$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;

$config['proxy_ips'] = '';