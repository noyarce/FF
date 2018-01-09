@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class ="row">
                        <div>
                                  <a class="btn btn-primary" href="{!! URL::to('solicitudes_mantencion')!!}">Volver</a>
                            <div >
                                {!! Form::label('Cambiar Estado del juego', 'Cambiar Estado',['class'=>'col-sm-2 control-label']) !!}
                                {!! Form::model($juego,['route'=>['mantencion.update',$juego->id],'method'=>'PUT']) !!}
                                {!!Form::select('estado_juego', ['Disponible' => 'Disponible', 'En Mantencion' => 'En Mantencion', 'No Disponible' => 'No Disponible'], $juego->estado_juego)!!}
                                {!!Form::submit('Finalizar',['class'=>'btn btn-default','type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </div>
                      </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr><td>Responsable: {!! $user-> name!!}</td></tr>
                        <tr><td>Juego:{!! $juego->nombre !!}</td></tr>
                        <tr><td>Fecha de Solicitud: {!! $sol->created_at !!}</td> </tr>
                        <tr><td> Detalle: {!! $sol->comentario_mantencion !!}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection