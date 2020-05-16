<!DOCTYPE html>
<html lang="es_ES">
  <?php $this->load->view("principal/header"); ?>
  <body>
    <div class="preloader themed-background">
        <h1 class="push-top-bottom text-light text-center"><strong><?php print($this->config->item("codigoSistema")) ?></strong></h1>
        <div class="inner">
            <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Cargando..</strong></h3>
            <img src="<?php print(base_url("static/img/cargando.gif")) ?>" width="100" height="100">
        </div>
    </div>
    <header id="home" class="hero-area">    
      <div class="overlay">
        <span></span>
        <span></span>
      </div>
      <?php $this->load->view("principal/menu"); ?>
    </header>
    <!-- Vistas Dinamicas : Vistas de cada metodo en el Controlador: principal -->
    <?php if (isset($view)){ $this->load->view($view); } ?>
    <?php $this->load->view("principal/footer"); ?>
  </body>
</html>