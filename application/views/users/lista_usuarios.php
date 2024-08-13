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
       
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Crear Nuevo Uusario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Validation</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="mb-3 row">
                                                    <label class="col-lg-10 col-form-label" >Nombres
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control form-control-user" name="nombres"
                                                            placeholder="Ingrese los nombres" required pattern="[ñ,Ñ,A-Z,a-z,\ ]{0,50}"
                                                            title="Solo letras">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                <label class="col-lg-10 col-form-label" >Apellidos
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                    <input type="text" class="form-control form-control-user" name="carnet"
                                                        placeholder="Ingrese el CI" required maxlength="10" pattern="[0-9,Ñ,A-Z,\-]{0,10}"
                                                        title="Sin letras minusculas">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-10 col-form-label" >Carnet de Identidad
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-sm-12">
                                                        
                                                        <input type="text" class="form-control form-control-user" name="carnet"
                                                            placeholder="Ingrese el CI" required maxlength="10" pattern="[0-9,Ñ,A-Z,\-]{0,10}"
                                                            title="Sin letras minusculas">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Suggestions <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="validationCustom04" rows="5" placeholder="What would you like to see?" required=""></textarea>
														<div class="invalid-feedback">
															Please enter a Suggestions.
														</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom05">Best Skill
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="default-select wide form-control" id="validationCustom05">
                                                            <option data-display="Select">Please select</option>
                                                            <option value="html">HTML</option>
                                                            <option value="css">CSS</option>
                                                            <option value="javascript">JavaScript</option>
                                                            <option value="angular">Angular</option>
                                                            <option value="angular">React</option>
                                                            <option value="vuejs">Vue.js</option>
                                                            <option value="ruby">Ruby</option>
                                                            <option value="php">PHP</option>
                                                            <option value="asp">ASP.NET</option>
                                                            <option value="python">Python</option>
                                                            <option value="mysql">MySQL</option>
                                                        </select>
														<div class="invalid-feedback">
															Please select a one.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom06">Currency
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom06" placeholder="$21.60" required="">
														<div class="invalid-feedback">
															Please enter a Currency.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom07">Website
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom07" placeholder="http://example.com" required="">
														<div class="invalid-feedback">
															Please enter a url.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom08">Phone (US)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom08" placeholder="212-999-0000" required="">
														<div class="invalid-feedback">
															Please enter a phone no.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom09">Digits <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom09" placeholder="5" required="">
														<div class="invalid-feedback">
															Please enter a digits.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom10">Number <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom10" placeholder="5.0" required="">
														<div class="invalid-feedback">
															Please enter a num.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom11">Range [1, 5]
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom11" placeholder="4" required="">
														<div class="invalid-feedback">
															Please select a range.
														</div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>