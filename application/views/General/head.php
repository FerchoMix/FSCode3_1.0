<?php
// Camuflador para no ingresar a las direcciones
if (!$this->session->userdata('login')) {
    redirect('sesion/index', 'refresh'); // Redirige a la página de inicio de sesión si no está logueado
} else {
    // Obtiene el tipo de usuario
    $tipoUsuario = $this->session->userdata('tipo');
    
    // Verifica si ya estás en la página correcta
    $currentUrl = uri_string(); // Obtiene la URL actual
// Justo antes del switch en el head
echo "Estado de login: " . var_export($this->session->userdata('login'), true) . "\n";
echo "Tipo de usuario: " . var_export($this->session->userdata('tipo'), true) . "\n";

    switch ($tipoUsuario) {
        case 0: // Vendedor
            if ($currentUrl !== 'menu/ven') {
                redirect('menu/ven', 'refresh');
            }
            break;
        case 1: // Administrador
            if ($currentUrl !== 'menu/adm') {
                redirect('menu/adm', 'refresh');
            }
            break;
        case 2: // Almacén
            if ($currentUrl !== 'menu/alm') {
                redirect('menu/alm', 'refresh');
            }
            break;
        default:
            $this->session->sess_destroy(); // Destruye la sesión si el tipo no es válido
            redirect('sesion/index/3', 'refresh'); // Redirige a la página de error
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title><?PHP ECHO ($titulo)?></title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="<?PHP ECHO BASE_URL(); ?>/Template/images/favicon.png">

    <!-- Stylesheets -->
    <link href="<?PHP ECHO BASE_URL(); ?>/Template/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="<?PHP ECHO BASE_URL(); ?>/Template/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="<?PHP ECHO BASE_URL(); ?>/Template/vendor/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="<?PHP ECHO BASE_URL(); ?>/Template/vendor/select2/css/select2.min.css">
    
	<link href="<?PHP ECHO BASE_URL(); ?>Template/css/style.css" rel="stylesheet">
	<link href="<?PHP ECHO BASE_URL(); ?>Template/css/adicional.css" rel="stylesheet">
    
    <!-- Datatable -->
    <link href="<?PHP ECHO BASE_URL(); ?>/Template/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</head>
<body>
