<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy_model extends CI_Model {
    //buscar por ID stock para verificacion
    public function getStockPS($stock){
        $this->db->select('idProducto,idSucursal');
        $this->db->from('inventarios');
        $this->db->where('idProducto',$stock->getProducto());
        $this->db->where('idSucursal',$stock->getSucursal());
        return $this->db->get();
    }
    //recibir lista de compras
    public function listBuys($desde,$hasta){
        $this->db->select('C.idCompra AS ID,C.total AS Total,C.cantidad AS Cantidad,C.fecha AS Fecha,
            C.idUsuario AS IDU,U.nombre AS NomUsu, U.apellidos AS ApeUsu, PR.nombre AS Proveedor');
        $this->db->from('compras C,usuarios U,proveedores PR');
        $this->db->where('C.idUsuario = U.idUsuario AND C.idProveedor=PR.idProveedor');
        $this->db->where('C.fecha >',$desde." 00:00:00");
        $this->db->where('C.fecha <',$hasta." 23:59:59");
        return $this->db->get();
    }
}