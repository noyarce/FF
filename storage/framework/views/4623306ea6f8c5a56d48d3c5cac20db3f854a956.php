<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Mantencion de Juegos </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>nombre</th>
                        <th>Estado</th>
                        <th>Fecha de Ultima Mantencion</th>
                        <th>Solicitar Mantencion</th>
                       </thead><tbody>
                        <?php $__currentLoopData = $juegos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $juego): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td> <?php echo $juego ->nombre; ?></td>
                                <td><?php echo $juego->estado_juego; ?></td>
                                <td><?php echo Carbon\Carbon::parse($juego->ultima_mantencion)->format('d/m/Y'); ?></td>
                                <td><li><a href="<?php echo URL::to('solicitar_mantencion/'.$juego->id); ?>">Solicitar Mantencion</a></li>
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