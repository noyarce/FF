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
                        <th>nombre</th>
                        <th>Fecha de Ultima Mantencion</th>
                        <th>Dias Transcurridos</th>
                        <th>Cantidad de veces en Uso</th>
                        </thead><tbody>
                            
                            <?php if((Session::has('flash_message')) or (count( $errors ) > 0)): ?><?php echo $__env->make('errors.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                            
                        <?php $__currentLoopData = $juegos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $juego): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td> <?php echo $juego ->nombre; ?></td>
                                <td><?php echo Carbon\Carbon::parse($juego->ultima_mantencion)->format('d/m/Y'); ?></td>
                                <td><?php  $hoy = \Carbon\Carbon::now();?>
                                    <?php echo $hoy->diffInDays(Carbon\Carbon::parse($juego->ultima_mantencion)); ?></td>
                                <td><?php echo $juego->cuenta; ?></td>
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