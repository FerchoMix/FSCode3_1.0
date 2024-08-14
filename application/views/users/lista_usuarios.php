<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
				<!-- <div class="row page-titles">
					<ol class="breadcrumb">
						
						<li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
					</ol>
                </div>-->
                <!-- row -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                
                            </div>
                            <div class="card-body">
                            <div>
                                <button  class="btn btn-rounded btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
                                    Agregar Nuevo Usuario
                                </button>
                            </div>
                            <hr>
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                
                                                <th></th>
                                                <th>Nro Carnet</th>
                                                <th>Nombre de Usuario</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Teléfono</th>
                                                <th>Estado</th>
                                                <th>Acceso</th>
                                                 <th></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($usuarios->result() as $row)
                                            {
                                            ?>
                                            <tr>
                                            <td><img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""></td>
                        <td><?php echo $row->CI; ?></td>
                        <td><?php echo $row->Login; ?></td>
                        <td><?php echo $row->Nombre; ?></td>
                        <td><?php echo $row->Apellidos; ?></td>
                        <td><?php echo $row->Telefono; ?></td>
                        <?php switch($row->Tipo){ 
                                    case 1:    
                                       $tipo='Administrador';
                                        break;
                                    case 0:
                                        $tipo='Vendedor';
                                        break;
                                    default:
                                    $tipo='';
                                    }
                                ?>
                        <td><?php echo formatoEstado($row->Estado); ?></td>
                        <td><?php echo $tipo; ?></td>
                        <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
														<a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                        </tr>
                    <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
       <!-- Large modal -->
       
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Crear Nuevo Uusario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <div class="p-4">
                                                        <?php echo form_open_multipart('user/createuser'); ?>
                                                        
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Nombres
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                        <input type="text" class="form-control form-control-user" name="nombres"
                                                                                            placeholder="Ingrese los nombres" required pattern="[ñ,Ñ,A-Z,a-z,\ ]{0,50}"
                                                                                            title="Solo letras" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                <label class="col-lg-10 col-form-label" >Apellidos
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                    <input type="text" class="form-control form-control-user" name="apellidos"
                                                                                        placeholder="Ingrese los apellidos" pattern="[ñ,Ñ,A-Z,a-z,\ ]{0,30}"
                                                                                        title="Solo letras">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Carnet de Identidad
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-12">
                                                                                        
                                                                                        <input type="text" class="form-control form-control-user" name="carnet"
                                                                                            placeholder="Ingrese el CI" required maxlength="10" pattern="[0-9,Ñ,A-Z,\-]{0,10}"
                                                                                            title="Sin letras" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Fecha de Nacimiento <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-10">
                                                                                    
                                                                                    <input type="date" class="form-control form-control-user" name="fechaNacimiento" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Correo electronico
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                        <input type="email" class="form-control form-control-user" name="email"
                                                                                            placeholder="Ingrese su correo electronico" required >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-4 col-form-label" >Genero
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-10">
                                                                                        <select class="default-select wide form-control" required >
                                                                                            <option data-display="Selecciona el genero">Selecciona una opcion</option>
                                                                                            <option value="html">M</option>
                                                                                            <option value="css">F</option>
                                                                                            <option value="css">I</option>
                                                                                            
                                                                                        </select>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-8 col-form-label" >Número de telefono
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-10">
                                                                                        <input type="text" class="form-control form-control-user" name="contacto"
                                                                                        placeholder="Ingrese el número de contacto" maxlength="8" pattern="[0-9]{0,8}"
                                                                                        title="Solo números" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Tipo de usuario
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-10">
                                                                                        <select class="default-select wide form-control" required name="tipo" >
                                                                                            <option data-display="Selecciona el tipo de usuario">Selecciona una opcion</option>
                                                                                            <option value="1">Administrador</option>
                                                                                            <option value="0">Vendedor</option>
                                                                                            <option value="2">Almacen</option>
                                                                                            
                                                                                        </select>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                            <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary btn-user">Registrar</button>
                                                            </div>
                                                        <?php echo form_close(); ?>
                                                        </div> 
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>