<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if((Session::has('flash_message')) or (Session::has('alert-warning')) or (count( $errors ) > 0)): ?><?php echo $__env->make('errors.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
        <div class="row">
            <div class="col-md-7 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Contraseña</div>
                        <div class="panel-body">

                <?php echo Form::model($user,['route'=>['NewPass',$user->id],'method'=>'PUT']); ?>


                <div class="form-group ">
                    <?php echo Form::label('nombre','Nombre',['class'=>'col-sm-3 control-label']); ?><?php echo $user->name; ?>

                </div>

               <div class="form-group">
                    <?php echo Form::label('email','Correo',['class'=>'col-sm-3 control-label']); ?><?php echo $user->email; ?>

                </div>
                
                <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Clave</label>
                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Clave</label>
                            <div class="col-md-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>              

              <?php echo Form::hidden  ('name', $user->name ); ?>

                <?php echo Form::hidden  ('email', $user->email ); ?>

               <?php echo Form::hidden  ('tipo_usuario', $user->tipo_usuario ); ?>

                <div class="form-group">
                    <div class="col-sm-9 col-md-8">
                        <?php echo Form::submit('Guardar',['class'=>'btn btn-primary']); ?>

                        <?php echo Form::close(); ?>

                       
                </div></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>