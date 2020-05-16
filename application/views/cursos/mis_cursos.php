<?php if(isset($suscripcion["id_suscripcion"])&&$suscripcion["id_suscripcion"]!="") { ?>
<div class="row">
    <div class="col-md-12">
        <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background">
            <div class="widget-simple">
                <h4 class="widget-content widget-content-light">
                    <strong>Suscripcion ID:<?php print($suscripcion["id_suscripcion"]) ?></strong>
                    <small>Código: <?php print($suscripcion["codigo_suscripcion"]) ?></small>
                    <small>Tipo: <?php print($suscripcion["tipo_suscripcion"]) ?></small>
                    <small>Acceso a Cursos: <?php print($nombresCursos) ?></small>
                    <?php if($suscripcion["fecha_inicio"]!=""||$suscripcion["fecha_fin"]) { ?>
                    <small>Fechas: Inicio: <?php print($suscripcion["fecha_inicio"]) ?>, Fin : <?php print($suscripcion["fecha_fin"]) ?></small>
                    <?php } ?>
                </h4>
            </div>
        </a>
    </div>
</div>
<?php } ?>
<div class="row">
	<div class="col-md-12">
        <?php foreach ($cursos as $key => $curso) { ?>
        <div class="col-sm-6">
            <div class="widget">
                <div class="widget-advanced">
                    <div class="widget-header text-center themed-background-dark-default">
                        <h3 class="widget-content-light">
                            <a href="<?php print(base_url("cursos/".$curso["codigo_uri"])) ?>" class="themed-color-default"><?php print($curso["nombre"]); ?></a><br>
                            <small><?php print($curso["categoria"]) ?></small>
                        </h3>
                    </div>
                    <div class="widget-main">
                        <a href="<?php print(base_url("cursos/".$curso["codigo_uri"])) ?>" class="widget-image-container animation-fadeIn">
                            <span class="widget-icon themed-background-default"><img class="widget-icon" src="<?php print($curso["icono"]) ?>"></span>
                        </a>
                        <p><?php print($curso["descripcion"]); ?>. <?php print($curso["acerca"]); ?></p>
                        <a href="<?php print(base_url("cursos/".$curso["codigo_uri"])) ?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-send-o"></i> Regresar al Curso</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>