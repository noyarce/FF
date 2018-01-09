<div class="content container-fluid col-md-9" style="padding-top: 10px">
    <?php if(Session::has('flash_message')): ?>
        <div class="alert-success">
            <div class="alert alert-success">
                <?php echo e(Session::get('flash_message')); ?>

            </div>
        </div>
    <?php endif; ?>
    <?php if(Session::has('alert-warning')): ?>
        <div class="alert-warning">
            <div class="alert alert-warning">
                <?php echo e(Session::get('alert-warning')); ?>

            </div>
        </div>
    <?php endif; ?>
    <?php if((count( $errors ) > 0)): ?>
        <div class="alert alert-danger">
            <strong>Whoops! </strong> Hemos detectado un problema<br>
            <ul class="">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li>
                        <?php echo e($error); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php echo $__env->yieldContent('title'); ?>
    <div class="container-fluid">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>