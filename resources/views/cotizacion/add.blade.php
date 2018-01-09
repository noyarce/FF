@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listado de Juegos Disponibles </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                       </thead>
                        @foreach($juegos as $juego)
                            <tr>
                                <tbody>
                                <td>{!! $juego ->nombre!!} </td>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$juego -> id}}')">Ver Detalles</button>
                                    </td><td>
                                    <button class="btn btn-success" onclick="add('{{$juego->id}}','{{$id_cotizacion}}'),this.disabled=true">Añadir a la Cotizacion</button>
                                </td>
                                </tbody>
                            </tr>
                        @endforeach
                    </table>
                </div>
                
                
                 <a  href="{!! URL::to('show_cotizacion/'.$id_cotizacion)!!}" class="btn btn-success" aria-label="Left Align"role="button">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Finalizar </a>
                
                                      {!! Form::open(['action' => ['CotizacionController@destroy', $id_cotizacion], 'method' => 'delete']) !!}
                                      {!! Form::submit('Cancelar', ['class'=>'btn btn-danger','onclick'=>'return confirm("Seguro que desea cancelar?");']) !!}
                                      {!! Form::close() !!}

                
                



            </div>
        </div>
    </div>




    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('juego_show')}}">
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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



    function add(id_juego, id_cotizacion){
        $.ajax({
            type:"POST",
            url:"{!! \Illuminate\Support\Facades\URL::to('addcotizacion') !!}",
            data:{"id_juego":id_juego ,
                "id_cotizacion":id_cotizacion
            },
            success:function(){
                swal("Excelente!","Usted ha añadido un juego a su cotizacion","success");
            },
            failure: function (errMsg) {
                alert(errMsg);
            }
        });
    }

        function remove(id_juego, id_cotizacion){
            $.ajax({
                type:"POST",
                url:"{!! \Illuminate\Support\Facades\URL::to('removecotizacion') !!}",
                data:{"id_juego":id_juego ,
                    "id_cotizacion":id_cotizacion
                },
                success:function(){
                    swal("Excelente!","Usted ha quitado un juego a su cotizacion","success");
                }
            });
        }


</script>

    @endsection