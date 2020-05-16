<section id="showcase">
  <div class="container-fluid right-position">
    <div class="row gradient-bg">
      <div class="col-lg-12">
        <div class="showcase-text section-header text-center">  
          <div>   
            <h2 class="section-title">Cursos</h2>
            <div class="desc-text">
              <h3>Hay una tecnología para cada profesional</h3>
              <p>Descubre cuál es para ti y empieza a especializarte.</p>
            </div>
          </div> 
        </div>
      </div>
    </div>
    <div class="row justify-content-center showcase-area">
      <div class="col-lg-12 col-md-12 col-xs-12 pr-0">
        <div class="showcase-slider owl-carousel">
          <?php foreach ($cursos as $key => $curso) { ?>
          <a href="<?php print(base_url("curso/".$curso["codigo_uri"])) ?>" target="_blank">
          <div class="item">
            <div class="screenshot-thumb">
              <img src="<?php print($curso["icono"]); ?>" class="img-fluid"/>
              <div class="hover-content text-center">
                <div class="fancy-table">
                  <div class="table-cell">
                    <div class="single-text">
                      <h5><?php print($curso["nombre"]); ?></h5>
                      <p><?php print($curso["categoria"]); ?></p>
                    </div>
                    <div class="zoom-icon">
                      <a href="<?php print(base_url("curso/".$curso["codigo_uri"])) ?>" target="_blank"><i class="lni-link"></i> Ver mas...</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </a>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</section>