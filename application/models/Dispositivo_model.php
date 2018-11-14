<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Dispositivo_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    //Verifica si un dispositivo no ha sido asignado por otro usuario
    public function verificar_disponibilidad($serial){
        $this->db->where("serial", $serial);
        $this->db->where("estado_vp", 7);
        $query = $this->db->get("dispositivos");
        if($query->row()->usuario_id == null){
            return true;
        }
        return false;
    }

    public function existe($serial){
        $this->db->where("serial", $serial);
        $this->db->where("estado_vp", 7);
        $query = $this->db->get("dispositivos");
        if($query->num_rows()>0): return true;
        else: return false;
        endif;
    }

    //Solo Admin
    public function Agregar($serial){
        $this->db->where("serial", $serial);
        $query = $this->db->get("dispositivos");
        if($query->num_rows()>0){
            $this->db->set('estado_vp', 7);
            $this->db->where('serial', $serial);
            return $this->db->update('dispositivos');
        }else{
            $data = array(
                'serial' => $serial,
                'estado_vp' => 7
            );
            return $this->db->insert('dispositivos', $data);
        }
    }

    public function eliminar($id){
        $this->db->set('usuario_id', "");
        $this->db->set('nombre', "");
        $this->db->set('descripcion', "");
        $this->db->set('estado_vp', 8);
        $this->db->where('id', $id);
        $this->db->update('dispositivos');
    }

    public function buscar($serial){
        $this->db->where("serial", $serial);
        $query = $this->db->get("dispositivos");
        return $query->row();
    }

    public function todos_dispositivos($limitar = null){

    }
    //Fin Solo Admin

    //Usuario Comun
    public function agregar_uc($id_usuario, $serial, $tipoDisp, $nombre, $descripcion){
        $this->db->set('usuario_id', $id_usuario);
        $this->db->set('nombre', $nombre);
        $this->db->set('tipo_disp', $tipoDisp);
        $this->db->set('descripcion', $descripcion);
        $this->db->where('serial', $serial);
        return $this->db->update('dispositivos');
    }

    public function todos_dispositivos_uc($id){
        $this->db->where("usuario_id", $id);
        $this->db->select('serial, nombre, tipo_disp, descripcion');
        $query = $this->db->get("dispositivos");
        return $query->result();
    }
    
    public function eliminar_uc($id){
        $this->db->set('usuario_id', "");
        $this->db->where('id', $id);
        $this->db->update('dispositivos');
    }
    
    public function editar_uc($id, $nombre, $tipo, $descripcion){
        $this->db->set('nombre', $nombre);
        $this->db->set('descripcion', $descripcion);
        $this->db->set('tipo_disp', $tipo);
        $this->db->where('serial', $id);
        $this->db->update('dispositivos');
    }

    //Fin Usuario Comun

}