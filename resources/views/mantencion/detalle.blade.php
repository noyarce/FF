@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class ="row">
                        <div class="col-md-8">
                            <h5 class="panel-title">
                                  <a class="btn btn-primary btn-mini" href="{!! URL::to('mantencion')!!}">Volver</a>
                            </h5>
                      </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>juego</th>
                       <th>motivo</th>
                        <th>Acciones</th>
                        </thead><tbody>
                        @foreach($solicitudes as $solicitud)
                            <tr>
                                <td>{!! $solicitud ->nombre!!}</td>
                                <td>
                                    {!! substr($solicitud->comentario_mantencion, 0, 20) !!}...
                                    <a href="{!! URL::to('ver_solicitud/'.$solicitud->id) !!}"> ver Más</a>
                                </td>
                                <td>
                                    {!! Form::open(['action' => ['MantencionController@destroy', $solicitud->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Eliminar', ['class'=>'btn btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']) !!}
                                    {!! Form::close() !!}
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