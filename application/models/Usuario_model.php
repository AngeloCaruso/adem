<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Usuario_model extends CI_Model{
    
    private $id;
    private $email;
    private $username;
    private $nombre;
    private $apellidos;
    private $tipo_vp;
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }


    public function login($usuario, $password){
        $password = md5($password);
        $query = $this->db->query("SELECT * FROM usuario WHERE (`email` = '$usuario' OR `username` = '$usuario') AND `password` = '$password'");
        if($query->num_rows()>0): return $query->row();
        else: return null;


        endif;
    }

    public function actualizar_estado($id_usuario, $nuevo_estado){
        $this->db->set('estado_vp', $nuevo_estado);
        $this->db->where('id', $id_usuario);
        $this->db->update('usuario');
    }

    public function agregar($email, $username, $password, $nombre, $apellidos){
        $data = array(
            'email' => $email,
            'username' => $username,
            'password' => md5($password),
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'tipo_vp' => "2",
            'estado_vp' => "8"
        );
        return $this->db->insert('usuario', $data);
    }

    public function buscar($email){
        $this->db->where('email', $email);
        $query = $this->db->get('usuario');
        return $query->row();
    }

    public function existe_username($username){
        $this->db->where('username', $username);
        $query = $this->db->get('usuario');
        if($query->num_rows()>0): return true;
        else: return false;
        endif;
    }

    public function existe_email($email){
        $this->db->where('email', $email);
        $query = $this->db->get('usuario');
        if($query->num_rows()>0): return true;
        else: return false;
        endif;
    }

    public function update_user_data($username = null, $email = null, $name = null, $lastName = null){
        if($username != null){
            $this->db->set('username', $username);
        }
        if($email != null){
            $this->db->set('email', $email);
        }
        if($name != null){
            $this->db->set('nombre', $name);
        }
        if($lastName != null){
            $this->db->set('apellidos', $lastName);
        }
        $this->db->update('usuario');
    }
}