<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Confirmacion_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    //tipo_vp => 3 = registro; 4 = recuperar_contrasena
    public function agregar_registro($id_usuario, $llave, $fecha){
        $data = array(
            'llave' => $llave,
            'fecha' => $fecha,
            'usuario_id' => $id_usuario,
            'tipo_vp' => 3,
            'estado_vp' => 7
        );
        return $this->db->insert('confirmacion', $data);
    }

    public function buscar_registro_id_usuario($id_usuario){
        $this->db->where('usuario_id', $id_usuario);
        $this->db->where('tipo_vp', 3);
        $this->db->where('estado_vp', 7);
        $query = $this->db->get('confirmacion');
        return $query;
    }

    public function buscar_registro($llave){
        $this->db->where('llave', $llave);
        $this->db->where('tipo_vp', 3);
        $this->db->where('estado_vp', 7);
        $query = $this->db->get('confirmacion');
        return $query;
    }

    public function actualizar_estado($id, $nuevo_estado){
        $this->db->set('estado_vp', $nuevo_estado);
        $this->db->where('id', $id);
        $this->db->update('confirmacion');
    }

    public function agregar_recuperar_contrasena($id_usuario, $llave, $fecha){
        $data = array(
            'llave' => $llave,
            'fecha' => $fecha,
            'usuario_id' => $id_usuario,
            'tipo_vp' => 4,
            'estado_vp' => 7
        );
        return $this->db->insert('confirmacion', $data);
    }
}