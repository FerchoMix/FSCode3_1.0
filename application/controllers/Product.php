<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
	public function index(){
        $head['titulo'] = 'Productos';
		$head['valor'] = array('Administrador');
		if($this->session->flashdata('existe')){
			$data['mensaje'] ='¡¡¡El producto que quiere agregar ya existe!!!';
		}else{
			if($this->session->flashdata('nuevo')){
				$data['mensaje'] ='Se agrego nuevo producto existosamente!!!';
			}else{
				$data['mensaje'] ='Lista de productos';
			}
		}
        
        
		$lista1=$this->product_model->listProducts();
        $data['marcas'] = $this->product_model->getMarcas();
        $data['categorias'] = $this->product_model->getCategorias();
		$data['productos']=$lista1;
        
        
		$nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
		
		$this->load->view('general/topbar.php',$top);
        $this->load->view('sidebars/admin.php');
		$this->load->view('products/lista_products.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
	}
    //Carga la ventana de crear producto
	public function createproduct(){
        try{
            $nuevo = new Producto();
            $nuevo->setDescripcion($_POST['descripcion']);
            $nuevo->setCategoria($_POST['categoria']);
            $nuevo->setPrecio($_POST['precio']);
            $nuevo->setMarca($_POST['marca']);
            //$nuevo->setUsuario($this->session->userdata('idusuario'));
            foreach(($this->product_model->getProductID())->result() as $row){
                $nuevo->setID(($row->ID)+1);
            }
            $nuevo->setFoto($nuevo->getID().'.jpg');
            $config['upload_path']='./upload/productos/';
            $config['file_name']=$nuevo->getFoto();
            $config['allowed_types']='jpg|jpeg';
            $config['overwrite'] = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $pros=$this->product_model->getShoeDC($nuevo);
            if($pros->num_rows()>0){
                $this->session->set_flashdata('existe',TRUE);
            }
            else{
                if(!$this->upload->do_upload('userfile')){
                    $nuevo->setFoto('CR.jpg');
                    $this->product_model->insertProduct($nuevo);
                    $data['error']=$this->upload->display_errors();
                }else{
                    $this->product_model->insertProduct($nuevo);
                    $this->upload->data();
                }
                $this->session->set_flashdata('nuevo',$nuevo->getDescripcion());
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        } finally {
            redirect('product','refresh');
        }
        }

}