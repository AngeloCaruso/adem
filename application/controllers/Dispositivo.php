<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dispositivo extends CI_Controller {

    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function index(){
        if(isset($_GET['serial'], $_GET['corriente'])){
            $serial = $_GET['serial'];
            $corriente = $_GET['corriente'];
            $this->load->model('datos_model');
            if($this->datos_model->agregarMedicion($serial, $corriente)){
                echo "OK";
            }else{
                echo "ERROR";
            }
        }else{
            echo "Datos no validos";
        }
    }
}