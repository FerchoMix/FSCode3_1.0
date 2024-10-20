<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
    
	public function createuser() {
		try {
			$nuevo = new Usuario();
			// Establecer detalles del usuario
			$nuevo->setApellido($_POST['apellidos']);
			$nuevo->setNombre($_POST['nombres']);
			$nuevo->setCI($_POST['carnet']);
			$nuevo->setFechaNacimiento($_POST['fechaNacimiento']);
			$nuevo->setTelefono($_POST['contacto']);
			$nuevo->setTipo($_POST['tipo']);
	
			// Crear login y contraseña
			$login = strtolower(substr($_POST['nombres'], 0, 3)) . $_POST['carnet'];
			$nuevo->setLogin($login);
			$password1=$login;
			$password = md5($login); // Considera usar un algoritmo de hash más fuerte
			$nuevo->setPassword($password);
	
			// Establecer otros detalles del usuario
			$nuevo->setUsuario($this->session->userdata('idusuario'));
			$nuevo->setFoto($this->session->userdata('foto'));
			$nuevo->setEmail($_POST['correo']);
			$nuevo->setGenero($_POST['gen']);
	
			// Verificar si el usuario ya existe
			$users = $this->user_model->getUsersCi($nuevo);
			
			if ($users->num_rows() > 0) {
				$this->session->set_flashdata('existe', TRUE);
				redirect('user/index', 'refresh');
				return;
			} else {
				// Insertar nuevo usuario en la base de datos
				$this->user_model->insertUser($nuevo);
				$this->session->set_flashdata('nuevo', $login);
	
				// Enviar credenciales al correo del usuario
				if ($this->sendCredentials($_POST['correo'], $login, $password1)) {
					$this->session->set_flashdata('email_sent', TRUE);
				} else {
					$this->session->set_flashdata('email_failed', TRUE);
				}
			}
	
			redirect('user/index', 'refresh');
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		} finally {
			redirect('user', 'refresh');
		}
	}
	
	private function sendCredentials($email, $login, $password) {
		
	
		require 'vendor/autoload.php'; // Ajusta la ruta si no usas Composer
	
		$mail = new PHPMailer(true); // Crear una instancia de PHPMailer
	
		try {
			// Configuración del servidor SMTP
			$mail->isSMTP(); // Establecer el uso de SMTP
			$mail->Host = 'smtp.gmail.com'; // Especificar el servidor SMTP
			$mail->SMTPAuth = true; // Habilitar autenticación SMTP
			$mail->Username = 'finstersystems2024@gmail.com'; // Tu dirección de correo
			$mail->Password = 'vzwq ewfu oaxr lytp'; // Tu contraseña
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilitar encriptación TLS
			$mail->Port = 587; // Puerto TCP a usar
	
			// Remitente y destinatario
			$mail->setFrom('finsterSystems2024@gmail.com', 'Tu Nombre');
			$mail->addAddress($email, 'Nombre Destinatario'); // Añadir un destinatario
	
			// Contenido del correo
			$mail->isHTML(true); // Establecer formato HTML
			$mail->Subject = 'Tus Credenciales de Cuenta';
			$message = "Hola,\n\nTu cuenta ha sido creada exitosamente.\n\n";
			$message .= "Usuario: " . $login . "\n";
			// Nota: Podrías querer enviar la contraseña en texto plano en lugar de la versión hasheada.
			$message .= "Contraseña: ".$password . "\n\n"; 
			$message .= "Saludos cordiales,\nTu Equipo";
			
			$mail->Body    = nl2br($message); // Convertir saltos de línea a <br>
			$mail->AltBody = strip_tags($message); // Contenido alternativo sin HTML
	
			$mail->send();
			return true; // El correo se envió correctamente
		} catch (Exception $e) {
			echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
			return false; // El correo no se envió
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
    //Cambiar foto
	public function updatephoto(){
		try{
			$nuevo = new Usuario();
			$nuevo->setID($this->session->userdata('idusuario'));
			$nuevo->setUsuario($this->session->userdata('idusuario'));
			$nuevo->setFoto($nuevo->getID().'.jpg');
			$config['upload_path']='./upload/usuarios';
			$config['file_name']=$nuevo->getFoto();
			$config['allowed_types']='jpg|jpeg|png';
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('userfile')){
				$data['error']=$this->upload->display_errors();
				log_message('error', 'Error en la carga: ' . $data['error']);
			}else{
				$this->user_model->updatePhoto($nuevo);
				$this->session->set_userdata('foto',$nuevo->getFoto());
				$this->upload->data();
			}
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		} finally {
			redirect('menu','refresh');
		}
		}
		//cambiar contraseña
		public function updatepass(){
		try{
			$user = new Usuario();
			$user->setPassword($_POST['actual']);
			$user->setID($this->session->userdata('idusuario'));
			$rec = $this->user_model->searchPassword($user);
			$nueva = $_POST['nueva'];
			$repetido = $_POST['repetido'];
			if($nueva == $repetido){
				if($rec->num_rows()>0){
					$this->session->set_userdata('respuesta',"Su contraseña fue cambiada exitosamente");
					$this->user_model->changePassword($user,md5($nueva));
				}else{
					$this->session->set_userdata('respuesta',"Contraseña actual incorrecta, comuniquese con el administrador");
				}
			}else{
				$this->session->set_userdata('respuesta',"Los campos nuevos no coinciden");
			}
			redirect('menu','refresh');
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		} finally {
			redirect('menu','refresh');
		}
		}
	
}
