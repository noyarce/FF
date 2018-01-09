@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="col-lg-offset-1">Solicitar Mantencion de Juego {!!$juego->nombre !!}</h2><br>
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['route'=>['sol_mantencion'],'class'=>'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('Comentario', 'Comentario',['class'=>'col-sm-2 control-label']) !!}  <div class=" rows=3 ">
                                    {!! Form::textarea('comentario_mantencion', null,['class'=>'form-control']) !!}
                                </div>
                        </div>
                        {{ Form::hidden('juego_id', $juego->id) }}


                         <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-5">
                                {!! Form::submit('Finalizar',['class'=>'btn btn-success','type'=>'submit']) !!}
                                <a class="btn btn-danger btn-mini" href="{!! URL::to('home')!!}">Cancelar</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection