<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
    public function index(){
        $head['titulo']='Usuarios';
        $head['valor']=array('Administrador');
        if ($this->session->flashdata('existe')) {
            $data['mensaje']='¡¡¡El usuario que quiere agregar ya existe!!!';
        } else {
            if ($this->session->flashdata('nuevo')) {
                $data['mensaje']='Se agrego nuevo usuario existosamente: '.$this->session->flashdata('nuevo').
				'<br>Esta es su contraseña: '.$this->session->flashdata('nuevo');
            } else {
                $data['mensaje'] ='Lista de usuarios';
            }
            
        }
        $nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$lista=$this->user_model->listUsuarios($nuevo);
		$data['usuarios'] = $lista;
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
		$this->load->view('sidebars/admin.php');
		$this->load->view('general/topbar.php',$top);
		$this->load->view('users/lista_usuarios.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');   
    }

    
}
