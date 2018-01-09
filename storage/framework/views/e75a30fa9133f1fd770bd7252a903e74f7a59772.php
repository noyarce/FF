<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Buscar Juegos Disponibles segun Fecha </h4>
                  </div>
                <div class="panel-body">
                    <?php echo Form::label('Fecha', 'Fecha',['class'=>'col-sm-2 control-label']); ?>

                    <input type="date"  id="fecha" name="fecha" onchange="disponibles(this.value)">
                    <div id ="disponibles"></div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script type="text/javascript">
         function disponibles(fecha){
                        $.ajax({
                            url:"<?php echo \Illuminate\Support\Facades\URL::to('disponibles'); ?>",
                            type:"GET",
                            data: {'fecha': fecha},
                            beforeSend: function(){
                                $('#disponibles').html('<img src="../img/loading_spinner.gif"> Buscando...');
                            },
                            success: function(juegos) {
                                if (juegos.length == 0 ){
                                    $('#disponibles').html('<img src="../img/fail.png"> NO hay juegos para mostrar ');
                                        console.info(juegos);
                                    console.log("vacio");
                                }else{
                                $('#disponibles').html("");
                                var div = "";
                                div += "<table class='table table-bordered table-hover'>";
                                div += "<tbody>";
                                var lrg = juegos.length;
                                var i;
                                for (i = 0; i < lrg; i++) {
                                    div += "<tr>";
                                    div += "<td>" + juegos[i].nombre + "</td>";
                                    div += "</tr>";
                                }
                                div += "</tbody>";
                                div += "</table>";
                                $('#disponibles').html(div);
                                console.info(juegos);
                                }
                            },
                            error: function (juegos) {
                                $('#disponibles').html('<img src="../img/fail.png"> Error :( ');
                                console.error(juegos);
                                console.log("faail");
                            }
                        });
                    }

    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>