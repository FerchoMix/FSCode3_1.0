<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {
	public function index(){
		$head['titulo'] = 'Inventario';
		$head['valor'] = 'Almacen';
		if($this->session->flashdata('existe')){
			$data['mensaje'] ='¡¡¡El nuevo registro que quiere agregar ya existe!!!';
		}else{
			if($this->session->flashdata('nuevo')){
				$data['mensaje'] ='Se agrego nuevo registro existosamente!!!';
			}else{
				$data['mensaje'] ='Registro de Stock';
			}
		}
		$lista1=$this->stock_model->listStocks();
		$lista2=$this->shop_model->listShops();
		$lista3=$this->product_model->listProducts();
		$data['inventarios']=$lista1;
		$data['sucursales']=$lista2;
		$data['productos']=$lista3;
		$this->load->view('general/head.php',$head);
		$this->load->view('general/topbar.php');
        $this->load->view('almacen/sidebar.php');
		$this->load->view('stocks/lista_inventarios.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
	}