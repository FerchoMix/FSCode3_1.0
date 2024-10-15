<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_model extends CI_Model {
    //buscar por ID stock para verificacion
    public function getStockPS($stock){
        $this->db->select('idProducto,idSucursal');
        $this->db->from('inventarios');
        $this->db->where('idProducto',$stock->getProducto());
        $this->db->where('idSucursal',$stock->getSucursal());
        return $this->db->get();
    }
    
     //insertar datos de un venta
     public function insertSale($sale){
        $this->db->trans_start();
        $this->db->set('total', $sale->getTotal());
        $this->db->set('cantidad', $sale->getCantidad());
        $this->db->set('idSucursal', $sale->getSucursal());
        $this->db->set('idUsuario', $sale->getUsuario());
        $this->db->set('idCliente', $sale->getCliente());
		$this->db->insert('ventas');
        $this->db->trans_complete();
        if($this->db->trans_status()==FALSE){
            return FALSE;
        }
	}
    
    //insertar datos de detalles de venta
    public function insertDetail($det){
        $this->db->trans_start();
        $this->db->set('cantidad',$det->getProductos());
        $this->db->set('glosa',$det->getGlosa());
        $this->db->set('preciounitario',$det->getPrecio());
        $this->db->set('importe',$det->getImporte());
        $this->db->set('idVenta',$det->getVenta());
        $this->db->set('idProducto',$det->getProducto());
        $this->db->insert('detalleventas');
        $this->db->trans_complete();
        if($this->db->trans_status()==FALSE){
            return FALSE;
        }
    }
    // lista de ventas
    public function listSales($desde, $hasta) {
        $this->db->select('V.idVenta AS ID, 
                           V.total AS Total, 
                           V.cantidad AS Cantidad, 
                           S.nombre AS Sucursal, 
                           V.fecha AS Fecha,
                           V.idUsuario AS IDU, 
                           V.idCliente AS IDC, 
                           U.nombre AS NomUsu, 
                           U.apellidos AS ApeUsu, 
                           C.nombre AS Cliente');
        
        // Especifica las tablas involucradas con JOIN
        $this->db->from('ventas V');
        $this->db->join('usuarios U', 'V.idUsuario = U.idUsuario', 'inner');
        $this->db->join('clientes C', 'V.idCliente = C.idCliente', 'inner');
        $this->db->join('sucursales S', 'V.idSucursal = S.idSucursal', 'inner');
    
        // Filtra las fechas
        $this->db->where('V.fecha >=', $desde . " 00:00:00");
        $this->db->where('V.fecha <=', $hasta . " 23:59:59");
    
        return $this->db->get();
    }
    //recibir Id del ultima venta
    public function getSaleID(){
        $this->db->select('COUNT(idVenta) AS ID');
        $this->db->from('ventas');
        return $this->db->get();
    }
    //recibir los detalles de una venta en especifico
    public function listDetails($sale){
        $this->db->select('DV.glosa AS Glosa,DV.cantidad AS Cantidad,DV.preciounitario AS Unitario,DV.importe AS Importe,
            CONCAT(P.descripcion," - ",M.nombre) AS Producto');
        $this->db->from('detalleVentas DV,productos P,marcas M');
        $this->db->where('P.idProducto = DV.idProducto');
        $this->db->where('P.idMarca = M.idMarca');
        $this->db->where('DV.idVenta',$sale->getID());
        return $this->db->get();
    }
    // recibir lista de sucursales
    public function getSucursales() {
            // Realiza la consulta a la base de datos
            $this->db->select('idSucursal, nombre, direccion'); // Selecciona los campos deseados
            $this->db->from('sucursales'); // Especifica la tabla
            $query = $this->db->get(); // Ejecuta la consulta
        
            // Devuelve los resultados como un array de objetos
            return $query->result();
    }
    //recuperar datos de una venta
    public function searchSale($sale) {
        // Selecciona los campos deseados
        $this->db->select('v.idVenta AS ID, v.total AS Total, v.cantidad AS Cantidad, s.nombre AS Sucursal, v.fecha AS Fecha');
        
        // Especifica las tablas involucradas
        $this->db->from('ventas AS v');
        
        // Realiza la unión con la tabla sucursales
        $this->db->join('sucursales AS s', 'v.idSucursal = s.idSucursal', 'inner');
        
        // Aplica el filtro para buscar por idVenta
        $this->db->where('v.idVenta', $sale->getID());
        
        // Ejecuta la consulta y devuelve el resultado
        return $this->db->get();
    }
    //recuperar stock
    public function getStock() {
        // Seleccionando los campos deseados de las tablas unidas
        $this->db->select('p.descripcion, m.nombre AS marca, p.almacen');
        
        // Desde la tabla productos
        $this->db->from('productos AS p');
        
        // Uniendo con la tabla marcas para obtener el nombre de la marca
        $this->db->join('marcas AS m', 'p.idMarca = m.idMarca', 'left');
        
        // Condición para filtrar productos con almacen menor a 20
        $this->db->where('p.almacen <', 20);
        
        // Ejecutando la consulta y devolviendo el resultado
        return $this->db->get()->result();
    }
    
}
    
