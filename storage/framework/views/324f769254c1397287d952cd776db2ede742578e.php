<?php $__env->startSection('content'); ?>
    <style>
        #map {
            margin: auto auto;
            width:80%;
            height: 500px;
        }
    </style>
    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Detalle de Arriendo ID : <?php echo $arriendo->id; ?></h3>
                    
                    <?php echo Form::model($estado,['route'=>['arriendo_estado', $estado->arriendo_id],'method'=> 'PUT']); ?>

                    <?php echo Form::select('estado_arriendo', ['Pendiente' => 'Pendiente', 'Confirmado' => 'Confirmado', 'Cancelado' => 'Cancelado'], $estado->estado_arriendo); ?>

                    <?php echo Form::submit('Finalizar',['class'=>'btn btn-default','type'=>'submit']); ?>

                    <?php echo Form::close(); ?>

                   
                </div>
                    <div class ="row">
                        <div class="panel-body">
                            <h3>Informacion del Cliente</h3>
                            <table class="table table-striped table-condensed table-responsive table-bordered">
                                <tbody>
                                <tr><td> Nombre del Cliente : <b><?php echo $arriendo -> cliente; ?></b>  </td><td> Telefono : <b><?php echo $arriendo->fono; ?></b></td></tr>
                                <tr><td> Horario : <b><?php echo $arriendo -> hora; ?></b> </td><td>Estado : <b><?php echo $estado ->estado_arriendo; ?></b></td></tr>
                                <tr><td> Dirección : </td><td><?php echo $arriendo -> direccion; ?> </td></tr>
                                <tr><td> Facturacion : <b><?php echo $arriendo-> facturacion; ?></b>
                                    <td> Medio de Pago : <b><?php echo $arriendo-> mdp; ?></b>
                                    </td></tr>
                                <tr><td> Comentario </td><td><?php echo $arriendo -> comentario; ?> </td></tr>
                                </tbody>
                                </table>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>

    

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>