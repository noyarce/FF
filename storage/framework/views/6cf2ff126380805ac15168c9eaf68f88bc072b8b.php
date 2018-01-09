
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Juegos </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>nombre</th>
                        <th>dimesiones</th>
                        <th>costos</th>
                       </thead>
                        <?php $__currentLoopData = $juegos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $juego): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <tbody>
                                <td> <?php echo $juego ->nombre; ?>

                                </td>
                                <td>
                                    LARGO : <?php echo $juego ->j_largo; ?> mts<br>
                                    ANCHO : <?php echo $juego ->j_ancho; ?> mts<br>
                                    ALTO :<?php echo $juego ->j_alto; ?> mts

                                </td>
                                 <td>
                                    Precio Hasta 3 hrs   $ <?php echo $juego->precio; ?> <br>
                                    Precio por Hora Extra $<?php echo $juego->precio_hora_extra; ?>

                                </td>

                               </tbody>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </table>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <?php $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="storage/<?php echo e($foto->imagen); ?>" alt="<?php echo e($foto->nombre); ?>">
                                    <div class="caption">
                                        <h3><?php echo e($foto->nombre); ?></h3>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                    </div>
                </div>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>