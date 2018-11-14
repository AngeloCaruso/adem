<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
	}
	
	public function index(){
		if(!$this->session->userdata('usuario')) redirect('ingreso');
		$id = $this->session->usuario['tipo_vp'];
		if($id == 1){
			$this->load->view('dashboard', 
			array('adminBtn' => '
			<li class="nav-item btnAdmin">
				<a class="nav-link" href="#admin" data-toggle="tab">
					<i class="material-icons">assignment</i>
					<p>Administrar usuarios</p>
				</a>
			  </li>'
			));
		}else{
			$this->load->view('dashboard',
			array('adminBtn' => ''));
		}
	}

	public function datos(){
		if(isset($_GET["serial"])){
			$limit = 10;
			$id = null;
			if(isset($_GET["limit"])){
				$limit = $_GET["limit"];
			}
			if(isset($_GET["id"])){
				$id = $_GET["id"];
			}
			$serial = $_GET["serial"];
			$this->load->model('datos_model');
			echo json_encode($this->datos_model->datos($serial, $limit, $id));
		}else{
			echo "Datos incorrectos";
		}
	}

	public function dispositivo_disponible(){
		if(isset($_GET["serial"])){
			$serial = $_GET["serial"];
			$this->load->model('dispositivo_model');
			if($this->dispositivo_model->existe($serial)){
				if($this->dispositivo_model->verificar_disponibilidad($serial)){
					echo "Disponible";
				}else{
					echo "No disponible";
				}
			}else{
				echo "Null";
			}
		}
	}

	public function dispositivos(){
		if(!$this->session->userdata('usuario')) redirect('login');
		$id = $this->session->usuario['id'];
		$this->load->model('dispositivo_model');
		echo json_encode($this->dispositivo_model->todos_dispositivos_uc($id));
	}

	public function agregar(){
		if(!$this->session->userdata('usuario')) redirect('login');
		$id_usuario = $this->session->usuario['id'];
		$serial = $_POST["serial"];
		$nombre = $_POST["nombre"];
		$tipoDisp = $_POST["tipo_disp"];
		$descripcion = $_POST["descripcion"];
		$intervalo = $_POST["intervalo"];
		$this->load->model('dispositivo_model');
		if($this->dispositivo_model->existe($serial)){
			if($this->dispositivo_model->verificar_disponibilidad($serial)){
				if($this->dispositivo_model->agregar_uc($id_usuario, $serial, $tipoDisp, $nombre, $descripcion)){
					echo "Ok";
				}else{
					echo "Error";
				}
			}
		}
	}

	public function updateUser(){
		if(!$this->session->userdata('usuario')) redirect('login');
		$newUser = null;
		$newEmail = null;
		$newName = null;
		$newLastN = null;
		if(isset($_POST['user'])){
			$newUser = $_POST['user'];
		}
		if(isset($_POST['email'])){
			$newEmail = $_POST['email'];
		}
		if(isset($_POST['name'])){
			$newName = $_POST['name'];
		}
		if(isset($_POST['lastN'])){
			$newLastN = $_POST['lastN'];
		}
		$this->load->model('usuario_model');
		$this->usuario_model->update_user_data($newUser, $newEmail, $newName, $newLastN);
	}

	public function updateDevice(){
		if(isset($_GET['serial'])){
			$serial = $_GET['serial'];
			$name = $_GET['devName'];
			$type = $_GET['devType'];
			$desc = $_GET['desc'];
			$this->load->model('dispositivo_model');
			$this->dispositivo_model->editar_uc($serial, $name, $type, $desc);
		}else{
			echo 'Error';
		}
	}

	public function loadDisp($id){
		$this->load->view('dashboardViews/detailDisp', array('serial' => '<h3 class="serial" align="center">'.$id.'</h3>'));
	}

	public function loadDayFilter(){
		if(isset($_GET['serial']) && isset($_GET['date'])){
			$serial = $_GET['serial'];
			$date = $_GET['date'];
			$this->load->model('filtros_model');
			echo json_encode($this->filtros_model->filtroDiaEspec($serial, $date));
		}else{
			echo 'Datos incorrectos';
		}
	}

	public function loadDateRange(){
		if(isset($_GET['serial']) && isset($_GET['from']) && isset($_GET['to'])){
			$serial = $_GET['serial'];
			$from = $_GET['from'];
			$to = $_GET['to'];
			$this->load->model('filtros_model');
			echo json_encode($this->filtros_model->rangoFechas($serial, $from, $to));
		}else{
			echo 'Datos incorrectos';
		}
	}

	public function loadHourRange(){
		if(isset($_GET['serial']) && isset($_GET['from']) && isset($_GET['to'])){
			$serial = $_GET['serial'];
			$from = $_GET['from'];
			$to = $_GET['to'];
			$this->load->model('filtros_model');
			echo json_encode($this->filtros_model->rangoHoras($serial, $from, $to));
		}else{
			echo 'Datos incorrectos';
		}
	}

	public function prom_dias(){
		if(!$this->session->userdata('usuario')) redirect('login');
		if(isset($_GET["serial"])){
			$serial=$_GET["serial"];
			$this->load->model('filtros_model');
			echo json_encode($this->filtros_model->promedioDias($serial));
		}else{
			echo "Datos incorrectos";
		}
    }
	
	public function showAllDisp(){
		$this->load->view('dashboardViews/allDisp');
	}

	public function showProfile(){
		$emailAct = $this->session->usuario['email'];
		$this->load->model('usuario_model');
		$userData = $this->usuario_model->buscar($emailAct);
		$this->load->view('dashboardViews/profile', 
		array(
			'user' => $userData->username,
			'email' => $userData->email,
			'name' => $userData->nombre,
			'lastN' => $userData->apellidos)
		);
	}

	public function showSettings(){
		$id = $this->session->usuario['id'];
		$this->load->model('dispositivo_model');
		$list = $this->dispositivo_model->todos_dispositivos_uc($id);
		$this->load->view('dashboardViews/settings',
		array(
			'serialList' => $list
		));
	}
	
	public function showAdmin(){
		$this->load->view('dashboardViews/admin');
	}
}
