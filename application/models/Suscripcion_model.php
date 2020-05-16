<?php Class Suscripcion_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->helper("utilitarios");
    }
    public function obtener_suscripcion($id_suscripcion) {
        $sql="CALL obtener_suscripcion(?);" ;
        $query=$this->db->query($sql,array($id_suscripcion)); 
        $suscripcion=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $suscripcion;
    }
    /* 
        $tipo_suscripcion='A' (Anual),$tipo_suscripcion='M' (Mensual),$tipo_suscripcion='D' (Demanda, agregando cursos electivos)  
        $ids_cursos="1,2,3"
    */
    public function generar_suscripcion_tipo($id_usuario,$codigo_suscripcion,$tipo_suscripcion,$ids_cursos) {
        $exito = FALSE;
        $this->db->trans_start();
        $sql="CALL generar_suscripcion_tipo(?,?,?,?);" ;
        $success=$this->db->query($sql,array($id_usuario,$codigo_suscripcion,$tipo_suscripcion,$ids_cursos));
        $success->next_result();
        $success->free_result();
        if($success){
            $this->db->trans_complete();
            $exito = TRUE;
        }
        return $exito;
    }
    public function actualizar_suscripcion_unico($id_suscripcion,$ids_cursos) {
        $exito = FALSE;
        $this->db->trans_start();
        $sql="CALL actualizar_suscripcion_unico(?,?);" ;
        $success=$this->db->query($sql,array($id_suscripcion,$ids_cursos));
        $success->next_result();
        $success->free_result();
        if($success){
            $this->db->trans_complete();
            $exito = TRUE;
        }
        return $exito;
    }
}