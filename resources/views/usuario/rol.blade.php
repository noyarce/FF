@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if((Session::has('flash_message')) or (count( $errors ) > 0))@include('errors.panel') @endif

            <div class="col-md-7 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar rol de  {!! $user->name !!}</div>
                        <div class="panel-body">
                            {!! Form::model($user,['route'=>['usuarios.update',$user->id],'method'=>'PUT']) !!}
                        <div class="form-group ">
                            {!!Form::hidden  ('name',$user->name )!!}
                            {!!Form::hidden  ('email',$user->email )!!}
                            {!!Form::hidden  ('password',$user->password )!!}
                            {!!Form::hidden  ('password_confirmation',$user->password )!!}
                            {!!Form::select('tipo_usuario', ['1'=>'Administrador',
                                        '2'=>'Secretaria',
                                        '3'=>'Chofer',
                                        '4'=>'Monitor',
                                        '5'=>'Cliente'], $user->tipo_usuario )!!}
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-md-8">
                            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                            <a class="btn btn-warning" href="{{ route('usuarios.index') }}"> Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop