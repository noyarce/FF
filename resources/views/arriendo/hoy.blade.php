@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listado de Arriendos para Hoy {{\Carbon\Carbon::now()->format('d-m-Y') }}  </h4>
                    <a href="{!! URL::to('print_hoy')!!}" class="btn btn-success btn-lg active" aria-label="Left Align"role="button" onclick="this.disabled=true">
                        <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>Guardar como PDF </a>

                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-bordered">
                        <thead>
                        <th> ID</th>
                        <th> Hora</th>
                        <th> Dirección</th>
                        <th> Nombre del Cliente</th>
                        <th> Telefono</th>
                        <th> Comentario</th>
                        <th> Estado </th>
                        <th> Detalle</th>
                        <th>Acciones</th>

                        </thead>
                        @foreach($arriendos as $arriendo)
                            <tr>
                                <tbody>
                                <td>{!! $arriendo -> id!!} </td>
                                <td>{!! $arriendo -> hora!!} </td>
                                <td><a href="#myModal" class="btn" data-toggle="modal" >{!! $arriendo -> direccion!!}</a> </td>
                                <td>{!! $arriendo -> cliente!!} </td>
                                <td>{!! $arriendo->fono !!}</td>
                                <td>{!! $arriendo -> comentario!!} </td>
                                <td>{!! $arriendo->estado_arriendo !!}</td>

                                <td><button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="detalle('{{$arriendo->id}}')">Ver Detalles</button></td>
                                <td>
                                   {!! Form::open(['action' => ['JuegoController@destroy', $arriendo->id], 'method' => 'delete']) !!}
                                   {!! Form::submit('Eliminar', ['class'=>'btn btn-xs btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']) !!}
                                   {!! Form::close() !!}

                                </td>
                                </tbody>
                            </tr>
                        @endforeach
                    </table>

                    <table class="table responsive table-bordered">
                        <thead>
                        <th>Juego</th>
                        <th>Arriendo ID </th>

                        </thead>
                        @foreach($juegos as $j)

                                <tbody><tr>
                                <td>{!! $j->nombre!!} </td>
                                <td>{!! $j->arriendo_id!!} </td>
                                </tr>   </tbody>

                        @endforeach
                    </table>




                </div>
            </div>
        </div>
    </div>


    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3></h3>
        </div>
        <div class="modal-body">
            <div id="mapCanvas" style="width: 500px; height: 400px"></div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">
//$lat, $lng
        function initMap() {
            var chillan = {lat: -36.60664, lng: -72.104};
            var map = new google.maps.Map(document.getElementById('mapCanvas'), {
                zoom: 15,
                center: chillan
            });
            var marker = new google.maps.Marker({
                position: chillan,
                map: map,
                draggable: false
            });
            marker.setMap(map);
        }
        $("#myModal").on("shown.bs.modal", function () {
            initMap();
        });

        function detalle($id_arriendo){
    $.ajax({
    url:"{!! \Illuminate\Support\Facades\URL::to('/verdetalle')!!}",
    type:"GET",
    data: {'id_arriendo': $id_arriendo},
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

    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsWBoq7NdO9jsx2kis8ZPP8RmhnnX8gD0&libraries=places&callback=initMap"></script>

@endsection