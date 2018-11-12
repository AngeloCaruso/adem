<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('url');
    }
    
    public function email_registro($to, $llave){
        $url = "localhost".base_url('registro/verificar_registro').'?key='.$llave;
        $this->email->from('adem.register@adem.com', 'ADEM');
        $this->email->to($to);
        $this->email->subject('Confirmacion de registro');
        $this->email->message($this->load->view('email/registro_view', array('url'=>$url), TRUE));
        $this->email->set_mailtype("html");
        $this->email->send();
    }
}