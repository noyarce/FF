    
<?php $__env->startSection('content'); ?>
    <div class="container">

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Formulario para Cotizacion </h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <?php echo Form::open(['route'=>'cotizacion.store','class'=>'form-horizontal']); ?>


                <table class="table table-bordered">
                <tbody>
                <tr>
                    <td><?php echo Form::label('Nombre', 'Nombre',['class'=>'col-sm-0 control-label']); ?> </td>
                    <td><?php echo Form::text('nombre_c', null,['class'=>'form-control']); ?></td>
                 </tr>
                    <td><?php echo Form::label('Empresa', 'Empresa',['class'=>'col-sm-0 control-label']); ?></td>
                <td><?php echo Form::text('empresa_c', null,['class'=>'form-control']); ?></td>
                <tr>
                <td><?php echo Form::label('E-Mail', 'E-Mail',['class'=>'col-sm-0 control-label']); ?></td>
                    <td><?php echo Form::text('mail_c', null,['class'=>'form-control']); ?></td>
                </tr> <tr>
                    <td><?php echo Form::label('Telefono de Contacto', 'Telefono de Contacto',['class'=>'col-sm-0 control-label']); ?></td>
                    <td><?php echo Form::text('telefono_c', null,['class'=>'form-control']); ?></td>
                </tr>
                <tr>
                    <td><?php echo Form::label('Fecha', 'Fecha',['class'=>'col-sm-0 control-label']); ?></td>
                    <td><?php echo Form::date('fecha_c', \Carbon\Carbon::now()->format('d-m-Y')); ?></td>
                </tr>

                <tr>
                    <td><?php echo Form::label('hora', 'hora',['class'=>'col-sm-0 control-label']); ?></td>
                    <td>   <?php echo Form::select('hora_c', [
                            '8:30 - 11:30'=>'8:30 - 11:30',
                            '9:00 - 12:00'=>'9:00 - 12:00',
                            '9:30 - 12:30'=>'9:30 - 12:30',
                            '10:00 - 13:00'=>'10:00 - 13:00',
                            '10:30 - 13:30'=>'10:30 - 13:30',
                            '11:00 - 14:00'=>'11:00 - 14:00',
                            '11:30 - 14:30'=>'11:30 - 14:30',
                            '12:00 - 15:00'=>'12:00 - 15:00',
                            '12:30 - 15:30'=>'12:30 - 15:30',
                            '13:00 - 16:00'=>'13:00 - 16:00',
                            '13:30 - 16:30'=>'13:30 - 16:30',
                            '14:00 - 17:00'=>'14:00 - 17:00',
                            '14:30 - 17:30'=>'14:30 - 17:30',
                            '15:00 - 18:00'=>'15:00 - 18:00',
                            '15:30 - 18:30'=>'15:30 - 18:30',
                            '16:00 - 19:00'=>'16:00 - 19:00',
                            '16:30 - 19:30'=>'16:30 - 19:30',
                            '17:00 - 20:00'=>'17:00 - 20:00',
                            '17:30 - 20:30'=>'17:30 - 20:30',
                            '18:00 - 21:00'=>'18:00 - 21:00',
                            '18:30 - 21:30'=>'18:30 - 21:30',
                            '19:00 - 22:00'=>'19:00 - 22:00',
                            '19:30 - 22:30'=>'19:30 - 22:30',
                            '20:00 - 23:00'=>'20:00 - 23:00',
                            '20:30 - 23:30'=>'20:30 - 23:30',
                            '21:00 - 00:00'=>'21:00 - 00:00',
                            '21:30 - 00:30'=>'21:30 - 00:30',
                            '22:00 - 01:00'=>'22:00 - 01:00',
                            '22:30 - 01:30'=>'22:30 - 01:30',
                            '23:00 - 02:00'=>'23:00 - 02:00',
                            '23:30 - 02:30'=>'23:30 - 02:30',
                            '00:00 - 03:00'=>'00:00 - 03:00',
                            ], null, ['placeholder' => 'Seleccione su Opción...']); ?></td>
                </tr>

                <tr>
                    <td><?php echo Form::label('hrs extra', 'hrs extra',['class'=>'col-sm-0 control-label']); ?></td>
                    <td><?php echo Form::selectRange('ext_c', 0, 5, 0,['class'=>'col-sm-3  form-control']); ?></td>
                </tr>

                <tr>
                    <td><?php echo Form::label('Medio de Pago', 'Medio de Pago',['class'=>'col-sm-0 control-label']); ?></td>
                    <td><?php echo Form::select('mdp_c', ['Efectivo'=>'Efectivo','Deposito'=>'Deposito','Transferencia electronica'=>'Transferencia electronica','Cheque'=>'Cheque',], 'Efectivo'); ?></td>

                </tr>
                <tr>
                    <td><?php echo Form::label('Facturacion', 'Facturacion',['class'=>'col-sm-0 control-label']); ?></td>
                    <td> <select name="facturacion_c" id="facturacion_c">
                            <option value="Boleta">Boleta</option>
                            <option value="Factura">Factura</option>
                            <option value="Vale ">Vale</option>
                        </select></td>
                </tr>

                <tr>
                    <td><?php echo Form::label('Comentario', 'Comentario',['class'=>'col-sm-1 control-label']); ?> </td>
                    <td> <div class=" rows=3 ">
                            <?php echo Form::textarea('comentario_c', null,['class'=>'form-control']); ?>

                        </div></td>                </tr>

                <tr>
                    <td><?php echo Form::label('Dirección', 'Dirección',['class'=>'col-sm-2 control-label']); ?></td>
                    <td><?php echo Form::text('direccion_c', null,['class'=>'form-control']); ?></td>
                </tr>

                </tbody>
            </table>
                </div>
                <div class="form-group">
                    <div class="trans">
                        <?php echo Form::submit('Enviar',['class'=>'btn btn-success','type'=>'submit']); ?>

                        <button class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>