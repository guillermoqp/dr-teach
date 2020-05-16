<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$route["translate_uri_dashes"]=FALSE;
$route["default_controller"]="principal";
$route["404_override"]="inicio/error404";
/*      LOGIN / USUARIO       */
$route["login"]="inicio/login";
$route["verificarAcceso"]="inicio/verificarAcceso";
$route["reestablecerPassword"]="inicio/reestablecerPassword";
$route["reestablecer_password/(:any)"]="inicio/reestablecer_password/$1";
$route["registrarUsuario"]="inicio/registrarUsuario";
$route["actualizarCaptcha"]="inicio/actualizarCaptcha";
$route["actualizarSesion"]="inicio/actualizarSesion";
$route["bloquear"]="inicio/bloquear_pantalla";
$route["salir"]="inicio/salir";
/*      CURSOS       */
$route["cursos/(:any)"]="cursos/obtener_por_codigo_uri/$1";
$route["cursos/(:any)/(:any)"]="cursos/obtener_grupo_tema/$1/$2";
$route["cursos/(:any)/(:any)/(:any)"]="cursos/obtener_tema/$1/$2/$3";
$route["cursos/(:any)/examen/"]="cursos/ejecutar_examen/$1";
$route["cursos/(:any)/certificado/"]="cursos/generar_certificado/$1";
$route["mis_cursos"]="cursos/mis_cursos";
/*      SUSCRIPCION       */
$route["precios"]="suscripcion/index";
$route["suscripcion/(:any)"]="suscripcion/anual_mensual/$1";
$route["suscripcion/unico/(:any)"]="suscripcion/unico/$1";
/*      PRINCIPAL       */
$route["curso/(:any)"]="principal/ver_detalle_curso/$1";
/* 
$route['product/(:any)'] = 'catalog/product_lookup';
$route['product/(:num)'] = 'catalog/product_lookup_by_id/$1';
$route['products/([a-z]+)/(\d+)'] = '$1/id_$2';
 */
/* End of file routes.php */
/* Location: ./application/config/routes.php */