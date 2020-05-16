<?php $precioSuscripcionGratis=$this->config->item("precioSuscripcionGratis"); $precioSuscripcionMensual=$this->config->item("precioSuscripcionMensual");  $precioSuscripcionAnual=$this->config->item("precioSuscripcionAnual");
?>
<section id="pricing" class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="pricing-text section-header text-center">  
          <div>   
            <h2 class="section-title">Suscríbete a Dr-Teach y mejora tus habilidades</h2>
            <div class="desc-text">
              <p>Y forma parte de los más de 160 mil estudiantes que están aprendiendo con nosotros.</p>  
              <p>Aprende y mejora tus habilidades en Dr-Teach. Te ayudamos a desarrollarte como profesional en la tecnología de tu preferencia, llevandote al camino del exito.</p>
            </div>
            <div class="desc-text">
              <h3>¿Tienes dudas en algun plan?</h3>
              <p>Háblanos por <a href="tel:+51979737552"><h3><i class="lni-whatsapp size-lg"></i> +51 979737552</h3></a></p>
            </div>
          </div> 
        </div>
      </div>
    </div>
    <div class="row pricing-tables">
      
      <div class="col-lg-4 col-md-4 col-xs-12">
        <div class="pricing-table text-center">
          <div class="pricing-details">
            <h3><?php print($precioSuscripcionGratis["nombre"]) ?></h3>
            <h1><span>S/.</span><?php print($precioSuscripcionGratis["precio"]) ?></h1><?php print($precioSuscripcionGratis["pago"]) ?>
            <ul>
              <?php foreach ($precioSuscripcionGratis["beneficios"] as $key => $beneficio) { ?>
              <li><i class="lni-check-mark-circle"></i><?php print($beneficio) ?></li>
              <?php } ?>
            </ul>
          </div>
          <div class="plan-button">
            <a href="<?php print(base_url("login")) ?>" target="_blank" class="btn btn-border">Inscríbete</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-xs-12">
        <div class="pricing-table text-center">
          <div class="pricing-details">
            <h3><?php print($precioSuscripcionMensual["nombre"]) ?></h3>
            <h1><span>S/.</span><?php print($precioSuscripcionMensual["precio"]) ?></h1><?php print($precioSuscripcionMensual["pago"]) ?>
            <ul>
              <?php foreach ($precioSuscripcionMensual["beneficios"] as $key => $beneficio2) { ?>
              <li><i class="lni-check-mark-circle"></i><?php print($beneficio2) ?></li>
              <?php } ?>
            </ul>
          </div>
          <div class="plan-button">
            <a href="<?php print(base_url("login")) ?>" target="_blank" class="btn btn-common">Inscríbete</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-xs-12">
        <div class="pricing-table text-center">
          <div class="pricing-details">
            <h3><?php print($precioSuscripcionAnual["nombre"]) ?></h3>
            <h1><span>S/.</span><?php print($precioSuscripcionAnual["precio"]) ?></h1><?php print($precioSuscripcionAnual["pago"]) ?>
            <ul>
              <?php foreach ($precioSuscripcionAnual["beneficios"] as $key => $beneficio3) { ?>
              <li><i class="lni-check-mark-circle"></i><?php print($beneficio3) ?></li>
              <?php } ?>
            </ul>
          </div>
          <div class="plan-button">
            <a href="<?php print(base_url("login")) ?>" target="_blank" class="btn btn-border">Inscríbete</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>