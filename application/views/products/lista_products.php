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
                            </div>
                            <div class="card-body">
                            <div>
                                <button  class="btn btn-rounded btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#agregarProducto">
                                    Agregar Producto
                                </button>
                                <a class="btn btn-rounded btn-danger" type="button"  href="<?PHP echo base_url(); ?>index.php/product/index2">Productos dehabilitados</a>
                                
                            </div>
                            <hr>
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>Descripcion</th>
                                                <th>Foto</th>
                                                <th>Precio Bs.</th>
                                                <th>Marca</th>
                                                <th>En Almacen</th>
                                                <th>Estado</th>
                                                 <th><b>Acciones</b></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($productos->result() as $row)
                                            {
                                            ?>
                                            <tr>
                                            <td><?php echo $row->Descripcion; ?></td>
                                            <td><img width="50" height="50"
                                            src="<?PHP echo base_url(); ?>upload/productos/<?php echo $row->Foto; ?>">
                                            </td>
                                            <td><?php echo $row->Precio; ?></td>
                                            <td><?php echo $row->Marca; ?></td>
                                            <?php if($row->Almacen < 10){ $color = "red"; } else {$color = "black"; } ?>
                                            <td><?php echo formatoEstado($row->Estado); ?></td>
                                            <td>
                                                <b style="color:<?php echo $color; ?>;"><?php echo $row->Almacen; ?></b></td>
                                            <td>                        
                            
													<div class="d-flex">
                                                        <button type="submit" class="btn btn-primary shadow btn-sm sharp me-1" data-bs-toggle="modal" data-bs-target="#modificarProducto<?php echo $row->ID; ?>"><i class="fas fa-edit"></i></button>
                                                       <button type="submit" class="btn btn-danger shadow btn-sm sharp" data-bs-toggle="modal" data-bs-target="#deshabilitarProducto<?php echo $row->ID; ?>"><i class="fas fa-user-times"></i></button>
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
            Content body end-->
            <!-- Modal Crear Usuario-->
       <!-- Large modal -->
       
       <div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Agregar Producto</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <div class="p-4">
                                                        <?php echo form_open_multipart('product/createproduct'); ?>
                                                        
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Descripcion
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                        <input type="text" class="form-control form-control-user" name="descripcion"
                                                                                            placeholder="Descripcion del producto" required pattern="[0-9,ñ,Ñ,A-Z,a-z,\ ]{0,50}"
                                                                                            title="" >
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Marca
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-12">
                                                                                    
                                                                                    <select class="default-select wide form-control" required name="marca">
                                                                                    <option data-display="Selecciona una marca">Selecciona una marca</option>
                                                                                    <?php foreach ($marcas->result() as $row1){ ?>
                                                                                        <option value="<?php echo $row1->ID; ?>"><?php echo $row1->Nombre; ?></option>
                                                                                            
                                                                                        <?php } ?>     
                                                                                        
                                                                                    </select>
                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Categoria
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-12">
                                                                                    <select class="default-select wide form-control" required name="categoria">
                                                                                        <option data-display="Selecciona una categoria">Selecciona una categoria</option>
                                                                                        <?php foreach ($categorias->result() as $row2){ ?>
                                                                                            <option value="<?php echo $row2->ID; ?>"><?php echo $row2->Nombre; ?></option>
                                                                                                
                                                                                            <?php } ?> 
                                                                                    </select>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-8 col-form-label" >Precio
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-10">
                                                                                    <input type="number" class="form-control" name="precio" min="0" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Imagen del Producto
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                    <input type="file" name="userfile" accept=".png,.jpeg,.jpg">
                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                            <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary btn-user">Agregar</button>
                                                            </div>
                                                        <?php echo form_close(); ?>
                                                        </div> 
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
  <!-- Large modal Modificar-->
  <?php foreach($productos->result() as $row)
                                            {
                                            ?>
  <div class="modal fade" id="modificarProducto<?php echo $row->ID; ?>" tabindex="-1" role="dialog" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modificar Producto</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                    </div>
                                                    
                                                    <?php echo form_open_multipart('product/updateproduct'); ?>   
                                                            <input type="hidden" name="ID" value="<?php echo $row->ID; ?>">
                                                        
                                                    <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <div class="p-4">
                                                        
                                                        
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Descripcion
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                        <input type="text" class="form-control form-control-user" name="descripcion"
                                                                                            placeholder="Descripcion del producto" required pattern="[0-9,ñ,Ñ,A-Z,a-z,\ ]{0,50}"
                                                                                            title="" value="<?php echo $row->Descripcion; ?>" >
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Marca
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-12">
                                                                                    
                                                                                    <select class="default-select wide form-control" required name="marca">
                                                                                    <option data-display="Selecciona una marca" value="<?php echo $row->Marca; ?>">Selecciona una marca</option>
                                                                                    <?php foreach ($marcas->result() as $row1){ ?>
                                                                                        <option value="<?php echo $row1->ID; ?>"><?php echo $row1->Nombre; ?></option>
                                                                                            
                                                                                        <?php } ?>     
                                                                                        
                                                                                    </select>
                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Categoria
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-sm-12">
                                                                                    <select class="default-select wide form-control" required name="categoria">
                                                                                        <option data-display="Selecciona una categoria">Selecciona una categoria</option>
                                                                                        <?php foreach ($categorias->result() as $row2){ ?>
                                                                                            <option value="<?php echo $row2->ID; ?>"><?php echo $row2->Nombre; ?></option>
                                                                                                
                                                                                            <?php } ?> 
                                                                                    </select>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-8 col-form-label" >Precio
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-10">
                                                                                    <input type="number" class="form-control" name="precio" min="0" value="<?php echo $row->Precio; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-10 col-form-label" >Imagen del Producto
                                                                                        <span class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-12">
                                                                                    <input type="file" name="userfile" accept=".png,.jpeg,.jpg" value="<?php echo $row->Foto; ?>">
                                                                                    
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
                                     <!-- Modal Deshabilitar--> 
                                <?php foreach ($productos->result() as $row){ ?>
                                    <div class="modal fade" id="deshabilitarProducto<?php echo $row->ID; ?>" >
                                        <div class="modal-dialog modal-dialog-centered" role="dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <?php echo form_open_multipart('product/deleteproduct'); ?>
                                                        <div>    
                                                            <input type="hidden" name="ID" value="<?php echo $row->ID; ?>">
                                                        </div>
                                                <div class="modal-body">
                                                    <h3>¿Estas seguro de eliminar el producto?</h3>
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