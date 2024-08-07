<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {
    //función de ingreso
	public function index(){
		
        $msg=$this->uri->segment(3);
        switch($msg){
            case '1':
                $mensaje='Nombre de usuario o contraseña invalidos';
                break;
            case '2':
                $mensaje='Acceso denegado';
                break;
            case '3':
                $mensaje='Gracias por usar el sistema';
                break;
            default:
                $mensaje='Iniciar sesión';
        }
        $seg['mensaje'] = $mensaje;
        if($this->session->userdata('login')){
            redirect('sesion/panel','refresh');
        }else{
			$this->load->view('login_page/head');
			$this->load->view('login_page/login',$seg);
			$this->load->view('login_page/footer');
		}
	}
    // Validar usuario
    public function validarusuario(){
        try{
            $usuario= new Usuario();
            $usuario->setLogin($_POST['login']);
            $usuario->setPassword(md5($_POST['password']));
            $user=$this->user_model->searchUserLp($usuario);
            if ($user->num_rows()>0) {
                foreach($user->result()as $row){
                    if ($row->Estado==3) {
                        redirect('sesion/index/2','refresh');
                    } else {
                        $this->session->set_userdata('idusuario',$row->ID);
                        $this->session->set_userdata('login',$row->Login);
                        $this->session->set_userdata('tipo',$row->Tipo);
                        redirect('sesion/panel','refresh');
                    }       
                }
            } else {
                redirect('sesion/index/1','refresh');
            }
            
        }catch(Exception $e){
            echo 'Exepción capturada: ', $e->getMessage(), "\n";
        }finally{
            redirect('sesion/index','refresh');
        }
    }
    public function panel(){
        try {
            if ($this->session->userdata('login')) {
                switch($this->session->userdata('tipo')){
                    case 0:
                        redirect('menu/ven','refresh');
                        break;
                    case 1:
                        redirect('menu/adm','refresh');
                        break;
                    case 2:
                        redirect('menu/alm','refresh');
                        break;
                    default:
                        $this->session->sess_destroy();
                        redirect('sesion/index/2','refresh');
                }
            } else {
                redirect('sesion/index/2','refresh');
            }
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }finally{
            redirect('sesion/index','refresh');
        }
    }
    public function logout(){
        try{
            $this->session->sess_destroy();
            redirect('sesion/index/3','refresh');
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        } finally {
            redirect('sesion/index','refresh');
        }
    }
	
    
    
}