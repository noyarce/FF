@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <a class="btn btn-primary btn-mini" href="{!! URL::to('contacto')!!}">Volver al Listado de mensajes</a>
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class ="row">
                  <div class="col-md-8">
                      <h5 class="panel-title">{!! $contacto->tipo_contacto!!} de {!! $contacto->nombre_contacto!!}</h5>
                  </div>
                  @if((Session::has('flash_message')) or (count( $errors ) > 0))@include('errors.panel') @endif
                  <div class="col-md-4">
                    {!!Form::label('Estado', 'Estado',['class'=>'col-sm-3 control-label']) !!}
                    {!!Form::model($contacto,['route'=>['contacto.update',$contacto->id],'method'=> 'PUT'])  !!}
                    {!!Form::select('estado_contacto', ['Nuevo' => 'Nuevo', 'En Revision' => 'En Revision', 'Revisado' => 'Revisado'], $contacto->estado_contacto)!!}
                    {{ Form::hidden('mensaje_contacto',  $contacto->mensaje_contacto) }}
                    {!!Form::hidden ( 'nombre_contacto',  $contacto->nombre_contacto  ) !!}
                    {!!Form::hidden ('telefono_contacto',$contacto->telefono_contacto) !!}
                    {!!Form::hidden  ('mail_contacto',$contacto->mail_contacto )!!}
                    {!!Form::hidden  ('tipo_contacto',$contacto->tipo_contacto )!!}

                    {!!Form::submit('Finalizar',['class'=>'btn btn-default','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

            <div class="panel-body">
                <h4>Telefono: {!! $contacto->telefono_contacto!!}</h4>
                <h4>Correo: {!! $contacto->mail_contacto!!} </h4>
                <h4>mensaje: </h4><h5> {!! $contacto->mensaje_contacto!!}</h5>
            </div>
        </div>


    </div>
</div>
@endsection('content')
