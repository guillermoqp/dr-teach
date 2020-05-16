<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function verificar_sesion($user_data)
{
    if((!$user_data["usuario"]["id_usuario"])||(!$user_data["logueado"])) {
        redirect(base_url("login"));
    }
}
function verificar_sesion_activa($user_data)
{
    if(isset($user_data["usuario"]["id_usuario"])&&isset($user_data["logueado"])) {
        redirect(base_url("inicio"));
    }
}