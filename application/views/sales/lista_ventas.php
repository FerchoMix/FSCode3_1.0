<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-dark"><?php echo($mensaje) ?></h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <!-- Botón Generar Venta -->
                        <div class="col-sm-3">
                            <?php echo form_open_multipart('sale/index'); ?> 
                            <button type="submit" class="btn btn-primary shadow btn-sm sharp" data-toggle="modal">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>

                    <hr>

                    <!-- Filtros de Fecha -->
                    <div class="row mb-3">
                        <div class="col-sm-2">
                            <?php echo form_open_multipart('sale/resetfilesale'); ?>
                            <b>Desde:</b>
                            <input class="form-control form-control-user" type="date" name="ini1" id="ini1" max="<?php echo date('Y-m-d'); ?>"
                                value="<?php echo $fecIni; ?>" required>
                        </div>
                        <div class="col-sm-2">
                            <b>Hasta:</b>
                            <input class="form-control form-control-user" type="date" name="fin1" id="fin1" max="<?php echo date('Y-m-d'); ?>"
                                value="<?php echo $fecFin; ?>" required>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Actualizar
                                <i class="fas fa-reply"></i>
                            </button>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="col-sm-3">
                            <?php echo form_open_multipart('sale/printfilesale', ['target' => '_blank']); ?>
                            <input type="hidden" name="ini2" value="<?php echo $fecIni; ?>" required>
                            <input type="hidden" name="fin2" value="<?php echo $fecFin; ?>" required>
                            <button type="submit" class="btn btn-success">Imprimir Informe
                                <i class="fas fa-print"></i>
                            </button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>

                    <!-- Tabla de Ventas -->
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Sucursal</th>
                                    <th>Cantidad</th>
                                    <th>Total (Bs)</th>
                                    <th>Vendedor</th>
                                    <th></th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $cantidad = 0;
                                    $total = 0;
                                    foreach ($ventas->result() as $row) { ?>
                                        <tr>
                                            <td><?php echo $row->ID; ?></td>
                                            <td><?php echo $row->Cliente; ?></td>
                                            <td><?php echo formatoFechaHoraVista($row->Fecha); ?></td>
                                            <td><?php echo $row->Sucursal; ?></td>
                                            <td><?php echo $row->Cantidad; ?></td>
                                            <td><?php echo $row->Total; ?></td>
                                            <td><?php echo $row->NomUsu . " " . $row->ApeUsu; ?></td>
                                            <td>
                                                <?php echo form_open_multipart('sale/sold'); ?>
                                                <input type="hidden" name="Cliente" value="<?php echo $row->IDC; ?>">
                                                <input type="hidden" name="Usuario" value="<?php echo $row->IDU; ?>">
                                                <input type="hidden" name="ID" value="<?php echo $row->ID; ?>">
                                                <button type="submit" class="btn btn-primary shadow btn-sm sharp me-1"><i class="fas fa-eye"></i></button>
                                                <?php echo form_close(); ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $cantidad += (int)$row->Cantidad;
                                        $total += (int)$row->Total;
                                    } ?>
                            </tbody>
                        </table>

                        <!-- Totales -->
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th width="35%">CANTIDAD TOTAL VENDIDA</th>
                                    <th width="15%"><?php echo ($cantidad); ?></th>
                                    <th width="35%">CANTIDAD VENDIDA (Bs)</th>
                                    <th width="15%"><?php echo ($total); ?></th>                      
                                </tr>
                            </thead>
                        </table>

                    </div> <!-- End of table-responsive -->
                </div> <!-- End of card-body -->
            </div> <!-- End of card -->
        </div> <!-- End of col-12 -->
    </div> <!-- End of container-fluid -->
</div> <!-- End of content-body -->
<!--**********************************
    Content body end
***********************************-->
