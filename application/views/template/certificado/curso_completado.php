<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://fonts.googleapis.com/css?family=Oleo+Script|Open+Sans:400,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="static/certificado/css/normalize.min.css">
        <link rel="stylesheet" href="static/certificado/css/main.css">
        <link rel="stylesheet" href="static/certificado/css/styles.css">
        <style type="text/css">
            @page { margin: 0px; }
            body { margin: 0px; }
        </style>
    </head>
    <body>
        <section>
            <img class="rect" src="static/certificado/img/marco.png"/>
            <div class="logos">
                <div class="col-4 container-logo"><img class="right-logo" src="static/img/logo.png"/></div>
            </div>
            <div><h1>Dr-Teach Educational Platform</h1></div>
            <div>le otorga a</div>
            <div><span id="name"><?php print($nombres_apellidos) ?></span></div>
            <div>el presente <b>Certificado de Completitud</b> del curso de :</div>
            <div><span id="title"><?php print($curso) ?></span></div>
            <div id="description">Por haber culminado exitosamente su participación en el curso de:<b><?php print($curso) ?></b>, con un porcentaje de aprobacion de: <b><?php print($resultado) ?> %</b></div> 
            <div><span id="date"><?php print($preFirma) ?></span></div>
            <div class="signatures">
                <div class="col-3 container-signature">Certif. ID :<b><?php print($codigo) ?></b></div>
                <div class="col-3 container-signature"></div>
                <div class="col-3 container-signature"><img class="signature" src="static/certificado/img/firmaJGQP.png"/><?php print($firma) ?></div>
            </div>
        </section>
    </body>
</html>