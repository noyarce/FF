@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="col-lg-offset-1">Formulario de Contacto</h2>
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['route'=>'post_contactar','class'=>'form-horizontal']) !!}


                        <div class="form-group">
                            {!! Form::label('contacto', 'contacto',['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9 col-md-7">
                                {!!  Form::select('tipo_contacto', ['Consulta' => 'Consulta', 'Reclamo' => 'Reclamo', 'Sugerencia' => 'Sugerencia'], null, ['placeholder' => 'Seleccione su Opción...'])!!}
                            </div>
                        </div>

                            <div class="form-group">
                                {!! Form::label('Nombre', 'Nombre',['class'=>'col-sm-3 control-label']) !!}
                                <div class="col-sm-9 col-md-7">
                                    {!! Form::text('nombre_contacto', null,['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('E-Mail', 'E-Mail',['class'=>'col-sm-3 control-label']) !!}
                                <div class="col-sm-9 col-md-7">
                                    {!! Form::text('mail_contacto', null,['class'=>'form-control']) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                {!! Form::label('Telefono de Contacto', 'Telefono de Contacto',['class'=>'col-sm-3 control-label']) !!}
                                <div class="col-sm-9 col-md-7">
                                    {!! Form::text('telefono_contacto', null,['class'=>'form-control']) !!}
                                </div>
                            </div>

                        <div class="form-group">
                            {!! Form::label('Mensaje', 'Mensaje',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-8 col-md-9 rows=3 ">
                                {!! Form::textarea( 'mensaje_contacto', null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                {!! Form::submit('Enviar',['class'=>'btn btn-success','type'=>'submit']) !!}
                                <a class="btn btn-danger btn-mini" href="{!! URL::to('/')!!}">Cancelar</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection