<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listado de Arriendos Pendientes </h4>
                  </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th> Fecha</th>
                        <th> Hora</th>
                        <th> Dirección</th>
                        <th> Detalle</th>
                        <th>Editar</th>
                        <th>Cambiar Estado</th>
                        <th>Eliminar</th>
                        </thead>
                        <?php $__currentLoopData = $arriendos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arriendo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <tbody>
                                <td><?php echo $arriendo -> fecha; ?> </td>
                                <td><?php echo $arriendo -> hora; ?> </td>
                                <td><?php echo $arriendo->direccion; ?></td>
                                <td><a href="<?php echo URL::to('arriendo/'.$arriendo->id.'/'); ?>">Mostrar</a></td>
                                <td><a href="<?php echo URL::to('arriendo/'.$arriendo->id.'/edit'); ?>">Editar</a></td>
                                <td><a href="<?php echo URL::to('arriendo_status/'.$arriendo->id.'/'); ?>">Modificar Estado</a></td>
                                <td>
                                   <?php echo Form::open(['action' => ['ArriendoController@destroy', $arriendo->id], 'method' => 'delete']); ?>

                                   <?php echo Form::submit('Eliminar', ['class'=>'btn  btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']); ?>

                                   <?php echo Form::close(); ?>

                                </td>
                                </tbody>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>