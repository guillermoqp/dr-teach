<?php Class Principal extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper("utilitarios");
        $this->load->helper("guidV4");
        $this->load->helper("session");
        $this->load->model("curso_model");
    }
	public function index() {
        verificar_sesion_activa($this->session->userdata());
        desactivar_errores();
        $this->data["inicio"]=TRUE;
        $cursos=$this->curso_model->obtener_cursos();
        $this->data["cursos"]=$cursos;
        $ultimosCursos=$this->curso_model->obtener_ultimos_cursos();
        $this->data["ultimosCursos"]=$ultimosCursos;
        $this->data["view"]="principal/inicio";
        $this->load->view("principal/template",$this->data);
	}
    public function ver_detalle_curso($codigo_uri) {
        desactivar_errores();
        $this->data["inicio"]=FALSE;
        $this->data["curso"]=$this->curso_model->obtener_curso_uri($codigo_uri);
        $this->data["view"]="principal/detalle_curso";
        $this->load->view("principal/template",$this->data);
    }
    public function enviar_email_contactos() {
        $ajax=$this->input->get("ajax");
        $nombres=$this->input->post("nombres");
        $asunto=$this->input->post("asunto");
        $email=$this->input->post("email");
        $mensaje=$this->input->post("mensaje");
        if(isset($ajax)&&$ajax!=""&&$ajax==true) {
            $correcto=$this->validarCampos($nombres,$asunto,$email,$mensaje);
            if($correcto) { 
                $fechaActual=new DateTime("NOW");
                $fechaActual=$fechaActual->format("Y-m-d H:i:s");
                ini_set("max_execution_time",0);
                ini_set("memory_limit","2048M");
                $this->load->library("emailnotificaciones_cls");
                $asuntoEmail="Email de Contactos | Dr-Teach.";
                $cuerpo = array(
                    "fecha"=>$fechaActual,
                    "nombres"=>$nombres,
                    "asunto"=>$asunto,
                    "email"=>$email,
                    "mensaje"=>$mensaje,
                );
                $datosConfiguracion=$this->config->item("datosConfiguracion");
                array_push($datosConfiguracion["emailsCopias"],$email);
                $envio_email=$this->emailnotificaciones_cls->enviar_mail_contactos($datosConfiguracion["emailsCopias"],$asuntoEmail,$cuerpo);
                if ($envio_email) {
                    $json=array("respuesta"=>true,"mensaje"=>"Éxito, se envio un mensaje al email : ".$email);
                }else{
                    $json=array("respuesta"=>false,"mensaje"=>"Error, Ocurrió un error al enviar el mensaje, detalle: ".$envio_email);
                }
            } else {
                $json=array("respuesta"=>false,"mensaje"=>"Error, faltan algunos campos.");
            }
        } else {
            $json=array("respuesta"=>false,"mensaje"=>"No es por ajax.");
        }
        $this->setHeaders();
        print(json_encode($json));
    }
    /* METODOS AUXILIARES  */
    public function setHeaders() { 
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/x-json; charset=utf-8;");
    }
    public function validarCampos($nombres,$asunto,$email,$mensaje) { 
        $correcto=FALSE;
        if((null!==$nombres&&$nombres!="")&&(null!==$asunto&&$asunto!="")&&(null!==$email&&$email!="")&&(null!==$mensaje&&$mensaje!=""&&strlen($mensaje)>10))
            $correcto=TRUE;
        return $correcto;
    }
}