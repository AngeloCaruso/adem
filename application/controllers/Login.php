<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
    }
    public function index(){
        if($this->session->userdata('usuario')){
            redirect('dashboard');
        }
		$this->load->view('ingreso');
    }

    public function iniciarSesion(){
        if(isset($_POST['password'], $_POST['email'])){
            $pass = $_POST['password'];
            $email = $_POST['email'];
            $this->load->model('usuario_model');
            $login = $this->usuario_model->login($email,$pass);
            if($login == null){
                echo "no_existe";
            }else if($login == "9"){
                echo "ban";
            }else if($login == "10"){
                echo "conf_registro";
            }else{
                $usuario = Array(
                    'id' => $login->id,
                    'email' => $login->email,
                    'username' => $login->username,
                    'nombre' => $login->nombre,
                    'apellidos' => $login->apellidos,
                    'tipo_vp' => $login->tipo_vp
                );
                $this->session->set_userdata('usuario', $usuario);
                echo('Ok');
            }
        }
    }

    public function load_reset(){
        $this->load->view('reset_pass');
    }

    public function load_email_confirm(){
        $this->load->view('reset_confirm');
    }

    public function olvide_contrasena(){
        if(isset($_POST["email"])){
            $email = $_POST["email"];
            $this->load->model('usuario_model');
            $this->load->model('confirmacion_model');
            $row = $this->usuario_model->buscar($email);
            $id_usuario = $row->id;
            $r = $this->confirmacion_model->buscar_recuperar_cont_id_usuario($id_usuario);
            $this->load->model('email_model');
            if($r->num_rows()>0){
                $llave = $r->row()->llave;
                $this->email_model->email_recuperar_contrasena($email, $llave);
                echo "Ok";
            }else{
                $fecha = date("Y-m-d H:i:s");
                $llave = md5(strtotime(date("Y-m-d H:i:s")).$id_usuario);
                if($this->confirmacion_model->agregar_recuperar_contrasena($id_usuario, $llave, $fecha)){
                    //enviar email
                    $this->email_model->email_recuperar_contrasena($email, $llave);
                    echo "Ok";
                }else{
                    echo "Error";
                }
            }
        }else{
            echo 'algo';
        }
    }

    public function cambiarcontrasena(){
        if(isset($_GET['key'])){
            $llave = $_GET['key'];
            $this->load->model('confirmacion_model');
            $r = $this->confirmacion_model->buscar_recuperar_contrasena($llave);
            if($r->num_rows()>0 && isset($_POST["password"])){
                $password = $_POST["password"];
                $id_usuario = $r->row()->usuario_id;
                $id = $r->row()->id;
                $this->load->model('usuario_model');
                $this->usuario_model->cambiar_contrasena($id_usuario, $password);
                $this->confirmacion_model->actualizar_estado($id, 8);
                $conf = $this->load->view('reset_confirm', null, TRUE);
                $this->load->view('cambiocontrasena', array('confirm' => $conf));
            }elseif($r->num_rows()>0){
                $this->load->view('cambiocontrasena');
            }else{
                $this->load->view('errors/html/error_404',array('heading'=>'404 Page Not Found', 'message'=>'The page you requested was not found.'));
            }
        }else{
            $this->load->view('errors/html/error_404',array('heading'=>'404 Page Not Found', 'message'=>'The page you requested was not found.'));
        }
    }
    

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}