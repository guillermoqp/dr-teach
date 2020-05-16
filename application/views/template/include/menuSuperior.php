<a href="<?php print(base_url()) ?>" class="sidebar-brand">
    <i class="gi gi-flash"></i><strong><?php print($this->config->item("codigoSistema")) ?></strong>
</a>
<div class="sidebar-section sidebar-user clearfix">
    <div class="sidebar-user-avatar">
        <a href="#">
            <?php if($this->session->userdata("usuario")["url_imagen"]!=""){
            $urlImagen=base_url($this->session->userdata("usuario")["url_imagen"]);
            } else { $urlImagen=base_url("static/img/user_sin_imagen.png");  }?>
            <img src="<?php print($urlImagen) ?>" class="pull-right img-circle img-fluid">
        </a>
    </div>
    <div class="sidebar-user-name"><?php print($this->session->userdata("nombresApellidos")) ?></div>
    <div class="sidebar-user-links">
        <a href="<?php print(base_url("perfil")) ?>" data-toggle="tooltip" data-placement="bottom" title="Perfil"><i class="gi gi-user"></i></a>
        <a href="<?php print(base_url("mensajes")) ?>" data-toggle="tooltip" data-placement="bottom" title="Mensajes"><i class="gi gi-envelope"></i></a>
        <a href="#configuracion" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Configuracion">
        	<i class="gi gi-cogwheel"></i>
        </a>
        <a href="#" onclick="salir()" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesion/Salir"><i class="gi gi-exit"></i></a>
    </div>
</div>
<ul class="sidebar-section sidebar-themes clearfix">
    <li class="active">
        <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Blue"></a>
    </li>
    <li>
        <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="<?php print(base_url("static/css/themes/night.css")) ?>" data-toggle="tooltip" title="Night"></a>
    </li>
    <li>
        <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="<?php print(base_url("static/css/themes/amethyst.css")) ?>" data-toggle="tooltip" title="Amethyst"></a>
    </li>
    <li>
        <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="<?php print(base_url("static/css/themes/modern.css")) ?>" data-toggle="tooltip" title="Modern"></a>
    </li>
    <li>
        <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="<?php print(base_url("static/css/themes/autumn.css")) ?>" data-toggle="tooltip" title="Autumn"></a>
    </li>
    <li>
        <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="<?php print(base_url("static/css/themes/flatie.css")) ?>" data-toggle="tooltip" title="Flatie"></a>
    </li>
    <li>
        <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="<?php print(base_url("static/css/themes/spring.css")) ?>" data-toggle="tooltip" title="Spring"></a>
    </li>
    <li>
        <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="<?php print(base_url("static/css/themes/fancy.css")) ?>" data-toggle="tooltip" title="Fancy"></a>
    </li>
    <li>
        <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="<?php print(base_url("static/css/themes/fire.css")) ?>" data-toggle="tooltip" title="Fire"></a>
    </li>
</ul>