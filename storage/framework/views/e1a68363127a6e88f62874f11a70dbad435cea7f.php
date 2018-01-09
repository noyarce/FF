<?php $__env->startSection('content'); ?>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="col-lg-offset-1">Modificar Juego</h2><br>

                        <?php echo Form::model($juego,['route'=>['juegos.update',$juego->id],'method'=>'PUT']); ?>

                    </div>
                    <div class="panel-body">
                        <?php if((Session::has('flash_message')) or (count( $errors ) > 0)): ?><?php echo $__env->make('errors.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                      <div class="form-group">
                            <?php echo Form::label('Nombre', 'Nombre',['class'=>'col-sm-3 control-label']); ?>

                            <?php echo Form::text('nombre', null,['class'=>'col-sm-3 form-control']); ?>

                            
                            <?php echo Form::label('Largo Mts', 'Largo Mts',['class'=>'col-sm-3 control-label']); ?>

                            <?php echo Form::text('j_largo', null,['class'=>'col-sm-3 form-control'], $juego->j_largo); ?>

                            
                            <?php echo Form::label('Ancho Mts', 'Ancho Mts',['class'=>'col-sm-4 control-label']); ?>

                            <?php echo Form::text('j_ancho', null,['class'=>'col-sm-3 form-control'], $juego->j_ancho); ?>

                            
                            <?php echo Form::label('Alto Mts', 'Alto Mts',['class'=>'col-sm-4 control-label']); ?>

                            <?php echo Form::text('j_alto', null,['class'=>'col-sm-4 form-control'], $juego->j_alto); ?>

                            
                            <?php echo Form::label('Precio x 3 hrs', 'Precio x 3 hrs',['class'=>'col-sm-4 control-label']); ?>

                            <?php echo Form::text('precio', null,['class'=>'col-sm-4 form-control'], $juego->precio); ?>

                            
                            <?php echo Form::label('Precio hr Extra', 'Precio hr Extra',['class'=>'col-sm-4 control-label']); ?>

                            <?php echo Form::text('precio_hora_extra', null,['class'=>'col-sm-4 form-control'], $juego->precio_hora_extra); ?>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <?php echo Form::submit('Finalizar',['class'=>'btn btn-success','type'=>'submit']); ?>

                                <a class="btn btn-danger btn-mini" href="<?php echo URL::to('juegos'); ?>">Cancelar</a>
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