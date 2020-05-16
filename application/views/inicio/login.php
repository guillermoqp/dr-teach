<?php if(isset($_SESSION["id_usuario"])||isset($_SESSION["id_usuario"])) { session_destroy(); } ?>
<!DOCTYPE html>
<html lang="es-PE">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php print($this->config->item("codigoSistema")) ?> | <?php print($this->config->item("nombreSistema")) ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <!-- Icons, FavIcon -->
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
                	<strong><?php print($this->config->item("nombreSistema")) ?></strong>
                    <img src="<?php print(base_url("static/img/logo.png")) ?>" width="300" height="100" class="animation-pulseSlow">
                    <br>
                    <small>Por favor <strong>Ingrese</strong> o <strong>Regístrese</strong></small>
                </h1>
            </div>
            <div class="block push-bit">

                <form id="form-login" class="form-horizontal form-bordered form-control-borderless">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="email" id="email" name="email" class="form-control input-lg" placeholder="Email">
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
                    <center>
                        <?php print($widget) ?>
                        <input type="hidden" name="hiddenRecaptcha" id="hiddenRecaptcha" class="form-control input-lg" value="">
                    </center>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label class="switch switch-primary" data-toggle="tooltip" title="Recordarme">
                                <input type="checkbox" id="recordarme" name="recordarme" checked>
                                <span></span>
                            </label>
                        </div>
                        <div class="col-xs-3">
                            <a href="<?= $login_fb_url ?>" class="btn btn-info"><i class="fa fa-facebook"></i> Facebbok</a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="btn btn-primary"><i class="fa fa-twitter"></i> Twitter</a>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 text-center">
                        <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-angle-right"></i> Ingresar</button>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <a href="javascript:void(0)" id="link-reminder-login"><strong>Olvide mi password</strong> </a> -
                            <a href="javascript:void(0)" id="link-register-login"><strong>Crear nueva cuenta</strong> </a> - 
                            <a href="<?php print(base_url()) ?>" ><strong>Inicio</strong></a>
                        </div>
                    </div>
                </form>

                <form id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="recuperar_email" name="recuperar_email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-angle-right"></i> Reestablecer Password</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            Recorde mi Password: <a href="javascript:void(0)" id="link-reminder"><strong>Iniciar Sesion</strong></a> - 
                            <a href="<?php print(base_url()) ?>" ><strong>Inicio</strong></a>
                        </div>

                    </div>
                </form>

                <form id="form-register" class="form-horizontal form-bordered form-control-borderless display-none">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="text" id="nombres" name="nombres" class="form-control input-lg" placeholder="Nombres">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" id="apellidos" name="apellidos" class="form-control input-lg" placeholder="Apellidos">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="email_registro" name="email_registro" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="password_registro" name="password_registro" class="form-control input-lg" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="password_registro_verificar" name="password_registro_verificar" class="form-control input-lg" placeholder="Confirmar Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-6">
                            <a href="#modal-terms" data-toggle="modal" class="register-terms">Terminos y Condiciones</a>
                            <label class="switch switch-primary" data-toggle="tooltip" title="Aceptar Terminos y Condiciones">
                                <input type="checkbox" id="acepto_terminos" name="acepto_terminos">
                                <span></span>
                            </label>
                        </div>
                        <div class="col-xs-6">
                            <div id="captImg"><?php print($imagenCaptcha) ?></div>
                            <a href="#" id="refreshCaptcha" class="refreshCaptcha"><i class="fa fa-exchange fa-2x"></i></a>
                            <input class="form-control" type="text" id="captcha" name="captcha" placeholder="Ingrese Captcha"/>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Crear Cuenta</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            Tienes una cuenta : <a href="javascript:void(0)" id="link-register"><strong>Iniciar Sesion</strong></a> - 
                            <a href="<?php print(base_url()) ?>" ><strong>Inicio</strong></a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- Modal Terms -->
        <div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Terminos y Condiciones</h4>
                    </div>
                    <!-- terminos-y-condiciones -->
                    <?php $this->load->view("inicio/terminos-y-condiciones"); ?>
                </div>
            </div>
        </div>
        <script src="<?php print(base_url("static/js/vendor/jquery-1.11.1.min.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/vendor/bootstrap.min.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/plugins.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/app.js")) ?>"></script>
        <!-- JS de la PAGINA -->
        <script src="<?php print(base_url("static/js/scripts/url_base.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/scripts/accesos.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/pages/login.js")) ?>"></script>
        <!-- Google ReCaptha   -->
        <?php print($scriptGoogleReCaptcha); ?>
        <script type="text/javascript">
        $(document).ready(function () {
            Login.init();
            $("#refreshCaptcha").on("click",function(){
                $.get(url_base+"actualizarCaptcha",function(data){
                    $("#captImg").html(data);
                });
            });
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