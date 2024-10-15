<!--
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-dark"><?php echo($mensaje)?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <button type="button" id="venAgrPro" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#agregarProductosVen">Agregar Producto</button>
                        </div>
                        <div class="col-lg-3">
                            <?php echo form_open_multipart('sale/resetsale'); ?>
                                <button type="submit" class="btn btn-dark">Cancelar Venta</button>
                                        <?php echo form_close(); ?>
                        </div>
                        <div class="col-lg-3">
                                    <?php echo form_open_multipart('sale/createsale'); ?> 
                                        <button id="venGenVen" type="submit" class="btn btn-primary">
                                            Generar Venta
                                        </button>
                                        <?php echo form_close(); ?>
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card-header"> <b>DATOS GENERALES</b> </div>
                            <div class="col-sm-12 card">
                                <div class="row">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class='row col-sm-8 mb-3 mb-sm-0'>
                                        <b>Cliente:</b>
                                        <input type="text" class="form-control form-control-user" disabled 
                                                    value="<?php echo $cliente->getNombre() ?>">
                                        <input type="text" class="form-control form-control-user" name="idCli" 
                                                    value="<?php echo $cliente->getID(); ?>" hidden>
                                    </div>
                                            &nbsp;&nbsp;&nbsp;
                                    <div class='row col-sm-4'>
                                                <b>CI/NIT:</b>
                                                <input type="text" class="form-control form-control-user" disabled 
                                                    value="<?php echo $cliente->getCI(); ?>">
                                    </div>
                                    </div>
                                        <div class="row">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class='row col-sm-7'>
                                                <b>Vendedor:</b>
                                                <input type="text" class="form-control form-control-user" name="vendedor" required disabled 
                                                    value="<?php echo $vendedor->getNombreCompleto(); ?>">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class='row col-sm-5 mb-3 mb-sm-0'>
                                                <b>Sucursal:</b>
                                                <input type="text" class="form-control form-control-user" name="sucursal" required>
                                            </div>
                                        </div>
                                        <br>
                                </div>
                </div>
                                <div class="col-lg-5">
                                    <div class="card-header"> <b>VENTA</b> </div>
                                    <div class="col-sm-12 card">
                                    <div class="row">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class='row col-sm-4 mb-3 mb-sm-0'>
                                                <b>N° Venta:</b>
                                                <input name="nroVenta" type="number" class="form-control form-control-user"
                                                    value="<?php echo $nroVenta; ?>" readonly required>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class='row col-sm-8'>
                                                <b>Fecha y Hora:</b>
                                                <input type="text" class="form-control form-control-user"
                                                    value="<?php echo date('d-m-Y H:i:s'); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class='row col-sm-6 mb-3 mb-sm-0'>
                                                <b>Cantidad de productos:</b>
                                                <input id="venTotalPro" type="number" class="form-control form-control-user"
                                                    pattern="{0,50}" value="0" name="cantidadTotal" readonly required>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class='row col-sm-6'>
                                                <b style="color:red;">Total en (Bs.):</b>
                                                <input id="venTotalPag" name="totalPagar" type="number" class="form-control form-control-user"
                                                    required readonly pattern="{0,50}" value="0" style="font-weight:bold; color:red;">
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
            <div class="col-lg-12">
                <div class="card-header"> <b>DETALLE</b> </div>
                <div class="col-sm-12 card">
                    <div class="table-responsive table-wrapper">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><b scope="col">Producto</b></th>
                                    <th><b scope="col">Glosa</b></th>
                                    <th><b scope="col">Almacen</b></th>
                                    <th><b scope="col">Cantidad</b></th>
                                    <th><b scope="col">P. Unitario (Bs)</b></th>
                                    <th><b scope="col">Precio Total (Bs)</b></th>
                                    <th><b scope="col">Eliminar</b></th>
                                </tr>
                            </thead>
                            <tbody id="venTabla">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <input id="venArrPro" type="text" name="arregloPro" value="" hidden required>
        <input id="venArrGlo" type="text" name="arregloGlo" value="" hidden required>
        <input id="venArrCan" type="text" name="arregloCan" value="" hidden required>
        <input id="venArrUni" type="text" name="arregloUni" value="" hidden required>
        <input id="venArrImp" type="text" name="arregloImp" value="" hidden required>
        <?php echo form_close(); ?>
    </div>
</div>

<?php foreach ($productos->result() as $row){ ?>
    <input id="venProID<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->ID ?>">
    <input id="venProPre<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->Precio ?>">
    <input id="venProMar<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->Marca ?>">
    <input id="venProDes<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->Descripcion ?>">
    <input id="venProCat<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->Categoria ?>">
    <input id="venProAlm<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->Almacen ?>">
<?php } ?>
<select class="form-control" id="venLista" hidden>
    <?php foreach ($productos->result() as $row){ ?>
        <option value="<?php echo $row->ID ?>"></option>
    <?php } ?>
