<footer>
  <section id="footer-Content">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
          <div class="footer-logo"><?php print($this->config->item("nombreSistema")) ?> | <?php print($this->config->item("codigoSistema")) ?><br>
            <a href="<?php print(base_url()) ?>" class="navbar-brand"><img src="<?php print(base_url("static/principal/img/logo.png")) ?>" height="50" width="200"></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
          <div class="widget">
            <h3 class="block-title">Empresa</h3>
            <ul class="menu">
              <li><a href="#"> Acerca</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
          <div class="widget">
            <h3 class="block-title">Productos</h3>
            <ul class="menu">
              <li><a href="#">- Cursos a Demanda</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-mb-12">
          <div class="widget">
            <h3 class="block-title">Aplicacion</h3>
            <ul class="menu">
              <li><a href="#">  - Android App</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
          <div class="widget">
            <h3 class="block-title">Suscripcion</h3>
            <p>Subscribete a nuestras actualizaciones: </p>
            <div class="subscribe-area">
            <form action="https://gmail.us20.list-manage.com/subscribe/post?u=afbc0fc7bb5bc9e6934b00a80&amp;id=8c029dd77a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
              <div class="submit-button">
                <input type="email" required="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Ingrese Mail">
                <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn btn-common button">Subs.<span><i class="lni-chevron-right"></i></span></button>
              </div>
              <input type="hidden" name="b_afbc0fc7bb5bc9e6934b00a80_8c029dd77a" tabindex="-1" value="">
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="site-info text-center">
              <p>Creado por :<a href="http://www.drteach.com" rel="nofollow">Dr-Teach</a>
                <br>De <img src="<?php print(base_url("static/principal/img/peru_flag.png")) ?>" height="35px" width="40px"> con <i class="lni-heart size-lg lni-flashing-effect"></i> para el mundo.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</footer>
<a href="#" class="back-to-top">
  <i class="lni-chevron-up"></i>
</a>
<div id="preloader">
  <div class="loader" id="loader-1"></div>
</div>
<div id="botonWhatssApp"></div>
<script src="<?php print(base_url("static/principal/js/popper.min.js")) ?>"></script>
<script src="<?php print(base_url("static/principal/js/bootstrap.min.js")) ?>"></script>
<script src="<?php print(base_url("static/principal/js/owl.carousel.js")) ?>"></script>      
<script src="<?php print(base_url("static/principal/js/jquery.nav.js")) ?>"></script>    
<script src="<?php print(base_url("static/principal/js/scrolling-nav.js")) ?>"></script>    
<script src="<?php print(base_url("static/principal/js/jquery.easing.min.js")) ?>"></script>     
<script src="<?php print(base_url("static/principal/js/nivo-lightbox.js")) ?>"></script>     
<script src="<?php print(base_url("static/principal/js/jquery.magnific-popup.min.js")) ?>"></script>      
<script src="<?php print(base_url("static/principal/js/main.js")) ?>"></script>
<script src="<?php print(base_url("static/js/scripts/url_base.js")) ?>"></script>
<link rel="stylesheet" href="<?php print(base_url("static/principal/floating-wpp/floating-wpp.min.css")) ?>">
<script src="<?php print(base_url("static/principal/floating-wpp/floating-wpp.min.js")) ?>"></script>
<script type="text/javascript">
$(function () {
    var urlImagenWhatss="<?php print(base_url("static/principal/floating-wpp/whatsapp.svg")) ?>";
    $("#botonWhatssApp").floatingWhatsApp({
        phone: "051979737552",
        popupMessage: "Hola, ¿Podemos ayudarte?",
        message: "Si, deseo mas informacion acerca del curso ...",
        showPopup: true,
        showOnIE: false,
        headerTitle: "¡Bienvenido!",
        buttonImage: '<img src="'+urlImagenWhatss+'"/>'
    });
});
</script>