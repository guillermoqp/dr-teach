<section id="blog" class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="blog-text section-header text-center">  
          <div>   
            <h2 class="section-title">Utimos Cursos</h2>
            <div class="desc-text"><p>Ultimos Cursos recientemente agregados.</p></div>
          </div> 
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($ultimosCursos as $key => $curso) { ?>
      <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
        <div class="blog-item-wrapper">
          <a href="<?php print(base_url("curso/".$curso["codigo_uri"])) ?>" target="_blank"> 
          <div class="blog-item-img"><img src="<?php print($curso["icono"]); ?>" class="img-fluid" alt=""></div>
          <div class="blog-item-text">
            <h3><?php print($curso["nombre"]); ?></h3>
            <p><?php print($curso["descripcion"]); ?><br>Categoria: <?php print($curso["categoria"]); ?></p>
          </div>
          <div class="author">
            <span class="name"><i class="lni-user"></i>? Lecciones.</span>
            <span class="date float-right"><i class="lni-calendar"></i>? Horas.</span>
          </div>
          </a>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>