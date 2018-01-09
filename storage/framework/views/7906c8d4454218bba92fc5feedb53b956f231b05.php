<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <a class="btn btn-primary btn-mini" href="<?php echo URL::to('contacto'); ?>">Volver al Listado de mensajes</a>
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class ="row">
                  <div class="col-md-8">
                      <h5 class="panel-title"><?php echo $contacto->tipo_contacto; ?> de <?php echo $contacto->nombre_contacto; ?></h5>
                  </div>
                  <?php if((Session::has('flash_message')) or (count( $errors ) > 0)): ?><?php echo $__env->make('errors.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php endif; ?>
                  <div class="col-md-4">
                    <?php echo Form::label('Estado', 'Estado',['class'=>'col-sm-3 control-label']); ?>

                    <?php echo Form::model($contacto,['route'=>['contacto.update',$contacto->id],'method'=> 'PUT']); ?>

                    <?php echo Form::select('estado_contacto', ['Nuevo' => 'Nuevo', 'En Revision' => 'En Revision', 'Revisado' => 'Revisado'], $contacto->estado_contacto); ?>

                    <?php echo e(Form::hidden('mensaje_contacto',  $contacto->mensaje_contacto)); ?>

                    <?php echo Form::hidden ( 'nombre_contacto',  $contacto->nombre_contacto  ); ?>

                    <?php echo Form::hidden ('telefono_contacto',$contacto->telefono_contacto); ?>

                    <?php echo Form::hidden  ('mail_contacto',$contacto->mail_contacto ); ?>

                    <?php echo Form::hidden  ('tipo_contacto',$contacto->tipo_contacto ); ?>


                    <?php echo Form::submit('Finalizar',['class'=>'btn btn-default','type'=>'submit']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>

            <div class="panel-body">
                <h4>Telefono: <?php echo $contacto->telefono_contacto; ?></h4>
                <h4>Correo: <?php echo $contacto->mail_contacto; ?> </h4>
                <h4>mensaje: </h4><h5> <?php echo $contacto->mensaje_contacto; ?></h5>
            </div>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>