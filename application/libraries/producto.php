<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Producto{
    private $ID;
    private $descripcion;
    private $medida;
    private $foto;
    private $precio;
    private $marca;
    private $categoria;
    private $almacen;
    private $estado;
    private $fecReg;
    private $fecAct;
    private $usuario;
    public function construct__(){
    }
    //get and set ID
    public function getID(){
        return $this->ID;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    //get and set descripcion
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    //get and set medida
    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    //get and set foto
    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($foto){
        $this->foto = $foto;
    }
    //get and set precio
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    //get and set marca
    public function getMarca(){
        return $this->marca;
    }
    public function setMarca($marca){
        $this->marca = $marca;
    }
    //get and set almacen
    public function getAlmacen(){
        return $this->almacen;
    }
    public function setAlmacen($almacen){
        $this->almacen = $almacen;
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
        return $this->fecReg;
    }
    public function setFechaActualizacion($fecAct){
        $this->fecAct = $fecAct;
    }
    //get and set ID categoria
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
}