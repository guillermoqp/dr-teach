<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function desactivar_errores() {
    ini_set("display_errors",0);
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
	//error_reporting(E_ALL & ~E_NOTICE);
}
function url_actual($agregaUri=null) {
    if($agregaUri!=null&&$agregaUri!=""){
		$url_actual=str_replace("index.php/","",current_url()."/".$agregaUri);
    }else{
    	$url_actual=str_replace("index.php/","",current_url()."/");
    }
    return $url_actual;
}
function obtener_tipo_usuario($tipo) {
    $tipoStr="";
    switch ($tipo) {
	    case 'B':
	        $tipoStr="Básico";
	        break;
	    case 'P':
	        $tipoStr="Premium";
	        break;
	    case 'V':
	        $tipoStr="Vip";
	        break;
	}
	return $tipoStr;
}
function obtener_estado_usuario($estado) {
    $estadoStr="";
    switch ($estado) {
	    case 'A':
	        $estadoStr="Activo";
	        break;
	    case 'I':
	        $estadoStr="Inactivo";
	        break;
	}
    return $estadoStr;
}
function obtener_tipo_suscripcion($tipo) {
    $tipoStr="";
    switch ($tipo) {
	    case 'D':
	        $tipoStr="A Demanda";
	        break;
	    case 'A':
	        $tipoStr="Anual";
	        break;
	    case 'M':
	        $tipoStr="Mensual";
	        break;
	}
    return $tipoStr;
}
function string_to_timestamp($formato,$strDate) {
    $dtime=DateTime::createFromFormat($formato,$strDate);
    $timestamp=$dtime->getTimestamp();
    return $timestamp;
}
function stringDate_to_strftime($strDate) {
    $strftime=strftime(" %A, %e de %B de %Y .",strtotime($strDate));
    return $strftime;
}