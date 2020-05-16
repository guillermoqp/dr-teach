<?php Class Tema_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->helper("utilitarios");
        //desactivar_errores();
    }
    public function obtener_temas($id_grupo_tema) {
        $sql="CALL obtener_temas(?);" ;
        $query=$this->db->query($sql,array($id_grupo_tema)); 
        $temas=$query->result_array();
        $query->next_result(); 
        $query->free_result();
        return $temas;
    }
    public function obtener_tema($id_tema) {
        $sql="CALL obtener_tema(?);" ;
        $query=$this->db->query($sql,array($id_tema)); 
        $tema=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $tema;
    }
    public function obtener_tema_parametros($idCurso,$idGrupoTema,$codigoTema) {
        $sql="CALL obtener_tema_parametros(?,?,?);" ;
        $query=$this->db->query($sql,array($idCurso,$idGrupoTema,$codigoTema)); 
        $tema=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $tema;
    }
}