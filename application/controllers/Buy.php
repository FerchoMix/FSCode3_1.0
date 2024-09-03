<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('convertir/vendor/autoload.php');
use Luecano\NumeroALetras\NumeroALetras;
class Buy extends CI_Controller {
	public function index(){
		$head['valor'] = array('Administrador');
		$data['mensaje'] ='Nuevo ingreso';
		$head['titulo'] = 'Ingreso';
		$user = new Usuario();
		$compra = new Venta();
		$user->setID($this->session->userdata('idusuario'));
		$userRec=$this->user_model->searchUser($user);
		foreach ($userRec->result() as $row){
			$user->setCI($row->CI);
			$user->setNombre($row->Nombre);
			$user->setApellido($row->Apellido);
		}
		foreach(($this->buy_model->getBuyID())->result() as $row){
			$compra->setID(($row->ID)+1);
		}
		$lista=$this->product_model->listProducts();
		$data['productos']=$lista;
		$data['comprador']=$user;
		$data['nroCompra']=$compra->getID();
		$nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
		$this->load->view('general/topbar.php',$top);
        $this->load->view('sidebars/admin.php');
		$this->load->view('sales/nueva_compra.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
    }
    //lista de ventas
	public function buylist(){
		$head['valor'] = array('Administrador','Vendedor');
		$data['mensaje'] ='Lista de Entradas';
		$head['titulo'] = 'Lista de Entradas';
		if($this->session->flashdata('fechaDesde')){
			$ini = $this->session->flashdata('fechaDesde');
			$fin = $this->session->flashdata('fechaHasta');
		}else{
			$ini = date('Y-m-d');
			$fin = date('Y-m-d');
		}
		$data['fecIni'] = $ini;
		$data['fecFin'] = $fin;
		$lista=$this->buy_model->listBuys($ini,$fin);
		$data['compras']=$lista;
		$nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
		
		$this->load->view('general/topbar.php',$top);
        $this->load->view('sidebars/admin.php');
		$this->load->view('sales/lista_compras.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
	}
}