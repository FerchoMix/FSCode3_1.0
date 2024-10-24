<!--Content body start-->
        <div class="content-body">
            <div class="container-fluid">
				
                <!-- row -->
                    <div class="col-12">
                        <div class="card">
                                <div class="card-header">
                                    <h4 class="m-0 font-weight-bold text-dark"><?php echo($mensaje)?></h4>
                                </div>
                            <div class="card-body">
                                <div>
                                    <button  class="btn btn-rounded btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#crearNuevoCliente">
                                        Agregar Nuevo Cliente
                                    </button>
                                    
                                    
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>CiNit</th>
                                                <th>Razón Social</th>
                                                <th>Direccion</th>
                                                <th>Contacto</th>
                                                <th>Estado</th>
                                                <th>Vender</th>
                                                <th></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($clientes->result() as $row)
                                            {
                                            ?>
                                            <tr>
                                            <td><?php echo $row->CiNit; ?></td>
                                            <td><?php echo $row->RazonSocial; ?></td>
                                            <td><?php echo $row->Direccion; ?></td>
                                            <td><?php echo $row->Contacto; ?></td>
                                            <td><?php echo formatoEstado($row->Estado); ?></td>
                                            <td>
                                            <?php if($row->Estado==3){ $dis='disabled'; }else{ $dis=''; } ?>
                                                <?php echo form_open_multipart('sale/index'); ?>
                                                <input type="hidden" name="ID" value="<?php echo $row->ID; ?>">
                                                <button type="submit" class="btn btn-primary shadow btn-sm sharp" data-toggle="modal" <?php echo($dis) ?>>
                                                    <i class="fas fa-shopping-basket"></i>
                                                </button>
                                                <?php echo form_close(); ?>
                                            </td>
                                            <td>                        
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-primary shadow btn-sm sharp me-1" data-bs-toggle="modal" data-bs-target="#modificarCliente<?php echo $row->ID; ?>"><i class="fas fa-pencil-alt"></i></button>
                                                    <button type="button" class="btn btn-danger shadow btn-sm sharp" data-bs-toggle="modal" data-bs-target="#deshabilitarCliente<?php echo $row->ID; ?>"><i class="fas fa-user-times"></i></button>
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
       
        
        <!-- Modal Crear Usuario-->
       <!-- Large modal -->
       
       <div class="modal fade" id="crearNuevoCliente" tabindex="-1" role="dialog" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Crear Nuevo Cliente</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <div class="p-4">
                                                        <?php echo form_open_multipart('client/createclient'); ?>
                                                        
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Razon Social
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                        <input type="text" class="form-control form-control-user" name="razonSocial"
                                                                                            placeholder="Razon Social" required pattern="[0-9,ñ,Ñ,A-Z,a-z,\ ]{0,50}"
                                                                                            title="" >
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Ci o Nit
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-12">
                                                                                        
                                                                                        <input type="text" class="form-control form-control-user" name="ciNit"
                                                                                            placeholder="Ingrese el ciNit" required maxlength="30" pattern="[0-9,Ñ,A-Z,\-]{0,10}"
                                                                                            title="Sin letras" >
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                
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
                                                                                    <label class="col-lg-10 col-form-label" >Direccion
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                        <input type="text" class="form-control form-control-user" name="direccion"
                                                                                            placeholder="Direccion" required pattern="[0-9,ñ,Ñ,A-Z,a-z,\ ]{0,50}"
                                                                                            title="" >
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
                                    <!-- End Modal Crear Usuario -->
<                                <!-- Large modal -->
<?php foreach($clientes->result() as $row)
                                            {
                                            ?>
       <div class="modal fade" id="modificarCliente<?php echo $row->ID; ?>" tabindex="-1" role="dialog" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modificar Cliente</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                    </div>
                                                    <?php echo form_open_multipart('client/updateclient'); ?>
                                                        <div>    
                                                            <input type="hidden" name="ID" value="<?php echo $row->ID; ?>">
                                                        </div>
                                                    <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <div class="p-4">
                                                       
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Razon Social
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                        <input type="text" class="form-control form-control-user" name="razonSocial"
                                                                                            placeholder="Razon Social" required pattern="[0-9,ñ,Ñ,A-Z,a-z,\ ]{0,50}"
                                                                                            title="" value="<?php echo $row->RazonSocial; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Ci o Nit
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-12">
                                                                                        
                                                                                        <input type="text" class="form-control form-control-user" name="ciNit"
                                                                                            placeholder="Ingrese el ciNit" required maxlength="30" pattern="[0-9,Ñ,A-Z,\-]{0,10}"
                                                                                            title="Sin letras" value="<?php echo $row->CiNit; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-8 col-form-label" >Número de telefono
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-10">
                                                                                        <input type="text" class="form-control form-control-user" name="contacto"
                                                                                        placeholder="Ingrese el número de contacto" maxlength="8" pattern="[0-9]{0,8}"
                                                                                        title="Solo números" value="<?php echo $row->Contacto; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Direccion
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                        <input type="text" class="form-control form-control-user" name="direccion"
                                                                                            placeholder="Direccion" required pattern="[0-9,ñ,Ñ,A-Z,a-z,\ ]{0,50}"
                                                                                            title="" value="<?php echo $row->Direccion; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                            <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary btn-user">Modificar</button>
                                                            </div>
                                                        <?php echo form_close(); ?>
                                                        </div> 
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- End Modal Crear Usuario -->
                                <!-- Modal Deshabilitar--> 
                                <?php foreach ($clientes->result() as $row){ ?>
                                    <div class="modal fade" id="deshabilitarCliente<?php echo $row->ID; ?>" >
                                        <div class="modal-dialog modal-dialog-centered" role="dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <?php echo form_open_multipart('client/deleteClient'); ?>
                                                        <div>    
                                                            <input type="hidden" name="ID" value="<?php echo $row->ID; ?>">
                                                        </div>
                                                <div class="modal-body">
                                                    <h3>¿Estas seguro de dar de baja al cliente?</h3>
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