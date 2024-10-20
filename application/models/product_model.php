<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    //buscar por ID producto para verificacion
    public function getShoeDC($pro){
        $this->db->select('descripcion AS Descripcion');
        $this->db->from('productos');
        $this->db->where('descripcion',$pro->getDescripcion());
        return $this->db->get();
    }
    public function getMarcas() {
        $this->db->select('idMarca AS ID, nombre AS Nombre');
        $this->db->from('marcas');
        return  $this->db->get();
    
       
    }
    public function getCategorias() {
        $this->db->select('idCategoria AS ID, nombre AS Nombre');
        $this->db->from('categorias');
        return  $this->db->get();
    
       
    }
     //recibir Id del ultimo productos
     public function getProductID(){
		$this->db->select('COUNT(idproducto) AS ID');
        $this->db->from('productos');
		return $this->db->get();
	}
    //insertar datos de producto
	public function insertProduct($pro){
        $this->db->set('descripcion', $pro->getDescripcion());
        $this->db->set('foto', $pro->getFoto());
        $this->db->set('precio', $pro->getPrecio());
        $this->db->set('idMarca', $pro->getMarca());
        $this->db->set('idCategoria', $pro->getCategoria());
        //$this->db->set('usuario', $pro->getUsuario());
		$this->db->insert('productos');
	}
     //recibir la lista de productos
    public function listProducts(){
		$this->db->select('P.idProducto AS ID, 
                   P.descripcion AS Descripcion, 
                   P.foto AS Foto, 
                   P.precio AS Precio, 
                   M.nombre AS Marca, 
                   P.almacen AS Almacen,
                   P.estado AS Estado, 
                   CA.nombre AS Categoria');
    $this->db->from('productos P');
    $this->db->join('categorias CA', 'CA.idCategoria = P.idCategoria', 'inner');
    $this->db->join('marcas M', 'M.idMarca = P.idMarca', 'inner');

return $this->db->get();

	}
    public function updateWhare($pro,$tipo){
        $this->db->select('almacen AS Almacen');
        $this->db->from('productos');
        $this->db->where('idProducto',$pro->getProducto());
        $productos = $this->db->get();
        foreach ($productos->result() as $row){
            $alm = $row->Almacen;
        }
        if($tipo == 0){
            $alm = $alm + $pro->getProductos();
        }else{
            $alm = $alm - $pro->getProductos();
        }
        $this->db->set('almacen', $alm);
		$this->db->where('idProducto',$pro->getProducto());
		$this->db->update('productos');
    }
     //modificar productos
     public function updateProduct($pro){
        $this->db->set('descripcion', $pro->getDescripcion());
        $this->db->set('idCategoria', $pro->getCategoria());
        $this->db->set('foto', $pro->getFoto());
        $this->db->set('precio', $pro->getPrecio());
        $this->db->set('idMarca', $pro->getMarca());
        $this->db->set('estado', $pro->getEstado());
        //$this->db->set('usuario', $pro->getUsuario());
		$this->db->where('idProducto',$pro->getID());
		$this->db->update('productos');
	}
    //cambiar estado de productos
    public function deleteProduct($pro){
        $this->db->set('estado',$pro->getEstado());
        //$this->db->set('usuario',$pro->getUsuario());
        $this->db->where('idProducto',$pro->getID());
        $this->db->update('productos');
    }
}