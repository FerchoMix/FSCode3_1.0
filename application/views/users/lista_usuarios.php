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
                                <h4 class="card-title">Profile Datatable</h4>
                            </div>
                            <div class="card-body">
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