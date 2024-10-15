<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends CI_Controller {
	public function index(){
		switch($this->session->userdata('tipo')){
			case 1:
				redirect('menu/adm','refresh');
				break;
			case 0:
				redirect('menu/ven','refresh');
				break;
			default:
				redirect('sesion/logout','refresh');
		}
	}
	//redirige a la vista del menu del Administrador
	public function adm(){
		$head['titulo'] = 'Menú';
		$head['valor'] = array('Administrador');
		if($this->session->userdata('respuesta')){
			$data['respuesta'] = $this->session->userdata('respuesta');	
		}else{
			$data['respuesta'] = 'Sobre nosotros';
		}
		$nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
		$this->load->view('general/topbar.php',$top);
        $this->load->view('sidebars/admin.php');
		$this->load->view('menus/admin.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
	}
	//redirige a la vista del menu del Vendedor
	public function ven(){
		$head['titulo'] = 'Menú';
		$head['valor'] = array('Vendedor');
		if($this->session->flashdata('respuesta')){
			echo $this->session->flashdata('respuesta');
			$data['respuesta'] = $this->session->flashdata('respuesta');	
		}else{
			echo $this->session->flashdata('respuesta');
			$data['respuesta'] = 'Sobre nosotros';
		}
		$nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
		$this->load->view('sidebars/vendedor.php');
		$this->load->view('general/topbar.php',$top);
		$this->load->view('menus/vendedor.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
	}
	//redirige a la vista del menu del Almacen
	public function alm(){
		$head['titulo'] = 'Menú';
		$head['valor'] = array('Almacen');
		$nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
        $this->load->view('general/head.php',$head);
		$this->load->view('sidebars/almacen.php');
		$this->load->view('general/topbar.php',$top);
		$this->load->view('menus/almacen.php');
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
	}
}