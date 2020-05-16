<nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
	<div class="container">
	  <a href="<?php print(base_url()) ?>" class="navbar-brand"><img src="<?php print(base_url("static/principal/img/logo.png")) ?>" height="50" width="200"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	    <i class="lni-menu"></i>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarCollapse">
	    <ul class="navbar-nav mr-auto w-100 justify-content-end">
	      <?php if($inicio) { ?>
	      <li class="nav-item">
	        <a class="nav-link page-scroll" href="#home">Inicio</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link page-scroll" href="#features">Servicios</a>
	      </li>                          
	      <li class="nav-item">
	        <a class="nav-link page-scroll" href="#showcase">Cursos</a>
	      </li>       
	      <li class="nav-item">
	        <a class="nav-link page-scroll" href="#pricing">Precios</a>
	      </li>     
	      <li class="nav-item">
	        <a class="nav-link page-scroll" href="#team">Equipo</a>
	      </li> 
	      <li class="nav-item">
	        <a class="nav-link page-scroll" href="#blog">Ultimos Cursos</a>
	      </li>  
	      <li class="nav-item">
	        <a class="nav-link page-scroll" href="#contact">Contactos</a>
	      </li> 
	      <li class="nav-item">
	        <a class="btn btn-singin" href="<?php print(base_url("login")) ?>">Ingresar</a>
	      </li>
	      <?php } else { ?>
	      	<li class="nav-item">
	        	<a class="nav-link page-scroll" href="<?php print(base_url()) ?>">Inicio</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="btn btn-singin" href="<?php print(base_url("login")) ?>">Ingresar</a>
	      	</li>
	      <?php } ?>
	    </ul>
	  </div>
	</div>
</nav>
<div class="container">      
	<div class="row space-100">
	  <div class="col-lg-6 col-md-12 col-xs-12">
	    <div class="contents">
	      <?php if($inicio) { ?>
	      <h2 class="head-title">Aprende nuevas tecnologías web y móvil.<br><?php print($this->config->item("codigoSistema")) ?></h2>
	      <p>Aprende a Programar Agilmente a través de cursos prácticos, concisos y actualizados, dictados por profesionales con experiencia.</p>
	      <div class="header-button">
	        <a href="<?php print(base_url("login")) ?>" target="_blank" class="btn btn-border-filled"> Acceder</a>
	        <a href="#contact" class="btn btn-border page-scroll"> Contactos</a>
	      </div>
	      <?php } else { ?>
	      <h2 class="head-title"><?php print($curso["nombre"]) ?></h2>
	      <p><?php print($curso["descripcion"]) ?></p>
	      	<div class="plan-button">
              <a class="btn btn-border nav-link page-scroll" href="#pricing">Empezar ahora</a>
            </div>
	      <?php } ?>
	    </div>
	  </div>
	  <?php if($inicio) { ?>
	  <div class="col-lg-6 col-md-12 col-xs-12 p-0"><img src="<?php print(base_url("static/principal/img/inicio2.png")) ?>" height="550" width="850"></div>
	  <?php } else { ?>
	  	<div class="col-lg-6 col-md-12 col-xs-12 p-0"><br><br><br><img src="<?php print($curso["icono"]) ?>" class="img-fluid" alt="Icono"></div>
	  <?php } ?>
	</div> 
</div>