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
        <div id="error-container">
            <div class="error-options">
                <h3><i class="fa fa-chevron-circle-left text-muted"></i><a href="<?php print(base_url()) ?>"> Ir a la pagina de incio</a></h3>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1 class="animation-pulse"><i class="fa fa-exclamation-circle text-warning"></i> 404</h1>
                    <img src="<?php print(base_url("static/img/darth_vader.png")) ?>" class="animation-pulse" width="300" height="300">
                    <h1>Error 404</h1>
                    <h2><?php print($this->config->item("mensaje404")) ?></h2>
                </div>
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <form action="<?php print(base_url()) ?>" method="POST">
                        <input type="text" id="search-term" name="search-term" class="form-control input-lg" placeholder="Buscar...">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>