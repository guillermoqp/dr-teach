<?php if(isset($_SESSION["id_usuario"])||isset($_SESSION["id_usuario"])) { session_destroy(); } ?>
<!DOCTYPE html>
<html lang="es-PE">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php print($this->config->item("codigoSistema")) ?> | <?php print($this->config->item("nombreSistema")) ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <link rel="shortcut icon" href="<?php print(base_url("static/img/logo.png")) ?>">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php print(base_url("static/img/icon/apple-icon-57x57.png")) ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php print(base_url("static/img/icon/apple-icon-60x60.png")) ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php print(base_url("static/img/icon/apple-icon-72x72.png")) ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php print(base_url("static/img/icon/apple-icon-76x76.png")) ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php print(base_url("static/img/icon/apple-icon-114x114.png")) ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php print(base_url("static/img/icon/apple-icon-120x120.png")) ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php print(base_url("static/img/icon/apple-icon-144x144.pn")) ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php print(base_url("static/img/icon/apple-icon-152x152.png")) ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php print(base_url("static/img/icon/apple-icon-180x180.png")) ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php print(base_url("static/img/icon/android-icon-192x192.png")) ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php print(base_url("static/img/icon/favicon-32x32.png")) ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php print(base_url("static/img/icon/favicon-96x96.png")) ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php print(base_url("static/img/icon/favicon-16x16.png")) ?>">
        <link rel="manifest" href="<?php print(base_url("static/img/icon/manifest.json")) ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php print(base_url("static/img/icon/ms-icon-144x144.png")) ?>">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="<?php print(base_url("static/css/bootstrap.min.css")) ?>">
        <link rel="stylesheet" href="<?php print(base_url("static/css/plugins.css")) ?>">
        <link rel="stylesheet" href="<?php print(base_url("static/css/main.css")) ?>">
        <link rel="stylesheet" href="<?php print(base_url("static/css/themes.css")) ?>">
        <script src="<?php print(base_url("static/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js")) ?>"></script>
    </head>
    <body class="page-loading">
        <div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong><?php print($this->config->item("codigoSistema")) ?></strong></h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Cargando..</strong></h3>
                <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
            </div>
        </div>
        <img src="<?php print(base_url("static/img/placeholders/backgrounds/fondo_login.jpg")) ?>" class="full-bg animation-pulseSlow">
        <div id="login-container" class="animation-fadeIn">
            <div class="login-title text-center">
                <h1><i class="gi gi-flash"></i>
                	<strong><?php print($this->config->item("nombreSistema")) ?></strong><br>
                    <strong>Cambio de Password</strong>
                </h1>
            </div>
            <div class="block push-bit">
                <?php if(isset($usuario)&&$usuario["nombresApellidos"]!="")	{   ?>
                <form id="reestablecerPassword" class="form-horizontal form-bordered form-control-borderless" method="POST">
                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php print($usuario["id_usuario"]) ?>">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i>
                               	<?php print($usuario["nombresApellidos"]) ?><br>
                               	<b><?php print($usuario["email"]) ?></b><br><br><hr>
                               	<strong>Código: <i class="gi gi-cogs"></i> <?php print($usuario["forgot_password_code"]) ?></strong>
                            </div>
                        </div>
                    </div>
                	<div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="password_verificar" name="password_verificar" class="form-control input-lg" placeholder="Confirmar Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-8 text-right">
                            <button type="submit" name="cambiarPassword" value="1" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Cambiar Password</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <a href="<?php print(base_url("login")) ?>" ><strong>Iniciar Sesion</strong></a>
                        </div>
                    </div>
                </form>
            	<?php } else { ?>
                    <div class="form-horizontal form-bordered form-control-borderless">
                        <div class="form-group form-actions">
                            <div class="text-center">
                                <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="fa fa-times-circle"></i> Código de Re-establecimiento Incorrecto<br><br></h4> 
                                    El Código de Re-establecimiento de Password es Incorrecto o ya ha Expirado.<br>Por favor, Genere otro, solicitando nuevamente el cambio de Password. (1 día de Generado).
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <a href="<?php print(base_url("login")) ?>" ><strong>Iniciar Sesión</strong></a>
                            </div>
                        </div>
                    </div>
            	<?php } ?>
            </div>
        </div>
        <script src="<?php print(base_url("static/js/vendor/jquery-1.11.1.min.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/vendor/bootstrap.min.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/plugins.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/app.js")) ?>"></script>
        <!-- JS de la PAGINA -->
        <script src="<?php print(base_url("static/js/scripts/url_base.js")) ?>"></script>
		<script type="text/javascript">
		$(document).ready(function () {
        	<?php if(isset($usuario)&&$usuario["nombresApellidos"]!="")	{   ?>
        	$("#reestablecerPassword").validate({
                errorClass: 'help-block animation-slideDown',
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    if (e.closest('.form-group').find('.help-block').length === 2) {
                        e.closest('.help-block').remove();
                    } else {
                        e.closest('.form-group').removeClass('has-success has-error');
                        e.closest('.help-block').remove();
                    }
                },
                rules: {
                    password: {
                        required: true,
                        minlength: 5
                    },
                    password_verificar: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    password: {
                        required: "Ingrese un password correcto",
                        minlength: "Tu password debe contener como minimo 5 caracteres."
                    },
                    password_verificar: {
                        required: "Ingrese un password correcto",
                        minlength: "Tu password debe contener como minimo 5 caracteres.",
                        equalTo: "Tu password no concuerda con el anterior"
                    }
                }
            });
        <?php } ?>
        <?php if ($this->session->flashdata("error")!=null&&strlen($this->session->flashdata("error"))>0) { ?>
        $.bootstrapGrowl("<h4>¡Error!</h4><p><?php print($this->session->flashdata("error")) ?></p>", {
            type: "danger",
            delay: 2500,
            allow_dismiss: true
        });
        <?php } ?>
        <?php if ($this->session->flashdata("success")!=null&&strlen($this->session->flashdata("success"))>0) { ?>
        $.bootstrapGrowl("<h4>¡Exito!</h4><p><?php print($this->session->flashdata("success")) ?></p>", {
            type: "success",
            delay: 2500,
            allow_dismiss: true
        });
        <?php } ?>
        });
		</script>
    </body>
</html>