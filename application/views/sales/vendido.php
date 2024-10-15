<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-left-orange">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-dark"><?php echo($mensaje)?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <?php echo form_open_multipart('sale/printsale',['target' => '_blank']); ?>
                            <input name="cliente" type="hidden" class="form-control form-control-user" required 
                                value="<?php echo $cliente->getNombre() ?>">
                            <input name="nroVenta" type="hidden" class="form-control form-control-user"
                                value="<?php echo $venta->getID(); ?>" readonly required>
                            <input name="cicliente" type="hidden" class="form-control form-control-user" required 
                                value="<?php echo $cliente->getCI(); ?>">
                            <button type="submit" class="btn btn-success" data-toggle="modal">
                                Imprimir
                            </button>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="col-lg-2">
                            <?php echo form_open_multipart('sale/resettosales'); ?>
                            <button type="submit" class="btn btn-dark">
                                Visualizar Ventas
                            </button>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="col-lg-5">
                            <?php echo form_open_multipart('sale/resettoclient'); ?>
                            <button id="venGenVen" type="submit" class="btn btn-orange">
                                Clientes
                            </button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <hr>
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
                                        <b>Sucursal:</b>
                                        <input type="text" class="form-control form-control-user" name="sucursal" 
                                            value="<?php echo $venta->getSucursal(); ?>" required disabled>
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
                                        <input name="nroCompra" type="number" class="form-control form-control-user"
                                            value="<?php echo $venta->getID(); ?>" readonly required>
                                    </div>
                                    <div class='row col-sm-8'>
                                        <b>Fecha y Hora:</b>
                                        <input type="text" class="form-control form-control-user"
                                            value="<?php echo formatoFechaHoraVista($venta->getFecha()); ?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='row col-sm-6 mb-3 mb-sm-0'>
                                        <b>Cantidad de productos:</b>
                                        <input id="venTotalPro" type="number" class="form-control form-control-user"
                                            pattern="{0,50}" value="<?php echo $venta->getCantidad(); ?>" name="cantidadTotal" readonly required>
                                    </div>
                                    <div class='row col-sm-6'>
                                        <b style="color:red;">Total en (Bs.):</b>
                                        <input id="venTotalPag" name="totalPagar" type="number" class="form-control form-control-user"
                                            required readonly pattern="{0,50}" value="<?php echo $venta->getTotal(); ?>" style="font-weight:bold; color:red;">
                                    </div>
                                </div>
                                <br>
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
                                                <th><b scope="col">Cantidad</b></th>
                                                <th><b scope="col">P. Unitario (Bs)</b></th>
                                                <th><b scope="col">Precio Total (Bs)</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="venTabla">
                                            <?php foreach ($detalle->result() as $row){ ?>
                                            <tr>
                                                <td><?php echo $row->Producto; ?></td>
                                                <td><?php echo $row->Glosa; ?></td>
                                                <td><?php echo $row->Cantidad; ?></td>
                                                <td><?php echo $row->Unitario; ?></td>
                                                <td><?php echo $row->Importe; ?></td>
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
    </div>
</div>
