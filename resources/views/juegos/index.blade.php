@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Juegos </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>nombre</th>
                        <th>dimesiones</th>
                        <th>costos</th>
                       </thead>
                        @foreach($juegos as $juego)
                            <tr>
                                <tbody>
                                <td> {!! $juego ->nombre!!}
                                </td>
                                <td>
                                    LARGO : {!! $juego ->j_largo!!} mts<br>
                                    ANCHO : {!! $juego ->j_ancho!!} mts<br>
                                    ALTO :{!! $juego ->j_alto!!} mts

                                </td>
                                 <td>
                                    Precio Hasta 3 hrs   $ {!! $juego->precio !!} <br>
                                    Precio por Hora Extra ${!! $juego->precio_hora_extra !!}
                                </td>

                               </tbody>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($fotos as $foto)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="storage/{{$foto->imagen}}" alt="{{$foto->nombre}}">
                                    <div class="caption">
                                        <h3>{{$foto->nombre}}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection