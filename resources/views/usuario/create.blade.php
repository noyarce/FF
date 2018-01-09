@extends('layouts.app')
@section('content')


    @if (count ($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                {!! Form::open(['route'=>['usuarios.store'],'class'=>'form-horizontal']) !!}

                {!! Form::label('name', 'Nombre',['class'=>'col-sm-2 control-label']) !!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre']) !!}

                {!! Form::label('Correo') !!}
                {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese Correo']) !!}

                {!! Form::label('Clave Provisoria') !!}
                {!! Form::password('password',null,['class'=>'form-control','placeholder'=>'Ingrese contraseña']) !!}

                {!! Form::label('Tipo de Usuario') !!}
                {!!  Form::select('tipo_usuario', ['1'=>'Administrador',
                                        '2'=>'Secretaria',
                                        '3'=>'Chofer',
                                        '4'=>'Monitor',
                                        '5'=>'Cliente'])!!}

            </div>
            {!! Form::submit('Crear',['class'=>'btn btn-primary','type'=>'submit']) !!}
            <a class="btn btn-warning" href="{{ route('usuarios.index') }}"> Volver</a>
            {!! Form::close() !!}
        </div>
    </div>

@stop