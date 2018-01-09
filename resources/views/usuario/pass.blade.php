@extends('layouts.app')
@section('content')
    <div class="container">
        @if((Session::has('flash_message')) or (Session::has('alert-warning')) or (count( $errors ) > 0))@include('errors.panel') @endif
        <div class="row">
            <div class="col-md-7 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Contraseña</div>
                        <div class="panel-body">

                {!! Form::model($user,['route'=>['NewPass',$user->id],'method'=>'PUT']) !!}

                <div class="form-group ">
                    {!! Form::label('nombre','Nombre',['class'=>'col-sm-3 control-label']) !!}{!! $user->name !!}
                </div>

               <div class="form-group">
                    {!! Form::label('email','Correo',['class'=>'col-sm-3 control-label']) !!}{!! $user->email !!}
                </div>
                
                <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Clave</label>
                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Clave</label>
                            <div class="col-md-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>              

              {!!Form::hidden  ('name', $user->name )!!}
                {!!Form::hidden  ('email', $user->email )!!}
               {!!Form::hidden  ('tipo_usuario', $user->tipo_usuario )!!}
                <div class="form-group">
                    <div class="col-sm-9 col-md-8">
                        {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                       
                </div></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection