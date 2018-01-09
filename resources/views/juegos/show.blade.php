@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class ="row">
                        <div class="col-md-8">
                            <h5 class="panel-title">
                                {!! $juego->nombre !!}
                                <a class="btn btn-primary btn-mini" href="{!! URL::to('juegos')!!}">Volver</a>
                            </h5>
                      </div>
                    </div>
                </div>
                <div class="panel-body">
                    <h5>Alto</h5><h4>{!! $juego->j_alto !!} mts </h4>
                    <h5>Ancho</h5><h4>{!! $juego->j_ancho !!} mts </h4>
                    <h5>Largo</h5><h4>{!! $juego->j_largo !!} mts </h4>
                    <h5>Precio</h5><h4> $ {!! $juego->precio !!}</h4>
                    <h5>Precio por hora Extra</h5><h4>$ {!! $juego->precio_hora_extra !!}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection