<div class="content-header content-header-media">
    <div class="header-section">
        <?php if($this->session->userdata("usuario")["url_imagen"]!=""){
            $urlImagen=base_url($this->session->userdata("usuario")["url_imagen"]);
        } else { $urlImagen=base_url("static/img/user_sin_imagen.png");  }?>
        <img src="<?php print($urlImagen) ?>" class="pull-right img-circle img-fluid">
        <h1><?php print($this->session->userdata("nombresApellidos")) ?><br><small><?php print($this->session->userdata("usuario")["profesion"]) ?></small></h1>
    </div>
    <img src="<?php print(base_url("static/img/placeholders/backgrounds/fondo_login.jpg")) ?>" class="animation-pulseSlow">
</div>
<div class="row">
    <div class="col-md-6 col-lg-7">
        <div class="block">
            <div class="block-title">
                <h2><strong> Intereses</strong></h2>
            </div>
            <div class="block-content-full">
                <div class="row">
                    <div class="col-md-9">
                        <h2><b> > <?php print(implode(" ",$interesesUsuario)); ?></b></h2><a href="<?php print(base_url("perfil/intereses/")) ?>">
                            <button type="button" class="btn btn-lg btn-info"><i class="fa fa-edit"></i> Editar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="block full">
            <div class="block-title">
                <h2>Redes <strong>Sociales</strong></h2>
            </div>
            <ul class="media-list">
                <li class="media">
                    <div class="media-body">
                        <span class="text-muted pull-right"><small><em>30 min ago</em></small></span>
                        <a href="page_ready_user_profile.html"><strong>John Doe</strong></a>
                        <p>In hac <a href="javascript:void(0)">habitasse</a> platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. <a href="javascript:void(0)" class="text-danger"><strong>#dev</strong></a></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-lg-5">
        <div class="block">
            <div class="block-title">
                <h2>Acerca de <strong> <?php print($this->session->userdata("nombresApellidos")) ?> </strong> </h2>
            </div>
            <table class="table table-borderless table-striped">
                <tbody>
                	<tr>
                        <td style="width: 20%;"><strong>ID/UserName</strong></td>
                        <td> <?php print($this->session->userdata("usuario")["id_usuario"]) ?>/ <?php print($this->session->userdata("usuario")["username"]) ?> </td>
                    </tr>
                    <tr>
                        <td><strong>Profesion</strong></td>
                        <td><a href="javascript:void(0)"> <?php print($this->session->userdata("usuario")["profesion"]) ?></a></td>
                    </tr>
                    <tr>
                        <td><strong>Ocupacion</strong></td>
                        <td><a href="javascript:void(0)"> <?php print($this->session->userdata("usuario")["ocupacion"]) ?></a></td>
                    </tr>
                    <tr>
                        <td><strong>Pais/Ciudad</strong></td>
                        <td><a href="javascript:void(0)" class="label label-danger"> <?php print($this->session->userdata("usuario")["pais"]) ?>/<?php print($this->session->userdata("usuario")["ciudad"]) ?></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>