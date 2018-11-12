<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Datos_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function agregarMedicion($serial, $datos){
        $this->load->model('dispositivo_model');
        $row = $this->dispositivo_model->buscar($serial);
        if($row != null){
            $id_disp = $row->id;
            
            $query = $this->db->query("INSERT INTO datos (dispositivos_id, vatios, fecha, estado_vp) 
                    VALUES('$id_disp', '$datos', CURRENT_TIMESTAMP, 7)");
            return true;
        }
        return false;      
    }

    public function datos($serial, $limit, $id = null){
        $this->db->select('datos.id, datos.dispositivos_id, datos.vatios, datos.fecha, dispositivos.serial');
        $this->db->from('datos');
        $this->db->join('dispositivos', 'dispositivos.id = datos.dispositivos_id');
        $this->db->where('serial', $serial);
        if($id != null){
            $this->db->where('datos.id>',$id);
        }
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }
}