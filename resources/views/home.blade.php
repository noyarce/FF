@extends('layouts.app')

@section('content')

    <style>
        #botonera{
            text-align:center;
            body,html{
    height: 100%;
  }


        }</style>
  @if(Auth::user()-> tipo_usuario == '1') @include('menus.admin') @endif
                 @if(Auth::user()-> tipo_usuario == '2') @include('menus.secretaria') @endif
                 @if(Auth::user()-> tipo_usuario == '3') @include('menus.chofer') @endif
                 @if(Auth::user()-> tipo_usuario == '4') @include('menus.monitor') @endif
                 @if(Auth::user()-> tipo_usuario == '5') @include('menus.cliente') @endif
@endsection





