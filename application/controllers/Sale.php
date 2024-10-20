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
		$data['sucursales'] = $this->sale_model->getSucursales();
		$nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
		if($this->session->userdata('tipo') == "Administrador" || $this->session->userdata('tipo') == 1){
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
	//Carga la ventana de crear ventas
    public function createsale(){
		try{
			$ven = new Venta();
			$ven->setID($_POST['nroVenta']);
			$ven->setTotal($_POST['totalPagar']);
			$ven->setCantidad($_POST['cantidadTotal']);
			$ven->setSucursal($_POST['sucursal']);
			$ven->setUsuario($this->session->userdata('idusuario'));
			$ven->setCliente($_POST['idCli']);
			$this->sale_model->insertSale($ven);
			$arreglo = explode(",",$_POST['arregloPro']);
			$glosas = explode(",",$_POST['arregloGlo']);
			$cantidades = explode(",",$_POST['arregloCan']);
			$preciosUni = explode(",",$_POST['arregloUni']);
			$importes = explode(",",$_POST['arregloImp']);
			$tam = count($arreglo);
			for($i=0;$i<$tam;$i++){
				$det = new Detalle();
				$det->setGlosa($glosas[$i]);
				$det->setProductos($cantidades[$i]);
				$det->setPrecio($preciosUni[$i]);
				$det->setImporte($importes[$i]);
				$det->setVenta($ven->getID());
				$det->setProducto($arreglo[$i]);
				$this->sale_model->insertDetail($det);
				$this->product_model->updateWhare($det,1);
			}
			$this->session->set_flashdata('Venta',$ven->getID());
			$this->session->set_flashdata('Usuario',$this->session->userdata('idusuario'));
			$this->session->set_flashdata('Cliente',$ven->getCliente());
			$this->session->set_flashdata('Desde',TRUE);
			$lista = $this->sale_model->getStock();
			$this->session->set_flashdata('stock',$lista);
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		} finally {
			redirect('sale/sold','refresh');
		}
	}
	//reestablecer la venta
	public function resetsale(){
		redirect('sale/vendido','refresh');
	}
	public function resettosales(){
		redirect('sale/saleList','refresh');
	}
	public function resettoclient(){
		redirect('client/index','refresh');
	}
	//imprimir venta
	public function printsale(){
		$venta = new Venta();
		$venta->setID($_POST["nroVenta"]);
		$cliente =$_POST["cliente"];
		$ci =$_POST["cicliente"];
		$venRec=$this->sale_model->searchSale($venta);
		$lista=$this->sale_model->listDetails($venta);
		$pdf = new FPDF();
		$pdf->AddPage("L");
		$pdf->Cell(0,7,"",0);
		$pdf->Ln();
		$pdf->Image(base_url().'Template/images/logo.jpeg', 100, 100, 100);
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(50,7,"",0);
		$pdf->Ln();
		$pdf->Cell(0,8,"FACTURA",0,0,'C');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(20,7,"",0);
		$pdf->Cell(60,8,"FECHA:",0,0);
		$pdf->SetFont('Arial','',12);
		foreach ($venRec->result() as $row){
			$pdf->Cell(20,8,formatoFechaHoraVista(date('Y-m-d H:i:s')),0,0);
		}
		$pdf->Ln();
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(20,7,"",0);
		$pdf->Cell(60,8,"CLIENTE / RAZON SOCIAL:",0,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(110,8,$cliente,0,0);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(20,8,"CI/NIT:",0,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(20,8,$ci,0,0);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(20,7,"",0);
		$pdf->Cell(100,8,"DESCRIPCION",1);
		$pdf->Cell(50,8,"GLOSA",1);
		$pdf->Cell(25,8,"CANTIDAD",1);
		$pdf->Cell(25,8,"P/UNITARIO",1);
		$pdf->Cell(25,8,"SUBTOTAL",1,0,'R');
		$pdf->Ln();
		$pdf->SetFont('Arial','',11);
		foreach ($lista->result() as $row){
			$pdf->Cell(20,7,"",0);
			$pdf->Cell(100,7,$row->Producto,1);
			$pdf->Cell(50,7,$row->Glosa,1);
			$pdf->Cell(25,7,$row->Cantidad,1,0,'R');
			$pdf->Cell(25,7,$row->Unitario,1,0,'R');
			$pdf->Cell(25,7,$row->Importe,1,0,'R');
			$pdf->Ln();
		}
		$formatter = new NumeroALetras();
		$pdf->SetFont('Arial','B',11);
		foreach ($venRec->result() as $row){
			$client = $row->Total;
			$resultado = $row->Total;
			$letras = (string)$row->Total;
			$decimal = substr($resultado, -2);
			$entero = round($resultado, 0, PHP_ROUND_HALF_DOWN);
			$pdf->Cell(20,8,"",0);
			$pdf->Cell(150,8,"",0,0,"C");
			$pdf->Cell(50,8,"MONTO A PAGAR (Bs.)",1,0,"C");
			$pdf->Cell(25,8,$row->Total,1,0,'R');
			$pdf->Ln();
			$pdf->Cell(20,8,"",0);
			$pdf->Cell(150,8,"Son: ".$formatter->toMoney($entero).' '.$decimal."/100 Bolivianos",0,0,'');
		}
		$pdf->Output();
	}
	//vendido
	public function sold(){
		$head['valor'] = array('Administrador','Vendedor');
		$data['mensaje'] ='Visualizar Venta';
		$head['titulo'] = 'Ventas';
		$cli = new Cliente();
		$user = new Usuario();
		$venta = new Venta();
		if($this->session->flashdata('Desde')){
			$cli->setID($this->session->flashdata('Cliente'));
			$user->setID($this->session->flashdata('Usuario'));
			$venta->setID($this->session->flashdata('Venta'));
		}else{
			$cli->setID($_POST['Cliente']);
			$user->setID($_POST['Usuario']);
			$venta->setID($_POST['ID']);
		}
		$cliRec=$this->client_model->searchClient($cli);
		$userRec=$this->user_model->searchUser($user);
		$venRec=$this->sale_model->searchSale($venta);
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
		foreach ($venRec->result() as $row){
			$venta->setTotal($row->Total);
			$venta->setCantidad($row->Cantidad);
			$venta->setSucursal($row->Sucursal);
			$venta->setFecha($row->Fecha);
		}
		$lista=$this->sale_model->listDetails($venta);
		$data['cliente']=$cli;
		$data['vendedor']=$user;
		$data['venta']=$venta;
		$data['detalle']=$lista;
		$nuevo = new Usuario();
		$nuevo->setID($this->session->userdata('idusuario'));
		$perfiles=$this->user_model->getPerfil($nuevo);
		$top['perfil'] = $perfiles;
		$lista = $this->sale_model->getStock();
		$this->session->set_flashdata('stock',$lista);
		$this->load->view('general/head.php',$head);
		if($this->session->userdata('tipo') == "Administrador"||$this->session->userdata('tipo') ==1){
			$this->load->view('sidebars/admin.php');
		}else{
			$this->load->view('sidebars/vendedor.php');
		}
		$this->load->view('general/topbar.php',$top);
		$this->load->view('sales/vendido.php',$data);
		$this->load->view('general/footer.php');
		$this->load->view('general/scripts.php');
    }
	public function printfilesale(){
		$ini = $_POST["ini2"];
		$fin = $_POST["fin2"];
		$lista=$this->sale_model->listSales($ini,$fin);
		$pdf = new FPDF();
		$pdf->AddPage("L");
		$pdf->Image(base_url().'Template/images/logo.jpeg', 100, 100, 100);
		//$pdf->Image(base_url().'Template/images/finster.jpeg', 235, 5, -300);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(50,7,"",0);
		$pdf->Ln();
		$pdf->Cell(0,8,"REPORTE DE VENTAS DESDE EL:  ".formatoFechaHoraVista($ini)."  HASTA  ".formatoFechaHoraVista($fin),0,0,'C');
		$pdf->SetFont('Arial','B',11);
		$cantidad = 0;
        $total = 0;
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(20,7,"",0);
		$pdf->Cell(10,8,"ID",1);
		$pdf->Cell(50,8,"Cliente",1);
		$pdf->Cell(40,8,"Fecha",1);
		$pdf->Cell(35,8,"Sucursal",1);
		$pdf->Cell(20,8,"Cantidad",1);
		$pdf->Cell(20,8,"Total (Bs)",1,0,'R');
		$pdf->Cell(50,8,"Vendedor",1);
		$pdf->Ln();
		$pdf->SetFont('Arial','',11);
		foreach ($lista->result() as $row){
			$pdf->Cell(20,7,"",0);
			$pdf->Cell(10,7,$row->ID,1);
			$pdf->Cell(50,7,$row->Cliente,1);
			$pdf->Cell(40,7,formatoFechaHoraVista($row->Fecha),1);
			$pdf->Cell(35,7,$row->Sucursal,1);
			$pdf->Cell(20,7,$row->Cantidad,1,0,'R');
			$pdf->Cell(20,7,$row->Total,1,0,'R');
			$pdf->Cell(50,7,$row->NomUsu." ".$row->ApeUsu,1);
			$pdf->Ln();
			$cantidad = $cantidad + (int)$row->Cantidad;
			$total = $total + (int)$row->Total;
		}
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(20,7,"",0);
		$pdf->Cell(135,8,"TOTAL",1,0,'C');
		$pdf->Cell(20,8,$cantidad,1,0,'R');
		$pdf->Cell(20,8,$total,1,0,'R');
		$pdf->Cell(50,8,"",1);
		$pdf->Output();
	}
	public function resetfilesale(){
		$this->session->set_flashdata('fechaDesde',$_POST["ini1"]);
		$this->session->set_flashdata('fechaHasta',$_POST["fin1"]);
		redirect('sale/salelist','refresh');
	}
}