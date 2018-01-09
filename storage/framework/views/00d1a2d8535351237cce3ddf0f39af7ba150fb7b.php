<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Buscar Arriendos segun Fecha </h4>
                  </div>
                <div class="panel-body">
                    <?php echo Form::label('Fecha', 'Fecha',['class'=>'col-sm-2 control-label']); ?>

                    <input type="date"  id="fecha" name="fecha" onchange="date(this.value)">
                </div>

                <div id ="dated"></div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="viewModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id = "detalles"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"></button>
                </div>
            </div>
        </div>
    </div>





    <script type="text/javascript">
        function date($fecha){
            $.ajax({
                url:"<?php echo \Illuminate\Support\Facades\URL::to('/verfecha'); ?>",
                type:"GET",
                data: {'fecha': $fecha},
                beforeSend: function(){
                    $('#dated').html('<img src="../img/loading_spinner.gif"> Buscando...');
                },
                success: function(e) {
                    if (e.length == 0 ){
                        $('#dated').html('<img src="../img/fail.png"> NO hay arriendos para mostrar ');
                                console.info(e);
                                console.log("vacio");
                        
                    }else{
                    $('#dated').html("");
                    var div = "";
                    var lrg = e.length;
                    var i;
                    div += "<table class='table table-bordered table-hover'>";
                    div += "<thead>";
                    div += "<th> hora</th>";
                    div += "<th> Direccion</th>";
                    div += "<th> Nombre del Cliente</th>";
                    div += "<th> Telefono</th>";
                    div += "<th> Comentario</th>";
                    div += "<th> Detalle </th>";
                    div += "</thead>";
                    div += "<tbody>";
                      for (i = 0; i < lrg; i++) {
                        div += "<tr>";
                        div += "<td>" + e[i].hora + "</td>";
                        div += "<td>" + e[i].direccion + "</td>";
                          div += "<td>" + e[i].cliente + "</td>";
                          div += "<td>" + e[i].fono + "</td>";
                          div += "<td>" + e[i].comentario + "</td>";
                          div += "<td><button  data-toggle='modal' data-target='#viewModal' onclick='detalle("+e[i].id+")'>Ver Juego(s)</button></td>";
                          div += "</tr>";
                    }
                    div += "</tbody>";
                    div += "</table>";
                    $('#dated').html(div);
                    }
                    console.info(e);
                },
                error: function (e) {
                    alert('No se puede procesar su peticion :( ');
                    console.error(e);
                    console.log("faail");
                }
            });
        }


        function detalle($id){
            $.ajax({
                url:"<?php echo \Illuminate\Support\Facades\URL::to('/verdetalle'); ?>",
                type:"GET",
                data: {'id_arriendo': $id},
                success: function(e) {
                    $('#detalles').html("");
                    var div = "";
                    var lrg = e.length;
                    var i;
                    div += "<table class='table table-bordered table-hover'>";
                    div += "<thead>";
                    div += "<th> juego(s)</th>";
                    div += "</thead>";
                    div += "<tbody>";
                    for (i = 0; i < lrg; i++) {
                        div += "<tr>";
                        div += "<td>"+e[i].nombre +"</td>";
                        div += "</tr>";
                    }
                    div += "</tbody>";
                    div += "</table>";
                    $('#detalles').html(div);
                    console.info(e);
                },
                error: function (e) {
                    alert('No se puede procesar su peticion :( ');
                    console.error(e);
                    console.log("faail");
                }
            });
        }
        </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>