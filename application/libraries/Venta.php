<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta{
    private $ID;
    private $total;
    private $sucursal;
    private $usuario;
    private $cliente;
    private $cantidad;
    private $fecha;
    public function __construct(){
    }
    //get and set ID
    public function getID(){
        return $this->ID;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    //get and set total
    public function getTotal(){
        return $this->total;
    }
    public function setTotal($total){
        $this->total = $total;
    }
    //get and set direccion
    public function getSucursal(){
        return $this->sucursal;
    }
    public function setSucursal($sucursal){
        $this->sucursal = $sucursal;
    }
    //get and set de Cantidad total
    public function getCantidad(){
        return $this->cantidad;
    }
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
    //get and set de Usuario
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    //get and set de Cliente
    public function getCliente(){
        return $this->cliente;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
    }
    //get and set de Fecha
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
}