<?php Class Examen_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model("curso_model");
    }
    public function obtener_examen_por_curso($id_curso) {
        /*   Selecciona un Examen aleatoriamente por el ID CURSO   */
        $curso=$this->curso_model->obtener_curso($id_curso);
        if(strlen($curso["examenes"])>2) {
            $ids_examen=explode(",",$curso["examenes"]);
            if (is_array($ids_examen))   
                $id_examen=array_rand($ids_examen);
        }else{
            $id_examen=$curso["examenes"];
        }
        $examen=$this->obtener_examen($id_examen);
        return $examen;
    }
    public function obtener_examen($id_examen) {
        $sql="CALL obtener_examen(?);" ;
        $query=$this->db->query($sql,array($id_examen)); 
        $examen=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $examen;
    }
}