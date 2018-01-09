@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="col-lg-offset-1">Modificar Juego</h2><br>

                        {!! Form::model($juego,['route'=>['juegos.update',$juego->id],'method'=>'PUT']) !!}
                    </div> 
                    @if((Session::has('flash_message')) or (count( $errors ) > 0))@include('errors.panel') @endif

                    <div class="panel-body">
                      <div class="form-group">
                            {!! Form::label('Nombre', 'Nombre',['class'=>'col-sm-3 control-label']) !!}
                            {!! Form::text('nombre', null,['class'=>'col-sm-3 form-control']) !!}
                            
                            {!! Form::label('Largo Mts', 'Largo Mts',['class'=>'col-sm-3 control-label']) !!}
                            {!! Form::text('j_largo', null,['class'=>'col-sm-3 form-control'], $juego->j_largo) !!}
                            
                            {!! Form::label('Ancho Mts', 'Ancho Mts',['class'=>'col-sm-4 control-label']) !!}
                            {!! Form::text('j_ancho', null,['class'=>'col-sm-3 form-control'], $juego->j_ancho) !!}
                            
                            {!! Form::label('Alto Mts', 'Alto Mts',['class'=>'col-sm-4 control-label']) !!}
                            {!! Form::text('j_alto', null,['class'=>'col-sm-4 form-control'], $juego->j_alto) !!}
                            
                            {!! Form::label('Precio x 3 hrs', 'Precio x 3 hrs',['class'=>'col-sm-4 control-label']) !!}
                            {!! Form::text('precio', null,['class'=>'col-sm-4 form-control'], $juego->precio) !!}
                            
                            {!! Form::label('Precio hr Extra', 'Precio hr Extra',['class'=>'col-sm-4 control-label']) !!}
                            {!! Form::text('precio_hora_extra', null,['class'=>'col-sm-4 form-control'], $juego->precio_hora_extra) !!}
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                {!! Form::submit('Finalizar',['class'=>'btn btn-success','type'=>'submit']) !!}
                                <a class="btn btn-danger btn-mini" href="{!! URL::to('juegos')!!}">Cancelar</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')