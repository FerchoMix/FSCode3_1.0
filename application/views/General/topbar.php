

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">
	
        <!--**********************************
            Nav header start
        ***********************************-->

   <!--**********************************
            Nav header end
        ***********************************-->
		
		
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                FinsterSystems
								
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here...">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</li>
								
							<li class="nav-item dropdown notification_dropdown">
    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
        <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23..3333Z" fill="#717579"></path>
            <path d="M9..9819... (resto del SVG)"></path>
        </svg>
        <?php 
            $alerts = $this->session->flashdata('stock') ? count($this->session->flashdata('stock')->result(), COUNT_NORMAL) : '0'; 
        ?>
        <span class="badge light text-white bg-warning rounded-circle"><?php echo $alerts; ?></span>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
            <ul class="timeline">
                <?php if ($this->session->flashdata('stock')): ?>
                    <?php foreach($this->session->flashdata('stock')->result() as $row): ?>
                        <li>
                            <div class="timeline-panel">
                                <div class="media me-2">
                                    <div class="icon-circle bg-danger">
                                        <i class="fas fa-info text-white"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-1"><b style="color:red;"><?php echo "Comunicarse con el Administrador!!!"; ?></b></h6>
                                    <small class="d-block">El producto <?php echo $row->Producto; ?> se está terminando, solo hay: <?php echo $row->Almacen; ?></small>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>
                        <div class="timeline-panel">
                            <div class="media-body text-center">
                                No hay alertas.
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <a class="all-notification" href="<?PHP ECHO BASE_URL(); ?>index.php/product">Ver todas las alertas <i class="ti-arrow-end"></i></a>
    </div>
</li>

								
							
							
							
							
							<li class="nav-item dropdown  header-profile">
							
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="<?php echo base_url('upload/usuarios/'.$this->session->userdata('foto')); ?>"  width="56" alt="">
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="" data-bs-target="#modalPerfil" data-bs-toggle="modal" class="dropdown-item ai-icon"> 
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
										<span class="ms-2">Profile </span>
									</a>
									<a href="email-inbox.html" class="dropdown-item ai-icon">
										<svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M19.43 12.98c.06-.32.07-.65.07-.98s-.01-.66-.07-.98l2.03-1.57c.19-.15.24-.42.13-.64l-2-3.46c-.11-.21-.34-.29-.56-.23l-2.36.93c-.55-.43-1.16-.79-1.83-1.05l-.36-2.59C15.07 2 14.67 2 14.35 2H9.65C9.33 2 9.03 2 8.91 2.43l-.36 2.59c-.67.26-1.28.62-1.83 1.05l-2.36-.93c-.22-.06-.45.02-.56.23l-2 3.46c-.11.22-.06.49.13.64l2.03 1.57c-.06.32-.07.65-.07.98s.01.66.07.98l-2.03 1.57c-.19.15-.24.42-.13.64l2 3.46c.11.21.34.29.56.23l2.36-.93c1 .78 2 .99 3 .99s2-.21 3-1l2.36 .93c .22 .06 .45 -.02 .56 -.23l2 -3 .46c .11 -.22 .06 -.49 -.13 -.64z"></path>
										</svg>
										<span class="ms-2">Configuracion </span>
									</a>
									<a href="" data-bs-toggle="modal" data-bs-target="#logoutModal" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
										<span class="ms-2">Cerrar Sesion</span>
									</a>
								</div>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
	
		
		
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
      <!-- Large modal perfil -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalPerfil">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Perfil del Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row text-center mb-4">
                    <div class="col-lg-12">
                        <img class="img-profile rounded-circle" width="150" height="150"
                             src="<?php echo base_url('upload/usuarios/'.$this->session->userdata('foto')); ?>" alt="Foto de Perfil">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <?php foreach($perfil->result() as $row) { ?>
                            <div class="mb-3">
                                <b>Nombre de Usuario:</b>
                                <h6><?php echo $row->Login; ?></h6>
                            </div>
                            <div class="mb-3">
                                <b>Nombre Completo:</b>
                                <h6><?php echo ($row->Nombre) . ' ' . ($row->Apellido); ?></h6>
                            </div>
                            <div class="mb-3">
                                <b>Carnet de Identidad:</b>
                                <h6><?php echo $row->CI; ?></h6>
                            </div>
                            <div class="mb-3">
                                <b>Fecha de Nacimiento:</b>
                                <h6><?php echo formatoFechaHoraVista($row->Fecha); ?></h6>
                            </div>
                            <div class="mb-3">
                                <b>Contacto:</b>
                                <h6><?php echo $row->Telefono; ?></h6>
                            </div>
                        <?php } ?>
                    </div>

                    <!-- New column for buttons -->
                    <div class="col-lg-4 text-center">
                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#cambiarContrasenaModal">Cambiar Contraseña</button>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#cambiarFotoModal">Cambiar Foto de Perfil</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Volver</button>
                
            </div>
        </div>
    </div>
</div>
<!-- Modal for Change Password -->
<div class="modal fade" id="cambiarContrasenaModal" tabindex="-1" aria-labelledby="cambiarContrasenaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cambiarContrasenaLabel">Cambiar Contraseña</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
			
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="p-4">
                            <?php echo form_open_multipart('user/updatepass'); ?>
                            <div class='col-sm-12 mb-3 mb-sm-0'>
                                <b>Contraseña Actual:</b>
                                <input type="password" class="form-control" name="actual" required
                                    placeholder="Ingrese contraseña actual">
                                <br>
                                <b>Nueva Contraseña:</b>
                                <input type="password" class="form-control" name="nueva" required
                                    placeholder="Ingrese contraseña nueva" pattern="{8,16}" title="Contraseña con minimo 8 caracteres">
                                    <br>
                                <b>Repite la Contraseña:</b>
                                <input type="password" class="form-control" name="repetido" required
                                    placeholder="Repita la contraseña" pattern="{8,16}" title="Contraseña con minimo 8 caracteres">
                                </div>
                            <hr>
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="sumbit" class="btn btn-primary">Guardar Cambios</button>
            </div>
			<?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- Modal for Change Profile Photo -->
<div class="modal fade" id="cambiarFotoModal" tabindex="-1" aria-labelledby="cambiarFotoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cambiarFotoLabel">Cambiar Foto de Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
			<?php echo form_open_multipart('user/updatephoto'); ?>
            <div class="modal-body">
			<div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="p-4">
                            
                            <div class='col-sm-12 mb-3 mb-sm-0'>
                                <b>Nueva foto:</b>
                                <input type="file" name="userfile" accept=".jpg,.png,.jpeg" required>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
				
            </div>
			<?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- End of Large modal perfil -->

