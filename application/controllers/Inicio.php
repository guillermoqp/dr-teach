<?php Class Inicio extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("usuario_model");
        $this->load->library("session");
        $this->load->library("form_validation");
        $this->load->library("recaptcha");
        $this->load->helper("session");
        $this->load->helper("utilitarios");
        $this->load->helper("guidv4");
        $this->load->helper("captcha");
    }
    public function index() {
        verificar_sesion($this->session->userdata());
        $this->data["menuPanel"] = "Panel";
        $this->data["view"] = "inicio/panel";
        $this->load->view("template/template", $this->data);
    }
    public function configurarCaptcha() {
        $configuracionCaptcha = $this->config->item("configuracion");
        $configuracionCaptcha["img_url"] = base_url() . "static/captcha_images/";
        $configuracionCaptcha["font_path"] = base_url("system/fonts/texb.ttf");
        $captcha = create_captcha($configuracionCaptcha);
        $this->session->unset_userdata("codigoCaptcha");
        $this->session->set_userdata("codigoCaptcha", $captcha["word"]);
        return $captcha;
    }
    public function actualizarCaptcha() {
        $dataCaptcha = $this->configurarCaptcha();
        $this->session->unset_userdata("codigoCaptcha");
        $this->session->set_userdata("codigoCaptcha", $dataCaptcha["word"]);
        print($dataCaptcha["image"]);
    }
    public function login() {
        /* Login con Google RE-Captcha */
        /* Registrar Usuario con Captcha CI */
        $dataCaptcha = $this->configurarCaptcha();
        $data = array(
            "widget" => $this->recaptcha->getWidget(array("data-theme" => "light")),
            "scriptGoogleReCaptcha" => $this->recaptcha->getScriptTag(),
            "imagenCaptcha" => $dataCaptcha["image"]
        );
        $this->load->library("facebook",$this->config->item("fb_config"));
        $data["login_fb_url"]=$this->facebook->loginURL(site_url("inicio/facebookLogin"));
        $this->load->view("inicio/login",$data);
    }
    public function validarUsuario($email,$password,$recordarme,$ajax) {
        $usuario = $this->usuario_model->validar_usuario($email, $password);
        if (isset($usuario)&&$usuario["id_usuario"]!="") {
            $this->setearSesion($usuario,$recordarme);
            if ($ajax == true) {
                $json=array("resultado" => true, "mensaje" => "Exito en Login.");
            } else {
                $json=array("resultado" => false, "mensaje" => "No es por Ajax.Por favor inténtelo nuevamente o sírvase comunicarse con el administrador del Sistema.");
            }
        } else {
            $json = array("resultado" => false, "mensaje" => "Email, Usuario o Password Incorrectos  o el Usuario NO se encuentra Activo. Por favor inténtelo nuevamente o sírvase comunicarse con el administrador del Sistema.");
        }
        return $json;
    }
    public function facebookLogin() {
        $this->load->library("facebook",$this->config->item("fb_config"));
        $response=$this->facebook->getAccessToken();
        $code=$this->input->get("code");
        if($response["token"]) {
            $token = $response['token'];
            $this->facebook->setAccessToken($token);
        } else {
            log_message('error'," Error: ".$response['message']);
            $this->session->set_flashdata("error", "Ocurrió algun error, detalle :".$response['message']);
            redirect(base_url("login"));
        }
        if(!empty($token)) {
            desactivar_errores();
            $permisosData=$this->config->item('fb_config')['permisosData'];
            $response=$this->facebook->getUserInfo($permisosData);
            $user_info=$response["user_info"]->asArray();
            $this->session->set_userdata($user_info);
            $usuario=$this->usuario_model->validar_usuario_email($user_info["email"]);
            if ($user_info["email"]!=""&&strcasecmp($usuario["email"],$user_info["email"])==0) {
                $this->setearSesion($usuario,"");
                redirect(base_url("inicio"));
            }
        }
    }
    public function verificarAcceso() {
        desactivar_errores();
        $ajax = $this->input->get("ajax");
        $this->load->library("encryption");
        $email = $this->input->post("email");
        $password = sha1($this->input->post("password"));
        $recordarme = $this->input->post("recordarme");
        $recaptcha = $this->input->post("g-recaptcha-response");
        if (isset($recaptcha) && !empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response["success"]) && $response["success"] === true) {
                $json = $this->validarUsuario($email, $password, $recordarme, $ajax);
            } else {
                $json = array("resultado" => false, "mensaje" => "Re-Captcha Incorrecto, detalle:" . json_encode($response["error-codes"]));
            }
        } else {
            $json = array("resultado" => false, "mensaje" => "Re-Captcha Incorrecto o vacío.");
        }
        $this->setHeaders();
        print(json_encode($json));
    }
    public function reestablecerPassword() {
        desactivar_errores();
        $email=$this->input->post("recuperar_email");
        $usuario=$this->usuario_model->validar_usuario_email($email);
        if (isset($email) && $email != "" && strcasecmp($usuario["email"],$email)==0) {
            $fechaActual=new DateTime("NOW");
            $fechaGenCodigo=new DateTime($usuario["forgot_password_date"]);
            $dias=$fechaGenCodigo->diff($fechaActual)->format("%a");
            if (($usuario["forgot_password_code"]==""&&$usuario["forgot_password_date"]=="")||($dias>=1)) {
                //enviar correo de cambio de password.
                ini_set("max_execution_time",0);
                ini_set("memory_limit", "2048M");
                $this->load->library("emailnotificaciones_cls");
                $asunto = "Re-establecimiento de Contraseña en Dr-Teach.";
                $forgot_password_code = guidV4();
                $urlRestablecimiento = base_url("reestablecer_password/" . $forgot_password_code);
                $usuario["nombresApellidos"] = $usuario["nombres"] . " " . $usuario["apellidos"];
                $cuerpo = array(
                    "usuario" => $usuario,
                    "urlRestablecimiento" => $urlRestablecimiento,
                    "email" => $email,
                    "urlAcceso" => base_url(),
                    "emailAdmin" => $this->config->item("email"),
                );
                $emails=array($email);
                $envio_email=$this->emailnotificaciones_cls->enviar_mail_reestablecer_password($emails,$asunto,$cuerpo);
                if ($envio_email==TRUE) {
                    $exito=$this->usuario_model->generar_cambio_password($usuario["id_usuario"], $forgot_password_code);
                    $json=array("resultado"=>true, "mensaje" => "Éxito se envio un email para reestablecer Password a : " . $email);
                } else {
                    $json = array("resultado" => false, "mensaje" => "Ocurrio un error al re-establecer Password. Detalle: ".$envio_email.". Por favor inténtelo nuevamente o sírvase comunicarse con el administrador del Sistema.");
                }
            } else {
                $json = array("resultado" => false, "mensaje" => "Ya se ha enviado un mail de Re-Establecimiento de Password, el cual tiene un Código de Expiración de 1 dia.");
            }
        } else {
            $json = array("resultado" => false, "mensaje" => "El Email NO esta registrado en Dr-Teach o el Usuario NO se encuentra Activo. Por favor inténtelo nuevamente o sírvase comunicarse con el administrador del Sistema.");
        }
        $this->setHeaders();
        print(json_encode($json));
    }
    public function reestablecer_password($codigoReestablecimiento) {
        desactivar_errores();
        $usuario = $this->usuario_model->existe_codigo_reestablecimineto_password($codigoReestablecimiento);
        if (isset($codigoReestablecimiento) && $codigoReestablecimiento != "" && strcasecmp($codigoReestablecimiento, $usuario["forgot_password_code"]) === 0) {
            $usuario["nombresApellidos"] = $usuario["nombres"] . " " . $usuario["apellidos"];
            $this->data["usuario"] = $usuario;
        } else {
            $this->session->set_flashdata("error", "Codigo de Re-establecimiento de Password Incorrecto o ya ha Expirado (1 día de Generado).<br> Por favor, Genere otro, solicitando nuevamente el cambio de Password.");
        }
        $btnCambiarPassword = $this->input->post("cambiarPassword");
        if (isset($btnCambiarPassword) && $btnCambiarPassword != "") {
            $id_usuario = $this->input->post("id_usuario");
            $password = $this->input->post("password");
            $password_verificar = $this->input->post("password_verificar");
            if (isset($id_usuario) && strcasecmp($password, $password_verificar) === 0) {
                $passwordSha1 = sha1($password);
                $exito = $this->usuario_model->reestablecer_password($usuario["id_usuario"], $passwordSha1);
                $this->session->set_flashdata("success", "Exito, se actualizó el password. Vuelva a Iniciar Sesion.");
                redirect(base_url("login"));
            } else {
                $this->session->set_flashdata("error", "Error, Verifique los parámetros ingresados.");
            }
        }
        $this->data["view"] = "inicio/reestablecer_password";
        $this->load->view("template/template", $this->data);
    }
    public function registrarUsuario() {
        desactivar_errores();
        $ajax = $this->input->get("ajax");
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $email = $this->input->post("email_registro");
        $password = $this->input->post("password_registro");
        $password = sha1($password);
        $captchaStr = $this->input->post("captcha");
        $captchaSesion = $this->session->userdata("codigoCaptcha");
        if (strcasecmp($captchaStr, $captchaSesion) == 0) {
            if (isset($nombres) && isset($email)) {
                if ($ajax == true) {
                    $usuario = $this->usuario_model->validar_usuario_email($email);
                    if (isset($usuario) && $usuario["email"] != "" && strcasecmp($usuario["email"], $email) === 0) {
                        $usuario["nombresCompletos"] = $usuario["nombres"] . " " . $usuario["apellidos"];
                        $json = array("resultado" => false, "mensaje" => "El Usuario: " . $usuario["nombresCompletos"] . ", con el Email: " . $usuario["email"] . ", ya se encuentra registrado.");
                    } else {
                        $registro = $this->usuario_model->registrar_usuario($email, $password, $email, $nombres, $apellidos);
                        $nombresCompletos = $nombres . " " . $apellidos;
                        if ($registro)
                            $json = array("resultado" => true, "mensaje" => "Se registro al Usuario: " . $nombresCompletos . ", con el Email: " . $email);
                        else
                            $json = array("resultado" => false, "mensaje" => "Ourrió algun error al Registrar al Usuario. Por favor inténtelo nuevamente o sírvase comunicarse con el administrador del Sistema.");
                    }
                } else {
                    $json = array("resultado" => false, "mensaje" => "No es por Ajax. Por favor inténtelo nuevamente o sírvase comunicarse con el administrador del Sistema.");
                }
            } else {
                $json = array("resultado" => false, "mensaje" => "Nombres y Email no ingresados.");
            }
        } else {
            $json = array("resultado" => false, "mensaje" => "Captcha Incorrecto, Captcha correcto : " . $captchaSesion);
        }
        $this->setHeaders();
        print(json_encode($json));
    }
    /* Sesion Expirada */
    public function actualizarSesion() {
        $lastVisitTime = strtotime($this->session->userdata("last_visited"));
        $fin = strtotime("+2 minutes", $lastVisitTime);
        $ahora = strtotime(date("Y-m-d H:i:s"));
        $diff = ($lastVisitTime + $fin) - $ahora;
        $segundos = intval(date("s", $diff));
        $jsonResponse = array(
            "segundos" => $segundos,
            "mensaje" => "Te quedan " . $segundos . " segundos , de sesion."
        );
        print(json_encode($jsonResponse));
    }
    public function bloquear_pantalla() {
        verificar_sesion($this->session->userdata());
        if ($this->input->server("REQUEST_METHOD") == "POST" && isset($_POST["desbloquear_pantalla"])) {
            $password = $this->input->post("password");
            if (strcasecmp("123456", $password) == 0) {
                $this->session->set_flashdata("success", "Usuario Desbloqueado.");
                redirect(base_url());
            } else {
                $this->session->set_flashdata("error", "Password incorrecto.");
            }
        }
        $this->load->view("inicio/bloquear_pantalla");
    }
    public function salir() {
        $this->session->sess_destroy();
        //session_destroy();
        redirect(base_url("login"));
    }
    /* METODOS AUXILIARES  */
    public function setearSesion($usuario,$recordarme) {
        $datosUsuario = array(
            "usuario"=>$usuario,
            "nombresApellidos"=>$usuario["nombres"]." ".$usuario["apellidos"],
            /* Datos Navegacion Cursos */
            "navCurso"=>"0",
            "navGrupoTema"=>"0",
            "navTema"=>"0",
            /* campos no BD */
            "logueado"=>TRUE,
            "last_visited"=>date("Y-m-d H:i:s")
        );
        if (isset($recordarme)&&$recordarme!="") {
            $this->session->sess_expiration = 108000;
        }
        $this->session->set_userdata($datosUsuario);
    }
    public function setHeaders() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/x-json; charset=utf-8;");
    }
    public function error404() {
        /* AAAAAAAAAAAA  */
        $this->load->view("inicio/error404");
    }
}