var url_base=(localStorage)?localStorage.getItem("url_base_dr-teach"):sessionStorage.getItem("url_base_dr-teach");
var url_inicio=url_base+"inicio/";
var url_verificarAcceso=url_base+"verificarAcceso?ajax=true";
var url_reestablecerPassword=url_base+"reestablecerPassword";
var url_registrarUsuario=url_base+"registrarUsuario?ajax=true";
function limpiarInputs() {
    $("#nombres").val("");
    $("#apellidos").val("");
    $("#email_registro").val("");
    $("#password_registro").val("");
    $("#password_registro_verificar").val("");
    $("#acepto_terminos").val("");
    $("#captcha").val("");
};
function verificarAcceso(form) {
    $.ajax({
        url: url_verificarAcceso,
        type: "POST",
        crossDomain : true,
        responseType: "json",
        data: $(form).serialize(),
        beforeSend: function() {
            $("body").addClass("page-loading");   
        },
        success: function (response)
        {
            $("body").removeClass("page-loading");
            if (response.resultado==true) {
                $(location).attr("href",url_inicio);
            } else {
                $.bootstrapGrowl("<h4>Datos Incorrectos</h4><p>"+response.mensaje+"</p>", {
                    type: "danger",
                    delay: 2500,
                    allow_dismiss: true
                });
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $("body").removeClass("page-loading");
            var mensaje = "";
            if (typeof xhr.responseJSON === "undefined") {
                console.log("thrownError : " + thrownError + xhr);
                mensaje = "Error, Login no Disponible.";
            }else{
                var mensaje = xhr.responseJSON.message;
            }
            $.bootstrapGrowl("<h4>Error</h4><p>"+mensaje+"</p>", {
                type: "danger",
                delay: 2500,
                allow_dismiss: true
            });
        }
    });
}
function reestablecerPassword(form) {
    $.ajax({
        url: url_reestablecerPassword,
        type: "POST",
        crossDomain : true,
        responseType: "json",
        data: $(form).serialize(),
        beforeSend: function() {
            $("body").addClass("page-loading");
        },
        success: function (response)
        {
            $("body").removeClass("page-loading");
            if (response.resultado==true) {
                $.bootstrapGrowl("<h4>Exito al Reestablecer Password</h4><p>"+response.mensaje+"</p>", {
                    type: "success",
                    delay: 2500,
                    allow_dismiss: true
                });
            } else {
                $.bootstrapGrowl("<h4>Error al Reestablecer Password</h4><p>"+response.mensaje+"</p>", {
                    type: "danger",
                    delay: 2500,
                    allow_dismiss: true
                });
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $("body").removeClass("page-loading");
            var mensaje = "";
            if (typeof xhr.responseJSON === "undefined") {
                console.log("thrownError : " + thrownError + xhr);
                mensaje = "Error, Reestablecer Password no Disponible.";
            }else{
                var mensaje = xhr.responseJSON.message;
            }
            $.bootstrapGrowl("<h4>Error</h4><p>"+mensaje+"</p>", {
                type: "danger",
                delay: 2500,
                allow_dismiss: true
            });
        }
    });
}
function registrarUsuario(form) {
    $.ajax({
        url: url_registrarUsuario,
        type: "POST",
        crossDomain : true,
        responseType: "json",
        data: $(form).serialize(),
        beforeSend: function() {
            $("body").addClass("page-loading");
        },
        success: function (response)
        {
            $("body").removeClass("page-loading");
            if (response.resultado==true) {
                $.bootstrapGrowl("<h4>Exito al Registrar Usuario</h4><p>"+response.mensaje+"</p>", {
                    type: "success",
                    allow_dismiss: false
                });
                limpiarInputs();
            } else {
                $.bootstrapGrowl("<h4>Error al Registrar Usuario</h4><p>"+response.mensaje+"</p>", {
                    type: "danger",
                    allow_dismiss: false
                });
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $("body").removeClass("page-loading");
            var mensaje = "";
            if (typeof xhr.responseJSON === "undefined") {
                console.log("thrownError : " + thrownError + xhr);
                mensaje = "Error, Reestablecer Password no Disponible.";
            }else{
                var mensaje = xhr.responseJSON.message;
            }
            $.bootstrapGrowl("<h4>Error</h4><p>"+mensaje+"</p>", {
                type: "danger",
                delay: 2500,
                allow_dismiss: true
            });
        }
    });
}