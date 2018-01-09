@extends('layouts.app')
@section('content')
    <div class="container">@if((Session::has('flash_message')) or (count( $errors ) > 0))@include('errors.panel') @endif

        <div class="row">
            <div class="col-md-7 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Datos Personales</div>
                        <div class="panel-body">

                {!! Form::model($user,['route'=>['perfil',$user->id],'method'=>'PUT']) !!}

                <div class="form-group ">
                    {!! Form::label('nombre','Nombre',['class'=>'col-sm-3 control-label']) !!}
                    <div class="col-sm-9 col-md-8">
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>$user->name]) !!}
                </div></div>

               <div class="form-group">
                    {!! Form::label('email','Correo',['class'=>'col-sm-3 control-label']) !!}
                    <div class="col-sm-9 col-md-8">
                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=> $user->email]) !!}
                </div></div>
        
                    {!! Form::hidden ('id', $user->id) !!}
                    {!! Form::hidden ('tipo_usuario', $user->tipo_usuario )!!}
                    {!! Form::hidden ('password',$user->password ) !!}
                    {!! Form::hidden ('password_confirmation',$user->password ) !!}

                <div class="form-group">
                    <div class="col-sm-9 col-md-8">
                        {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                        <a class="btn btn-warning" href="{{ route('home') }}"> Volver</a>
                        {!! Form::close() !!}
                </div></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection