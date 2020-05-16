<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 
Class Emailnotificaciones_cls {
    private $emailSISCAR="";
    private $usuarioEmailSISCAR="";
    public function  __construct() {
        $this->CI=&get_instance();
        $this->CI->load->library("email");
        $this->cuentaEmail=$this->CI->config->item("email");
        $this->usuarioEmail=$this->CI->config->item("usuarioEmail");
    }
    public function enviar_mail_reestablecer_password($destinatarios,$asunto,$cuerpo) {
        try {
            $body=$this->CI->load->view("template/email/email_reestablecer_password",$cuerpo,TRUE);
            $body=preg_replace('/\\\\/',"",$body);
            $result=$this->CI->email
                        ->from($this->cuentaEmail,$this->usuarioEmail)
                        ->reply_to($this->cuentaEmail)
                        ->to($destinatarios)
                        ->subject($asunto)
                        ->message($body)
                        ->send();
            if ($result) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function enviar_mail_contactos($destinatarios,$asunto,$cuerpo) {
        try {
            $body=$this->CI->load->view("template/email/email_contactos",$cuerpo,TRUE);
            $body=preg_replace('/\\\\/',"",$body);
            $result=$this->CI->email
                        ->from($this->cuentaEmail,$this->usuarioEmail)
                        ->reply_to($this->cuentaEmail)
                        ->to($destinatarios)
                        ->subject($asunto)
                        ->message($body)
                        ->send();
            if ($result) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}