</select>

 
                                  
                                    <div class="modal fade" id="agregarProductosVen">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="">Producto</label>
                                                    <select class="form-control" id="venProducto" required>
                                                    </select>                                     
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="venAgregar" >Agregar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    -->
    <div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-dark"><?php echo($mensaje)?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <button type="button" id="venAgrPro" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#agregarProductosVen">Agregar Producto</button>
                        </div>
                        <div class="col-lg-3">
                            <?php echo form_open_multipart('sale/resetsale'); ?>
                                <button type="submit" class="btn btn-dark">Cancelar Venta</button>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="col-lg-3">
                            <?php echo form_open_multipart('sale/createsale'); ?> 
                                <button id="venGenVen" type="submit" class="btn btn-primary">
                                    Generar Venta
                                </button>
                                
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card-header"> <b>DATOS GENERALES</b> </div>
                            <div class="col-sm-12 card">
                                <div class="row">
                                    <div class='row col-sm-8 mb-3 mb-sm-0'>
                                        <b>Cliente:</b>
                                        <input type="text" class="form-control form-control-user" disabled 
                                                value="<?php echo $cliente->getNombre() ?>">
                                        <input type="text" class="form-control form-control-user" name="idCli" 
                                                value="<?php echo $cliente->getID(); ?>" hidden>
                                    </div>
                                    <div class='row col-sm-4'>
                                        <b>CI/NIT:</b>
                                        <input type="text" class="form-control form-control-user" disabled 
                                                value="<?php echo $cliente->getCI(); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='row col-sm-7'>
                                        <b>Vendedor:</b>
                                        <input type="text" class="form-control form-control-user" name="vendedor" required disabled 
                                                value="<?php echo $vendedor->getNombreCompleto(); ?>">
                                    </div>
                                    <div class='row col-sm-5 mb-3 mb-sm-0'>
                                        <select class='form-control form-control-user' name='sucursal' required>
                                            <option value='' disabled selected>Seleccione una sucursal</option>
                                            <?php foreach ($sucursales as $row) { ?>
                                                <option value="<?php echo $row->idSucursal; ?>">
                                                    <?php echo htmlspecialchars($row->nombre . " - " . $row->direccion); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="card-header"> <b>VENTA</b> </div>
                            <div class="col-sm-12 card">
                                <div class="row">
                                    <div class='row col-sm-4 mb-3 mb-sm-0'>
                                        <b>N° Venta:</b>
                                        <input name="nroVenta" type="number" class="form-control form-control-user"
                                                value="<?php echo $nroVenta; ?>" readonly required>
                                    </div>
                                    <div class='row col-sm-8'>
                                        <b>Fecha y Hora:</b>
                                        <input type="text" class="form-control form-control-user"
                                                value="<?php echo date('d-m-Y H:i:s'); ?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='row col-sm-6 mb-3 mb-sm-0'>
                                        <b>Cantidad de productos:</b>
                                        <input id="venTotalPro" type="number" class="form-control form-control-user"
                                                pattern="{0,50}" value="0" name="cantidadTotal" readonly required>
                                    </div>
                                    <div class='row col-sm-6'>
                                        <b style="color:red;">Total en (Bs.):</b>
                                        <input id="venTotalPag" name="totalPagar" type="number" class="form-control form-control-user"
                                                required readonly pattern="{0,50}" value="0" style="font-weight:bold; color:red;">
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <br>
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header"> <h4 class="m-0 font-weight-bold text-dark">Detalle</h4> </div>
                            <div class="col-sm-12 card">
                                <div class="table-responsive table-wrapper">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><b scope="col">Producto</b></th>
                                                <th><b scope="col">Glosa</b></th>
                                                <th><b scope="col">Almacen</b></th>
                                                <th><b scope="col">Cantidad</b></th>
                                                <th><b scope="col">P. Unitario (Bs)</b></th>
                                                <th><b scope="col">Precio Total (Bs)</b></th>
                                                <th><b scope="col">Eliminar</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="venTabla">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <input id="venArrPro" type="text" name="arregloPro" value="" hidden required>
                    <input id="venArrGlo" type="text" name="arregloGlo" value="" hidden required>
                    <input id="venArrCan" type="text" name="arregloCan" value="" hidden required>
                    <input id="venArrUni" type="text" name="arregloUni" value="" hidden required>
                    <input id="venArrImp" type="text" name="arregloImp" value="" hidden required>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($productos->result() as $row){ ?>
        <input id="venProID<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->ID ?>">
        <input id="venProPre<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->Precio ?>">
        <input id="venProMar<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->Marca ?>">
        <input id="venProDes<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->Descripcion ?>">
        <input id="venProCat<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->Categoria ?>">
        <input id="venProAlm<?php echo $row->ID ?>" type="hidden" value="<?php echo $row->Almacen ?>">
    <?php } ?>
    <select class="form-control" id="venLista" hidden>
        <?php foreach ($productos->result() as $row){ ?>
            <option value="<?php echo $row->ID ?>"></option>
        <?php } ?>
    </select>

    <div class="modal fade" id="agregarProductosVen">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label for="">Producto</label>
                    <select class="form-control" id="venProducto" required></select>                                     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="venAgregar">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
                                 