
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="col-lg-offset-1">Formulario de Contacto</h2>
                    </div>
                    <div class="panel-body">
                        <?php echo Form::open(['route'=>['contacto.store'],'class'=>'form-horizontal']); ?>


                        <div class="form-group">
                            <?php echo Form::label('contacto', 'contacto',['class'=>'col-sm-3 control-label']); ?>

                            <div class="col-sm-9 col-md-7">
                                <?php echo Form::select('tipo_contacto', ['Consulta' => 'Consulta', 'Reclamo' => 'Reclamo', 'Sugerencia' => 'Sugerencia'], null, ['placeholder' => 'Seleccione su Opción...']); ?>

                            </div>
                        </div>



                            <div class="form-group">
                                <?php echo Form::label('Nombre', 'Nombre',['class'=>'col-sm-3 control-label']); ?>

                                <div class="col-sm-9 col-md-7">
                                    <?php echo Form::text('nombre_contacto', null,['class'=>'form-control']); ?>

                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo Form::label('E-Mail', 'E-Mail',['class'=>'col-sm-3 control-label']); ?>

                                <div class="col-sm-9 col-md-7">
                                    <?php echo Form::text('mail_contacto', null,['class'=>'form-control']); ?>

                                </div>
                            </div>


                            <div class="form-group">
                                <?php echo Form::label('Telefono de Contacto', 'Telefono de Contacto',['class'=>'col-sm-3 control-label']); ?>

                                <div class="col-sm-9 col-md-7">
                                    <?php echo Form::text('telefono_contacto', null,['class'=>'form-control']); ?>

                                </div>
                            </div>



                        <div class="form-group">
                            <?php echo Form::label('Mensaje', 'Mensaje',['class'=>'col-sm-2 control-label']); ?>

                            <div class="col-sm-8 col-md-9 rows=3 ">
                                <?php echo Form::textarea( 'mensaje_contacto', null,['class'=>'form-control']); ?>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <?php echo Form::submit('Enviar',['class'=>'btn btn-success','type'=>'submit']); ?>

                                <a class="btn btn-danger btn-mini" href="<?php echo URL::to('/'); ?>">Cancelar</a>
                                <?php echo Form::close(); ?>

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