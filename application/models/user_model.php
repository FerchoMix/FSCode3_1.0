<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    //buscar por login y password de usuario para verificacion f
    public function searchUserLp($user){
        $this->db->select('idUsuario AS ID,login AS Login,password AS Password,
            tipo AS Tipo,estado AS Estado,foto AS Foto');
        $this->db->from('usuarios');
        $this->db->where('Login',$user->getLogin());
        $this->db->where('Password',$user->getPassword());
        return $this->db->get();
    }
    //buscar perfil f
    // Buscar perfil
    public function getPerfil($user){
        $this->db->select('ci AS CI,nombre AS Nombre,login AS Login,apellidos AS Apellido,
        fechaNac AS Fecha,tipo AS Tipo,telefono AS Telefono','foto AS Foto');
        $this->db->from('usuarios');
        $this->db->where('idUsuario',$user->getID());
		return $this->db->get();
    }
    // Mostrar la lista de usuarios
    public function listUsuarios($user){
		$this->db->select('idUsuario AS ID,ci AS CI,nombre AS Nombre,login AS Login,
        apellidos AS Apellidos,fechaNac AS Fecha,telefono AS Telefono,tipo AS Tipo,estado AS Estado,genero AS Genero,email AS Email,foto AS Foto');
        $this->db->from('usuarios');
        $this->db->where_in('estado', array(1, 2, 4));
        $this->db->where_not_in('idUsuario',$user->getID());
        $this->db->order_by('idUsuario');
		return $this->db->get();
	}
    // Mostrar la lista de usuarios
    public function listUsuariosD($user){
		$this->db->select('idUsuario AS ID,ci AS CI,nombre AS Nombre,login AS Login,
        apellidos AS Apellidos,fechaNac AS Fecha,telefono AS Telefono,tipo AS Tipo,estado AS Estado,genero AS Genero,email AS Email,foto AS Foto');
        $this->db->from('usuarios');
        $this->db->where_in('estado',3);
        $this->db->where_not_in('idUsuario',$user->getID());
        $this->db->order_by('idUsuario');
		return $this->db->get();
	}
    // Buscar por CI a los usuarios para verificacion al crear
    public function getUsersCi($user){
        //$this->db->select('ci AS Persona,nombre AS Nombre,apellidos AS Apellidos');
        $this->db->select('ci AS Persona');
        $this->db->from('usuarios');
        $this->db->where('ci',$user->getCI());
        //$this->db->where('nombre',$user->getNombre());
        //$this->db->where('apellidos',$user->getApellido());
        return $this->db->get();
    }
    // Insertar datos de los usuarios
    public function insertUser($user){
        $this->db->set('ci',$user->getCI());
        $this->db->set('nombre',$user->getNombre());
        $this->db->set('apellidos',$user->getApellido());
        $this->db->set('fechaNac',$user->getFechaNacimiento());
        $this->db->set('telefono',$user->getTelefono());
        $this->db->set('login',$user->getlogin());
        $this->db->set('password', $user->getPassword());
        $this->db->set('tipo', $user->getTipo());
        //$this->db->set('usuario', $user->getUsuario());
        //$this->db->set('foto', $user->getFoto());
        $this->db->set('genero', $user->getGenero());
        $this->db->set('email', $user->getEmail());
        //$this->db->set('foto', $user->getFoto());
		$this->db->insert('usuarios');
    }
    //modificar usuarios 
    public function updateUser($user){
        $this->db->set('ci', $user->getCI());
        $this->db->set('nombre', $user->getNombre());
        $this->db->set('apellidos', $user->getApellido());
        $this->db->set('fechaNac', $user->getFechaNacimiento());
        $this->db->set('telefono', $user->getTelefono());
        $this->db->set('tipo', $user->getTipo());
        $this->db->set('estado', $user->getEstado());
        //$this->db->set('usuario', $user->getUsuario());
        $this->db->set('genero', $user->getGenero());
        $this->db->set('email', $user->getEmail());
		$this->db->where('idUsuario',$user->getID());
		$this->db->update('usuarios');
	}
    //cambiar estado de usuario f
    public function deleteUser($user){
        $this->db->set('estado',$user->getEstado());
        $this->db->where('idUsuario',$user->getID());
		$this->db->update('usuarios');
    }
    //buscar usuario por ID
    public function searchUser($user){
        $this->db->select('idUsuario AS ID,ci AS CI,nombre AS Nombre,apellidos AS Apellido');
        $this->db->from('usuarios');
        $this->db->where('idUsuario',$user->getID());
        return $this->db->get();

    }
    //modificar foto usuario
    public function updatePhoto($user){
        $this->db->set('foto', $user->getFoto());
        $this->db->where('idUsuario',$user->getID());
        $this->db->update('usuarios');
    }
    //buscar contraseña del usuario
    public function searchPassword($user){
        $this->db->select('password AS Contra');
        $this->db->from('usuarios');
        $this->db->where('idUsuario',$user->getID());
        $this->db->where('password',md5($user->getPassword()));
        return $this->db->get();
    }
    public function changePassword($user,$nueva){
        $this->db->set('password', $nueva);
		$this->db->where('idUsuario',$user->getID());
		$this->db->update('usuarios');
    }
}