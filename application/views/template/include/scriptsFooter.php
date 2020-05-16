<div id="idle-timeout-dialog" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sesionTimeoutModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tu sesion Expirará Pronto</h4>
            </div>
            <div class="modal-body">
                <p><i class="fa fa-warning font-red"></i> Tu sesion sera bloqueada en <span id="idle-timeout-counter"></span> segundos.</p>
                <p>¿Deseas continuar en Sesion Activa?</p>
            </div>
            <div class="modal-footer text-center">
                <button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-success" data-dismiss="modal">Si, mantener en sesion</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php print(base_url("static/js/plugins.js")) ?>"></script>
<script src="<?php print(base_url("static/js/app.js")) ?>"></script>
<script src="<?php print(base_url("static/js/scripts/url_base.js")) ?>"></script>
<!-- Session-timeout-idle -->
<script src="<?php print(base_url("static/js/session-timeout/jquery.idletimeout.js")) ?>"></script>
<script src="<?php print(base_url("static/js/session-timeout/jquery.idletimer.js")) ?>"></script>
<!--  <script src="<?php print(base_url("static/js/session-timeout/session-timeout-config.js")) ?>"></script> -->
<script type="text/javascript">
function salir() {
    Swal.fire({
        title: "¿Seguro que desea Salir?",
        text: "Saldrá del Sistema Sin Guardar los cambios que haya realizado!",
        type: "warning",
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, deseo Salir",
        cancelButtonText: "Cancelar"
    }).then((result) => {
      if (result.value) {
        Swal.fire({
                title: "Ha salido del Sistema",
                text: "Ha Salido del Sistema.",
                type: "success",
                showConfirmButton: false});
        localStorage.clear();
        sessionStorage.clear();
        $(location). attr("href","<?php print(base_url("salir")) ?>");
      }
    });
}
$(document).ready(function () {
	var url_base = (localStorage) ? localStorage.getItem("url_base_dr-teach") : sessionStorage.getItem("url_base_dr-teach");
    $(document).keydown(function(e) {
	    if (e.keyCode == 27) return false;
	});
	<?php if ($this->session->flashdata("error")!=null&&strlen($this->session->flashdata("error"))>0) { ?>
    $.bootstrapGrowl("<h4>¡Error!</h4><p><?php print($this->session->flashdata("error")) ?></p>", {
        type: "danger",
        delay: 2500,
        allow_dismiss: true
    });
    <?php } ?>
    <?php if ($this->session->flashdata("success")!=null&&strlen($this->session->flashdata("success"))>0) { ?>
    $.bootstrapGrowl("<h4>¡Exito!</h4><p><?php print($this->session->flashdata("success")) ?></p>", {
        type: "success",
        delay: 2500,
        allow_dismiss: true
    });
    <?php } ?>
});
</script>