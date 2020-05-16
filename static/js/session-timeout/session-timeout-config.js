$(document).ready(function () {
	var url_base=(localStorage)?localStorage.getItem("url_base_dr-teach"):sessionStorage.getItem("url_base_dr-teach");
    var o;
    $("body").append(""), $.idleTimeout("#idle-timeout-dialog",".modal-content button:last", {
        idleAfter: 5,
        timeout: 3e4,
        pollingInterval: 5,
        keepAliveURL: url_base+"actualizarSesion",
        serverResponseEquals: "OK",
        titleMessage: "Aviso , te quedan %s segundos para bloqueo de Sesion |",
        onTimeout: function() {
        	$(location).attr("href",url_base+"bloquear");
        },
        onIdle: function() {
            $("#idle-timeout-dialog").modal("show"), o = $("#idle-timeout-counter"),$("#idle-timeout-dialog-keepalive").on("click", function() {
                $("#idle-timeout-dialog").modal("hide")
            })
        },
        onCountdown: function(e) {
            o.html(e)
        }
    });
});