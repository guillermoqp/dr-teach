var Login = function() {
    var switchView = function(viewHide, viewShow, viewHash){
        viewHide.slideUp(250);
        viewShow.slideDown(250, function(){
            $('input').placeholder();
        });
        if ( viewHash ) {
            window.location = '#' + viewHash;
        } else {
            window.location = '#';
        }
    };
    return {
        init: function() {
            var formLogin       = $("#form-login"),
                formReminder    = $("#form-reminder"),
                formRegister    = $("#form-register");
            $('#link-register-login').click(function(){
                switchView(formLogin, formRegister, 'register');
            });
            $('#link-register').click(function(){
                switchView(formRegister, formLogin, '');
            });
            $('#link-reminder-login').click(function(){
                switchView(formLogin, formReminder, 'reminder');
            });
            $('#link-reminder').click(function(){
                switchView(formReminder, formLogin, '');
            });
            if (window.location.hash === '#register') {
                formLogin.hide();
                formRegister.show();
            }
            if (window.location.hash === '#reminder') {
                formLogin.hide();
                formReminder.show();
            }

            $("#form-login").validate({
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
                    e.closest('.form-group').removeClass('has-success has-error');
                    e.closest('.help-block').remove();
                },
                submitHandler: function(form) {
                    var datos=$(form).serialize();
                    console.log(" login: datos :"+JSON.stringify(datos));
                    verificarAcceso(form);
                },
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    }, 
                    hiddenRecaptcha: {
                        required: function () {
                            if (grecaptcha.getResponse()=='') {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                },
                messages: {
                    email: "Ingrese un email correcto",
                    password: {
                        required: "Ingrese un password",
                        minlength: "Tu password debe contener minimo 5 caracteres"
                    },
                    hiddenRecaptcha : {
                        required: "Compruebe que no es un Robot."
                    }
                }
            });
            $("#form-reminder").validate({
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
                    e.closest('.form-group').removeClass('has-success has-error');
                    e.closest('.help-block').remove();
                },
                submitHandler: function(form) {
                    var datos=$(form).serialize();
                    console.log(" re-establecer : datos :"+JSON.stringify(datos));
                    reestablecerPassword(form);
                },
                rules: {
                    recuperar_email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    recuperar_email: "Ingrese un email correcto"
                }
            });
            $("#form-register").validate({
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
                    var datos=$(form).serialize();
                    console.log(" registrar: datos :"+JSON.stringify(datos));
                    registrarUsuario(form);
                },
                rules: {
                    nombres: {
                        required: true,
                        minlength: 2
                    },
                    apellidos: {
                        required: true,
                        minlength: 2
                    },
                    email_registro: {
                        required: true,
                        email: true
                    },
                    password_registro: {
                        required: true,
                        minlength: 5
                    },
                    password_registro_verificar: {
                        required: true,
                        equalTo: "#password_registro"
                    },
                    acepto_terminos: {
                        required: true
                    },
                    captcha: {
                        required: true
                    }
                },
                messages: {
                    nombres: {
                        required: "Ingrese Nombres correctos",
                        minlength: "Ingrese Nombres correctos"
                    },
                    apellidos: {
                        required: "Ingrese Apellidos correctos",
                        minlength: "Ingrese Apellidos correctos"
                    },
                    email_registro: "Ingrese un email valido",
                    password_registro: {
                        required: "Ingrese un password correcto",
                        minlength: "Tu password debe contener como minimo 5 caracteres"
                    },
                    password_registro_verificar: {
                        required: "Ingrese un password correcto",
                        minlength: "Tu password debe contener como minimo 5 caracteres",
                        equalTo: "Tu password no concuerda con el anterior"
                    },
                    acepto_terminos: {
                        required: "Acepte los Terminos y Condiciones"
                    },
                    captcha: {
                        required: "Ingrese Codigo Captcha!"
                    }
                }
            });
        }
    };
}();