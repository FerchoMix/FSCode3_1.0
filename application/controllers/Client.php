<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends CI_Controller {
	public function index()
    {
        $head['titulo'] = 'Clientes';
		$head['valor'] = array('Administrador','Vendedor');
		if($this->session->flashdata('existe')){
			$data['mensaje'] ='¡¡¡El cliente que quiere agregar ya existe!!!';
		}else{
			if($this->session->flashdata('nuevo')){
				$data['mensaje'] ='Se agrego nuevo cliente existosamente: '.$this->session->flashdata('nuevo');
			}else{
				$data['mensaje'] ='Lista de clientes';
			}
		}
		$lista=$this->client_model->listClientes();
		$data['clientes']=$lista;
		$nuevo = new Cliente();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
        $this->load->view('general/topbar.php',$top);
		if($this->session->userdata('tipo')=='Administrador'){
			$this->load->view('sidebars/admin.php');
		}else{
			$this->load->view('sidebars/vendedor.php');
		}
		
		$this->load->view('clients/lista_clientes.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
    }
}