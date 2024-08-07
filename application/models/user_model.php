<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    //buscar por login y password de usuario para verificacion f
    public function searchUserLp($user){
        $this->db->select('idUsuario AS ID,login AS Login,password AS Password,
            tipo AS Tipo,estado AS Estado');
        $this->db->from('usuarios');
        $this->db->where('Login',$user->getLogin());
        $this->db->where('Password',$user->getPassword());
        return $this->db->get();
    }
    //buscar perfil f
    // Buscar perfil
    public function getPerfil($user){
        $this->db->select('ci AS CI,nombre AS Nombre,login AS Login,apellidos AS Apellido,
        fechaNac AS Fecha,tipo AS Tipo,telefono AS Telefono');
        $this->db->from('usuarios');
        $this->db->where('idUsuario',$user->getID());
		return $this->db->get();
    }
}