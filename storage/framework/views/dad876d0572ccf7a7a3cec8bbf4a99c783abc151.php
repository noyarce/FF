
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listado Cotizaciones </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>

                        <th> Fecha</th>
                        <th> Nombre</th>
                        <th> Empresa</th>
                        <th> e-mail</th>
                        <th> telefono</th>
                        <th> Acciones</th>
                        </thead>
                        <?php $__currentLoopData = $cotizaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cotizacion): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <tbody>
                                <td><?php echo $cotizacion ->fecha_c; ?> </td>
                                <td><?php echo $cotizacion ->nombre_c; ?> </td>
                                <td><?php echo $cotizacion ->empresa_c; ?> </td>
                                <td><?php echo $cotizacion ->mail_c; ?> </td>
                                <td><?php echo $cotizacion ->telefono_c; ?> </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="<?php echo URL::to('cotizacion/'.$cotizacion->id); ?>">Ver</a>
                                    <?php echo Form::open(['action' => ['CotizacionController@destroy', $cotizacion->id], 'method' => 'delete']); ?>

                                    <?php echo Form::submit('Eliminar', ['class'=>'btn btn-xs btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']); ?>

                                    <?php echo Form::close(); ?>


                                </td>
                                </tbody>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </table>
                    <?php echo e($cotizaciones->links()); ?>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>