<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class ="row">
                        <div>
                                  <a class="btn btn-primary" href="<?php echo URL::to('solicitudes_mantencion'); ?>">Volver</a>
                            <div >
                                <?php echo Form::label('Cambiar Estado del juego', 'Cambiar Estado',['class'=>'col-sm-2 control-label']); ?>

                                <?php echo Form::model($juego,['route'=>['mantencion.update',$juego->id],'method'=>'PUT']); ?>

                                <?php echo Form::select('estado_juego', ['Disponible' => 'Disponible', 'En Mantencion' => 'En Mantencion', 'No Disponible' => 'No Disponible'], $juego->estado_juego); ?>

                                <?php echo Form::submit('Finalizar',['class'=>'btn btn-default','type'=>'submit']); ?>

                                <?php echo Form::close(); ?>

                            </div>
                      </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr><td>Responsable: <?php echo $user-> name; ?></td></tr>
                        <tr><td>Juego:<?php echo $juego->nombre; ?></td></tr>
                        <tr><td>Fecha de Solicitud: <?php echo $sol->created_at; ?></td> </tr>
                        <tr><td> Detalle: <?php echo $sol->comentario_mantencion; ?></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>