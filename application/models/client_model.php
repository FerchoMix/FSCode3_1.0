<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {
    //buscar por CI clientes para verificacion
    public function getClientCI($client){
        $this->db->select('cinit');
        $this->db->from('clientes');
        $this->db->where('cinit',$client->getCI());
        return $this->db->get();
    }
    //recibir la lista de clientes
    public function listClientes(){
		$this->db->select('idCliente AS ID,cinit AS CiNit,nombre AS RazonSocial ,direccion AS Direccion,
            telefono AS Contacto,estado AS Estado');
        $this->db->from('clientes');
        $this->db->order_by('ID');
		return $this->db->get();
	}
    public function insertClient($client){
        $this->db->set('cinit', $client->getCI());
        $this->db->set('nombre', $client->getNombre());
        $this->db->set('direccion', $client->getDireccion());
        $this->db->set('telefono', $client->getTelefono());
        //$this->db->set('usuario', $client->getUsuario());
		$this->db->insert('clientes');
	}
    //
}