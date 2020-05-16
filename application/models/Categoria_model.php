<?php Class Categoria_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function obtener_categorias() {
        $sql="CALL obtener_categorias();" ;
        $query=$this->db->query($sql,array()); 
        $categorias=$query->result_array();
        $query->next_result(); 
        $query->free_result();
        return $categorias;
    }
    public function obtener_categoria($id_categoria) {
        $sql="CALL obtener_categoria(?);" ;
        $query=$this->db->query($sql,array($id_categoria)); 
        $categoria=$query->result_array();
        $query->next_result(); 
        $query->free_result();
        return $categoria;
    }
}