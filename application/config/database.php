<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$active_group="default";
$query_builder=TRUE;
$active_record=TRUE;
/* DEVELOP: LOCAL WINDOWS Mysql5.7 Local*/
/*$configBD=array(
    "hostname"=>"127.0.0.1",
    "username"=>"root",
    "password"=>"123456",
    "database"=>"drteach"
);*/
/* PRODUCTION:  */
$configBD=array(
    "hostname"=>"db4free.net",
    "username"=>"drteach",
    "password"=>"12345678",
    "database"=>"drteach"
);
$db[$active_group]=array(
    "hostname"=>$configBD["hostname"],
    "username"=>$configBD["username"],
    "password"=>$configBD["password"],
    "database"=>$configBD["database"],
    "dbdriver"=>"mysqli",
    "dbprefix"=>"",
    "pconnect"=>TRUE,
    "db_debug"=>TRUE,
    "cache_on"=>TRUE,
    "cachedir"=>"",
    "char_set"=>"utf8",
    "dbcollat"=>"utf8_general_ci",
    "swap_pre"=>"",
    "autoinit"=>TRUE,
    "stricton"=>FALSE
);
/*
https://www.db4free.net/phpMyAdmin/
Correo electrónico: gquintanillaparedes@gmail.com
MySQL 8.0 de db4free.net. 
HOST: db4free.net
PORT:   3306
USERNAME: drteach
BD: drteach
pass: 12345678
*/