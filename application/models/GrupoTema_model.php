<?php Class GrupoTema_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model("tema_model");
        $this->load->helper("utilitarios");
        //desactivar_errores();
    }
    public function obtener_grupos_tema_por_curso($id_curso) {
        $sql="CALL obtener_grupos_tema_por_curso(?);" ;
        $query=$this->db->query($sql,array($id_curso)); 
        $grupos_tema=$query->result_array();
        $query->next_result(); 
        $query->free_result();
        for ($i=0;$i<sizeof($grupos_tema);$i++) { 
            $grupos_tema[$i]["temas"]=$this->tema_model->obtener_temas($grupos_tema[$i]["id_grupo_tema"]);
            $grupos_tema[$i]["horas"]=123;
        }
        return $grupos_tema;
    }
    public function obtener_grupo_temas($id_grupo_tema,$id_curso) {
        $sql="CALL obtener_grupo_temas(?,?);" ;
        $query=$this->db->query($sql,array($id_grupo_tema,$id_curso)); 
        $grupo_tema=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        /* DATOS CON JOIN o calculos */
        $temas=$this->tema_model->obtener_temas($grupo_tema["id_grupo_tema"]);
        $grupo_tema["temas"]=$temas;
        $grupo_tema["lecciones"]=sizeof($temas);
        $grupo_tema["horas"]=123;
        return $grupo_tema;
    }
    public function obtener_grupos_tema_curso_grupo($id_curso,$codigo_uri_grupo_tema){
        $sql="CALL obtener_grupos_tema_curso_grupo(?,?);" ;
        $query=$this->db->query($sql,array($id_curso,$codigo_uri_grupo_tema)); 
        $grupo_tema=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        /* DATOS CON JOIN o calculos */
        $temas=$this->tema_model->obtener_temas($grupo_tema["id_grupo_tema"]);
        $grupo_tema["temas"]=$temas;
        $grupo_tema["lecciones"]=sizeof($temas);
        $grupo_tema["horas"]=123;
        return $grupo_tema;
    }
}