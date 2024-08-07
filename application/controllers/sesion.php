<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {
    //función de ingreso
	public function index(){
		
			$this->load->view('login_page/head');
			$this->load->view('login_page/login');
			$this->load->view('login_page/footer');
		}
	
    
    
}