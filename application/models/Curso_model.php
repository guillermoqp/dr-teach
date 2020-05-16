<?php Class Curso_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model("grupoTema_model");
        $this->load->model("suscripcion_model");
        desactivar_errores();
    }
    public function obtener_cursos() {
        $sql="CALL obtener_cursos();";
        $query=$this->db->query($sql,array()); 
        $cursos=$query->result_array();
        $query->next_result(); 
        $query->free_result();
        return $cursos;
    }
    public function obtener_cursos_por_categoria($id_categoria) {
        $sql="CALL obtener_cursos_por_categoria(?);";
        $query=$this->db->query($sql,array($id_categoria)); 
        $cursos=$query->result_array();
        $query->next_result(); 
        $query->free_result();
        return $cursos;
    }
    public function obtener_ultimos_cursos() {
        $sql="CALL obtener_ultimos_cursos();";
        $query=$this->db->query($sql,array()); 
        $cursos=$query->result_array();
        $query->next_result(); 
        $query->free_result();
        return $cursos;
    }
    public function obtener_curso_uri($codigo_uri) {
        $sql="CALL obtener_curso_uri(?);";
        $query=$this->db->query($sql,array($codigo_uri)); 
        $curso=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        $curso["grupos_temas"]=$this->grupoTema_model->obtener_grupos_tema_por_curso($curso["id_curso"]);
        return $curso;
    }
    public function obtener_curso($id_curso) {
        $sql="CALL obtener_curso(?);";
        $query=$this->db->query($sql,array($id_curso)); 
        $curso=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $curso;
    }
    public function obtener_cursos_por_suscripcion($id_suscripcion) {
        $cursos=array();
        $suscripcion=$this->suscripcion_model->obtener_suscripcion($id_suscripcion);
        if ($suscripcion["tipo_suscripcion"]=="A"||$suscripcion["tipo_suscripcion"]=="M") {
            $fechaFinSuscripcion=new DateTime($suscripcion["fecha_fin"]);
            $fechaActual=new DateTime("now");
            if($fechaActual<=$fechaFinSuscripcion){
                $cursos=$this->obtener_cursos();
            }
        }
        $cursosArray=explode(",",$suscripcion["cursos"]);
        if ($suscripcion["tipo_suscripcion"]=="D"&&$suscripcion["cursos"]!=""&&sizeof($cursosArray)>0) {
           for ($i=0;$i<sizeof($cursosArray);$i++) { 
                array_push($cursos,$this->obtener_curso($cursosArray[$i]));
           }
        }
        return $cursos;
    }
}