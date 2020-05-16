<?php Class Perfil extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model("usuario_model");
        $this->load->library("session");
        $this->load->library("form_validation");
        $this->load->helper("session");
        $this->load->helper("utilitarios");
        verificar_sesion($this->session->userdata());
    }
	public function index() {
        if ($this->input->server("REQUEST_METHOD")=="POST"&&isset($_POST["btnGuardarIntereses"])) {
            $intereses=$this->input->post("intereses");
            var_dump($intereses);
        }
        $this->data["menuPerfil"]="Perfil";
        $interesesUsuario=explode(",",$this->session->userdata("usuario")["intereses"]);
        $this->data["interesesUsuario"]=$interesesUsuario;
        $this->data["view"]="perfil/perfil";
        $this->load->view("template/template",$this->data);
	}
    public function intereses() {
        if ($this->input->server("REQUEST_METHOD")=="POST"&&isset($_POST["btnGuardarIntereses"])) {
            $post=substr(implode(",",$this->input->post("intereses")),0);
            var_dump($post);
        }
        $this->data["menuPerfil"]="Perfil";
        $interesesUsuario=explode(",",$this->session->userdata("usuario")["intereses"]);
        $this->data["interesesUsuario"]=$interesesUsuario;
        $this->data["view"]="perfil/intereses";
        $this->load->view("template/template",$this->data);
    }
}