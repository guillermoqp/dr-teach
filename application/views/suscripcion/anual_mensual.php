<div class="block">
    <div class="block-title">
        <h2><strong><?php print($tipoSuscripcion["nombre"]) ?></strong><?php print($tipoSuscripcion["pago"]) ?></h2>
        <h3><?php print($tipoSuscripcion["descripcion"]) ?></h3>
    </div>
	<div class="row">
	  	<div class="col-md-8">
		    <form id="wizardPlanAnual" method="POST" class="form-horizontal form-bordered">
		        <div id="clickable-first" class="step">
		            <div class="form-group">
		                <div class="col-xs-12">
		                    <ul class="nav nav-pills nav-justified clickable-steps">
		                        <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-first"><strong>Elegir medio de pago:</strong></a></li>
		                        <li><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>Información de Tarjeta de Crédito:</strong></a></li>
		                    </ul>
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-md-4 control-label">Elegir medio de pago:</label>
		                <div class="col-md-5">
		                	<fieldset>
								<input type="radio" id="medioPago" name="medioPago[]" value="visa">
									<img src="<?php print(base_url("static/img/mediosPago.png")) ?>"><br />
								<input type="radio" id="medioPago" name="medioPago[]" value="depositoInterbank"> Deposito Interbak
									<img src="<?php print(base_url("static/img/mediosPago_interbank.png")) ?>" width="150" height="80" class="img-fluid"><br/>
								<label for="medioPago[]" class="error" style="display:none;">Elija una opcion</label>
							</fieldset>
		                </div>
		            </div>
		        </div>
		        <div id="clickable-second" class="step">
		            <div class="form-group">
		                <div class="col-xs-12">
		                    <ul class="nav nav-pills nav-justified clickable-steps">
		                        <li><a href="javascript:void(0)" data-gotostep="clickable-first"><strong>Elegir medio de pago:</strong></a></li>
		                        <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>Información de Tarjeta de Crédito:</strong></a></li>
		                    </ul>
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-md-4 control-label">Nombre como aparece en la tarjeta <span class="text-danger">*</span></label>
		                <div class="col-md-5">
		                    <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombre como aparece en la tarjeta ">
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-md-4 control-label">Correo electrónico <span class="text-danger">*</span></label>
		                <div class="col-md-5">
		                    <input type="text" id="email" name="email" class="form-control" placeholder="Correo electrónico">
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-md-4 control-label">Número de Tarjeta <span class="text-danger">*</span></label>
		                <div class="col-md-5">
		                    <div class="input-group">
		                        <input type="text" id="numeroTarjeta" name="numeroTarjeta" class="form-control" placeholder="0000 0000 0000 0000">
		                        <span class="input-group-addon"><i class="gi gi-credit_card"></i></span>
		                    </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-md-4 control-label">Fecha de Expiración <span class="text-danger">*</span></label>
		                <div class="col-md-5">
		                    <div class="input-group">
		                        <input type="text" id="fechaExpiracion" name="fechaExpiracion" class="form-control" placeholder="yyyy-mm">
		                        <span class="input-group-addon"><i class="gi gi-calendar"></i></span>
		                    </div>
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-md-4 control-label">CVC/CVV <span class="text-danger">*</span></label>
		                <div class="col-md-5">
		                    <div class="input-group">
		                        <input type="text" id="cvcCvv" name="cvcCvv" class="form-control" placeholder="CVC/CVV">
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="form-group form-actions">
		            <div class="col-md-8 col-md-offset-4">
		                <button type="reset" class="btn btn-sm btn-warning" id="back4">Anterior</button>
		                <button type="submit" class="btn btn-sm btn-primary" id="next4">Siguiente</button>
		            </div>
		        </div>
		    </form>
	    </div>
	    <div class="col-md-4">
	    	<h2>Beneficios</h2>
	    	<p><?php foreach ($tipoSuscripcion["beneficios"] as $indice => $beneficio) { ?>
	    		<i class="gi gi-check"></i> <?php print($beneficio) ?><br>
	    	<?php } ?></p>
	    </div>
	</div>	
</div>
<script type="text/javascript">
$(document).ready(function () {

	$("#fechaExpiracion").mask("9999-99");
	var wizardPlanAnual=$("#wizardPlanAnual");
	wizardPlanAnual.formwizard({
		disableUIStyles: true,
        validationEnabled: true,
		validationOptions: {
        errorClass: 'help-block animation-slideDown',
        errorElement: 'span',
        errorPlacement: function(error, e) {
            e.parents('.form-group > div').append(error);
        },
        highlight: function(e) {
            $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
            $(e).closest('.help-block').remove();
        },
        success: function(e) {
            e.closest('.form-group').removeClass('has-success has-error');
            e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
            e.closest('.help-block').remove();
        },
        rules: {
            'medioPago[]': {
                required: true
            },
            nombres: {
                required: true,
                minlength: 10
            },
            email: {
                required: true,
                email: true
            },
            numeroTarjeta: {
                required: true,
                creditcard: true
            },
            fechaExpiracion: {
                required: true,
                minlength: 7
            },
            cvcCvv: {
                required: true,
                minlength: 4,
                maxlength: 4
            }
        },
        messages: {
            'medioPago[]': {
                required: "Elija un medio de pago."
            },
            nombres: {
                required: "Ingrese nombres.",
                minlength: "Ingrese nombres validos."
            },
            email: "Ingrese un email valido.",
            numeroTarjeta: "Ingrese un Numero de Tarjeta valido, por ejem: 446-667-651",
            fechaExpiracion: {
                required: "Ingrese fechaExpiracion.",
                minlength: "Ingrese fechaExpiracion valida."
            },
            cvcCvv: {
                required: "Ingrese cvc-cvv.",
                minlength: "Ingrese cvc-cvv valido.",
                maxlength: "Ingrese cvc-cvv valido."
            },
        }
    },
    inDuration: 0,
    outDuration: 0
    });
	$('.clickable-steps a').on('click', function(){
	    var gotostep = $(this).data('gotostep');
	    wizardPlanAnual.formwizard('show', gotostep);
	});

});
</script>