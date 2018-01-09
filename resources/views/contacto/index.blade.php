@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listado de Mensajes</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>Enviado el</th>
                        <th> Estado</th>
                        <th> Tipo</th>
                        <th> Nombre</th>

                        <th>Acciones</th>
                        </thead>
                        @foreach($contactos as $contacto)
                            <tr>
                                <tbody>
                                <td>{!! $contacto->created_at!!}</td>
                                <td>{!! $contacto ->estado_contacto!!} </td>
                                <td>{!! $contacto ->tipo_contacto!!} </td>
                                <td>{!! $contacto ->nombre_contacto!!} </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{!! URL::to('contacto/'.$contacto->id) !!}">Ver Mensaje</a>
                                      {!! Form::open(['action' => ['ContactoController@destroy', $contacto->id], 'method' => 'delete']) !!}
                                      {!! Form::submit('Eliminar', ['class'=>'btn btn-xs btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']) !!}
                                      {!! Form::close() !!}

                                </td>
                                </tbody>
                            </tr>
                        @endforeach
                    </table>
                    {{$contactos->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection