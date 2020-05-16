<link rel="stylesheet" type="text/css" href="<?php print(base_url("static/js/jssocials/jssocials.css")) ?>"/>
<link rel="stylesheet" type="text/css" href="<?php print(base_url("static/js/jssocials/jssocials-theme-flat.css")) ?>" />
<style type="text/css">
.video-container {
	position: relative;
	padding-bottom: 56.25%;
	padding-top: 30px; height: 0; overflow: hidden;
}
.video-container iframe,
.video-container object,
.video-container embed {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
</style>
<div class="row">
    <div class="col-md-8">
        <div class="widget">
            <div class="widget-advanced">
                <div class="widget-header text-center themed-background-dark">
                    <h3 class="widget-content-light">
                        <a href="#"><?php print($tema["orden"]); ?> <?php print($tema["nombre"]); ?></a><br>
                        <small><?php print($tema["nombre_grupo_tema"]); ?></small>
                    </h3>
                </div>
                <div class="widget-main">
                    <div class="video-container"><iframe width="853" height="480" src="<?php print($tema["url_video"]); ?>" frameborder="0" allowfullscreen></iframe></div>
                    <blockquote class="pull-left"><b><h3>Descripción</h3></b><p><?php print($tema["descripcion"]); ?></p></blockquote>
                    <div class="alert alert-success">
                        <h4><i class="fa fa-code"></i> Código:</h4>
                            <div class="block">
                                <div class="block-title">
                                    <h2><strong>PHP</strong></h2>
                                </div>
                                <pre class="line-numbers"><code class="language-php">&lt;?php
                                class App {
                                function home() {
                                // ...
                                }

                                function profile() {
                                // ...
                                }

                                function settings() {
                                // ...
                                }
                                }</code></pre>
                            </div>
                        </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <?php if(sizeof($tema["recursos"])>1) { ?>
        <div class="block">
            <div class="block-section"><i class="fa fa-download"></i> <h2>Lista de recursos</h2></div>
            <?php foreach ($tema["recursos"] as $key => $recurso) { $r2=explode("|",$recurso); ?>
            <a target="_blank" rel="noopener noreferrer" href="<?php print($r2[1]); ?>">
                <h4 class="widget-content widget-content-light"><i class="gi gi-download"></i>
                    <strong><?php print($r2[0]); ?></strong>
                </h4>
            </a>
            <?php } ?>
        </div>
        <?php } ?>
        <div class="block">
            <div class="block-title">
                <h2><strong>Compartir</strong> Tema</h2>
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