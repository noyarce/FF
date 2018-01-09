<?php $__env->startSection('content'); ?>
    <div class="container"><?php if((Session::has('flash_message')) or (count( $errors ) > 0)): ?><?php echo $__env->make('errors.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>

        <div class="row">
            <div class="col-md-7 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Datos Personales</div>
                        <div class="panel-body">

                <?php echo Form::model($user,['route'=>['perfil',$user->id],'method'=>'PUT']); ?>


                <div class="form-group ">
                    <?php echo Form::label('nombre','Nombre',['class'=>'col-sm-3 control-label']); ?>

                    <div class="col-sm-9 col-md-8">
                        <?php echo Form::text('name',null,['class'=>'form-control','placeholder'=>$user->name]); ?>

                </div></div>

               <div class="form-group">
                    <?php echo Form::label('email','Correo',['class'=>'col-sm-3 control-label']); ?>

                    <div class="col-sm-9 col-md-8">
                    <?php echo Form::email('email',null,['class'=>'form-control','placeholder'=> $user->email]); ?>

                </div></div>
        
                    <?php echo Form::hidden ('id', $user->id); ?>

                    <?php echo Form::hidden ('tipo_usuario', $user->tipo_usuario ); ?>

                    <?php echo Form::hidden ('password',$user->password ); ?>

                    <?php echo Form::hidden ('password_confirmation',$user->password ); ?>


                <div class="form-group">
                    <div class="col-sm-9 col-md-8">
                        <?php echo Form::submit('Guardar',['class'=>'btn btn-primary']); ?>

                        <?php echo Form::close(); ?>

                        <a class="btn btn-warning" href="<?php echo e(route('home')); ?>"> Volver</a>
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