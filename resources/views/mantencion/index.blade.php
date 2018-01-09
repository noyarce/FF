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
                        <th>Detalle de Uso</th>
                        <th>Solicitar Mantencion</th>
                        <th>Cambiar Estado</th>
                        <th> Eliminar Juego</th>
                       </thead><tbody>
                        @foreach($juegos as $juego)
                            <tr>
                                <td> {!! $juego ->nombre!!}</td>
                                <td>{!! $juego->estado_juego !!}</td>
                                <td>{!! Carbon\Carbon::parse($juego->ultima_mantencion)->format('d/m/Y')!!}</td>
                                <td><li><a href="{!! URL::to('mantencion/'.$juego->id) !!}">Detalle</a></li>
                                <td><li><a href="{!! URL::to('solicitar_mantencion/'.$juego->id) !!}">Solicitar Mantencion</a></li>
                                </td>
                                <td>
                                {!! Form::model($juego,['route'=>['mantencion.update',$juego->id],'method'=>'PUT']) !!}
                                {!!Form::select('estado_juego', ['Disponible' => 'Disponible', 'En Mantencion' => 'En Mantencion', 'No Disponible' => 'No Disponible'], $juego->estado_juego)!!}
                                {!!Form::submit('Finalizar',['class'=>'btn btn-default','type'=>'submit']) !!}
                                {!! Form::close() !!}
                                    
                                </td>
                                <td>
                                   {!! Form::open(['action' => ['JuegoController@destroy', $juego->id], 'method' => 'delete']) !!}
                                   {!! Form::submit('Eliminar', ['class'=>'btn btn-xs btn-danger','onclick'=>'return confirm("Seguro que desea eliminar?");']) !!}
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