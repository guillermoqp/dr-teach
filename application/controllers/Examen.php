<?php Class Examen extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper("utilitarios");
        $this->load->helper("guidV4");
        $this->load->helper("session");
        $this->load->model("examen_model");
        verificar_sesion($this->session->userdata());
    }
    public function obtener_examen_por_curso($id_curso) {
        desactivar_errores();
        $examen=array();
        if (null!=$id_curso&&$id_curso!="") {
            $examen=$this->examen_model->obtener_examen_por_curso($id_curso);
        }
        $this->setHeaders();
        print(json_encode($examen));
    }
    /* METODOS AUXILIARES  */
    public function setHeaders() { 
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/x-json; charset=utf-8;");
    }
}