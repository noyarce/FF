
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listado de Juegos Disponibles </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>

                        </thead>
                        <?php $__currentLoopData = $juegos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $juego): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <tbody>
                                <td><?php echo $juego ->nombre; ?> </td>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('<?php echo e($juego -> id); ?>')">Ver Detalles</button>
                                    </td><td>
                                    <button class="btn btn-success" onclick="add('<?php echo e($juego->id); ?>','<?php echo e($id); ?>'),this.disabled=true">Añadir al arriendo</button>
                                    <button class="btn btn-danger" onclick="remove('<?php echo e($juego->id); ?>','<?php echo e($id); ?>'),this.disabled=true">Quitar</button>

                                </td>
                                </tbody>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </table>
                </div>
                <button class="btn btn-info" href="<?php echo URL::to('arriendo/'.$id); ?>")>Finalizar</button>
                <button class="btn btn-danger" onclick="cancelar('<?php echo e($id); ?>')">Cancelar</button>

            </div>
        </div>
    </div>




    <input type="hidden" name="hidden_view" id="hidden_view" value="<?php echo e(url('juego_show')); ?>">
    <!-- View Modal start -->
    <div class="modal fade" id="viewModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><p><span id="view_j_nombre" class="text-success"></span></p>
                    </h4>
                </div>
                <div class="modal-body">
                    <p><b>Alto  : <span id="view_j_alto" class="text-success"></span> mts.</b></p>
                    <p><b>Largo  : <span id="view_j_largo" class="text-success"></span> mts.</b></p>
                    <p><b>Ancho : <span id="view_j_ancho" class="text-success"></span> mts.</b></p>
                    <p><b>Precio  : $ </b><span id="view_j_precio" class="text-success"></span></p>
                    <p><b>Precio x Hr. Extra  : $ </b><span id="view_j_he" class="text-success"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"></button>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        function fun_view(id_juego)
        {
            var view_url = $("#hidden_view").val();
            $.ajax({
                url: view_url,
                type:"GET",
                data: {"id_juego":id_juego},
                success: function(result){
                    //console.log(result);
                    $("#view_j_nombre").text(result.nombre);
                    $("#view_j_alto").text(result.j_largo);
                    $("#view_j_ancho").text(result.j_ancho);
                    $("#view_j_largo").text(result.j_largo);
                    $("#view_j_precio").text(result.precio);
                    $("#view_j_he").text(result.precio_hora_extra);
                }
            });
        }



    function add(id_juego, id_arriendo){
        $.ajax({
            type:"POST",
            url:"<?php echo \Illuminate\Support\Facades\URL::to('addarriendo'); ?>",
            data:{"id_juego":id_juego ,
                 "id_arriendo":id_arriendo
            },
            done:function(){
                swal("Excelente!","Usted ha añadido un juego a su cotizacion","success");
            },
            fail: function (errMsg) {
                alert(errMsg);
            }
        });
    }

        function remove(id_juego, id_arriendo){
            $.ajax({
                type:"POST",
                url:"<?php echo \Illuminate\Support\Facades\URL::to('removearriendo'); ?>",
                data:{"id_juego":id_juego ,
                    "id_arriendo":id_arriendo
                }
            });
        }


</script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>