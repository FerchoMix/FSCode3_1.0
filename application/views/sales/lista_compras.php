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
                            <h4 class="m-0 font-weight-bold text-dark"><?php echo($mensaje)?></h4>
                            <?php $this->session->userdata('tipo')?>
                        </div>
                            <div class="card-body">
                            <div>
                                <button  class="btn btn-rounded btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#crearNuevoCliente">
                                    Agregar Nuevo Cliente
                                </button>
                                <a class="btn btn-rounded btn-danger" type="button"  href="<?PHP echo base_url(); ?>index.php/client/index2">Clientes dehabilitados</a>
                               <?php echo $this->session->userdata('tipo')?>
                            </div>
                            <hr>
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>Id</th>
                                                <th>Proveedor</th>
                                                <th>Fecha</th>
                                                <th>Cantidad</th>
                                                <th>Total (Bs)</th>
                                                <th>Usuario</th>
                                                 <th></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $cantidad = 0;
                                            $total = 0;
                                            foreach ($compras->result() as $row){ ?>
                                            <tr>
                                            <td><?php echo $row->ID; ?></td>
                                                <td><?php echo $row->Proveedor; ?></td>
                                                <td><?php echo formatoFechaHoraVista($row->Fecha); ?></td>
                                                <td><?php echo $row->Cantidad; ?></td>
                                                <td><?php echo $row->Total; ?></td>
                                                <td><?php echo $row->NomUsu." ".$row->ApeUsu; ?></td>
                                            <td>
                                            <?php echo form_open_multipart('buy/bougth'); ?>
                                            <input type="hidden" class="form-control" name="Cliente" value="<?php echo $row->Proveedor; ?>">
                                            <input type="hidden" class="form-control" name="Usuario" value="<?php echo $row->IDU; ?>">
                                            <input type="hidden" class="form-control" name="ID" value="<?php echo $row->ID; ?>">
                                            <button type="submit" class="btn btn-primary shadow btn-sm sharp me-1" data-bs-toggle="modal" ><i class="fas fa-eye"></i></button>
                                            <?php echo form_close(); ?>
                                            </td>
                                            </tr>
                                            <?php
                                                $cantidad = $cantidad + (int)$row->Cantidad;
                                                $total = $total + (int)$row->Total;
                                                } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th width="35%">CANTIDAD TOTAL COMPRA</th>
                                            <th width="15%"><?php echo ($cantidad); ?></th>
                                            <th width="35%">CANTIDAD GASTO (Bs)</th>
                                            <th width="15%"><?php echo ($total); ?></th>                        
                                            </tr>
                                        </thead>
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