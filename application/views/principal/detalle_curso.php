<link rel="stylesheet" type="text/css" href="<?php print(base_url("static/js/jssocials/jssocials.css")) ?>" />
<link rel="stylesheet" type="text/css" href="<?php print(base_url("static/js/jssocials/jssocials-theme-flat.css")) ?>" />
<section id="detalleCurso" class="section">
  <div class="container">
    <div class="row pricing-tables">
    	<div class="col-lg-8">
    		<div>   
            <h1 class="section-title">Acerca del Curso</h1>
            <div class="desc-text">
              <p><?php print($curso["acerca"]) ?></p>
            </div><br><br>
            <div class="desc-text">
              <h4>Lista de Clases</h4>
              <p>Este curso cuenta con <?php print($curso["nroGrupoTemas"]) ?> Grupos de Temas y <?php print($curso["lecciones"]) ?> Temas donde llegarás a aprender la tecnología elegida.</p>
            </div>
        </div><br><br>
        <?php foreach ($curso["grupos_temas"] as $key => $grupo_tema) { ?>
	        <?php $grupo_uri=$grupo_tema["codigo_uri"]; ?>
	        <table class="table table-vcenter">
	            <thead>
	                <tr class="active">
	                    <th><?php print($grupo_tema["nombre"]); ?></th>
	                    <th class="text-right"><small><em> ? HORAS VIDEO</em></small></th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php foreach ($grupo_tema["temas"] as $key => $tema) { ?>
	                <tr>
	                    <td> >> <a target="_blank" rel="noopener noreferrer" href="#"><?php print($tema["nombre"]); ?></a></td>
	                    <td class="text-right">Video</a>
	                    </td>
	                </tr>
	                <?php } ?>
	            </tbody>
	        </table>
	        <?php } ?>
    	</div>
    	<div class="col-lg-4">
    		<div class="row">
    			<h4>Información del Curso</h4>
  				<ol>
  					<li><i class="fa fa-clock-o"></i> Categoria: <?php print($curso["categoria"]) ?></li>
  					<li><i class="fa fa-clock-o"></i> Nivel: <?php print($curso["nivel"]) ?></li>
  					<li><i class="fa fa-clock-o"></i> Acceso las 24 horas del día.</li>
  					<li><i class="fa fa-clock-o"></i> Clases concretas, fáciles de llevar.</li>
  					<li><i class="fa fa-clock-o"></i> Ejercicios prácticos durante el curso.</li>
            <li><i class="fa fa-clock-o"></i> Posibilidades Ilimitadas de examen.</li>
  					<li><i class="fa fa-clock-o"></i> Certificado de completitud al aprobar el examen.</li>
  				</ol>
    		</div><br>
        <div class="row">
          <h4>Requerimientos del Curso </h4>
          <ol>
            <li><i class="fa fa-clock-o"></i> Ganas de aprender</li>
          </ol>
        </div><br>
        <div class="row">
          <h3>Compartir: </h3>
          <div class="btn-group" id="compartir"></div>
        </div>
    	</div>
    </div>
  </div>
</section>
<?php $this->load->view("principal/secciones/precios"); ?>
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