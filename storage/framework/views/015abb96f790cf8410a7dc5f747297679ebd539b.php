<?php $__env->startSection('content'); ?>


    <?php if(count ($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <?php echo Form::open(['route'=>['usuarios.store'],'class'=>'form-horizontal']); ?>


                <?php echo Form::label('name', 'Nombre',['class'=>'col-sm-2 control-label']); ?>

                <?php echo Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre']); ?>


                <?php echo Form::label('Correo'); ?>

                <?php echo Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese Correo']); ?>


                <?php echo Form::label('Clave Provisoria'); ?>

                <?php echo Form::password('password',null,['class'=>'form-control','placeholder'=>'Ingrese contraseña']); ?>


                <?php echo Form::label('Tipo de Usuario'); ?>

                <?php echo Form::select('tipo_usuario', ['1'=>'Administrador',
                                        '2'=>'Secretaria',
                                        '3'=>'Chofer',
                                        '4'=>'Monitor',
                                        '5'=>'Cliente']); ?>


            </div>
            <?php echo Form::submit('Crear',['class'=>'btn btn-primary','type'=>'submit']); ?>

            <a class="btn btn-warning" href="<?php echo e(route('usuarios.index')); ?>"> Volver</a>
            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>