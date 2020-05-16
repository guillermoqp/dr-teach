<div class="row">
    <div class="col-md-8">
        <div class="row">
            <?php foreach ($cursos as $key => $curso) { ?>
            <div class="col-sm-6">
                <div class="widget">
                    <div class="widget-advanced">
                        <div class="widget-header text-center themed-background-dark-default">
                            <h3 class="widget-content-light">
                                <a href="#" class="themed-color-default"><?php print($curso["nombre"]); ?></a><br>
                                <small><?php print($curso["categoria"]) ?></small>
                            </h3>
                        </div>
                        <div class="widget-main">
                            <a href="#" class="widget-image-container animation-fadeIn">
                                <span class="widget-icon themed-background-default"><img class="widget-icon" src="<?php print($curso["icono"]) ?>"></span>
                            </a>
                            <a href="#" class="btn btn-sm btn-default pull-right"> VIDEOS/LECCIONES
                                <i class="fa fa-clock-o"></i> ?
                            </a> 
                            <a href="<?php print(base_url("suscripcion/unico/".$curso["codigo_uri"])) ?>" class="btn btn-sm btn-success"> S/. <?php print($curso["precio"]); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="block full">
            <div class="block-title">
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active"><a href="#courses-categories">Categorias</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="courses-categories">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="<?php print(url_actual()) ?>"><span class="badge pull-right"></span>Todas las Categorias</a></li>
                        <li><hr></li>
                        <?php foreach ($categorias as $indice => $categoria) { 
                            $urlBusqueda="?categoria=".$categoria["id_categoria"];
                        ?>
                        <li><a href="<?php print(base_url("cursos".$urlBusqueda)) ?>"><span class="badge pull-right"></span>
                            <i class="gi gi-brush fa-fw themed-color-dark"></i> <?php print($categoria["nombre"]) ?></a>
                            <?php print($categoria["descripcion"]) ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings">
                        <i class="fa fa-cog"></i>
                    </a>
                </div>
                <h2><strong>Estado de la Cuenta</strong></h2>
            </div>
            <div class="block-section">
                <table class="table table-borderless table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td class="text-right" style="width: 30%;">
                                <img src="<?php print(base_url($this->session->userdata("usuario")["url_imagen"])) ?>" width="100" height="100" alt="avatar" class="img-circle">
                            </td>
                            <td><a href="<?php print(base_url("perfil")) ?>">
                                <strong><?php print($this->session->userdata("nombresApellidos")) ?></strong></a><br>
                                <em><?php print($this->session->userdata("usuario")["ocupacion"]) ?></em></td>
                        </tr>
                        <tr>
                            <td class="text-right">Cuenta</td>
                            <td>
                                <?php if($this->session->userdata("usuario")["tipo"]=="B") { ?>
                                    Tipo: <span class="label label-default">Básico</span><span class="label label-default"><i class="fa fa-pencil"></i></span>
                                    <a href="<?php print(base_url("precios")) ?>"> Hazte Premium!</a>
                                <?php } else { ?>
                                    Tipo: <span class="label label-success">Premium</span><span class="label label-success"><i class="fa fa-check"></i></span>
                                <?php } ?><br>
                                Estado: <?php print($this->session->userdata("usuario")["estado"]=="A"?"Activo":"Inactivo"); ?>
                            </td> 
                        </tr> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>