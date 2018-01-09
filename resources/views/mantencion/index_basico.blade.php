@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Mantencion de Juegos </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>nombre</th>
                        <th>Estado</th>
                        <th>Fecha de Ultima Mantencion</th>
                        <th>Solicitar Mantencion</th>
                       </thead><tbody>
                        @foreach($juegos as $juego)
                            <tr>
                                <td> {!! $juego ->nombre!!}</td>
                                <td>{!! $juego->estado_juego !!}</td>
                                <td>{!! Carbon\Carbon::parse($juego->ultima_mantencion)->format('d/m/Y')!!}</td>
                                <td><li><a href="{!! URL::to('solicitar_mantencion/'.$juego->id) !!}">Solicitar Mantencion</a></li>
                                </td>
                               
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection