<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php print($this->config->item("codigoSistema")) ?> | <?php print($this->config->item("nombreSistema")) ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <link rel="shortcut icon" href="<?php print(base_url("static/img/favicon.ico")) ?>">
        <link rel="apple-touch-icon" href="<?php print(base_url("static/img/icon57.png")) ?>" sizes="57x57">
        <link rel="apple-touch-icon" href="<?php print(base_url("static/img/icon72.png")) ?>" sizes="72x72">
        <link rel="stylesheet" href="<?php print(base_url("static/css/bootstrap.min.css")) ?>">
        <link rel="stylesheet" href="<?php print(base_url("static/css/plugins.css")) ?>">
        <link rel="stylesheet" href="<?php print(base_url("static/css/main.css")) ?>">
        <link rel="stylesheet" href="<?php print(base_url("static/css/themes.css")) ?>">
        <script src="<?php print(base_url("static/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js")) ?>"></script>
    </head>
    <body>
        <img src="<?php print(base_url("static/img/placeholders/backgrounds/fondo_login.jpg")) ?>" class="full-bg animation-pulseSlow">
        <div id="login-container" class="animation-hatch">
            <div class="login-title text-right">
                <h1 class="text-center">
                    <strong><?php print($this->session->userdata("nombresApellidos")) ?></strong> <?php print($this->session->userdata("profesion")) ?><br>
                    <small><?php print($this->session->userdata("email")) ?></small>
                </h1>
            </div>
            <div class="block">
                <form id="desbloquear_pantalla" method="POST" class="form-horizontal push">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-btn">
                                    <button type="submit" name="desbloquear_pantalla" class="btn btn-primary"><i class="fa fa-unlock-alt"></i> Acceder</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="text-center">
                    <a href="<?php print(base_url("login")) ?>"><small>¿No eres <?php print($this->session->userdata("nombresApellidos")) ?>?</small></a>
                </p>
            </div>
        </div>
        <script src="<?php print(base_url("static/js/vendor/jquery-1.11.1.min.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/vendor/bootstrap.min.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/plugins.js")) ?>"></script>
        <script src="<?php print(base_url("static/js/app.js")) ?>"></script>
        <script type="text/javascript">
		$(document).ready(function () {
			$(document).keydown(function(e) {
			    if (e.keyCode == 27) return false;
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

            $("#desbloquear_pantalla").validate({
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
                    e.closest('.form-group').removeClass('has-success has-error');
                    e.closest('.help-block').remove();
                },
                rules: {
                    "password": {
                        required: true
                    }
                },
                messages: {
                    "password": "Ingrese password"
                }
            });

		});
		</script>
    </body>
</html>