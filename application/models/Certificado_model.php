<?php Class Certificado_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model("curso_model");
    }
    public function obtener_certificado($id_certificado) {
        $sql="CALL obtener_certificado(?);";
        $query=$this->db->query($sql,array($id_certificado)); 
        $certificado=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $certificado;
    }
    public function obtener_certificado_usuario_curso($id_usuario,$id_curso) {
        $sql="CALL obtener_certificado_usuario_curso(?,?);";
        $query=$this->db->query($sql,array($id_usuario,$id_curso)); 
        $certificado=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $certificado;
    }
    public function generar_certificado_usuario_curso_examen($codigo,$nombres_apellidos,$descripcion,$curso,$resultado,$id_usuario,$id_curso,$id_examen) {
        $exito = FALSE;
        $this->db->trans_start();
        $sql="CALL generar_certificado_usuario_curso_examen(?,?,?,?,?,?,?,?);" ;
        $success=$this->db->query($sql,array($codigo,$nombres_apellidos,$descripcion,$curso,$resultado,$id_usuario,$id_curso,$id_examen)); 
        $success->next_result();
        $success->free_result();
        if($success){
            $this->db->trans_complete();
            $exito = TRUE;
        }
        return $exito;
    }
}