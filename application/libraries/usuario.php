<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario{
    private $ID;
    private $CI;
    private $nombre;
    private $apellidos;
    private $login;
    private $password;
    private $telefono;
    private $fecNac;
    private $estado;
    private $fecReg;
    private $fecAct;
    private $usuario;
    private $tipo;
    public function __construct(){
    }
    //nombre completo
    public function getNombreCompleto(){
        return $this->nombre.' '.$this->apellidos;
    }
    //get and set ID
    public function getID(){
        return $this->ID;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    //get and set CI
    public function getCI(){
        return $this->CI;
    }
    public function setCI($CI){
        $this->CI = $CI;
    }
    //get and set nombre
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    //get and set apellidos
    public function getApellido(){
        return $this->apellidos;
    }
    public function setApellido($apellidos){
        $this->apellidos = $apellidos;
    }
    //get and set login
    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    //get and set password
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    //get and set tipo
    public function getTipo(){
        return $this->tipo;
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    //get and set fecha de nacimiento
    public function getFechaNacimiento(){
        return $this->fecNac;
    }
    public function setFechaNacimiento($fecNac){
        $this->fecNac = $fecNac;
    }
    //get and set estado
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    //get and set fecha de registro
    public function getFechaRegistro(){
        return $this->fecReg;
    }
    public function setFechaRegistro($fecReg){
        $this->fecReg = $fecReg;
    }
    //get and set fecha de actualizacion
    public function getFechaActualizacion(){
        return $this->fecAct;
    }
    public function setFechaActualizacion($fecAct){
        $this->fecAct = $fecAct;
    }
    //get and set de Usuario
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    //get and set telefono
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
}