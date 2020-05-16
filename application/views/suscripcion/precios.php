<?php
    $precioSuscripcionGratis=$this->config->item("precioSuscripcionGratis");
    $precioSuscripcionMensual=$this->config->item("precioSuscripcionMensual");
    $precioSuscripcionAnual=$this->config->item("precioSuscripcionAnual");
    $precioSuscripcionUnico=$this->config->item("precioSuscripcionUnico");
?>
<h4 class="page-header">Opciones de Precios de Suscripción</h4>
<div class="row">
    <div class="col-sm-3">
        <table class="table table-borderless table-pricing">
            <thead><tr><th><?php print($precioSuscripcionGratis["nombre"]) ?></th></tr></thead>
            <tbody>
                <?php foreach ($precioSuscripcionGratis["beneficios"] as $key => $beneficio) { ?>
                <tr><td><i class="gi gi-check"></i><?php print($beneficio) ?></td></tr>
                <?php } ?>
                <tr><td class="table-price">
                    <h1>S/ <?php print($precioSuscripcionGratis["precio"]) ?><br><small><?php print($precioSuscripcionGratis["pago"]) ?></small></h1>
                </td></tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-3">
        <table class="table table-borderless table-pricing">
            <thead><tr><th><?php print($precioSuscripcionMensual["nombre"]) ?></th></tr></thead>
            <tbody>
                <?php foreach ($precioSuscripcionMensual["beneficios"] as $key => $beneficio) { ?>
                <tr><td><i class="gi gi-check"></i><?php print($beneficio) ?></td></tr>
                <?php } ?>
                <tr><td class="table-price">
                    <h1>S/.<?php print($precioSuscripcionMensual["precio"]) ?> <br><small><?php print($precioSuscripcionMensual["pago"]) ?></small></h1>
                </td></tr>
                <tr><td><a href="<?php print(base_url("suscripcion/mensual/")) ?>" class="btn btn-primary"><i class="fa fa-angle-right"></i> Inscríbete<i class="fa fa-angle-left"></i></a></td></tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-3">
        <table class="table table-borderless table-pricing table-featured">
            <thead><tr><th><?php print($precioSuscripcionAnual["nombre"]) ?></th></tr></thead>
            <tbody>
                <?php foreach ($precioSuscripcionAnual["beneficios"] as $key => $beneficio) { ?>
                <tr><td><i class="gi gi-check"></i><?php print($beneficio) ?></td></tr>
                <?php } ?>
                <tr><td class="table-price"><h1>S/. <?php print($precioSuscripcionAnual["precio"]) ?><br><small><?php print($precioSuscripcionAnual["pago"]) ?></small></h1></td></tr>
                <tr><td><a href="<?php print(base_url("suscripcion/anual/")) ?>" class="btn btn-primary"><i class="fa fa-angle-right"></i> Inscríbete<i class="fa fa-angle-left"></i></a></td></tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-3">
        <table class="table table-borderless table-pricing">
            <thead><tr><th><?php print($precioSuscripcionUnico["nombre"]) ?></th></tr></thead>
            <tbody>
                <?php foreach ($precioSuscripcionUnico["beneficios"] as $key => $beneficio) { ?>
                <tr><td><i class="gi gi-check"></i><?php print($beneficio) ?></td></tr>
                <?php } ?>
                <tr><td class="table-price"><h1>S/. <?php print($precioSuscripcionUnico["precio"]) ?><br><small><?php print($precioSuscripcionUnico["pago"]) ?></small></h1></td></tr>
            </tbody>
        </table>
    </div>
</div>
<!--
<tr><td>aaaaaaaaaa</td></tr>
<tr><td>aaaaaaaaaa</td></tr>
<tr><td>aaaaaaaaaa</td></tr>
-->