
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Subir Fotos</div>
                    <div class="panel-body">
                        <?php echo Form::open(['route' => 'fotos.store', 'method' => 'POST', 'files' => 'true']); ?>

                        <div class="form-group">
                            <?php echo form::label('name','Nombre'); ?>



                            <?php echo form::text('nombre',null,['class' => 'form-control']); ?>



                        </div>
                        <div class="form-group">
                            <?php echo form::label('image','Imagen'); ?>

                            <?php echo form::file('imagen',null,['class' => 'form-control']); ?>

                        </div>
                        <button type="submit" class="btn btn-default">Guardar </button>
                        <?php echo Form::close(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>