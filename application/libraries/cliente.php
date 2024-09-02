<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente{
    protected $ID;
    protected $CI;
    protected $nombre;
    protected $direccion;
    protected $telefono;
    protected $tipo;
    protected $estado;
    protected $fecReg;
    protected $fecAct;
    protected $usuario;
    public function __construct(){
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
    //get and set direccion
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    //get and set telefono
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
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
}