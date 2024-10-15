<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalle{
    private $ID;
    private $productos;
    private $glosa;
    private $precio;
    private $importe;
    private $venta;
    private $producto;
    public function __construct(){
    }
    //get and set ID
    public function getID(){
        return $this->ID;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    //get and set productos
    public function getProductos(){
        return $this->productos;
    }
    public function setProductos($productos){
        $this->productos = $productos;
    }
    //get and set glosa
    public function getGlosa(){
        return $this->glosa;
    }
    public function setGlosa($glosa){
        $this->glosa = $glosa;
    }
    //get and set precio
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    //get and set de importe
    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }
    //get and set de venta
    public function getVenta(){
        return $this->venta;
    }
    public function setVenta($venta){
        $this->venta = $venta;
    }
    //get and set producto
    public function getProducto(){
        return $this->producto;
    }
    public function setProducto($producto){
        $this->producto = $producto;
    }
}