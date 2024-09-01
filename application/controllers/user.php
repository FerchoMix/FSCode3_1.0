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
        $this->load->view('general/topbar.php',$top);
		$this->load->view('sidebars/admin.php');	
		$this->load->view('users/lista_usuarios.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');   
    }
    public function index2(){
        $head['titulo']='Usuarios';
        $head['valor']=array('Administrador');
        $nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$lista=$this->user_model->listUsuariosD($nuevo);
		$data['usuarios'] = $lista;
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
        $this->load->view('general/topbar.php',$top);
		$this->load->view('sidebars/admin.php');
		$this->load->view('users/lista_usuariosBaja.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');   
    }
    
    public function createuser(){
            try{
            $nuevo = new Usuario();
            $nuevo->setApellido($_POST['apellidos']);
            $nuevo->setNombre($_POST['nombres']);
            $nuevo->setCI($_POST['carnet']);
            $nuevo->setFechaNacimiento($_POST['fechaNacimiento']);
            $nuevo->setTelefono($_POST['contacto']);
            $nuevo->setTipo($_POST['tipo']);
            $nuevo->setLogin(strtolower(substr($_POST['nombres'],0,3)).$_POST['carnet']);
            $nuevo->setPassword(md5($nuevo->getLogin()));
            $nuevo->setUsuario($this->session->userdata('idusuario'));
            $nuevo->setFoto($this->session->userdata('foto'));
            $nuevo->setEmail($_POST['correo']);
            $nuevo->setGenero($_POST['gen']);
            $users=$this->user_model->getUsersCi($nuevo);
            
            
            if($users->num_rows()>0){
                $this->session->set_flashdata('existe',TRUE);
                
            }else{
                $this->user_model->insertUser($nuevo);
                $this->session->set_flashdata('nuevo',$nuevo->getLogin());
            }
            redirect('user/index','refresh');
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        } finally {
            redirect('user','refresh');
        }
    } 
    //Carga el popup de Modificar Usuario
	public function updateuser(){
		try{
			$nuevo = new Usuario();
			$nuevo->setApellido($_POST['apellidos']);
			$nuevo->setNombre($_POST['nombres']);
			$nuevo->setCI($_POST['carnet']);
			$nuevo->setFechaNacimiento($_POST['fechaNacimiento']);
			$nuevo->setTelefono($_POST['contacto']);
			$nuevo->setTipo($_POST['tipo']);
			$nuevo->setID($_POST['ID']);
			$nuevo->setEstado(2);
            $nuevo->setEmail($_POST['correo']);
            $nuevo->setGenero($_POST['gen']);
			$nuevo->setUsuario($this->session->userdata('idusuario'));
			$this->user_model->updateUser($nuevo);
			redirect('user/index','refresh');
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		} finally {
			redirect('user','refresh');
		}
	}
    //Eliminar usuario logicamente
	public function deleteuser(){
		try{
			$user = new Usuario();
			$user->setID($_POST['ID']);
			$user->setEstado(5);
			$this->user_model->deleteUser($user);
			redirect('user/index','refresh');
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		} finally {
			redirect('user','refresh');
		}
	}
	//Deshabilitar usuario 
	public function unableuser(){
		try{
			$user = new Usuario();
			$user->setID($_POST['ID']);
			$user->setEstado(3);
			$this->user_model->deleteUser($user);
			redirect('user/index','refresh');
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		} finally {
			redirect('user','refresh');
		}
	}
    public function enableuser(){
		try{
			$user = new Usuario();
			$user->setID($_POST['ID']);
			$user->setEstado(4);
			$this->user_model->deleteUser($user);
			redirect('user/index','refresh');
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		} finally {
			redirect('user','refresh');
		}
	}
    
}
