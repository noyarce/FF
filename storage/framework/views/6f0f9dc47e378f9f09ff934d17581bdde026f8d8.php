<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php if((Session::has('flash_message')) or (count( $errors ) > 0)): ?><?php echo $__env->make('errors.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>

            <div class="col-md-7 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar rol de  <?php echo $user->name; ?></div>
                        <div class="panel-body">
                            <?php echo Form::model($user,['route'=>['usuarios.update',$user->id],'method'=>'PUT']); ?>

                        <div class="form-group ">
                            <?php echo Form::hidden  ('name',$user->name ); ?>

                            <?php echo Form::hidden  ('email',$user->email ); ?>

                            <?php echo Form::hidden  ('password',$user->password ); ?>

                            <?php echo Form::hidden  ('password_confirmation',$user->password ); ?>

                            <?php echo Form::select('tipo_usuario', ['1'=>'Administrador',
                                        '2'=>'Secretaria',
                                        '3'=>'Chofer',
                                        '4'=>'Monitor',
                                        '5'=>'Cliente'], $user->tipo_usuario ); ?>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-md-8">
                            <?php echo Form::submit('Guardar',['class'=>'btn btn-primary']); ?>

                            <?php echo Form::close(); ?>

                            <a class="btn btn-warning" href="<?php echo e(route('usuarios.index')); ?>"> Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>