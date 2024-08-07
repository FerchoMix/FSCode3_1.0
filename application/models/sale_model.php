<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_model extends CI_Model {
//recuperar stock
public function getStock(){
    $this->db->select('descripcion AS Producto,almacen AS Almacen');
    $this->db->from('productos');
    $this->db->where('almacen <',20);
    return $this->db->get();
}
}