<?php $__env->startSection('content'); ?>
    <style>
        #map {
            margin: auto auto;
            width:80%;
            height: 500px;
        }
    </style>
    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Detalle de Arriendo ID : <?php echo $arriendo->id; ?></h3>
                    <a href="<?php echo URL::to('arriendo/'.$arriendo->id.'/imprimir'); ?>" class="btn btn-success btn-lg active" aria-label="Left Align"role="button" onclick="this.disabled=true">
                        <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>Guardar como PDF </a>
                </div>
                    <div class ="row">
                        <div class="panel-body">
                            <h3>Informacion del Cliente</h3>
                            <table class="table table-striped table-condensed table-responsive table-bordered">
                                <tbody>
                                <tr><td> Nombre del Cliente : <b><?php echo $arriendo -> cliente; ?></b>  </td><td> Telefono : <b><?php echo $arriendo->fono; ?></b></td></tr>
                                <tr><td> Horario : <b><?php echo $arriendo -> hora; ?></b> </td><td>Estado : <b><?php echo $estado ->estado_arriendo; ?></b></td></tr>
                                <tr><td> Dirección : <b><?php echo $arriendo -> direccion; ?></b></td><td></td></tr>
                                <tr><td> Facturacion : <b><?php echo $arriendo-> facturacion; ?></b>
                                    <td> Medio de Pago : <b><?php echo $arriendo-> mdp; ?></b>
                                    </td></tr>
                                <tr><td> Comentario </td><td><?php echo $arriendo -> comentario; ?> </td></tr>
                                </tbody>
                                </table>
                            <h3>Juego(s)</h3>
                            <table class="table table-striped table-bordered">
                                 <thead>
                                 <th>Juego</th>
                                 <th> Precio x hasta 3 hrs</th>
                                 <th> Precio x hr. Extra </th>
                                 <th>horas Extra </th>
                                 <th>sub total</th>
                                 </thead>
                                    <tbody><?php  $total = 0; $subtotal =0; $iva =0;
                                    ?>
                                 <?php $__currentLoopData = $detalles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                     <tr>
                                     <td><?php echo $detalle->nombre; ?></td>
                                     <td>$ <?php echo $detalle->precio; ?></td>
                                     <td>$ <?php echo $detalle->precio_hora_extra; ?></td>
                                     <td> <?php echo $arriendo->ext; ?></td>
                                     <td>$ <?php echo e($st= $detalle->precio + ($detalle->precio_hora_extra * $arriendo->ext)); ?></td>
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
                                <?php if($arriendo->facturacion == 'Factura'): ?>
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

                            <div id="map">

                            </div>
                            <?php echo e($arriendo->lat); ?>

                            <?php echo e($arriendo->lng); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function initMap() {
            var myLatlng = new google.maps.LatLng(parseFloat(<?php echo e($arriendo->lat); ?>),parseFloat(<?php echo e($arriendo->lng); ?>));

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15 ,
                center: myLatlng
            });
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                draggable: false
            });
        }
    </script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsWBoq7NdO9jsx2kis8ZPP8RmhnnX8gD0&libraries=places&callback=initMap"></script>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>