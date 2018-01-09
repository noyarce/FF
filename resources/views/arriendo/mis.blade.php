@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Mi Listado de Arriendos </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>

                        <th> Fecha</th>
                        <th> Hora</th>
                        <th> Estado</th>
                        <th> Detalle</th>

                        </thead>
                        @foreach($arriendos as $arriendo)
                            <tr>

                                <tbody>
                                <td>{!! $arriendo ->fecha!!} </td>
                                <td>{!! $arriendo -> hora!!} </td>
                                <td>{!! $arriendo ->estado_arriendo !!}</td>
                                <td><a href="{!! URL::to('show_arriendo/'.$arriendo->id ) !!}">Mostrar</a></td>
                                </tbody>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection