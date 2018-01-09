
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado de Imagenes

                        <a href="<?php echo e(url('fotos/create')); ?>" class="btn-xs btn-primary pull-right" role="button">Agregar</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="col-sm-6 col-md-4">
                                    <?php echo Form::open(['action' => ['ThumbnailController@destroy', $foto->id], 'method' => 'delete']); ?>

                                    <?php echo Form::submit('Eliminar', ['class'=>'btn btn-xs btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']); ?>

                                    <?php echo Form::close(); ?>

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
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>