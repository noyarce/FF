
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="col-lg-offset-1">Registrar Juego</h2><br>
                    </div>
                    <div class="panel-body">

                        <?php echo Form::open(['route'=>['juegos.store'],'class'=>'form-horizontal']); ?>


                        <div class="form-group">
                            <?php echo Form::label('Nombre', 'Nombre',['class'=>'col-sm-2 control-label']); ?>

                            <div class="col-sm-9 col-md-4">
                                <?php echo Form::text('nombre', null,['class'=>'form-control']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo Form::label('Largo (mts)', 'Largo',['class'=>'col-sm-2 control-label']); ?>

                            <div class="col-sm-9 col-md-4">
                                <?php echo Form::number(  'j_largo', null,['class'=>'form-control']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo Form::label('Ancho (mts)', 'Ancho',['class'=>'col-sm-2 control-label']); ?>

                            <div class="col-sm-9 col-md-4">
                                <?php echo Form::number('j_ancho', null,['class'=>'form-control']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo Form::label('Alto (mts)', 'Alto',['class'=>'col-sm-2 control-label']); ?>

                            <div class="col-sm-9 col-md-4">
                                <?php echo Form::number('j_alto', null,['class'=>'form-control']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo Form::label('Precio', 'Precio',['class'=>'col-sm-2 control-label']); ?>

                            <div class="col-sm-9 col-md-4">
                                <?php echo Form::number('precio', null,['class'=>'form-control']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo Form::label('Precio hora extra', 'Precio hora extra',['class'=>'col-sm-2 control-label']); ?>

                            <div class="col-sm-9 col-md-4">
                                <?php echo Form::number('precio_hora_extra', null,['class'=>'form-control']); ?>

                            </div>
                        </div>

                         <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-5">
                                <?php echo Form::submit('Finalizar',['class'=>'btn btn-success','type'=>'submit']); ?>

                                <a class="btn btn-danger btn-mini" href="<?php echo URL::to('viajes'); ?>">Cancelar</a>
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