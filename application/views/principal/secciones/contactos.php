<?php $datosConfiguracion=$this->config->item("datosConfiguracion"); ?>
<section id="contact" class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="contact-text section-header text-center">  
          <div>   
            <h2 class="section-title">Contactos</h2>
            <div class="desc-text">
              <p>Aprende y mejora tus habilidades en Dr-Teach</p>
              <p>Te ayudamos a desarrollarte como profesional en la tecnología de tu preferencia, llevandote al camino del exito.</p>
              <h3>
                <a href="tel:<?php print($datosConfiguracion["nroMovil"]) ?>"><i class="lni-whatsapp size-lg"></i></a>
                <a href="<?php print($datosConfiguracion["urlWeb"]) ?>" target="_blank"><i class="lni-domain size-lg"></i></a>
                <a href="<?php print($datosConfiguracion["urlLinkedin"]) ?>" target="_blank"><i class="lni-linkedin-original size-lg"></i></a>
                <a href="<?php print($datosConfiguracion["urlFacebook"]) ?>" target="_blank"><i class="lni-facebook-filled size-lg"></i></a>
                <a href="<?php print($datosConfiguracion["urlTwitter"]) ?>" target="_blank"><i class="lni-twitter-filled size-lg"></i></a>
                <a href="<?php print($datosConfiguracion["urlGooglePlus"]) ?>" target="_blank"><i class="lni-google-plus size-lg"></i></a>
                <a href="mailto:<?php print($datosConfiguracion["emailPrincipal"]) ?>" target="_blank"><i class="lni-envelope size-lg"></i></a>
              </h3>
            </div>
          </div> 
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <form id="contactForm" class="form-horizontal form-bordered form-control-borderless">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres y Apellidos" required data-error="Ingrese Nombres y Apellidos correctos">
                <div class="help-block with-errors"></div>
              </div>                                 
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto" required data-error="Ingrese Asunto correcto">
                <div class="help-block with-errors"></div>
              </div> 
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required data-error="Ingrese Email correcto">
                <div class="help-block with-errors"></div>
              </div>                                 
            </div>
            <div class="col-md-12">
              <div class="form-group form-actions"> 
                <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Ingrese Mensaje" rows="4" data-error="Ingrese Mensaje correcto" required></textarea>
                <div class="help-block with-errors"></div>
              </div>
              <div id="respuestaEnvioMail"></div>
              <div class="submit-button">
                <button type="submit" id="enviarContactos" name="enviarContactos" class="btn btn-common">Enviar</button>
              </div>
            </div>
          </div>            
        </form>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="contact-img">
          <img src="<?php print(base_url("static/principal/img/contact/01.png")) ?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<script src="<?php print(base_url("static/principal/js/validate/jquery.validate.min.js")) ?>"></script>
<script src="<?php print(base_url("static/principal/js/validate/messages_es_PE.js")) ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
  var url_base=(localStorage)?localStorage.getItem("url_base_dr-teach"):sessionStorage.getItem("url_base_dr-teach");
  $("#contactForm").validate({
    errorClass: 'help-block animation-slideDown',
    errorElement: 'div',
    errorPlacement: function(error, e) {
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
    },
    success: function(e) {
        if (e.closest('.form-group').find('.help-block').length === 2) {
            e.closest('.help-block').remove();
        } else {
            e.closest('.form-group').removeClass('has-success has-error');
            e.closest('.help-block').remove();
        }
    },
    submitHandler: function(form) {
        $.ajax({
          url: url_base+"principal/enviar_email_contactos?ajax=true",
          type: "POST",
          crossDomain : true,
          dataType: "json",
          data: $(form).serialize(),
          beforeSend: function() {
            $("body").addClass("page-loading");
          },
          success: function (response)
          {
            $("body").removeClass("page-loading");
            if(response.respuesta==true)
            {
              var html='<h4 class="section-title success">Éxito, detalle : '+response.mensaje+'</h4>';
              $("#respuestaEnvioMail").append(html);
              $("#contactForm").trigger("reset");
            }else{
              var html='<h4 class="section-title danger">Error, detalle : '+response.mensaje+'</h4>';
              $("#respuestaEnvioMail").append(html);
            }
          },
          error: function (xhr, ajaxOptions, thrownError) {
            $("body").removeClass("page-loading");
            var mensaje="";
            if (typeof xhr.responseJSON==="undefined") {
                console.log("thrownError : " + JSON.stringify(thrownError) + JSON.stringify(xhr));
            }else{
                var mensaje = xhr.responseJSON.message;
            }
            console.log("Error : " +mensaje);
          }
      });
    },
    rules: {
      nombres: {
          required: true,
          minlength: 5
      },
      asunto: {
          required: true,
          minlength: 5
      },
      email: {
          required: true,
          email: true
      },
      mensaje: {
          required: true,
          minlength: 10
      }
    },
    messages: {
        nombres: {
            required: "Ingrese Nombres y Apellidos correctos",
            minlength: "Ingrese Nombres y Apellidos correctos"
        },
        asunto: {
            required: "Ingrese Asunto correcto",
            minlength: "Ingrese Asunto correcto"
        },
        email: "Ingrese un email valido",
        mensaje: {
            required: "Ingrese un Mensaje correcto",
            minlength: "Tu Mensaje debe contener como minimo 10 caracteres."
        }
    }
  });
});
</script>