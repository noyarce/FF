<?php $__env->startSection('content'); ?>
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #000000;
            display: table;
            font-weight: 100;
            font-family: 'Lato', sans-serif;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 36px;
            margin-bottom: 40px;
        }
    </style>

        <div class="container">
            <div class="content">
                <div class="title">Lo sentimos,No tienes Permiso para entrar en esta sección! </div>
                <img src="../img/no.jpg">


            </div>
                               <a href="<?php echo e(url('home')); ?>" class="btn btn-default btn-lg active" aria-label="Left Align"role="button">
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Volver al inicio </a>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>