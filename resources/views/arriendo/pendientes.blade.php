@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listado de Arriendos Pendientes </h4>
                  </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th> Fecha</th>
                        <th> Hora</th>
                        <th> Dirección</th>
                        <th> Detalle</th>
                        <th>Editar</th>
                        <th>Cambiar Estado</th>
                        <th>Eliminar</th>
                        </thead>
                        @foreach($arriendos as $arriendo)
                            <tr>
                                <tbody>
                                <td>{!! $arriendo -> fecha!!} </td>
                                <td>{!! $arriendo -> hora!!} </td>
                                <td>{!! $arriendo->direccion !!}</td>
                                <td><a href="{!! URL::to('arriendo/'.$arriendo->id.'/') !!}">Mostrar</a></td>
                                <td><a href="{!! URL::to('arriendo/'.$arriendo->id.'/edit') !!}">Editar</a></td>
                                <td><a href="{!! URL::to('arriendo_status/'.$arriendo->id.'/') !!}">Modificar Estado</a></td>
                                <td>
                                   {!! Form::open(['action' => ['ArriendoController@destroy', $arriendo->id], 'method' => 'delete']) !!}
                                   {!! Form::submit('Eliminar', ['class'=>'btn  btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']) !!}
                                   {!! Form::close() !!}
                                </td>
                                </tbody>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection