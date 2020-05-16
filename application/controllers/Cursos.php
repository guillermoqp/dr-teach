<?php Class Cursos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper("session");
        $this->load->helper("utilitarios");
        $this->load->helper("url");
        $this->load->helper("guidV4");
        $this->load->model("curso_model");
        $this->load->model("grupoTema_model");
        $this->load->model("tema_model");
        $this->load->model("examen_model");
        $this->load->model("categoria_model");
        $this->load->model("certificado_model");
        $this->load->model("suscripcion_model");
        verificar_sesion($this->session->userdata());
    }
    public function index() {
        desactivar_errores();
        $this->session->set_userdata("navCurso","0");
        $this->session->set_userdata("navGrupoTema","0");
        $this->session->set_userdata("navTema","0");
        $cursos=$this->curso_model->obtener_cursos();
        if ($this->input->server("REQUEST_METHOD")=="GET"&&isset($_GET["categoria"])) {
            $id_categoria=$this->input->get("categoria");
            $cursos=$this->curso_model->obtener_cursos_por_categoria($id_categoria);
            if(sizeof($cursos)>0)
                $this->session->set_flashdata("success","Exito, se encontraron: ".sizeof($cursos)." cursos.");
            else
                $this->session->set_flashdata("error","Error, no se encontraron resultados.");
        }
        $this->data["cursos"]=$cursos;
        $this->data["categorias"]=$this->categoria_model->obtener_categorias();
        $this->data["view"]="cursos/cursos";
        $this->load->view("template/template",$this->data);
    }
    public function obtener_por_codigo_uri($codigo_uri) {
        desactivar_errores();
        $curso=$this->curso_model->obtener_curso_uri($codigo_uri);
        if (null!==$curso&&null!==$curso["id_curso"]&&$curso["id_curso"]!="") {
            $fk_suscripcion=$this->session->userdata("usuario")["fk_suscripcion"];
            $tipo=$this->session->userdata("usuario")["tipo"];
            if((null!==$fk_suscripcion&&$fk_suscripcion!="")) { // &&(null!==$tipo&&$tipo=!""&&$tipo!="B") NO SE VALIDA EL TIPO DE USUARIO POR CURSOS GRATIS
                $cursos=$this->curso_model->obtener_cursos_por_suscripcion($fk_suscripcion);
                $ids_cursos=array_column($cursos,"id_curso");
                if(in_array($curso["id_curso"],$ids_cursos,true)) {
                    $this->session->set_userdata("navCurso",$curso["id_curso"]);
                    $this->data["curso"]=$curso;
                    $this->data["view"]="cursos/curso_temas";
                    $this->load->view("template/template",$this->data);
                } else {
                    $this->session->set_flashdata("error","Error, no tiene acceso al curso: ".$curso["nombre"]);
                    redirect(base_url("cursos/"));
                }
            } else{
                $this->session->set_flashdata("error","Error, no tiene acceso al curso: ".$curso["nombre"].", aun es Usuario BASICO.");
                redirect(base_url("cursos/"));
            }
        }else{
            $this->session->set_flashdata("error","Error, El Curso con URI: ".$codigo_uri.", no se ha encontrado.");
            redirect(base_url("inicio/"));
        }
    }
    public function obtener_grupo_tema($codigoCurso,$codigoGrupo) {
        if(isset($codigoGrupo)&&$codigoGrupo=="examen") {
            $this->ejecutar_examen($codigoCurso);
            return false;
        }
        if(isset($codigoGrupo)&&$codigoGrupo=="certificado") {
            $this->generar_certificado($codigoCurso);
            return false;
        }
        if(isset($codigoGrupo)&&$codigoGrupo=="validar_examen") {
            if ($this->input->server("REQUEST_METHOD")=="POST"&&isset($_POST["aceptarFinExamen"])) {
                $quizScore=$this->input->post("quizScore");
                $id_curso=$this->input->post("id_curso");
                $id_examen=$this->input->post("id_examen");
                $this->validar_examen($id_curso,$id_examen,$quizScore);
                return false;
            }
        }
        else{
            desactivar_errores();
            $grupo_tema=$this->grupoTema_model->obtener_grupos_tema_curso_grupo($this->session->userdata("navCurso"),$codigoGrupo);
            if(null!==$grupo_tema&&sizeof($grupo_tema)>0&&sizeof($grupo_tema["temas"])>0) {
                $this->session->set_userdata("navGrupoTema",$grupo_tema["id_grupo_tema"]);
                $this->data["grupo_tema"]=$grupo_tema;
                $this->data["view"]="cursos/grupo_tema";
                $this->load->view("template/template",$this->data);
            } else{
                $this->session->set_flashdata("error","Error, no ha accedido con navegacion correcta.");
                redirect(base_url("cursos/"));
            }
        }
    }
    public function obtener_tema($codigoCurso,$codigoGrupo,$codigoTema) {
        desactivar_errores();
        $tema=$this->tema_model->obtener_tema_parametros($this->session->userdata("navCurso"),$this->session->userdata("navGrupoTema"),$codigoTema);
        if (null!==$tema&&sizeof($tema)>0) {
            $this->session->set_userdata("navTema",$tema["id_tema"]);
            $tema["recursos"]=explode("$",$tema["recursos"]);
            $this->data["tema"]=$tema;
            $this->data["view"]="cursos/tema";
            $this->load->view("template/template",$this->data);
        } else {
            $this->session->set_flashdata("error","Error, no ha accedido con navegacion correcta.");
            redirect(base_url("cursos/"));
        }
    }
    public function ejecutar_examen($codigo_uri) {
        desactivar_errores();
        $curso=$this->curso_model->obtener_curso($this->session->userdata("navCurso"));
        $this->data["curso"]=$curso;
        $this->data["view"]="cursos/examen";
        $this->load->view("template/template",$this->data);
    }
    public function validar_examen($id_curso,$id_examen,$quizScore) {
        desactivar_errores();
        $curso=$this->curso_model->obtener_curso($id_curso);
        $examen=$this->examen_model->obtener_examen($id_examen);
        $resultado=substr($quizScore,-14,2);
        if(floatval($resultado)>=floatval($examen["quizScore"])) { // SI PASA EL MINIMO DE APROBACION POR EXAMEN (%)
            $certificado=$this->certificado_model->obtener_certificado_usuario_curso($this->session->userdata("usuario")["id_usuario"],$id_curso);
            if (null!=$certificado&&null!=$certificado["id_certificado"]&&$certificado["id_certificado"]!="") {
                //SI YA TIENE UN CERTIFICADO GENERADO, NO SE PUEDE GENERAR OTRO
                $this->session->set_flashdata("error","Error, ya se ha generado un certificado para el curso: ".$curso["nombre"]);
            } else{
                // SE GENERA UN NUEVO CERTIFICADO EN BD
                $exito=$this->certificado_model->generar_certificado_usuario_curso_examen(guidV4(),$this->session->userdata("nombresApellidos"),$quizScore,$curso["nombre"],$resultado,$this->session->userdata("usuario")["id_usuario"],$id_curso,$id_examen);
                if($exito)
                    $this->session->set_flashdata("success","Exito! se ha generado un Certificado para el curso: ".$curso["nombre"]);
                else
                    $this->session->set_flashdata("error","Error, ocurrió un error al generar el certificado para el curso: ".$curso["nombre"].", con Examen: ".$examen["nombre"]);
            }
        } else {
            $this->session->set_flashdata("error","Error, no ha pasado el mínimo de APROBACIÓN del Exámen: ".$examen["nombre"].", que es de : ".$examen["quizScore"]." %.");
        }
        redirect(base_url("cursos/".$curso["codigo_uri"]));
    }
    public function generar_certificado($codigoCurso) {
        desactivar_errores();
        $curso=$this->curso_model->obtener_curso_uri($codigoCurso);
        if (null!==$curso&&null!==$curso["id_curso"]&&$curso["id_curso"]!="") {
            $this->load->library("pdf");
            setlocale(LC_TIME,"es_ES");
            date_default_timezone_set("America/Lima");
            $certificado=$this->certificado_model->obtener_certificado_usuario_curso($this->session->userdata("usuario")["id_usuario"],$curso["id_curso"]);
            if (null!=$certificado&&null!=$certificado["id_certificado"]&&$certificado["id_certificado"]!="") {
                $fecha=strftime(" %A, %e de %B de %Y .",string_to_timestamp("Y-m-d H:i:s",$certificado["fecha_creacion"]));
                /*string_to_timestamp("Y-m-d H:i:s",$certificado["fecha_creacion"]) time()*/
                //var_dump(stringDate_to_strftime($certificado["fecha_creacion"]));
                //var_dump(strftime("%V,%G,%Y",strtotime("12/23/2004")) );
                $preFirma=$this->config->item("datosConfiguracion")["prefirmaUbicacionCertificados"].$fecha;
                $datosCertificado=array(
                    "nombres_apellidos"=>$certificado["nombres_apellidos"],
                    "curso"=>$certificado["curso"],
                    "resultado"=>$certificado["resultado"],
                    "codigo"=>$certificado["codigo"],
                    "preFirma"=>$preFirma,
                    "firma"=>$this->config->item("datosConfiguracion")["firmaCertificados"]
                );
                //VISTAS : template/certificado/curso_completado , curso_completado_basic
                //$this->pdf->load_view("template/certificado/curso_completado",$datosCertificado,"Certificado_".$nombreCurso);
                var_dump($datosCertificado);
            } else {
                $this->session->set_flashdata("error","Error, aun no ha generado un Certificado.");
                redirect(base_url("cursos/".$codigoCurso));
            }
        }else{
            $this->session->set_flashdata("error","Error, El Curso con URI: ".$codigo_uri.", no se ha encontrado.");
            redirect(base_url("cursos/"));
        }
    }
    /*  */
    public function mis_cursos() {
        desactivar_errores();
        $cursos=array();
        $fk_suscripcion=$this->session->userdata("usuario")["fk_suscripcion"];
        $tipo=$this->session->userdata("usuario")["tipo"];
        /*  TIENE UNA SUSCRIPCION Y ES DIFERENTE DE USUARIO BASICO  */
        if(null!==$fk_suscripcion&&$fk_suscripcion!="") {
           $cursos=$this->curso_model->obtener_cursos_por_suscripcion($fk_suscripcion);
           $nombresCursos=implode(" ,",array_column($cursos,"nombre"));
           $suscripcion=$this->suscripcion_model->obtener_suscripcion($fk_suscripcion);
           $suscripcion["tipo_suscripcion"]=obtener_tipo_suscripcion($suscripcion["tipo_suscripcion"]);
           $this->data["suscripcion"]=$suscripcion;
           $this->data["cursos"]=$cursos;
           $this->data["nombresCursos"]=$nombresCursos;
        }
        if (sizeof($cursos)<=0) {
            $this->session->set_flashdata("error","Error, no tiene una SUSCRIPCION activa.");
        }
        $this->data["view"]="cursos/mis_cursos";
        $this->load->view("template/template",$this->data);
    }
}