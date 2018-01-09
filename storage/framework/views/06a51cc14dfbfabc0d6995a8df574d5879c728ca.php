<?php $__env->startSection('content'); ?>

    <style>
        #botonera{
            text-align:center;
        }</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Bienvenido/a <?php echo e(Auth::user()->name); ?> </div>
                <div class="panel-body">

                 <?php if(Auth::user()-> tipo_usuario == '1'): ?> <?php echo $__env->make('menus.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                 <?php if(Auth::user()-> tipo_usuario == '2'): ?> <?php echo $__env->make('menus.secretaria', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                 <?php if(Auth::user()-> tipo_usuario == '3'): ?> <?php echo $__env->make('menus.chofer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                 <?php if(Auth::user()-> tipo_usuario == '4'): ?> <?php echo $__env->make('menus.monitor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                 <?php if(Auth::user()-> tipo_usuario == '5'): ?> <?php echo $__env->make('menus.cliente', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>