<div class="nav-header">
    <a href="<?php echo base_url(); ?>index.php/menu/adm" class="brand-logo">
        <svg class="logo-abbr" width="55" height="55" viewbox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z" fill="url(#paint0_linear)"></path>
            <defs></defs>
        </svg>
        <div class="brand-title">
            <h2 class="">Administrador</h2>
            <span class="brand-sub-title"></span>
        </div>
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<hr>
<!--**********************************
            Sidebar start
***********************************-->
<div class="dlabnav">
    
    <div class="dlabnav-scroll" id="sidebarsAdmin">
        <ul class="metismenu" id="menu">
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <span class="nav-text">Usuarios</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="collapse-item" href="<?php echo base_url(); ?>index.php/user/index">Ver Usuarios</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-box"></i>
                    <span class="nav-text">Productos</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="collapse-item" href="<?php echo base_url(); ?>index.php/product/index">Ver Productos</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span class="nav-text">Ventas</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="collapse-item" href="<?php echo base_url(); ?>index.php/sale/salelist">Ver Ventas</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">Clientes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="collapse-item" href="<?php echo base_url(); ?>index.php/client">Ver Clientes</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-fw fa-truck-loading"></i>
                    <span class="nav-text">Inventarios</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="collapse-item" href="<?php echo base_url(); ?>index.php/buy/buylist">Ver Entradas</a></li>
                </ul>
            </li>
        </ul>

        <!-- Espaciado -->
        <br>

        <!-- Información de derechos de autor -->
        <div class="copyright" >
            <p><strong >Finster Systems</strong> © 2024</p>
            <p class="fs-12">Hecho con <span class="heart"></span> by FerchoMix</p>
        </div>

    </div> <!-- Cierre del dlabnav-scroll -->
</div> <!-- Cierre del dlabnav -->
