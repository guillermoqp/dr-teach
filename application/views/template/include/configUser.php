<ul class="nav navbar-nav-custom pull-right">
    <li>
        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt','toggle-other');">
            <i class="gi gi-share_alt"></i>
            <span class="label label-primary label-indicator animation-floating">NOTIFICACIONES</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
            <?php if($this->session->userdata("usuario")["url_imagen"]!=""){
            $urlImagen=base_url($this->session->userdata("usuario")["url_imagen"]);
            } else { $urlImagen=base_url("static/img/user_sin_imagen.png");  }?>
            <img src="<?php print($urlImagen) ?>" class="pull-right img-circle img-fluid"><i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
            <li class="dropdown-header text-center">Cuenta</li>
            <li>
                <a href="<?php print(base_url("perfil/intereses/")) ?>"><i class="fa fa-clock-o fa-fw pull-right"></i>
                    <span class="badge pull-right"></span>Intereses
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php print(base_url("perfil")) ?>"><i class="fa fa-user fa-fw pull-right"></i>Perfil</a>
                <a href="#configuracion" data-toggle="modal"><i class="fa fa-cog fa-fw pull-right"></i>Configuracion</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php print(base_url("bloquear")) ?>"><i class="fa fa-lock fa-fw pull-right"></i> Bloquear pantalla</a>
                <a href="#" onclick="salir()"><i class="fa fa-ban fa-fw pull-right"></i> Cerrar Sesion/Salir</a>
            </li>
        </ul>
    </li>
</ul>
<div id="configuracion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">X</button>
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Configuraciones</h2>
            </div>
            <div class="modal-body">
                <fieldset>
                    <legend>Informacion</legend>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Usuario</label>
                        <div class="col-md-8"><p class="form-control-static"><?php print($this->session->userdata("nombresApellidos")) ?></p></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                        <div class="col-md-8">
                            <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="<?php print($this->session->userdata("usuario")["email"]) ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-notifications">Notificaciones Email</label>
                        <div class="col-md-8">
                            <label class="switch switch-primary">
                                <?php $notificacionesEmail=$this->session->userdata("usuario")["notificaciones_email"]; ?>
                                <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" <?php print($notificacionesEmail?"checked":"") ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>
                </fieldset>
                <hr/>
                <form id="cambiarPassword" class="form-horizontal form-bordered">    
                    <fieldset>
                        <legend>Actualizar Password</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-password">Password Actual</label>
                            <div class="col-md-8">
                                <input type="password" id="password_actual" name="password_actual" class="form-control" placeholder="Ingrese password actual">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-password">Nuevo Password</label>
                            <div class="col-md-8">
                                <input type="password" id="nuevo_password" name="nuevo_password" class="form-control" placeholder="Ingrese un password complejo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-repassword">Confirmar Nuevo Password</label>
                            <div class="col-md-8">
                                <input type="password" id="nuevo_password_confirmar" name="nuevo_password_confirmar" class="form-control" placeholder="Confirmar Password">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#cambiarPassword").validate({
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
        submitHandler: function(form) {
            var datos=$(form).serialize();
            var url_cambiarPassword="<?php print(base_url("cambiarPassword")) ?>";
            console.log("POST a: "+url_cambiarPassword+", datos :"+JSON.stringify(datos));
            $.bootstrapGrowl("<h4>Exito al Cambiar Password</h4><p>Exito al actualizar password</p>", {
                type: "success",
                delay: 2500,
                allow_dismiss: true
            });
            $("#password_actual").val("");
            $("#nuevo_password").val("");
            $("#nuevo_password_confirmar").val("");
        },
        rules: {
            "password_actual": {
                required: true,
                minlength: 5
            },
            "nuevo_password": {
                required: true,
                minlength: 8
            },
            "nuevo_password_confirmar": {
                required: true,
                equalTo: '#nuevo_password'
            }
        },
        messages: {
            'password_actual': {
                required: "Ingrese Password",
                minlength: "Minimo 5 caracteres"
            },
            'nuevo_password': {
                required: "Ingrese Password",
                minlength: "Minimo 8 caracteres"
            },
            'nuevo_password_confirmar': {
                required: "Ingrese password correcto",
                equalTo: "Tu password no concuerda con el anterior"
            }
        }
    });
});
</script>