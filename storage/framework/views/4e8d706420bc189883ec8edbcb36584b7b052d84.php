
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3>Detalle Cotizacion</h3>


                    <a href="<?php echo URL::to('cotizacion/'.$cotizacion->id.'/imprimir'); ?>" class="btn btn-success btn-lg active" aria-label="Left Align"role="button" onclick="this.disabled=true">
                        <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>Guardar como PDF </a>
                </div>
                    <div class ="row">
                        <div class="panel-body">
                            <div class="col-md-9">
                                <h4>Informacion de la Empresa</h4>

                            <table class="table table-striped table-responsive table-bordered">
                                <tbody>
                                <tr><td> <b>Empresa </b></td><td> <b>Inflables Fabiolita, Chillán</b> </td></tr>
                                <tr><td> <b>Encargado</b> </td><td> Marcelo del Pino </td></tr>
                                <tr><td> <b>Telefono : (+569) 93208211 </b>  </td><td><b> Email : inflablesfabiolita@gmail.com </b></td></tr></tbody>
                            </table>
                        </div>
                            <div class="col-md-9">
                        <h4>Informacion del Cliente</h4>

                        <table class="table table-striped table-responsive table-bordered">
                                    <tbody>
                                    <tr><td> <b>Nombre del Cliente</b> </td><td> <?php echo $cotizacion->nombre_c; ?> </td></tr>
                                    <tr><td> <b>Empresa </b></td><td> <?php echo $cotizacion->empresa_c; ?> </td></tr>
                                    <tr><td> <b>Dirección </b></td><td><?php echo $cotizacion -> direccion_c; ?></td></tr>
                                    <tr><td> <b>Telefono :</b> <?php echo $cotizacion->telefono_c; ?> </td><td><b> Email :</b>  <?php echo $cotizacion->mail_c; ?> </td></tr>
                                    <tr><td> <b>Fecha: </b><br> <?php echo $cotizacion -> fecha_c; ?> </td><td> <b>Hora:</b> <br> <?php echo $cotizacion -> hora_c; ?> </td> </tr>
                                    <tr><td> <b>Comentario </b></td><td><?php echo $cotizacion -> comentario_c; ?> </td></tr>
                                    <tr><td> <b>Facturacion </b></td><td><?php echo $cotizacion -> facturacion_c; ?> </td></tr>
                                    </tbody>
                        </table>
                        </div>
                            <div class="col-md-9"><h4>Juego(s)</h4>



    <table class="table table-striped table-responsive table-bordered">
        <thead>
        <th>Juego</th>
        <th> Precio x hasta 3 hrs</th>
        <th> Precio x hr. Extra </th>
        <th>horas Extra</th>
        <th>sub total</th>
        </thead>
        <?php  $total = 0; $subtotal =0; $iva =0;
        ?><tbody>
        <?php $__currentLoopData = $detalles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            <tr>
            <td><?php echo $detalle->nombre; ?></td>
            <td>$ <?php echo $detalle->precio; ?></td>
            <td>$ <?php echo $detalle->precio_hora_extra; ?></td>
            <td> <?php echo $cotizacion->ext_c; ?></td>
            <td>$ <?php echo e($st= $detalle->precio + ($detalle->precio_hora_extra * $cotizacion->ext_c)); ?></td>
                <?php  $subtotal= $subtotal +$st  ?>
                </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>

                            <table class="table table-condensed table-responsive table-bordered" width="300" style="table-layout: fixed" >
                                <tbody>
                                <tr>
                                    <td class="r">Sub total : </td>
                                    <td class="r"><h4>$<?php echo e($subtotal); ?></h4></td>
                                </tr>
                                <?php if($cotizacion->facturacion_c == 'Factura'): ?>
                                    <?php 
                                        $iva = $subtotal * 0.19;
                                     ?>
                                <tr>
                                <td class="r">IVA :</td>
                                <td class="r"><h4>$<?php echo e($iva); ?></h4></td>
                                </tr><?php endif; ?>
                                <tr><?php 
                                        $total = $subtotal+ $iva
                                     ?>
                                    <td class="r">Total : </td>
                                    <td class="r"><h4>$<?php echo e($total); ?></h4></td>
                                </tr>
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>