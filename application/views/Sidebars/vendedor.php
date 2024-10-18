<div class="nav-header">
    <a href="<?php echo base_url(); ?>index.php/menu/ven" class="brand-logo">
        <img class="img-profile rounded-circle" src="<?php echo base_url('Template/images/logo.jpg'); ?>" width="70" alt="">
        <div class="brand-title">
            <h2 class="">Vendedor</h2>
            <span class="brand-sub-title"></span>
        </div>
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>

<!--**********************************
            Sidebar start
***********************************-->
<div class="dlabnav">
    <div class="dlabnav-scroll" id="sidebarsAdmin">
        <ul class="metismenu" id="menu">
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
        </ul>

        <!-- Espaciado -->
        <br><br>

        <!-- Información de derechos de autor -->
        <div class="copyright">
            <p><strong>Finster Systems</strong> © 2024</p>
            <p class="fs-12">Hecho con <span class="heart"></span> by FerchoMix</p>
        </div>

    </div> <!-- Cierre del dlabnav-scroll -->
</div> <!-- Cierre del dlabnav -->
