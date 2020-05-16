<?php Class Suscripcion extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model("usuario_model");
        $this->load->model("curso_model");
        $this->load->model("suscripcion_model");
        $this->load->library("session");
        $this->load->library("form_validation");
        $this->load->helper("session");
        $this->load->helper("utilitarios");
        $this->load->helper("guidV4");
        verificar_sesion($this->session->userdata());
    }
	public function index() {
        $this->data["view"]="suscripcion/precios";
        $this->load->view("template/template",$this->data);
	}
    public function anual_mensual($tipo_suscripcion) {
        if (isset($tipo_suscripcion)&&($tipo_suscripcion=="anual"||$tipo_suscripcion=="mensual")) {
            if($tipo_suscripcion=="anual") {
                $tipoSuscripcion=$this->config->item("precioSuscripcionAnual");
            } else {
                $tipoSuscripcion=$this->config->item("precioSuscripcionMensual");
            }
            $this->data["tipoSuscripcion"]=$tipoSuscripcion;
        }else{
            $this->session->set_flashdata("error","No se envió el tipo de suscripcion correcto.");
            redirect(base_url("inicio/"));
        }
        if ($this->input->server("REQUEST_METHOD")=="POST"&&isset($_POST["nombres"])) {
            $nombres=$this->input->post("nombres");
            $email=$this->input->post("email");
            $this->session->set_flashdata("success","Se valido la Suscripcion con los datos: Nombres: ".$nombres.", Email: ".$email);
            redirect(base_url("cursos/"));
        }
        $this->data["view"]="suscripcion/anual_mensual";
        $this->load->view("template/template",$this->data);
    }
    public function unico($curso_codigo_uri) {
        $curso=$this->curso_model->obtener_curso_uri($curso_codigo_uri);
        if (null!==$curso&&null!==$curso["id_curso"]&&$curso["id_curso"]!="") {
            $curso=$this->curso_model->obtener_curso_uri($curso_codigo_uri);
            $curso["beneficios"]=$this->config->item("precioSuscripcionUnico")["beneficios"];
            $this->data["curso"]=$curso;
        }else{
            $this->session->set_flashdata("error","No se envió el Curso.");
            redirect(base_url("inicio/"));
        }
        if ($this->input->server("REQUEST_METHOD")=="POST"&&isset($_POST["nombres"])&&isset($_POST["email"])) {
            $id_curso=$this->input->post("id_curso");
            $nombres=$this->input->post("nombres");
            $email=$this->input->post("email");
            $fk_suscripcion=$this->session->userdata("usuario")["fk_suscripcion"];
            if(null!==$fk_suscripcion&&$fk_suscripcion!="") { // YA TIENE UNA SUSCRIPCION ACTIVA A ALGUN CURSO, O ANUAL, O MENSUAL
               $suscripcion=$this->suscripcion_model->obtener_suscripcion($fk_suscripcion);
               $ids_cursos=$suscripcion["cursos"].",".$id_curso;
               $exito=$this->suscripcion_model->actualizar_suscripcion_unico($suscripcion["id_suscripcion"],$ids_cursos);
               if($exito)
                    $this->session->set_flashdata("success","Se actualizó la Suscripción con codigo: ".$suscripcion["codigo_suscripcion"]);
                else
                    $this->session->set_flashdata("error","Ocurrió algún error al actualizar la suscripcion.");
            }else{ // NO TIENE NINGUNA SUSCRIPCION ACTIVA A ALGUN CURSO
                $codigo_suscripcion=guidV4();
                $id_usuario=$this->session->userdata("usuario")["id_usuario"];
                $tipo_suscripcion="D";// A DEMANDA
                $ids_cursos=$id_curso;// 1 SOLO CURSO
                $exito=$this->suscripcion_model->generar_suscripcion_tipo($id_usuario,$codigo_suscripcion,$tipo_suscripcion,$ids_cursos);
                if($exito)
                    $this->session->set_flashdata("success","Se generó la Suscripción con codigo: ".$codigo_suscripcion);
                else
                    $this->session->set_flashdata("error","Ocurrió algún error al generar la suscripcion.");
            }
            redirect(base_url("cursos/"));
        }
        $this->data["view"]="suscripcion/unico";
        $this->load->view("template/template",$this->data);
    }
}
/*
/suscripcion/anual/
/suscripcion/mensual/
/suscripcion/unico/html5/
*/