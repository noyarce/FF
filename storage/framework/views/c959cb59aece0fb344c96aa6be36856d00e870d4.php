<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listado de Mensajes</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>Enviado el</th>
                        <th> Estado</th>
                        <th> Tipo</th>
                        <th> Nombre</th>

                        <th>Acciones</th>
                        </thead>
                        <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <tbody>
                                <td><?php echo $contacto->created_at; ?></td>
                                <td><?php echo $contacto ->estado_contacto; ?> </td>
                                <td><?php echo $contacto ->tipo_contacto; ?> </td>
                                <td><?php echo $contacto ->nombre_contacto; ?> </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="<?php echo URL::to('contacto/'.$contacto->id); ?>">Ver Mensaje</a>
                                      <?php echo Form::open(['action' => ['ContactoController@destroy', $contacto->id], 'method' => 'delete']); ?>

                                      <?php echo Form::submit('Eliminar', ['class'=>'btn btn-xs btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']); ?>

                                      <?php echo Form::close(); ?>


                                </td>
                                </tbody>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </table>
                    <?php echo e($contactos->links()); ?>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>