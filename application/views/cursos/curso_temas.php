<!-- target="_blank" rel="noopener noreferrer" href=" -->
<link rel="stylesheet" type="text/css" href="<?php print(base_url("static/js/jssocials/jssocials.css")) ?>"/>
<link rel="stylesheet" type="text/css" href="<?php print(base_url("static/js/jssocials/jssocials-theme-flat.css")) ?>" />
<div class="row">
    <div class="col-md-8">
        <div class="widget">
            <div class="widget-advanced">
                <div class="widget-header text-center themed-background-dark">
                    <h3 class="widget-content-light">
                        <a href="#"><?php print($curso["nombre"]) ?></a><br>
                        <small><?php print($curso["categoria"]) ?></small>
                    </h3>
                </div>
                <div class="widget-main">
                    <a href="javascript:void(0)" class="widget-image-container animation-fadeIn">
                        <span class="widget-icon themed-background"><img class="widget-icon" src="<?php print($curso["icono"]) ?>"></span>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-default pull-right">
                        <?php print($curso["lecciones"]); ?> LECCIONES
                    </a>
                    <hr>
                    <?php foreach ($curso["grupos_temas"] as $key => $grupo_tema) { ?>
                    <?php $grupo_uri=$grupo_tema["codigo_uri"]; ?>
                    <table class="table table-vcenter">
                        <thead>
                            <tr class="active">
                                <th><?php print($grupo_tema["nombre"]); ?>
                                <a href="<?php print(url_actual($grupo_uri)) ?>"><button class="btn btn-xs btn-default" data-toggle="tooltip" title="Ver Grupo"><i class="fa fa-eye"></i></button></a> 
                                </th>
                                <th class="text-right"><small><em><?php print($grupo_tema["horas"]); ?> HORAS VIDEO</em></small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($grupo_tema["temas"] as $key => $tema) { ?>
                            <tr>
                                <td><?php print($tema["orden"]); ?>.-<?php print($tema["nombre"]); ?></td>
                                <td class="text-right">Video <i class="fa fa-play"></i></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="block">
            <div class="block-section">
                <a target="_blank" rel="noopener noreferrer" href="<?php print(url_actual("examen")) ?>" class="btn btn-lg btn-primary btn-block"><i class="fa fa-book"></i> Rendir Examen</a>
                <a target="_blank" rel="noopener noreferrer" href="<?php print(url_actual("certificado")) ?>" class="btn btn-lg btn-primary btn-block"><i class="fa fa-book"></i> Obtener Certificado</a>
            </div>
        </div>
        <div class="block">
            <div class="block-title">
                <h2><strong>Compartir </strong> Curso</h2>
            </div>
            <div class="block-section text-center">
                <div class="btn-group" id="compartir"></div>
            </div>
        </div>
    </div>
</div>
<script src="<?php print(base_url("static/js/jssocials/jssocials.min.js")) ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#compartir").jsSocials({
        url: "<?php print(url_actual()) ?>",
        text: "<?php print($this->config->item("codigoSistema")) ?>| <?php print($this->config->item("nombreSistema")) ?>",
        showLabel: true,
        showCount: "inside",
        shareIn: "popup",
        shares: ["twitter","facebook","linkedin","whatsapp"],
        email: {
            label: "E-mail",
            logo: "fa fa-at",
            to: "<?php print($this->config->item("email")) ?>",
            shareIn: "self"
        },
        whatsapp: {
            label: "WhatsApp",
            logo: "fa fa-whatsapp",
            shareIn: "self"
        }
    });
});
</script>