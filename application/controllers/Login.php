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
            if($login!=null){
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
            }else{
                echo('Error');
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}