<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
require('convertir/vendor/autoload.php');
use Luecano\NumeroALetras\NumeroALetras;
class Sale extends CI_Controller {
	public function index(){
		$head['valor'] = array('Administrador','Vendedor');
		$data['mensaje'] ='Venta nueva';
		$head['titulo'] = 'Ventas';
		$cli = new Cliente();
		$user = new Usuario();
		$venta = new Venta();
		$cli->setID($_POST['ID']);
		$user->setID($this->session->userdata('idusuario'));
		$cliRec=$this->client_model->searchClient($cli);
		$userRec=$this->user_model->searchUser($user);
		foreach ($cliRec->result() as $row){
			$cli->setCI($row->CI);
			$cli->setNombre($row->Nombre);
			$cli->setEstado($row->Estado);
		}
		foreach ($userRec->result() as $row){
			$user->setCI($row->CI);
			$user->setNombre($row->Nombre);
			$user->setApellido($row->Apellido);
		}
		foreach(($this->sale_model->getSaleID())->result() as $row){
			$venta->setID(($row->ID)+1);
		}
		$lista=$this->product_model->listProducts();
		$data['cliente']=$cli;
		$data['vendedor']=$user;
		$data['nroVenta']=$venta->getID();
		$data['productos']=$lista;
		$nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
		if($this->session->userdata('tipo') == "Administrador"){
			$this->load->view('sidebars/admin.php');
		}else{
			$this->load->view('sidebars/vendedor.php');
		}
		$this->load->view('general/topbar.php',$top);
		$this->load->view('sales/nueva_venta.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
    }
    //lista de ventas
	public function salelist(){
		$head['valor'] = array('Administrador','Vendedor');
		$data['mensaje'] ='Lista de Ventas';
		$head['titulo'] = 'Lista de Ventas';
		if($this->session->flashdata('fechaDesde')){
			$ini = $this->session->flashdata('fechaDesde');
			$fin = $this->session->flashdata('fechaHasta');
		}else{
			$ini = date('Y-m-d');
			$fin = date('Y-m-d');
		}
		$data['fecIni'] = $ini;
		$data['fecFin'] = $fin;
		$lista=$this->sale_model->listSales($ini,$fin);
		$data['ventas']=$lista;
		$nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
        $this->load->view('general/topbar.php',$top);
		if($this->session->userdata('tipo') == 'Administrador' ||$this->session->userdata('tipo') == 1  ){
			$this->load->view('sidebars/admin.php');
		}else{
			$this->load->view('sidebars/vendedor.php');
		}
		
		$this->load->view('sales/lista_ventas.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
	}
}