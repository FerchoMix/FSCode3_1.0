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
    //recibir lista de ventas
    public function listSales($desde,$hasta){
        $this->db->select('V.idVenta AS ID,V.total AS Total,V.cantidad AS Cantidad,S.nombre AS Sucursal,V.fecha AS Fecha,
            V.idUsuario AS IDU,V.idCliente AS IDC,U.nombre AS NomUsu, U.apellidos AS ApeUsu, C.nombre AS Cliente');
        $this->db->from('ventas V,usuarios U,clientes C,sucursales S');
        $this->db->where('V.idUsuario = U.idUsuario AND V.idCliente = C.idCliente AND V.idSucursal=S.idSucursal');
        $this->db->where('V.fecha >',$desde." 00:00:00");
        $this->db->where('V.fecha <',$hasta." 23:59:59");
        return $this->db->get();
    }
}