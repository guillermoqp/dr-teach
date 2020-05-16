<?php Class Usuario_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->helper("utilitarios");
    }
    public function validar_usuario($email,$password) {
        $sql="CALL validar_usuario(?,?);";
        $query=$this->db->query($sql,array($email,$password)); 
        $usuario=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $usuario;
    }
    public function get_datos_usuario($id_usuario) {
        $sql="CALL get_datos_usuario(?);";
        $query=$this->db->query($sql,array($id_usuario)); 
        $usuario=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $usuario;
    }
    public function validar_usuario_email($email) {
        $sql="CALL validar_usuario_email(?);";
        $query=$this->db->query($sql,array($email)); 
        $usuario=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $usuario;
    }
    public function existe_codigo_reestablecimineto_password($codigoReestablecimiento) {
        $sql="CALL existe_codigo_reestablecimineto_password(?);";
        $query=$this->db->query($sql,array($codigoReestablecimiento)); 
        $usuario=$query->row_array();
        $query->next_result(); 
        $query->free_result();
        return $usuario;
    }
    public function generar_cambio_password($id_usuario,$forgot_password_code) {
        $exito = FALSE;
        $this->db->trans_start();
        $sql="CALL generar_cambio_password(?,?);";
        $success=$this->db->query($sql,array($id_usuario,$forgot_password_code));
        $success->next_result();
        $success->free_result();
        if($success){
            $this->db->trans_complete();
            $exito = TRUE;
        }
        return $exito;
    }
    public function reestablecer_password($id_usuario,$password) {
        $exito = FALSE;
        $this->db->trans_start();
        $sql="CALL reestablecer_password(?,?);";
        $success=$this->db->query($sql,array($id_usuario,$password));
        $success->next_result();
        $success->free_result();
        if($success){
            $this->db->trans_complete();
            $exito = TRUE;
        }
        return $exito;
    }
    public function registrar_usuario($username,$password,$email,$nombres,$apellidos) {
        $exito = FALSE;
        $this->db->trans_start();
        $sql="CALL registrar_usuario(?,?,?,?,?);";
        $success=$this->db->query($sql,array($username,$password,$email,$nombres,$apellidos));
        $success->next_result();
        $success->free_result();
        if($success){
            $this->db->trans_complete();
            $exito = TRUE;
        }
        return $exito;
    }
}