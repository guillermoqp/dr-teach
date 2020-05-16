<?php defined('BASEPATH') OR exit('No direct script access allowed');
$beneficiosSuscripcionGratis=array(
    "Acceso a cursos gratuitos.",
    "Acceso a algunos de los repositorios de proyectos."
);
$config["precioSuscripcionGratis"]=array(
    "nombre"=>"Gratis",
    "precio"=>"0.00",//precio en SOLES
    "pago"=>" *No requiere ningun tipo de pago.",
    "descripcion"=>"Acceso a todos los cursos gratis.",
    "beneficios"=>$beneficiosSuscripcionGratis
);
$beneficiosSuscripcionMensual=array(
    "Acceso a todos los cursos (Gratuitos o Pagados) por 1 mes.",
    "Acceso ilimitado a todos los cursos.",
    "Cursos nuevos todos los meses.",
    "Acceso a todos los repositorios de proyectos.",
    "Pago con tarjeta de crédito o débito."
);
$config["precioSuscripcionMensual"]=array(
    "nombre"=>"Mensual",
    "precio"=>"100.00",//precio en SOLES
    "pago"=>" *Pagos mensuales",
    "descripcion"=>"Acceso a todos los cursos por 1 mes.",
    "beneficios"=>$beneficiosSuscripcionMensual
);
$beneficiosSuscripcionAnual=array(
    "Acceso a ilimitado a todos los cursos por 12 meses.",
    "Cursos nuevos todos los meses.",
    "Acceso a todos los repositorios de proyectos.",
    "Pago con tarjeta de crédito o débito.",
    "Pago en depósito, PayPal y otros métodos."
);
$config["precioSuscripcionAnual"]=array(
    "nombre"=>"Anual",
    "precio"=>"200.00",//precio en SOLES
    "pago"=>" *Un solo pago de 200",
    "descripcion"=>"Acceso a todos los cursos por 1 año.",
    "beneficios"=>$beneficiosSuscripcionAnual
);
$beneficiosSuscripcionUnico=array(
    "Acceso Ilimitado al Curso seleccionado.",
    "Acceso a todos los repositorios del Curso.",
    "Pago con tarjeta de crédito o débito.",
    "Pago en depósito, PayPal y otros métodos."
);
$config["precioSuscripcionUnico"]=array(
    "nombre"=>"Único",
    "precio"=>"?",//precio en SOLES
    "pago"=>" *Un solo pago dependiendo del curso elegido.",
    "descripcion"=>"Acceso al curso elegido de por vida.",
    "beneficios"=>$beneficiosSuscripcionUnico
);