<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class ="row">
                        <div class="col-md-8">
                            <h5 class="panel-title">
                                  <a class="btn btn-primary btn-mini" href="<?php echo URL::to('mantencion'); ?>">Volver</a>
                            </h5>
                      </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>juego</th>
                       <th>motivo</th>
                        <th>Acciones</th>
                        </thead><tbody>
                        <?php $__currentLoopData = $solicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitud): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo $solicitud ->nombre; ?></td>
                                <td>
                                    <?php echo substr($solicitud->comentario_mantencion, 0, 20); ?>...
                                    <a href="<?php echo URL::to('ver_solicitud/'.$solicitud->id); ?>"> ver Más</a>
                                </td>
                                <td>
                                    <?php echo Form::open(['action' => ['MantencionController@destroy', $solicitud->id], 'method' => 'delete']); ?>

                                    <?php echo Form::submit('Eliminar', ['class'=>'btn btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>