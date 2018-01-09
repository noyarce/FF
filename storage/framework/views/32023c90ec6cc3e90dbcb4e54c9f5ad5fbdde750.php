<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="col-lg-offset-1">Solicitar Mantencion de Juego <?php echo $juego->nombre; ?></h2><br>
                    </div>
                    <div class="panel-body">

                        <?php echo Form::open(['route'=>['sol_mantencion'],'class'=>'form-horizontal']); ?>


                        <div class="form-group">
                            <?php echo Form::label('Comentario', 'Comentario',['class'=>'col-sm-2 control-label']); ?>  <div class=" rows=3 ">
                                    <?php echo Form::textarea('comentario_mantencion', null,['class'=>'form-control']); ?>

                                </div>
                        </div>
                        <?php echo e(Form::hidden('juego_id', $juego->id)); ?>



                         <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-5">
                                <?php echo Form::submit('Finalizar',['class'=>'btn btn-success','type'=>'submit']); ?>

                                <a class="btn btn-danger btn-mini" href="<?php echo URL::to('home'); ?>">Cancelar</a>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>