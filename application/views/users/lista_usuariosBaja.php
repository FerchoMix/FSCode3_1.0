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
                            <!--<h4 class="m-0 font-weight-bold text-dark"><?php echo($mensaje)?></h4>-->
                            </div>
                            <div class="card-body">
                            <div>
                                
                                <a class="btn btn-rounded btn-success" type="button"  href="<?PHP echo base_url(); ?>index.php/user/index">Usuarios Habilitados</a>
                                
                            </div>
                            <hr>
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                            <tr>
                                                <th>Perfil</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Teléfono</th>
                                                <th>Rol</th>
                                                <th>Genero</th>
                                                <th>Email</th>
                                                 <th>Acciones</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($usuarios->result() as $row)
                                            {
                                            ?>
                                            <tr>
                                            <td><img class="rounded-circle" width="35" src="<?PHP ECHO BASE_URL(); ?>upload/usuaios/<?php echo $row->Foto; ?>" alt=""></td>
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
                                            <td><?php echo $tipo; ?></td>
                                            <td><?php echo $row->Genero; ?></td>
                                            <td><?php echo $row->Email; ?></td>
                        <td>                        
                            
													<div class="d-flex">
														
                                                       
														<button type="submit" class="btn btn-success shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#habilitarUsuario<?php echo $row->ID; ?>"><i class="fas fa-user-check"></i></button>
                                                        <button type="submit" class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#eliminarUsuario<?php echo $row->ID; ?>"><i class="fas fa-trash-alt"></i></button>
                                                        
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
        
                                 <!-- Modal Deshabilitar--> 
                                 <?php foreach ($usuarios->result() as $row){ ?>
                                    <div class="modal fade" id="habilitarUsuario<?php echo $row->ID; ?>" >
                                        <div class="modal-dialog modal-dialog-centered" role="dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <?php echo form_open_multipart('user/enableuser'); ?>
                                                        <div>    
                                                            <input type="hidden" name="ID" value="<?php echo $row->ID; ?>">
                                                        </div>
                                                <div class="modal-body">
                                                    <h3>¿Estas seguro de habilitar al usuario?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Si</button>
                                                </div>
                                                <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                <!--End Modal Deshabilitar-->    
                                 <!-- Button trigger modal 
                                 <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#eliminarUsuario<?php echo $row->ID; ?>">Modal centered</button> -->
                                    <!-- Modal Eliminar--> 
                                    <?php foreach ($usuarios->result() as $row){ ?>
                                    <div class="modal fade" id="eliminarUsuario<?php echo $row->ID; ?>" >
                                        <div class="modal-dialog modal-dialog-centered" role="dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <?php echo form_open_multipart('user/deleteuser'); ?>
                                                        <div>    
                                                            <input type="hidden" name="ID" value="<?php echo $row->ID; ?>">
                                                        </div>
                                                <div class="modal-body">
                                                    <h3>¿Estas seguro de eliminar al usuario del sistema?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Si</button>
                                                </div>
                                                <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>