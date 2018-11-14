<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Filtros_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function filtroDiaEspec($serial, $dia){
        $this->db->select('datos.id, datos.dispositivos_id, datos.vatios, datos.fecha, dispositivos.serial');
        $this->db->from('datos');
        $this->db->join('dispositivos', 'dispositivos.id = datos.dispositivos_id');
        $this->db->where('serial', $serial);
        $this->db->where('date(fecha)', $dia);
        $query = $this->db->get();
        return $query->result();
    }

    public function rangoFechas($serial, $from, $to){
        $this->db->select('datos.id, datos.dispositivos_id, datos.vatios, datos.fecha, dispositivos.serial');
        $this->db->from('datos');
        $this->db->join('dispositivos', 'dispositivos.id = datos.dispositivos_id');
        $this->db->where('serial', $serial);
        $this->db->where('date(fecha)>=', $from);
        $this->db->where('date(fecha)<=', $to);
        $query = $this->db->get();
        return $query->result();
    }

    public function rangoHoras($serial, $from, $to){
        $this->db->select('datos.id, datos.dispositivos_id, datos.vatios, datos.fecha, dispositivos.serial');
        $this->db->from('datos');
        $this->db->join('dispositivos', 'dispositivos.id = datos.dispositivos_id');
        $this->db->where('serial', $serial);
        $this->db->where('fecha>=', $from);
        $this->db->where('fecha<=', $to);
        $query = $this->db->get();
        return $query->result();
    }

    public function promedioDias($serial){
        $this->db->select('dispositivos.serial serial, DATE(datos.fecha) fecha, AVG(datos.vatios) prom_vatios');
        $this->db->from('datos');
        $this->db->join('dispositivos', 'dispositivos.id = datos.dispositivos_id');
        $this->db->where('serial', $serial);
        $this->db->group_by(array("YEAR(fecha)", "MONTH(fecha)", "DAY(fecha)"));
        $query = $this->db->get();
        return $query->result();
    }
}