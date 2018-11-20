<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index()
	{
        if($this->session->userdata('usuario')){
            redirect('dashboard');
        }
        if(isset($_POST['username'], $_POST['email'])){
            $password = $_POST['password'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $this->load->model('usuario_model');
            if(!$this->usuario_model->existe_username($username) && !$this->usuario_model->existe_email($email)){
                if($this->usuario_model->agregar($email, $username, $password, $nombre, $apellidos)){
                    $this->session->set_userdata('registro', $_POST['email']);
                    $this->enviar_email();
                    echo "Ok";
                }else{
                    echo "Error";
                }
            }
        }
    }

    public function sendEmailView(){
        $this->load->view('confirmacion', array('header' => 'Correo de confirmación enviado', 'body' => 'Si no te llega <a href="/enviar_email">Click aqui</a>'));
    }

    public function verificar_nombre_usuario(){
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $this->load->model('usuario_model');
            if($this->usuario_model->existe_username($username)){
                echo "1";
            }else{
                echo "0";
            }
        }
    }

    public function verificar_email(){
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $this->load->model('usuario_model');
            if($this->usuario_model->existe_email($email)){
                echo "1";
            }else{
                echo "0";
            }
        }
    }

    public function enviar_email(){
        if($this->session->userdata('registro')){
            $this->load->model('usuario_model');
            $email = $this->session->userdata('registro');
            $row = $this->usuario_model->buscar($email);
            $this->load->model('confirmacion_model');
            $id_usuario = $row->id;
            $r = $this->confirmacion_model->buscar_registro_id_usuario($id_usuario);
            $this->load->model('email_model');
            if($r->num_rows()>0){
                $llave = $r->row()->llave;
                $this->email_model->email_registro($email, $llave);
            }else{
                $fecha = date("Y-m-d H:i:s");
                $llave = md5(strtotime(date("Y-m-d H:i:s")).$id_usuario);
                if($this->confirmacion_model->agregar_registro($id_usuario, $llave, $fecha)){
                    //enviar email
                    $this->email_model->email_registro($email, $llave);
                    return true;
                }else{
                    return false;
                }
            }
        }
    }

    public function verificar_registro(){
        if(isset($_GET['key'])){
            $llave = $_GET['key'];
            $this->load->model('confirmacion_model');
            $r = $this->confirmacion_model->buscar_registro($llave);
            if($r->num_rows()>0){
                $id_usuario = $r->row()->usuario_id;
                $id = $r->row()->id;
                $this->load->model('usuario_model');
                $this->usuario_model->actualizar_estado($id_usuario, 7);
                $this->confirmacion_model->actualizar_estado($id, 8);
                $this->session->sess_destroy();
                $this->load->view('confirmacion', array('header' => 'Su cuenta ha sido verificada', 'body' => '<a href="login">Inicia sesión</a>'));
            }else{
                $this->load->view('errors/html/error_404');
            }
        }else{
            $this->load->view('errors/html/error_404');
        }
    }
}